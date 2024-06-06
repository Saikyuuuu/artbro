<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ClientOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users["userType"] != 2) {
                return redirect("/");
            }
            $client = DB::table("orders");
            

            $orders = DB::table('sample_orders')->paginate(3); // Paginate with 3 item per page
            return view('client.orders', ['orders' => $orders]);  
           
        }

        return redirect("/");
    }

    // public function search(Request $request)
    // {

    //     $search = $request->query('query');

    //     if(!$search){

    //         return redirect()->back()->with('error', 'Please provide a search query');
    //     }

    //     $arts = ::where('art_name', 'LIKE', '%' . $search . '%')
    //                             ->orWhere('artist', 'LIKE', '%' . $search . '%')
    //                             ->paginate(3);
                               
                              

    //     return view('client.arts', ['arts' => $arts]);                        
    // }

    

    

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