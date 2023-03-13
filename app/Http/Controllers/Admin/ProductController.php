<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\ProductRepositoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoriesInterface $inputProductRepository)
    {
        $this->productRepository = $inputProductRepository;
    }
    public function productList(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $is_deleted = 0;
        $name = $request->input('name', '');
        $categories = $this->productRepository->Getproduct1();
        $products = $this->productRepository->GetproductList($is_deleted, $name);
        $messageNotify = session('message_notify', null);
        return view('admin.product.list', compact('products', 'categories', 'name', 'messageNotify', 'userlist'));
    }

    public function productGetAdd()
    {
        $userlist = Auth::guard('admin')->user();
        $categories = $this->productRepository->productGetAdd();
        return view('admin.product.add', compact('categories', 'userlist'));
    }

    public function productPostAdd(Request $request)
    {
        $arrayValidate = [
            'category_id' => 'required|integer',
            'name' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'original_price' => 'required',
            'promotional_price' => 'required',
            'amount' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $request->validate($arrayValidate);
        $category_id = $request->input('category_id', null);
        $name = $request->input('name', '');
        $author = $request->input('author', '');
        $originalPrice = $request->input('original_price', null);
        $promotionalPrice = $request->input('promotional_price', null);
        $amount = $request->input('amount', null);
        $posts = $request->input('posts', null);
        $picture = $request->file('picture');
        $pictureDetail = $request->file('picture_detail');
        $namePicture = $picture->hashName();
        $namePictureDetail = $pictureDetail->hashName();
        $urlPicture = "/upload/products/" . $namePicture;
        $urlPictureDetail = "/upload/productdetail/" . $namePictureDetail;
        $picture->store('upload/products');
        $pictureDetail->store('upload/productdetail');
        $is_deleted = 0;
        $this->productRepository->produtPostAdd($category_id, $name, $author, $originalPrice, $promotionalPrice, $posts, $amount, $urlPicture, $urlPictureDetail, $is_deleted);
        session()->flash('message_notify', 'Bạn đã thêm thành công sản phẩm');
        return redirect()->route('admin.product.getproductList');
    }

    public function getDetailproduct(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', '');
        $products = $this->productRepository->getproductDetail($id);
        return view('admin.product.detail', compact('products', 'userlist'));
    }

    public function getUpdateProduct(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $categories = $this->productRepository->categories();
        $id = $request->input('id', '');
        $products = $this->productRepository->getproductDetail($id);
        return view('admin.product.update', compact('products', 'categories', 'userlist'));
    }


    public function ProductPostUpdate(Request $request)
    {
        $id = $request->input('id', null);
        $category_id = $request->input('category_id', null);
        $name = $request->input('name', '');
        $author = $request->input('author', '');
        $originalPrice = $request->input('original_price', null);
        $promotionalPrice = $request->input('promotional_price', null);
        $posts = $request->input('posts', null);
        $amount = $request->input('amount', '');
        $product =  $this->productRepository->ProductPostUpdateproduct($id);
        $picture = $request->file('picture');
        $pictureDetail = $request->file('picture_detail');
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'original_price' => 'required',
            'promotional_price' => 'required',
            'amount' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_detail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if (!empty($picture || $pictureDetail)) {

            Storage::delete($product->picture);
            Storage::delete($product->picture_detail);
            $namePicture = $picture->hashName();
            $namePictureDetail = $pictureDetail->hashName();
            $urlPicture = "/upload/products/" . $namePicture;
            $urlPictureDetail = "/upload/productdetail/" . $namePictureDetail;
            $picture->store('upload/products');
            $pictureDetail->store('upload/productdetail');
        } else {
            $urlPicture = $product->picture;
            $urlPictureDetail = $product->picture_detail;
        }
        $this->productRepository->ProductPostUpdate($id, $category_id, $name, $author, $originalPrice, $promotionalPrice, $posts, $amount, $urlPicture, $urlPictureDetail);
        session()->flash('message_notify', 'Bạn đã chỉnh sửa thành công sản phẩm');
        return redirect()->route('admin.product.getproductList');
    }


    public function getDeleteProduct(Request $request)
    {
        $id = $request->input('id', '');
        $this->productRepository->getDeleteProduct($id);
        session()->flash('message_notify', 'Bạn đã xóa thành công sản phẩm');
        return redirect()->route('admin.product.getproductList');
    }

    public function rycl(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $name = $request->input('name', '');
        $is_deleted = 1;
        $product = $this->productRepository->rycl($is_deleted, $name);
        $messageNotify = session('message_notify', null);
        return view('admin.product.listrycl', compact('product', 'name', 'messageNotify', 'userlist'));
    }


    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        $products = $this->productRepository->product($id);
        foreach ($products as $index => $product) {
            Storage::delete($product->picture);
        };
        $this->productRepository->productdelete($id);
        session()->flash('message_notify', 'Bạn đã xóa thành công sản phẩm');
        return redirect()->route('admin.product.getrycle');
    }


    public function restore(Request $request)
    {
        $id = $request->input('id', '');
        $category_id =  $this->productRepository->productrestore($id);
        $this->productRepository->productrestore1($id);
        $value = $category_id->category_id;
        $this->productRepository->productrestore2($value);
        session()->flash('message_notify', 'Bạn đã khôi phục thành công sản phẩm');
        return redirect()->route('admin.product.getproductList');
    }


    public function restoreAll()
    {
        $product =   $this->productRepository->productrestoreAll();
        $this->productRepository->productrestoreAll1();
        $value = $product->category_id;
        $this->productRepository->productrestoreAll2($value);
        session()->flash('message_notify', 'Bạn đã khôi phục tất cả thành công sản phẩm');
        return redirect()->route('admin.product.getrycle');
    }

    public function deleteAll()
    {
        $products =  $this->productRepository->deleteAll1();
        foreach ($products as $index => $product) {
            Storage::delete($product->picture);
        };
        $this->productRepository->deleteAll2();
        session()->flash('message_notify', 'Bạn đã xóa tất cả thành công sản phẩm');
        return redirect()->route('admin.product.getrycle');
    }
}
