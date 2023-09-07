<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\PaymentMethod;

class OrderController extends Controller
{
    public function store(Request $request){
        $total_price = 0;
        $product_id = [];
        $quantity = [];
        foreach($request->products as $product){
            $getProduct = Product::where('id', $product['product_id'])->first();
            $total_price += $getProduct->price * $product['quantity'];
            array_push($product_id, $product['product_id']);
            array_push($quantity, $product['quantity']);
        }

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'product_id' => $product_id,
            'payment_method_id' => $request->payment_method_id,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);

        return response()->json(['message' => 'success create order', 'data' => $order], 200);
    }

    public function index(){
        $orders = Order::with('customer.customerAddress')->get();
        $products = [];
        $payment_methods = [];
        foreach($orders as $order){
            $i=0;
            foreach($order->product_id as $product_id){
                $product = Product::where('id', $product_id)->first();
                $product->quantity = $order->quantity[$i++];
                array_push($products, $product);
            }
            $order->products = $products;
            foreach($order->payment_method_id as $payment_method_id){
                $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
                array_push($payment_methods, $payment_method);
            }
            $order->payment_methods = $payment_methods;
            unset($order->product_id);
            unset($order->payment_method_id);
            unset($order->quantity);
        }
        return response()->json(['message' => 'success get orders', 'data' => $orders], 200);
    }
}
