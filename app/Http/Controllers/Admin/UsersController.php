<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    private $usersRepository;

    public function __construct(UsersRepositoryInterface $UsersRepository)
    {
        $this->usersRepository = $UsersRepository;
    }

    public function list(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $users =  $this->usersRepository->getUsers($name);
        $messageNotify = session('message_notify', null);
        return view('admin.users.list', compact('messageNotify', 'userlist', 'users', 'name'));
    }
    public function listuser(Request $request)
    {
        $name = $request->input('name', null);
        $listuser = $this->usersRepository->getUsers1($name);
        $userlist = Auth::guard('admin')->user();
        $messageNotify = session('message_notify', null);
        return view('admin.users.listuser', compact('messageNotify', 'userlist', 'listuser', 'name'));
    }

    public function add()
    {
        $userlist = Auth::guard('admin')->user();
        return view('admin.users.add', compact('userlist'));
    }
    public function postAdd(Request $request)
    {
        $role = $request->input('role', null);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $picture = $request->file('picture');
        $password = $request->input('password', null);
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255|unique:users',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|confirmed|min:3|max:255',
        ]);
        $namePicture = $picture->hashName();
        $urlPicture = "/upload/users/" . $namePicture;
        $picture->store('upload/users');
        $hash = Hash::make($password);
        $this->usersRepository->postInsertUsers($name, $urlPicture, $email, $hash, $role);
        session()->flash('message_notify', 'Bạn đã thêm thành công tài khoản');
        if ($role == 0) {
            return redirect()->route('admin.users.listuser');
        }
        return redirect()->route('admin.users.getList');
    }
    public function deleted(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $users = DB::table('users')->select('*')->where('id', $id)->first();
        if (
            $userlist->role == 1 & $users->role == 9
            || $userlist->role == 1 & $users->role == 1
            || $userlist->role == 9 & $users->role == 9 & $userlist->id != $users->id
        ) {
            abort(404);
        }

        $users = DB::table('users')->select('picture')->where('id', $id)->get()->toArray();
        foreach ($users as $index => $item) {
            Storage::delete($item->picture);
        };
        $this->usersRepository->getDeletedUsers($id);
        session()->flash('message_notify', 'Bạn đã xóa thành công tài khoản');
        return redirect()->route('admin.users.getList');
    }

    public function profile(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $messageNotify = session('message_notify', null);
        return view('admin.profile.profile', compact('userlist', 'messageNotify'));
    }

    public function postprofile(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $passwordold = $request->input('passwordold', null);
        $password = $request->input('password', null);
        $picture = $request->file('picture');
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'confirmed',
            'passwordold' => 'required|min:3|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (!empty($picture)) {
            Storage::delete($userlist->picture);
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/users/" . $namePicture;
            $picture->store('upload/users');
        } else {
            $urlPicture = $userlist->picture;
        }
        if (Hash::check($passwordold, $userlist->password)) {
            if ($password == null) {
                $this->usersRepository->postProfileUpdateUser($id, $name, $email, $urlPicture);
                return redirect()->route('admin.users.profile');
            }
            if (!Hash::check($password, $userlist->password)) {
                $password = Hash::make($password);
                $this->usersRepository->postProfileUpdateUser1($id, $name, $email, $password, $urlPicture);
                session()->flash('message_notify', 'Bạn đã chỉnh sửa  thành công tài khoản');
            } else {
                session()->flash('message_notify', 'Mật khẩu mới không được trùng mới mật khẩu cũ');
            }
        } else {
            session()->flash('message_notify', 'Mật khẩu cũ không khớp');
        }
        return redirect()->back();
    }

    public function updateuse(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $users = DB::table('users')->select('*')->where('id', $id)->first();
        if (
            $userlist->role == 1 & $users->role == 9
            || $userlist->role == 1 & $users->role == 1
            || $userlist->role == 9 & $users->role == 9
        ) {
            abort(404);
        }
        $messageNotify = session('message_notify', null);
        return view('admin.users.updateuser', compact('messageNotify', 'users', 'userlist'));
    }

    public function postupdateuse(Request $request)
    {
        $id = $request->input('id', null);
        $userlist = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $picture = $request->file('picture');
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required|unique:users,email,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $users = DB::table('users')->select('*')->where('id', $id)->first();
        if (!empty($picture)) {
            Storage::delete($users->picture);
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/users/" . $namePicture;
            $picture->store('upload/users');
        } else {
            $urlPicture = $users->picture;
        }
        $this->usersRepository->postProfileUpdateUser($id, $name, $email, $urlPicture);
        session()->flash('message_notify', 'Bạn đã chỉnh sửa  thành công tài khoản');
        if ($userlist->role == 9 & $users->role == 9 || $userlist->role == 9 & $users->role == 1) {
            return redirect()->route('admin.users.getList');
        }
        return redirect()->route('admin.users.listuser');
    }
}
