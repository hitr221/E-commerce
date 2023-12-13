<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShoppingCart;

class OrderDetail extends Model
{
    use HasFactory;

    private static $orderDetail, $orderDetails;

    public static function newOrderDetail($orderId){

        foreach(ShoppingCart::all() as $item){
            self::$orderDetail = new OrderDetail();
            self::$orderDetail->order_id = $orderId;
            self::$orderDetail->product_id = $item->id;
            self::$orderDetail->product_name = $item->name;
            self::$orderDetail->product_price = $item->price;
            self::$orderDetail->product_qty = $item->qty;
            self::$orderDetail->save();

            ShoppingCart::remove($item->__raw_id);
            return self::$orderDetail;
        }
    }

    public static function deleteOrderDetail($order_id)
    {
        self::$orderDetails = OrderDetail::where('order_id', $order_id)->get();
        foreach(self::$orderDetails as $order_detail){
            // return $order_detail;
            $order_detail->delete();
        }
    }
}
