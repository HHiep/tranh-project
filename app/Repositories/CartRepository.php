<?php

namespace App\Repositories;

use App\Repositories\Interface\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
   
    public function getCartList()
    {
        return DB::table('users')
            ->select(
                'cart.user_id',
                'cart.status',
                'users.name',
                'users.email',
                'users.role',
                'cart.id'
            )
            ->join('cart', 'users.id', '=', 'cart.user_id')
            ->where('cart.status', 1)
            ->orwhere('cart.status', 2)
            ->get()
            ->toArray();
    }

    public function cartListUser($users_id)
    {
        return DB::table('users')
            ->select(
                'cart.user_id',
                'cart.status',
                'users.name',
                'users.email',
                'users.role',
                'cart.id'
            )
            ->join('cart', 'users.id', '=', 'cart.user_id')
            ->where('user_id',  $users_id)
            ->where('status', 1)
            ->get()
            ->toArray();
    }

    public function getProductCart($id)
    {
        return DB::table('users')
            ->select(
                'users.name as users_name',
                'cart_detail.cart_id',
                'cart_detail.amount',
                'product.name as product_name',
                'product.original_price',
                'product.promotional_price',
                'product.id as productid ',
                'product.picture'
            )
            ->join('cart', 'users.id', '=', 'cart.user_id')
            ->join('cart_detail', 'cart_detail.cart_id', '=', 'cart.id')
            ->join('product', 'product.id', '=', 'cart_detail.product_id')
            ->where('cart_id', $id)
            ->get()
            ->toArray();
    }

    public function getUpdateCart($id,$users_id)
    {
        return   DB::table('cart')
        ->where('id', $id)
        ->where('user_id', $users_id)
        ->where('status', 1)
        ->update([
            'status' => 2
        ]);
    }
}
