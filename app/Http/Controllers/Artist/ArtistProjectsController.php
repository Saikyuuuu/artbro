<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ArtistProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 3) {
                return redirect("/");
            }

            $queryResults = Projects::where('userID', '=', $users['userID'])->get();
            $projects = json_decode($queryResults, true);

            return view("artist.projects", ['projects' => $projects, 'count' => $queryResults->count()]);
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
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 3) {
                return redirect("/");
            }

            if ($request->btnCreateProject) {
                $projectName = $request->projectName;
                $queryResults = DB::table('projects')->where([
                    ['projectName', '=', $projectName],
                    ['userID', '=', $users['userID']]
                ])->get();

                if ($queryResults->count() > 0) {
                    session()->put('projectNameExist', true);
                } else {
                    $newProject = new Projects();
                    $newProject->userID = $users['userID'];
                    $newProject->customerID = 0; // customer defaulted to 0 if personal project
                    $newProject->projectName = $projectName;
                    $newProject->projectType = "Personal";
                    $newProject->pricing = 0.0;
                    $newProject->startDate = date('y-m-d', strtotime(now()));
                    $newProject->dueDate = date('y-m-d', strtotime(now()));
                    $newProject->status = "In Progress";
                    $newProject->notes = "";
                    $isSave = $newProject->save();
                    if ($isSave) {
                        session()->put("successAddProject", true);
                    } else {
                        session()->put("errorAddProject", true);
                    }
                }
            }

            return redirect("/artist_projects");
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect("/artist_projects");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
