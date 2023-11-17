<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $a['a'] = product::get();
        return view('welcome', $a);
    }

    public function cart()
    {

        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');

        // if cart is empty then this is the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Added to cart successfully!');
        }

        // if the product already exists in the cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // if the product is not in the cart, add it with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->photo
            ];
        }

        // update the cart in the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
