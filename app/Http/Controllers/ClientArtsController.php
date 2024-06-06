<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CartDetails;
use App\Models\SampleProjects;

class ClientArtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users["userType"] == 1) {
                return redirect("/admin_dashboard");
            }
            
            // Fetch data from the database
            $arts = DB::table('sample_projects') ->paginate(8);
            
            // Pass the fetched data to the view
            return view('client.arts', ['arts' => $arts]);
        }
        return redirect("/");
    }

    public function search(Request $request)
    {

        $search = $request->query('query');

        if(!$search){

            return redirect()->back()->with('error', 'Please provide a search query');
        }

        $arts = SampleProjects::where('art_name', 'LIKE', '%' . $search . '%')
                                ->orWhere('artist', 'LIKE', '%' . $search . '%')
                                ->paginate(3);
                               
                              

        return view('client.arts', ['arts' => $arts]);                        
    }

    public function addToCart(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id' => 'required|exists:sample_projects,id',
        ]);
    
        // Retrieve the cart item with the given ID, if it exists
        $cartItem = CartDetails::where('id', $request->input('id'))->first();

        if ($cartItem) {
            // If the cart item already exists, update the quantity
            $quantitySave = $cartItem->increment('quantity');
            if ($quantitySave){
                session()->put("addSuccess", true);
            } else {
                session()->put("addError", true);
            }
            
        } else {
            // If the cart item doesn't exist, create a new cart item
            $cartItem = new CartDetails();
            $cartItem->id = $request->input('id');
            $cartItem->img_data = $request->input('img_data');
            $cartItem->art_name = $request->input('art_name');
            $cartItem->artist = $request->input('artist');
            $cartItem->price = $request->input('price');
            $cartItem->quantity = $request->input('quantity', 1); 
            $cartSave = $cartItem->save();
            if ($cartSave) {
                session()->put("addSuccess", true);
            } else {
                session()->put("addError", true);
            }
        }
    
        // Redirect the user back to the page they were viewing
        return redirect()->route('arts.index')->with('success', 'Item added to cart successfully!');
    }
    
    

    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
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
