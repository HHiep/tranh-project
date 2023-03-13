<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\CartRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    private $cartRepository;

    public function __construct(CartRepositoryInterface $CartRepository)
    {
        $this->cartRepository = $CartRepository;
    }
    public function cartList(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $cartList = $this->cartRepository->getCartList();
        return view('admin.cart.list', compact('cartList', 'userlist'));
    }

    public function giohang(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $users_id = $request->input('user_id', '');
        $cartList = $this->cartRepository->cartListUser($users_id);
        return view('admin.cart.giohang', compact('cartList', 'users_id', 'userlist'));
    }

    public function detailgiohang(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('cart_id', '');
        $cartList = $this->cartRepository->getProductCart($id);
        return view('admin.cart.detailgiohang', compact('cartList', 'userlist'));
    }

    public function xacnhanadmin(Request $request)
    {
        $id = $request->input('cart_id', '');
        $users_id = $request->input('user_id', '');
        $this->cartRepository->getUpdateCart($id, $users_id);
        return redirect()->back();
    }
}
