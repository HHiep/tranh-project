<?php

namespace App\Repositories;

use App\Repositories\Interface\ProductRepositoriesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoriesInterface
{
    public function GetproductList($is_deleted, $name)
    {
        return DB::table('product')
            ->select(
                'product.id',
                'product.picture',
                'product.name',
                'product.author',
                'categories.name as categories_name',
                'product.original_price',
                'product.promotional_price',
                'product.posts',
                'product.amount',
                'product.is_deleted'
            )
            ->where('product.is_deleted', $is_deleted)
            ->join('categories', 'product.category_id', '=', 'categories.id')
            ->where('product.name', 'like', '%' . $name . '%')
            ->paginate(5);
    }

    public function Getproduct1()
    {
        return DB::table('categories')->select('id', 'name', 'is_deleted')->get()->toArray();
    }

    public function productGetAdd()
    {
        return DB::table('categories')->select('id', 'name')->get()->toArray();
    }
    public function produtPostAdd($category_id, $name,$author, $originalPrice, $promotionalPrice, $posts, $amount,$urlPicture,$urlPictureDetail, $is_deleted)
    {
        return DB::table('product')->insert([
            'category_id' => $category_id,
            'name' => $name,
            'author' => $author,
            'original_price' => $originalPrice,
            'promotional_price' => $promotionalPrice,
            'posts' => $posts,
            'amount' => $amount,
            'picture' => $urlPicture,
            'picture_detail' => $urlPictureDetail,
            'is_deleted' => $is_deleted

        ]);
    }

    public function getproductDetail($id)
    {
        return  DB::table('product')
            ->select('id', 'picture','picture_detail', 'name','author', 'category_id', 'original_price', 'promotional_price', 'amount','posts')
            ->where('id', $id)
            ->first();
    }

    public function categories()
    {
        return DB::table('categories')->select('id', 'name')->get()->toArray();
    }

    public function ProductPostUpdate($id, $category_id, $name,$author, $originalPrice, $promotionalPrice,$posts,$amount, $urlPicture,$urlPictureDetail)
    {

        return
            DB::table('product')
            ->where('id', $id)
            ->update([
                'category_id' => $category_id,
                'name' => $name,
                'author'=> $author,
                'original_price' => $originalPrice,
                'promotional_price' => $promotionalPrice,
                'posts' => $posts,
                'amount' => $amount,
                'picture' => $urlPicture,
                'picture_detail' => $urlPictureDetail,
            ]);
    }

    public function ProductPostUpdateproduct($id)
    {
        return DB::table('product')->select('id', 'category_id', 'name', 'original_price', 'promotional_price','posts', 'picture','picture_detail')
            ->where('id', $id)
            ->first();
    }

    public function getDeleteProduct($id)
    {
        return DB::table('product')
            ->where('id', $id)
            ->update(['is_deleted' => 1]);
    }

    public function rycl($is_deleted, $name)
    {
        return  DB::table('product')->select('id', 'name', 'is_deleted')
            ->where('is_deleted', $is_deleted)
            ->where('product.name', 'like', '%' . $name . '%')
            ->paginate(5);
    }

    public function product($id)
    {
        return DB::table('product')->select('picture')->where('id', $id)->get()->toArray();
    }

    public function productdelete($id)
    {
        return  DB::table('product')
            ->where('id', $id)
            ->delete();
    }

    public function productrestore($id)
    {
        return DB::table('product')->select('category_id')->where('id', $id)->first();
    }

    public function productrestore1($id)
    {
        return DB::table('product')
            ->where('id', $id)
            ->update(['is_deleted' => 0]);
    }

    public function productrestore2($value)
    {
        DB::table('categories')
            ->where('id', $value)
            ->update(['is_deleted' => 0]);
    }

    public function productrestoreAll()
    {
        return  DB::table('product')->select('category_id')->first();
    }

    public function productrestoreAll1()
    {
        return   DB::table('product')
            ->where('is_deleted', '=', '1')
            ->update(['is_deleted' => 0]);
    }

    public function productrestoreAll2($value)
    {
        return   DB::table('categories')
            ->where('id', $value)
            ->update(['is_deleted' => 0]);
    }

    public function deleteAll1()
    {
        return DB::table('product')->select('picture')->where('is_deleted', 1)->get()->toArray();
    }
    
    public function deleteAll2()
    {
        return DB::table('product')
            ->where('is_deleted', 1)
            ->delete();
    }
}
