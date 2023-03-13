<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $inputCategoryRepository)
    {
        $this->categoryRepository = $inputCategoryRepository;
    }

    public function CategoryList(Request $request)
    {  
        $userlist = Auth::guard('admin')->user();
        $status = 0;
        $name = $request->input('name', null);
        $categoryList = $this->categoryRepository->getCategoryList($status, $name);
        $messageNotify = session('message_notify', null);

        return view('admin.category.list', compact('categoryList', 'name', 'messageNotify', 'userlist'));
    }

    public function CategoryDetail(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categoryList = $this->categoryRepository->getCategoryDetail($id);
        return view('admin.category.detail', compact('categoryList', 'userlist'));
    }

    public function CategoryAdd()
    {
        $userlist = Auth::guard('admin')->user();
        $categoryList = $this->categoryRepository->getCategoryAdd();
        return view('admin.category.add', compact('categoryList', 'userlist'));
    }

    public function CategoryPostAdd(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $picture = $request->file('picture');
        $request->validate([
            'name' => 'required|min:1|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $namePicture = $picture->hashName();
        $urlPicture = "/upload/categories/" . $namePicture;
        $picture->store('upload/categories');
        $this->categoryRepository->getCategoryPostAdd($name, $urlPicture);
        session()->flash('message_notify', 'Bạn đã thêm thành công danh mục');
        return redirect()->route('admin.category.getList', compact('userlist'));
    }

    public function CategoryUpdate(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categoryList = $this->categoryRepository->getCategoryUpdate($id);
        return view('admin.category.update', compact('categoryList', 'userlist'));
    }

    public function CategoryPostUpdate(Request $request)
    {
        $id = $request->input('id', '');
        $name = $request->input('name', '');
        $categoryList = $this->categoryRepository->getCategoryUpdate($id);
        $picture = $request->file('picture');
        $request->validate([
            'name' => 'required|min:1|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (empty($picture) != true) {
            Storage::delete($categoryList->picture);
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/categories/" . $namePicture;
            $picture->store('upload/categories');
        } else {
            $urlPicture = $categoryList->picture;
        }
        $this->categoryRepository->getCategoryPostUpdate($id, $name, $urlPicture);
        session()->flash('message_notify', 'Bạn đã chỉnh sửa thành công danh mục');
        return redirect()->route('admin.category.getList');
    }

    public function CategoryDeletedForever(Request $request)
    {
        $id = $request->input('id', '');
        $categories = $this->categoryRepository->getCategoryDeletedForever($id);

        foreach ($categories as $index => $category) {
            Storage::delete($category->picture);
        };
        $this->categoryRepository->getCategoryDeletedForever1($id);
        $this->categoryRepository->getCategoryDeletedForever2($id);
        $this->categoryRepository->getCategoryDeletedForever3($id);
        session()->flash('message_notify', 'Bạn đã xóa vĩnh viễn thành công danh mục');
        return redirect()->route('admin.category.getrycle');
    }

    public function CategoryDeletedAll()
    {
        $categories = $this->categoryRepository->getCategoryDeletedAll1();
        foreach ($categories as $index => $category) {
            Storage::delete($category->picture);
        };
        $this->categoryRepository->getCategoryDeletedAll();
        $this->categoryRepository->getCategoryDeletedAll2();
        return redirect()->route('admin.category.getrycle');
    }

    public function CategoryDeleted(Request $request)
    {
        $id = $request->input('id', null);
        $this->categoryRepository->getCategoryDeleted($id);
        $this->categoryRepository->getProductDeleted($id);
        session()->flash('message_notify', 'Bạn đã xóa thành công danh mục');
        return redirect()->route('admin.category.getList');
    }

    public function CategoryRycle(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $status = 1;
        $categoryList = $this->categoryRepository->getCategoryRycle($status, $name);
        $messageNotify = session('message_notify', null);
        return view('admin.category.rycle', compact('categoryList', 'name', 'messageNotify', 'userlist'));
    }

    public function CategoryRestore(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $this->categoryRepository->getCategoryRestore($id);
        $this->categoryRepository->getCategoryRestore1($id);
        session()->flash('message_notify', 'Bạn đã khôi phục thành công danh mục');
        return redirect()->route('admin.category.getList', compact('userlist'));
    }

    public function CategoryRestoreAll()
    {
        $userlist = Auth::guard('admin')->user();
        $this->categoryRepository->getCategoryRestoreAll();
        $this->categoryRepository->getCategoryRestoreAll1();
        session()->flash('message_notify', 'Bạn đã khôi phục tất cả thành công danh mục');
        return redirect()->route('admin.category.getList', compact('userlist'));
    }
}
