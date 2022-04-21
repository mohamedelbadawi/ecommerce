<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class UpdateCartItem extends Component
{

    public $quantity = 1;
    public $rowId;

    public function mount($product)
    {
        $this->quantity = $product->qty;
        $this->rowId = $product->rowId;
    }

    public function increaseQty()
    {
        $this->quantity++;
        \Cart::update($this->rowId, $this->quantity);
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            \Cart::update($this->rowId, $this->quantity);
        }
    }

    public function render()
    {
        return view('livewire.update-cart-item');
    }
}
