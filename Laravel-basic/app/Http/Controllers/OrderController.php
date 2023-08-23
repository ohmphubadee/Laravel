<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders_list(){
        $orders = DB::table('orders')->get();
        return view('order',compact ('orders'));
    }

    public function order_add(Request $request){
        
        //add data
        $order =  new order;
        $order->EmployeeID = $request->input('EmployeeID');
        $order->OrderName = $request->input('OrderName');
        $order->save();
        return redirect()->back()->with('success', 'Done!');
    }

    public function order_delete(Request $request){
        $id = $request->input('OrderID');
        $deleted= DB::delete('delete from orders where OrderID = ?',[$id]);
        return redirect()->back()->with('success_delete', 'Done!');
    }

    public function order(){
        $order = DB::select('select orders.OrderID, employees.Name, orders.Ordername, orders.created_at
        From orders JOIN employees ON orders.EmployeeID = employees.EmployeeID');
        return view('detail', compact('order'));
    }
}
