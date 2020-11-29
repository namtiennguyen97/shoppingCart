<?php


namespace App\Models;


class Cart
{
    public $product = null;
    public $totalPrice = 0;
    public $totalQty = 0;
    public function ___construct($cart)
    {
        if ($cart){
            $this->product = $cart->product;
            $this->product = $cart->totalPrice;
            $this->product = $cart->totalQty;
        }
    }

    public function addCart($product, $id){
        $newProduct = ['qty'=>0, 'productInfo'=> $product, 'price'=> $product->price];
        if ($this->product){
            if (isset($id, $this->product)){
                 $newProduct = $this->product[$id];
            }
        }
        $newProduct['qty']++;
        $newProduct['price'] = $newProduct['qty']* $product->price;
        $this->product[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQty++;

    }

}
