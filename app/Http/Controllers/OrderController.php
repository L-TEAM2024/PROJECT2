<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

          if(Auth::user()->role =='user'){
            $orders = Order::with('orderProducts.product')->orderBy('id', 'desc')->where('user_id',Auth::user()->id)->paginate('5');

          }
          elseif(Auth::user()->role =='admin'){
            $orders = Order::with(['orderProducts.product', 'User'])->orderBy('id', 'desc')->paginate('5');
             }





        return view('orders.index', compact('orders'));
    }

    public function show($id){

        $orderProducts = Order::with('orderProducts.product')->find($id)->orderProducts;

        return view('orders.show', compact('orderProducts'));

    }
    public function store(Request $request)
    {
        $names = $request->input('name');
        // $names = $request->name;
        // $names = request('name');
        $quantities = $request->input('quantity');
        $prices = $request->input('price');
        $totalPrice = $request->input('totalprice');
        $order = Order::create(attributes: [
            'user_id'=> Auth::user()->id,
            'order_number' => uniqid(),
            'totalPrice'=>$totalPrice
        ]);
        foreach ($names as $index => $name) {
            $quantity = $quantities[$index];
            $price = $prices[$index];
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id' => $index,
                'quantity' => $quantity,
                'price' => $price,
            ]);

        };
        return redirect()->route('products.selling');
    }
    public function destroy($id){
        DB::beginTransaction();
        $OrderProducts = OrderProduct::where('order_id', $id)->get();
        foreach ($OrderProducts as $orderProduct) {
            $orderProduct->delete(); // Kaydelete kol record b7da b7da
        }
        $order = Order::find($id);
        $order->delete();
        DB::commit();

     return redirect()->back();

    }
}
