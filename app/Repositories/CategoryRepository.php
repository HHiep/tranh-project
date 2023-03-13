<?php

namespace App\Repositories;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategoryList($status, $name)
    {
        return DB::table('categories')
            ->select('*')
            ->where('is_deleted', $status)
            ->where('name', 'like', "%$name%")
            ->paginate(5);
    }

    public function getCategoryDetail($id)
    {
        return DB::table('categories')
            ->select('*')
            ->where('id', $id)
            ->get()->toarray();
    }
    public function getCategoryAdd()
    {
        return  DB::table('categories')
            ->select('*')
            ->get()->toarray();
    }
    public function getCategoryPostAdd($name, $urlPicture)
    {
        return DB::table('categories')
            ->insert([
                'name' => $name,
                'picture' => $urlPicture
            ]);
    }
    public function getCategoryUpdate($id)
    {
        return DB::table('categories')
            ->select('*')
            ->where('id', $id)
            ->first();
    }
    public function getCategoryPostUpdate($id, $name, $urlPicture)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'picture' => $urlPicture
            ]);
    }

    public function getCategoryDeletedForever($id)
    {
        return DB::table('categories')
            ->select('picture')->where('id', $id)->get()->toArray();
    }

    public function getCategoryDeletedForever1($id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->delete();
    }
    public function getCategoryDeletedForever2($id)
    {
        return DB::table('product')
            ->select('picture')
            ->where('category_id', $id);
    }
    public function getCategoryDeletedForever3($id)
    {
        return DB::table('product')
            ->where('category_id', $id)
            ->delete();
    }

    public function getCategoryDeletedAll1()
    {
        return DB::table('categories')
            ->select('picture')->where('is_deleted', 1)->get()->toArray();
    }

    public function getCategoryDeletedAll()
    {
        return DB::table('categories')
            ->where('is_deleted', 1)
            ->delete();
        
    }
    public function getCategoryDeletedAll2()
    {
        return DB::table('product')
            ->where('is_deleted', 1)
            ->delete();
    }
    public function getCategoryDeleted($id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->update([
                'is_deleted' => 1
            ]);

        return DB::table('product')
            ->where('category_id', $id)
            ->update(['is_deleted' => 1]);
    }

    public function getProductDeleted($id)
    {

        return DB::table('product')
            ->where('category_id', $id)
            ->update(['is_deleted' => 1]);
    }
    public function getCategoryRycle($status, $name)
    {
        return DB::table('categories')
            ->select('*')
            ->where('is_deleted', $status)
            ->where('name', 'like', "%$name%")
            ->paginate(5);
    }
    public function getCategoryRestore($id)
    {
        return DB::table('categories')
            ->where('is_deleted', 1)
            ->where('id', $id)
            ->update([
                'is_deleted' => 0
            ]);
    }

    public function getCategoryRestore1($id)
    {
        return DB::table('product')
            ->where('is_deleted', 1)
            ->where('category_id', $id)
            ->update([
                'is_deleted' => 0
            ]);
    }

    public function getCategoryRestoreAll()
    {
        return DB::table('categories')
            ->where('is_deleted', 1)
            ->update([
                'is_deleted' => 0
            ]);
    }

    public function getCategoryRestoreAll1()
    {
        return DB::table('product')
            ->where('is_deleted', 1)
            ->update([
                'is_deleted' => 0
            ]);
    }
}
