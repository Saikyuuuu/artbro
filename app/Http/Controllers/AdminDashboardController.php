<?php

namespace App\Http\Controllers;

use App\Models\ArtUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users["userType"] != 1 && $users["userType"] != 4) {
                return redirect("/client_home");
            }

            $queryResult = DB::table('art_users')->where('userType', '<>', 4)->where('userType', '<>', 1)->get();

            $pageData = DB::table('art_users')
                ->where('userType', '<>', 4)
                ->where('userType', '<>', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view("admin.dashboard", ['userCount' => count($queryResult), 'users' => $pageData]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
    }
}
