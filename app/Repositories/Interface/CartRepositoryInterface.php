<?php

namespace App\Repositories\Interface;


interface CartRepositoryInterface
{
    public function getCartList();
    public function cartListUser($users_id);
    public function getProductCart($id);
    public function getUpdateCart($id,$users_id);
}
