<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Carts extends Component
{

    public $cartCount;
    public $wishlistCount;
    protected $listeners = [
        'updateCart' => 'update_cart',
        'removeFromCart' => 'remove_from_cart',
        'removeFromWishList' => 'remove_from_wish_list',
        'moveToCart' => 'move_to_cart',
    ];
    public function mount()
    {
        $this->cartCount = Cart::instance('default')->count();
        $this->wishlistCount = Cart::instance('wishlist')->count();
    }
    public function update_cart()
    {
        $this->cartCount = Cart::instance('default')->count();
        $this->wishlistCount = Cart::instance('wishlist')->count();
    }
    public function remove_from_cart($rowId)
    {
        Cart::instance('default')->remove($rowId);
        $this->emit('updateCart');
        $this->alert('success', 'Item removed from your cart!');
        if (Cart::instance('default')->count() == 0){
            return redirect()->route('frontend.cart');
        }
    }
    public function render()
    {
        return view('livewire.frontend.carts');
    }
}
