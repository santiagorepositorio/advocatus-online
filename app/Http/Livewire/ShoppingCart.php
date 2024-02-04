<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function remove_shopping_cart_item($rowId){
        Cart::instance('shopping');
        Cart::remove($rowId);

        $this->emit('cart_updated');

        //Actualizar en la bbdd
        if(auth()->check()){
            Cart::store(auth()->id());
        }
    }

    public function destroy_shopping_cart()
    {
        Cart::instance('shopping');
        Cart::destroy();

        $this->emit('cart_updated');

        //Actualizar en la bbdd
        if(auth()->check()){
            Cart::store(auth()->id());
        }
    }
    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
