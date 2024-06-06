<?php

namespace App\Http\Controllers;

use App\Models\ArtUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);


            if ($users["userType"] != 1 && $users["userType"] != 4) {
                return redirect("/client_home");
            }

            $searchKey = $request->query('search');



            $allUsers = json_decode(DB::table('art_users')
                ->where('userType', '<>', 1)
                ->where('userType', '<>', 4)->get(), true);
            $hasUser = count($allUsers) > 0 ? true : false;

            if ($searchKey != "") {
                $mUsers = DB::table('art_users')
                    ->where('userType', '<>', 1)
                    ->where('userType', '<>', 4)
                    ->where('lastName', 'LIKE', $searchKey)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            } else {
                $mUsers = DB::table('art_users')
                    ->where('userType', '<>', 1)
                    ->where('userType', '<>', 4)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            }



            return view('admin.users', ['allUsers' => $mUsers, 'hasUser' => $hasUser, 'searchKey' => $searchKey]);
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);


            if ($users["userType"] != 1 && $users["userType"] != 4) {
                return redirect("/client_home");
            }

            if (isset($request->btnAdminEditUser)) {
                $pass = $request->userType;
                $updateCount = 0;
                if ($pass && $pass != "") {
                    $updateCount = DB::table("art_users")->where('userID', '=', $id)->update([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'address' => $request->address,
                        'birthDate' => $request->birthDate,
                        'phoneNumber' => $request->phoneNumber,
                        'password' => Hash::make($request->password),
                        'email' => $request->email,
                        'userType' => $request->userType,
                    ]);
                } else {
                    $updateCount = DB::table("art_users")->where('userID', '=', $id)->update([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'address' => $request->address,
                        'birthDate' => $request->birthDate,
                        'phoneNumber' => $request->phoneNumber,
                        'email' => $request->email,
                        'userType' => $request->userType,
                    ]);
                }
                if ($updateCount > 0) {
                    session()->put("successUpdateUser", true);
                } else {
                    session()->put("errorUpdateUser", true);
                }
            }
            return redirect("/admin_users");
        }
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);


            if ($users["userType"] != 1 && $users["userType"] != 4) {
                return redirect("/client_home");
            }

            if (isset($request->btnAdminDeletetUser)) {
                $count = DB::table('art_users')->where('userID', '=', $id)->delete();
                if ($count > 0) {
                    session()->put("successDeletedUser", true);
                } else {
                    session()->put("errorDeleteUser", true);
                }
            }

            return redirect("/admin_users");
        }

        return redirect("/");
    }
}
