<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(){
        $product = Product::all();

        return view('shopCart.index', compact('product'));
    }

    public function create(){
        return view('shopCart.create');
    }

    public function store(Request $request){
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        if ($request->hasFile('image')){
            $image1 = $request->file('image');
            $path = $image1->store('images','public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    public function addCart(Request $request,$id){
        $product = Product::find($id);
        if ($product != null){
           $oldCart = Session('Cart') ? Session('Cart') : null;
           $newCart = new Cart($oldCart);
           $newCart->addCart($product, $id);
           $request->session()->put('Cart', $newCart);
        }
       return view('shopCart.cart', compact('newCart'));

    }

}
