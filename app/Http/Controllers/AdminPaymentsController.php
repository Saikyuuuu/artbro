<?php

namespace App\Http\Controllers;

use App\Models\LocalPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPaymentsController extends Controller
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

            $payments = LocalPayment::all();
            $payments = json_decode($payments, true);
            return view('admin.payments', ['payments' => $payments, 'userType' => $users["userType"]]);
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
        // dd($request);
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users["userType"] != 1 && $users["userType"] != 4) {
                return redirect("/");
            }

            if (isset($request->btnAdminAddPayment)) {
                $paymentName = $request->paymentName;
                $clientID = $request->clientID;
                $secret = $request->secret;

                $files = $request->file("logo");
                $fileName = "";

                if ($files) {
                    $mimeType = $files->getMimeType();
                    if ($mimeType == "image/png" || $mimeType == "image/jpg" || $mimeType == "image/JPG" || $mimeType == "image/JPEG" || $mimeType == "image/jpeg" || $mimeType == "image/PNG") {
                        // $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/public' . '/payments';
                        $destinationPath = $_SERVER['DOCUMENT_ROOT']  . '/payments';
                        $fileName = strtotime(now()) . "." . $files->getClientOriginalExtension();
                        $isFile = $files->move($destinationPath,  $fileName);

                        if ($isFile) {
                            $localPayment = new LocalPayment();
                            $localPayment->paymentName = $paymentName;
                            $localPayment->clientID = $clientID;
                            $localPayment->secret = $secret;
                            $localPayment->imagePath = "/payments/" . $fileName;
                            $localPayment->status = "Inactive";
                            $isSave = $localPayment->save();
                            if ($isSave) {
                                session()->put("paymentAddedSuccess", true);
                            } else {
                                session()->put("paymentAddedError", true);
                            }
                            return redirect("/admin_payments");
                        }
                    } else {
                        session()->put('imageNotValid', true);
                        return redirect("/admin_payments");
                    }
                }
            }
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
        //
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

            $count = DB::table('local_payments')->where('paymentID', '=', $id)->delete();
            if ($count > 0) {
                session()->put("successDelete", true);
            } else {
                session()->put("errorDelete", true);
            }
            return redirect("/admin_payments");
        }
        return redirect("/");
    }
}
