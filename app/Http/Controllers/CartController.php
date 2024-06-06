<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CartDetails;



class CartController extends Controller
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

            $carts = DB::table('cart_details')->get();

            // Pass the fetched data to the view
            return view('client.cart', ['carts' => $carts]);
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
    public function update(Request $request, $id)
    {
        dd($request->all(), $id);

        // Find the cart item by its ID
        $cartItem = CartDetails::find($id);
    
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found.'], 404);
        }
    
        // Increase or decrease the quantity based on the action received from the AJAX request
        if ($request->action === 'increase') {
            $cartItem->quantity += 1;
        } elseif ($request->action === 'decrease') {
            // Ensure the quantity doesn't go below 1
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
            }
        }
    
        // Save the updated quantity
        $cartItem->save();
    
        // Return a success response
        return response()->json(['success' => 'Quantity updated successfully.']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the cart item by its ID
        $cartItem = CartDetails::find($id);

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }

        // Delete the cart item
        $cartItem->delete();

        // Redirect back to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }
}
