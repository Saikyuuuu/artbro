<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users["userType"] == 1 || $users["userType"] == 4) {
                return redirect("/admin_dashboard");
            }

            if ($users["userType"] == 3) {
                return redirect("/artist_dashboard");
            }

            return redirect("/client_home");
        }

        $banners = DB::table('banners')->where('isActive', '=', 1)->get();
        $countBanner = $banners->count();
        $hasBanner = $countBanner > 0 ? true : false;

        $newBanner = array();
        foreach ($banners as $r) {
            array_push($newBanner, $r);
            break;
        }
        // dd(['hasBanner' => $hasBanner, 'countBanner' => $countBanner, 'resultBanners' => $banners, 'newBanner' => $newBanner]);
        return view('welcome', ['hasBanner' => $hasBanner, 'newBanner' => $countBanner > 0 ? $newBanner[0] : array()]);
    }
}
