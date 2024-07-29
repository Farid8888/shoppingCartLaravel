<?php

namespace App\Services;

class Cart
{
    protected $items = [];
    protected $taxRate = 0;

    public function add($product, $quantity = 1)
    {
        if(isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $this->items[$product->id] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
    }

    public function multipleAdd(array $products)
    {
        foreach ($products as $product) {
            $this->add($product['product'], $product['quantity']);
        }
    }

    public function update($productId, $quantity)
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] = $quantity;
        }
    }

    public function get($productId)
    {
        return $this->items[$productId] ?? null;
    }

    public function allItems()
    {
        return $this->items;
    }

    public function destroy()
    {
        $this->items = [];
    }

    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->price * $item['quantity'];
        }
        return $total;
    }

    public function tax()
    {
        return $this->total() * $this->taxRate;
    }

    public function setTax($rate)
    {
        $this->taxRate = $rate;
    }

    public function subTotal()
    {
        return $this->total() + $this->tax();
    }

    public function count()
    {
        return array_sum(array_column($this->items, 'quantity'));
    }

    public function delete($productId)
    {
        unset($this->items[$productId]);
    }
}
