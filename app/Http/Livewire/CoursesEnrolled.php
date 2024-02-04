<?php

namespace App\Http\Livewire;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CoursesEnrolled extends Component
{
    public $course;

    public function add_to_cart(){
        //Verificar si el curso ya está en el carrito
        Cart::instance('shopping');
        $item = Cart::content()->where('id', $this->course->id)->first();

        if ($item) {
            //Si ya existe en el carrito de compras eliminarlo
            Cart::remove($item->rowId);
        } else {
            //Si no existe en el carrito de compras agregarlo
            Cart::add([
                'id' => $this->course->id,
                'name' => $this->course->title, 
                'qty' => 1, 
                'price' => $this->course->price->value,
                'tax' => 18,
            ])->associate('App\Models\Course');
        }

        //Emitir evento
        $this->emit('cart_updated');

        //Actualizar en la bbdd
        if(auth()->check()){
            Cart::store(auth()->id());
        }

    }

    public function buy_now(){

        //Verificar si el curso ya está en el carrito
        Cart::instance('shopping');
        $itemCart = Cart::content()->where('id', $this->course->id)->first();

        if(!$itemCart){
            Cart::add([
                'id' => $this->course->id,
                'name' => $this->course->title, 
                'qty' => 1, 
                'price' => $this->course->price->value,
                'tax' => 18,
            ])->associate('App\Models\Course');

            //Actualizar en la bbdd
            if(auth()->check()){
                Cart::store(auth()->id());
            }
        }

        return redirect()->route('shopping-cart');
    }

    public function render()
    {
        return view('livewire.courses-enrolled');
    }
}
