<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Order;
/*use App\Models\User;*/
use Auth;

class Cart extends Model
{
    use HasFactory;

    public $fillable= 
    [
    	'user_id',
    	'ip_address',
    	'order_id',
    	'product_id',
    	'product_quantity'
    ];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }


    //
    public static function totalCarts()
    {

        if(Auth::Check())
        {
            $carts=Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
        }

        else
        {
            $carts=Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }

        return $carts;

    }

    //Return The total Items/Quantities in the cart

    public static function totalItems()
    {

        if(Auth::Check())
        {
            $carts=Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
        }

        else
        {
            $carts=Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }

        $total_Item=0;
        foreach ($carts as $cart) {
            $total_Item+=$cart->product_quantity;
        }
        return $total_Item;

    }

     public static function totalPrices()
    {

        if(Auth::Check())
        {
            $carts=Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
        }

        else
        {
            $carts=Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }

        $total_Price=0;
        foreach ($carts as $cart) {

            if(!is_null($cart->product->offer_price))
            {
                 $total_Price+=$cart->product_quantity*$cart->product->offer_price;
            }
            else
            {
                $total_Price+=$cart->product_quantity*$cart->product->regular_price;
            }
           
        }
        return $total_Price;

    }
}
