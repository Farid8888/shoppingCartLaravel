<?php

namespace App\Http\Controllers;

use App\Services\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);
        $this->cart->add($product, $request->input('quantity', 1));
        return response()->json(['message' => 'Product added to cart']);
    }

    public function update(Request $request, $productId)
    {
        $this->cart->update($productId, $request->input('quantity'));
        return response()->json(['message' => 'Product updated in cart']);
    }

    public function get($productId)
    {
        $item = $this->cart->get($productId);
        return response()->json($item);
    }

    public function allItems()
    {
        $items = $this->cart->allItems();
        return response()->json($items);
    }

    public function destroy()
    {
        $this->cart->destroy();
        return response()->json(['message' => 'Cart cleared']);
    }

    public function total()
    {
        $total = $this->cart->total();
        return response()->json(['total' => $total]);
    }

    public function tax()
    {
        $tax = $this->cart->tax();
        return response()->json(['tax' => $tax]);
    }

    public function setTax(Request $request)
    {
        $this->cart->setTax($request->input('rate'));
        return response()->json(['message' => 'Tax rate set']);
    }

    public function subTotal()
    {
        $subTotal = $this->cart->subTotal();
        return response()->json(['subTotal' => $subTotal]);
    }

    public function count()
    {
        $count = $this->cart->count();
        return response()->json(['count' => $count]);
    }

    public function delete($productId)
    {
        $this->cart->delete($productId);
        return response()->json(['message' => 'Product removed from cart']);
    }
}
