<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCartPayment extends Component
{
    public function payment(){

        Cart::instance('shopping');

        foreach (Cart::content() as $item) {
            //Matricula al usuario en el curso
            $item->model->students()->attach(auth()->id());
        }

        //Elimina el carrito
        Cart::destroy();
        Cart::store(auth()->id());

        session()->flash('flash.banner', '<strong>Matriculado con éxito</strong> | Te has logrado matricular con éxito a los cursos seleccionados');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('courses.my-courses');
    }
    public function render()
    {
        return view('livewire.shopping-cart-payment');
    }
}
