<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{ 
    public function shop()
    {
        
        $productos = Producto::all();
        return view('shop', compact('productos'))->with(['productos' => $productos]);
    }
   
    public function cart()  {
  
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }
   
    public function add(Request $request, Producto $producto){
        
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'precio' => $request->precio,
            'quantity' => $request->quantity,
            'attributes' => array(
            'image' => $request->img,
            'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

 

}
