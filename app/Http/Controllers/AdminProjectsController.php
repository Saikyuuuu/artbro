<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProjectsController extends Controller
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
            if ($searchKey) {
                $pageData = DB::table('vwprojects')
                    ->where('projectName', '=', $searchKey)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            } else {
                $pageData = DB::table('vwprojects')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            }

            $query = json_decode(DB::table('project_files')->get(), true);
            $projectFileData = array();
            $tmp = array();
            foreach ($query as $q) {
                if ($projectFileData[$q['projectID']]) {
                    $tmp = $projectFileData[$q['projectID']];
                    array_push($tmp, $q);
                    $projectFileData[$q['projectID']] = $tmp;
                } else {
                    array_push($tmp, $q);
                    $projectFileData[$q['projectID']] = $tmp;
                }
            }


            return view("admin.projects", ['projects' => $pageData, 'searchKey' => $searchKey, 'projectFileData' => $projectFileData]);
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
    public function destroy(string $id)
    {
        //
    }
}
