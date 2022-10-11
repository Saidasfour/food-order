<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Category;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    public function order(){

        $formFields=([
            'user_id'=>auth()->user()->id,
            
            
        ]);

       $orders=Orders::create($formFields); 

       $bagItems=Bag::all();
       foreach($bagItems as $bagItem){

        $items=([
            'order_id'=>$orders['id'],
            'title'=>$bagItem['title'],
            'price'=>$bagItem['price'],
            'accepted'=>'No',
            'status'=>'nostatus',
            
            
        ]);

        OrderItems::create($items);

       }

       Bag::truncate();

       return redirect('/');




    }

    public function notacceptedorders(){
        return view('admin.notacceptedorders',[
            'orders'=>Orders::join('orderitems_tbl','orders_tbl.id','=','orderitems_tbl.order_id')
            ->join('users','users.id','=','orders_tbl.user_id')
            ->select('orders_tbl.id as id','users.username as username','orderitems_tbl.title as title','orderitems_tbl.price as price','users.location as location')
            ->where('accepted','No')
            ->get()
    //         Orders::leftJoin('orderitems_tbl', 'orderitems_tbl.id', '=', 'orders_tbl.id')
    //   ->select(['orders_tbl.id','orders_tbl.user_id','orderitems_tbl.price','orderitems_tbl.price'])
    //   ->get()
        ]);
    }

    public function acceptorder(Orders $order){
        $updateto=([
            'accepted'=>'Yes',
            'status'=>'Preparing'
            
        ]);
       $ordersitems=OrderItems::all()->where('order_id',$order['id']);
        foreach($ordersitems as $orderitem){
            $orderitem->update($updateto);
        }
        return redirect('/admin/orders');
    }

    public function acceptedorders(){
        return view('admin.acceptedorders',[
            'orders'=>Orders::join('orderitems_tbl','orders_tbl.id','=','orderitems_tbl.order_id')
            ->join('users','users.id','=','orders_tbl.user_id')
            ->select('orders_tbl.id as id','orders_tbl.user_id as user_id','orderitems_tbl.title as title','orderitems_tbl.price as price','orderitems_tbl.status as status','users.location as location')
            ->where('accepted','Yes')
            ->get()
    
        ]);
    }

    public function outfordelivery(Orders $order){
        $updateto=([
            
            'status'=>'Out For Delivery'
            
        ]);
       $ordersitems=OrderItems::all()->where('order_id',$order['id']);
        foreach($ordersitems as $orderitem){
            $orderitem->update($updateto);
        }
        return redirect('/acceptedorders');

    }

    public function delivered(Orders $order){
        $updateto=([
            
            'status'=>'Delivered'
            
        ]);
       $ordersitems=OrderItems::all()->where('order_id',$order['id']);
        foreach($ordersitems as $orderitem){
            $orderitem->update($updateto);
        }
        return redirect('/acceptedorders');

    }

    public function reject(Orders $order){

        $ordersitems=OrderItems::all()->where('order_id',$order['id']);
        foreach($ordersitems as $orderitem){
            $orderitem->delete();
        }
        $order->delete();
        return redirect('/admin/orders');

    }

    public function dashboard(){
        $ordersitemss=OrderItems::all()->where('status','Delivered');
        $total=0;
        $countdelivered=$ordersitemss->count();
        $categories=Category::all();
        $countcategory=$categories->count();
        foreach($ordersitemss as $orderitem){
       $total+=$orderitem['price'];
        }
        return view('admin.index',[
            'balance'=>$total,
            'countcategory'=>$countcategory,
            'countdelivered'=>$countdelivered
        ]);
    }
}
