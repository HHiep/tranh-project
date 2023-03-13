<?php

namespace App\Repositories\Interface;


interface CategoryRepositoryInterface
{
    public function GetCategoryList($status, $name);

    public function GetCategoryDetail($id);
    public function GetCategoryAdd();
    public function GetCategoryPostAdd($name,$urlPicture);
    public function GetCategoryUpdate($id);
    public function GetCategoryPostUpdate($id, $name,$urlPicture);
    public function GetCategoryDeletedForever1($id);
    public function GetCategoryDeletedForever($id);
    public function GetCategoryDeletedForever2($id);
    public function GetCategoryDeletedForever3($id);
    public function GetCategoryDeletedAll();
    public function GetCategoryDeletedAll1();
    public function GetCategoryDeletedAll2();
    public function GetCategoryDeleted($id);
    public function getProductDeleted($id);
    public function GetCategoryRycle($status, $name);
    public function GetCategoryRestore($id);
    public function GetCategoryRestore1($id);
    public function GetCategoryRestoreAll();
    public function GetCategoryRestoreAll1();
}
