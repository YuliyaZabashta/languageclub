<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //
    public function execute(Order $order, Request $request){

        if($request->isMethod('delete')){
            DB::table('orders')
          ->where('id', '=', $_POST['id'])
          ->delete();
        }

        if($request->isMethod('post')){
            DB::table('orders')
          ->where('id', '=', $_POST['id'])
          ->update(['status' => '1']);
        }

    $orders = Order::orderBy('status')->get();;
    $neworders = DB::table('orders')->where('status', '=', 0)->get();
    if(view()->exists('admin.orders')){
             $data = [
            'title'=>'Заявки',
            'orders'=>$orders,
            'neworders'=>$neworders
    ];
    return view('admin.orders', $data);
    }
        abort(404);
    }
}
