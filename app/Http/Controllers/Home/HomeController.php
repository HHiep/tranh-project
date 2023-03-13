<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $login = Auth::guard('users')->user();
        $name = $request->input('name', null);
        $category = DB::table('categories')->select('*')->where('is_deleted', 0)->get()->toarray();
        $productfist = DB::table('product')->select('*')->where('is_deleted', 0)->inRandomOrder()->limit(6)->get();
        $product = DB::table('product')->select('*')->where('is_deleted', 0)->where('name', 'like', "%$name%")->get()->toArray();
        $cartDetail = DB::table('cart_detail')->select('*')
            ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
           
            ->where('cart.status', 0)
            ->get()->toArray();

        $tong = 0;
        foreach ($cartDetail as $key => $amount) {
            $tong = $tong + $amount->amount;
        }
        return view('users.home', compact('category', 'product', 'productfist', 'tong'));
    }

    public function productCate(Request $request)
    {
        $login = Auth::guard('users')->user();
        $cartDetail = DB::table('cart_detail')->select('*')
            ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
            ->where('cart.status', 0)
            ->where('cart.user_id', $login->id)
            ->get()->toArray();
        $tong = 0;
        foreach ($cartDetail as $key => $amount) {
            $tong = $tong + $amount->amount;
        }
        $category = DB::table('categories')->select('*')->where('is_deleted', 0)->get()->toarray();
        $id = $request->input('id', null);
        $productCate = DB::table('product')->select('*')->where('category_id', $id)->get()->toArray();
        return view('users.productcategory', compact('category',  'productCate', 'tong'));
    }

    public function productDetail(Request $request)
    {
        $login = Auth::guard('users')->user();
        $cartDetail = DB::table('cart_detail')->select('*')
            ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
            ->where('cart.status', 0)
            ->where('cart.user_id', $login->id)
            ->get()->toArray();
        $tong = 0;
        foreach ($cartDetail as $key => $amount) {
            $tong = $tong + $amount->amount;
        }
        $id = $request->input('id', null);
        $category = DB::table('categories')->select('*')->where('is_deleted', 0)->get()->toArray();
        $products = DB::table('product')->select('*')->where('id', $id)->get()->toArray();

        $productfist = DB::table('product')->select('*')->where('is_deleted', 0)->inRandomOrder()->limit(1)->get();
        return view('users.cartdetail', compact('category', 'products', 'productfist', 'tong'));
    }

    public function carts(Request $request)
    {
        $userslogin = Auth::guard('users')->user();
        $product_id = $request->input('product_id', '');
        $cart = DB::table('cart')->select('id', 'user_id', 'status')
            ->where('user_id', $userslogin->id)
            ->where('status', 0)
            ->first();
        if (empty($cart)) {
            DB::table('cart')->insert([
                'user_id' => $userslogin->id,
                'status' => 0
            ]);
            $cart = DB::table('cart')->select('id', 'user_id', 'status')
                ->where('status', 0)
                ->where('user_id', $userslogin->id)
                ->first();
        }
        $cart_id = $cart->id;
        $cartdetail = DB::table('cart_detail')
            ->select('*')
            ->where('cart_id', $cart_id)
            ->where('product_id', $product_id)
            ->first();
        if (empty($cartdetail)) {
            DB::table('cart_detail')
                ->insert([
                    'product_id' => $product_id,
                    'cart_id' => $cart_id,
                    'amount' => 1
                ]);
        } else {
            $amount = $cartdetail->amount;
            DB::table('cart_detail')
                ->where('cart_id', $cart_id)
                ->where('product_id', $product_id)
                ->update([
                    'amount' => $amount + 1
                ]);
        }
        return redirect()->route('home');
    }

    public function getHomeListproduct(Request $request)
    {
        $userslogin = Auth::guard('users')->user();
        $category = DB::table('categories')->select('*')->get()->toArray();
        $categoryList = DB::table('categories')->select('id', 'name')->get()->toArray();
        $cartproducts = DB::table('cart')
            ->select(
                'cart.user_id',
                'cart_detail.amount',
                'cart_detail.product_id',
                'product.name',
                'product.amount as product_amount',
                'product.posts',
                'product.original_price',
                'product.promotional_price',
                'product.picture',
                'product.author'
            )
            ->join('cart_detail', 'cart.id', '=', 'cart_detail.cart_id')
            ->join('product', 'product_id', '=', 'product.id')
            ->where('cart.user_id', $userslogin->id)
            ->where('cart.status', 0)
            ->get()
            ->toArray();

        $tong = 0;
        foreach ($cartproducts as $key => $amount) {
            $tong = $tong + $amount->amount;
        }
        $messageNotify = session('message_notify', null);
        return view('users.productlist', compact('category', 'cartproducts', 'messageNotify', 'tong'));
    }

    public function reducesp(Request $request)
    {
        $product_id = $request->input('product_id', '');
        $cart_details = DB::table('cart_detail')->select('*')->where('product_id', $product_id)->first();
        db::table('cart_detail')
            ->where('cart_id', $cart_details->cart_id)
            ->where('product_id',  $cart_details->product_id)
            ->update([
                'amount' => $cart_details->amount - 1
            ]);
        $product = DB::table('product')->select('*')->where('id', $product_id)->first();
        if ($cart_details->amount - 1) {
            DB::table('product')
                ->where('id', $product_id)
                ->update([
                    'amount' => $product->amount + 1
                ]);
        }
        if ($cart_details->amount <= 1) {
            db::table('cart_detail')
                ->where('cart_id', $cart_details->cart_id)
                ->where('product_id',  $cart_details->product_id)
                ->delete();
        }
        return redirect()->route('home.productcart');
    }

    public function addsp(Request $request)
    {
        $product_id = $request->input('product_id', '');
        $cart_detail = DB::table('cart_detail')->select('*')->where('product_id', $product_id)->first();
        DB::table('cart_detail')->select('*')
            ->where('cart_id', $cart_detail->cart_id)
            ->where('product_id', $product_id)->first();

        DB::table('cart_detail')
            ->where('cart_id', $cart_detail->cart_id)
            ->where('product_id',  $product_id)
            ->update([
                'amount' => $cart_detail->amount + 1
            ]);
        // if ($cart_detail->amount + 1) {
        //     DB::table('product')
        //         ->where('id', $product_id)
        //         ->update([
        //             'amount' => $product->amount - 1
        //         ]);
        //     if ($product->amount - 1 == 0) {
        //         session()->flash('message_notify', 'hết hàng');
        //         return redirect()->route('home.productcart');
        //     }
        // }

        return redirect()->route('home.productcart');
    }

    public function giohangUsers(Request $request)
    {
        $product_id = $request->input('product_id', '');
        $cart_detail = DB::table('cart_detail')->select('*')->where('product_id', $product_id)->first();
        $product = DB::table('product')->select('*')->where('id', $product_id)->first();
        $userslogin = Auth::guard('users')->user();
        $category = DB::table('categories')->select('*')->get()->toArray();
        DB::table('cart')
            ->where('user_id', $userslogin->id)
            ->where('status', 0)
            ->update([
                'status' => 1
            ]);
        $cart = DB::table('cart')->select('*')->first();
        $cartList = DB::table('users')
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
        $login = Auth::guard('users')->user();
        $cartDetails = DB::table('cart_detail')->select('*')
            ->join('cart', 'cart_detail.cart_id', '=', 'cart.id')
            ->where('cart.status', 0)
            ->where('cart.user_id', $login->id)
            ->get()->toArray();
        $tong = 0;
        foreach ($cartDetails as $key => $amount) {
            $tong = $tong + $amount->amount;
        }

        return view('users.giohang', compact('cartList', 'userslogin', 'category', 'tong'));
    }

    public function xacnhanusers(Request $request)
    {

        $id = $request->input('cart_id', '');
        DB::table('cart')
            ->where('id', $id)
            ->where('status', 2)
            ->update([
                'status' => 3
            ]);

        return redirect()->route('home');
    }

    public function removesp(Request $request)
    {
        $id = $request->input('product_id', '');

        $cart_detail = DB::table('cart_detail')->select('*')->where('product_id', $id)->first();
        DB::table('cart_detail')->select('*')
            ->where('cart_id', $cart_detail->cart_id)
            ->where('product_id', $id)->first();

        DB::table('cart')
            ->where('id', $cart_detail->cart_id)
            ->delete();

        return redirect()->route('home.productcart');
    }
}
