<?php

namespace App\Repositories\Interface;


interface ProductRepositoriesInterface
{
    public function GetproductList($is_deleted, $name);
    public function Getproduct1();
    public function productGetAdd();
    public function produtPostAdd($category_id, $name,$author, $originalPrice, $promotionalPrice, $posts, $amount,$urlPicture,$urlPictureDetail, $is_deleted);
    public function getproductDetail($id);
    public function categories();
    public function ProductPostUpdate($id, $category_id, $name,$author, $originalPrice, $promotionalPrice,$posts, $amount,$urlPicture,$urlPictureDetail);
    public function ProductPostUpdateproduct($id);
    public function getDeleteProduct( $id);
    public function rycl($is_deleted, $name);
    public function product($id);
    public function productdelete($id);
    public function productrestore($id);
    public function productrestore1($id);
    public function productrestore2($id);
    public function productrestoreAll();
    public function productrestoreAll1();
    public function productrestoreAll2($value);
    public function deleteAll1();
    public function deleteAll2();
}
