<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
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

            $banners = Banners::all();

            return view('admin.banner', ['banners' => $banners]);
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

            $files = $request->file("banner");
            $fileName = "";

            if ($files) {
                $mimeType = $files->getMimeType();
                if ($mimeType == "image/png" || $mimeType == "image/jpg" || $mimeType == "image/JPG" || $mimeType == "image/JPEG" || $mimeType == "image/jpeg" || $mimeType == "image/PNG") {
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/banners';
                    $fileName = strtotime(now()) . "." . $files->getClientOriginalExtension();
                    $isFile = $files->move($destinationPath,  $fileName);
                    chmod($destinationPath, 0755);

                    if ($fileName != "") {
                        $newBanner = new Banners();
                        $newBanner->imagePath = "/storage/banners/" . $fileName;
                        $newBanner->isActive = 2;
                        $isSave = $newBanner->save();
                        if ($isSave) {
                            session()->put("successAddBanner", true);
                        } else {
                            session()->put("errorAddBanner", true);
                        }
                    } else {
                        session()->put("errorAddBanner", true);
                    }
                } else {
                    session()->put("imageNotAccepted", true);
                }
            }


            return redirect("/admin_banner");
        }
        return redirect("/");
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

            if ($request->btnAdminActivateBanner) {
                $updateThis = DB::table('banners')->update([
                    'isActive' => 2
                ]);
                $updateCount = DB::table('banners')->where('id', '=', $id)->update([
                    'isActive' => 1
                ]);
                if ($updateCount > 0) {
                    session()->put("successActivateBanner", true);
                } else {
                    session()->put("errorActivateBanner", true);
                }
            } else if ($request->btnAdminDeactivateBanner) {
                $updateCount = DB::table('banners')->where('id', '=', $id)->update([
                    'isActive' => 2
                ]);
                if ($updateCount > 0) {
                    session()->put("successDeactivateBanner", true);
                } else {
                    session()->put("errorDectivateBanner", true);
                }
            }

            return redirect("/admin_banner");
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

            if ($request->btnAdminDeleteBanner) {
                $deleteCount = DB::table('banners')->where('id', '=', $id)->delete();
                if ($deleteCount > 0) {
                    session()->put("successDeleteBanner", true);
                } else {
                    session()->put("errorDeleteBanner", true);
                }
            }

            return redirect("/admin_banner");
        }
        return redirect("/");
    }
}
