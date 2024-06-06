<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\ProjectFiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 3) {
                return redirect("/");
            }

            $id = $request->query("id");

            if ($id) {
                $queryResults = DB::table('projects')->where('projectID', '=', $id)->get();
                $data = json_decode($queryResults, true);
                $projectFound = false;
                $projectDetails = array();
                foreach ($data as $d) {
                    if ($d['userID'] == $users['userID']) {
                        array_push($projectDetails, $d);
                        $projectFound = true;
                        break;
                    }
                }

                $projectFileData = json_decode(DB::table('project_files')->where('projectID', '=', $id)->get(), true);


                if ($projectFound) {
                    return view('artist.pdetails', ['pdetails' =>  $projectDetails[0], 'projectFileData' => $projectFileData]);
                } else {
                    session()->put('projectNotFound', true);
                }
            }
            return redirect("/artist_projects");
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
        dd($request);
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

            if ($users['userType'] != 3) {
                return redirect("/");
            }

            if (isset($request->btnUpdatePrice)) {
                $isUpdate = DB::table('projects')->where('projectID', '=', $id)->update([
                    'pricing' => $request->price
                ]);

                if ($isUpdate > 0) {
                    session()->put("successUpdatePrice", true);
                } else {
                    session()->put("errorUpdatePrice", true);
                }
            } else if ($request->btnUpdateProjectDetail) {

                $files = $request->file('uploadFiles');
                $fileName = "";
                if ($files) {
                    $mimeType = $files->getMimeType();
                    if ($mimeType == "image/png" || $mimeType == "image/jpg" || $mimeType == "image/JPG" || $mimeType == "image/JPEG" || $mimeType == "image/jpeg" || $mimeType == "image/PNG") {
                        $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/projectFiles';
                        $fileName = strtotime(now()) . "." . $files->getClientOriginalExtension();
                        $isFile = $files->move($destinationPath,  $fileName);
                        chmod($destinationPath, 0755);

                        if ($fileName != "") {
                            $newProjectFile = new ProjectFiles();
                            $newProjectFile->projectID = $id;
                            $newProjectFile->userID = $users['userID'];
                            $newProjectFile->filePath = "/storage/projectFiles/" . $fileName;
                            $isSave = $newProjectFile->save();
                            if ($isSave) {
                                session()->put("successAddProjectFile", true);
                            } else {
                                session()->put("errorAddProjectFile", true);
                            }
                        } else {
                            session()->put("errorAddProjectFile", true);
                        }
                    }
                }
            } else if ($request->btnCompleteProject) {
                $isUpdate = DB::table('projects')->where('projectID', '=', $id)->update([
                    'status' => 'Completed'
                ]);

                if ($isUpdate > 0) {
                    session()->put("successUpdateComplete", true);
                } else {
                    session()->put("errorUpdateComplete", true);
                }
            } else if ($request->btnShowEnabled) {
                $isUpdate = DB::table('projects')->where('projectID', '=', $id)->update([
                    'notes' => 'for show'
                ]);

                if ($isUpdate > 0) {
                    session()->put("successUpdateShow", true);
                } else {
                    session()->put("errorUpdateShow", true);
                }
            } else if ($request->btnShowDisabled) {
                $isUpdate = DB::table('projects')->where('projectID', '=', $id)->update([
                    'notes' => ''
                ]);

                if ($isUpdate > 0) {
                    session()->put("successUpdateDisableShow", true);
                } else {
                    session()->put("errorUpdateDisableShow", true);
                }
            }

            return redirect("/artist_project_detail?id=" . $id . "");
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

            if ($users['userType'] != 3) {
                return redirect("/");
            }

            if ($request->btnDeleteProject) {

                $affectedRows = DB::table('projects')->where('projectID', '=', $id)->delete();
                if ($affectedRows > 0) {
                    session()->put("successDeleteProject", true);
                    return redirect("/artist_projects");
                } else {
                    session()->put("errorDeleteProject", true);
                }
            } else if ($request->btnDeleteProjectFile) {
                try {
                    $originalDirectoryPath = $request->origImagePath;
                    if ($originalDirectoryPath) {
                        $destinationPath = $_SERVER['DOCUMENT_ROOT'] . $originalDirectoryPath;
                        File::delete($destinationPath);
                    }
                } catch (Exception $e1) {
                }

                $affectedRows = DB::table('project_files')->where('projectFileID', '=', $id)->delete();
                if ($affectedRows > 0) {
                    session()->put("successDeleteProjectFile", true);
                    return redirect("/artist_project_detail?id=" . $request->projectID);
                } else {
                    session()->put("errorDeleteProjectFile", true);
                }
            }

            return redirect("/artist_project_detail");
        }

        return redirect("/");
    }
}
