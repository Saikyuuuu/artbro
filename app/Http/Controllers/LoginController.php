<?php

namespace App\Http\Controllers;

use App\Models\ArtUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        if (isset($request->btnLogin)) {
            $email = $request->email;
            $password = $request->password;

            $queryResult = DB::table("art_users")->where('email', '=', $email)->get();
            $decodedResult = json_decode($queryResult, true);
            $hasFound = false;

            $userFound = array();

            foreach ($decodedResult as $d) {
                if (password_verify($password, $d['password'])) {
                    $hasFound = true;
                    array_push($userFound, $d);
                    break;
                }
            }

            if ($hasFound) {
                session()->put("users", $userFound[0]);
                session()->put("successLogin", true);
            } else {
                session()->put("errorLogin", true);
            }

            return redirect("/");
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function signUp(Request $request)
    {
        $queryResult = DB::table('art_users')->where('email', '=', $request->email)->get();
        $data = json_decode($queryResult, true);
        if (count($data) > 0) {
            session()->put("emailExist", true);
            return redirect("/");
        }

        if (isset($request->btnSignup)) {

            $users = new ArtUsers();
            $users->firstname = $request->firstName;
            $users->middleName = $request->middleName;
            $users->lastName = $request->lastName;
            $users->address = $request->address;
            $users->birthDate = $request->birthDate;
            $users->phoneNumber = $request->phoneNumber;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->email = $request->email;
            $users->userType = 2;
            $isSave = $users->save();
            if ($isSave) {
                session()->put("successCreate", true);
            } else {
                session()->put("errorCreate", true);
            }

            return redirect("/");
        } else if (isset($request->btnAdminSignup)) {

            if (session()->exists("users")) {
                $users = session()->pull("users");
                session()->put("users", $users);

                if ($users["userType"] == 1 || $users["userType"] == 4) {
                    $users = new ArtUsers();
                    $users->firstname = $request->firstName;
                    $users->middleName = $request->middleName;
                    $users->lastName = $request->lastName;
                    $users->address = $request->address;
                    $users->birthDate = $request->birthDate;
                    $users->phoneNumber = $request->phoneNumber;
                    $users->email = $request->email;
                    $users->password = Hash::make($request->password);
                    $users->email = $request->email;
                    $users->userType = $request->userType;
                    $isSave = $users->save();
                    if ($isSave) {
                        session()->put("successAdminCreate", true);
                    } else {
                        session()->put("errorAdminCreate", true);
                    }
                }
                return redirect('/admin_users');
            }
        }
        return redirect("/");
    }
}
