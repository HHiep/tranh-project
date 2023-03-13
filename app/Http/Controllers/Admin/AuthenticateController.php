<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\OrderShipped;
use App\Repositories\Interface\AuthenticateRepositoryInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    private $authenticateRepository;
    private $usersRepository;

    public function __construct(AuthenticateRepositoryInterface $authenticateRepository, UsersRepositoryInterface $usersRepository)
    {
        $this->authenticateRepository = $authenticateRepository;
        $this->usersRepository = $usersRepository;
    }
    public function getLogin(Request $request)
    {
        $userlist = Auth::guard('admin')->user();
        if (!empty($userlist)) {
            return back();
        }
        $email = $request->input('email', null);
        $messageNotify = session('message_notify', null);
        return view('admin.authenticate.login', compact('messageNotify', 'email'));
    }

    public function postLogin(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $credentials = [
            'email' => $email,
            'password' => $password,
            'role' => 1
        ];
        $credentialsMana = [
            'email' => $email,
            'password' => $password,
            'role' => 9
        ];
        $request->validate([
            'email' => 'required|min:5|max:255',
            'password' => 'required|min:4|max:255',
        ]);
        if (Auth::guard('admin')->attempt($credentials) || Auth::guard('admin')->attempt($credentialsMana)) {
            session()->flash('message_notify', 'chào ' . $email);
            return redirect()->route('admin.users.getList');
        }
        session()->flash('message_notify', 'Không đúng tài khoản hoặc mật khẩu ' . $email);
        return redirect()->route('admin.authenticate.getLogin', compact('email'));
    }


    public function register(Request $request)
    {
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $messageNotify = session('message_notify', null);
        return view('admin.authenticate.register', compact('messageNotify', 'name', 'email'));
    }

    public function postRegister(Request $request)
    {
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $picture = $request->file('picture');
        $request->validate([
            'password' => 'required|confirmed|min:3|max:255',
            'email' => 'required|min:5|max:255|unique:users',
            'name' => 'required|min:3|max:255',
        ]);
        if ($picture == null) {
            $picture = asset('assets/admin/assets/images/faces/face4.jpg');
            $hash = Hash::make($password);
            $this->authenticateRepository->postRegist($name, $email, $hash, $picture);
            Mail::to($email)->send(new OrderShipped());
            session()->flash('message_notify', 'Đăng ký thành công');
            return redirect()->route('user.authenticate.register');
        } else {
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/users/" . $namePicture;
            $picture->store('upload/users');
            $hash = Hash::make($password);
            $this->authenticateRepository->postRegist2($name, $email, $hash, $urlPicture);
            Mail::to($email)->send(new OrderShipped());
            session()->flash('message_notify', 'Đăng ký thành công');
            return redirect()->route('user.authenticate.register');
        }
        session()->flash('message_notify', 'nhập lại mật khẩu không đúng');
        return redirect()->route('user.authenticate.register', compact('name', 'email'));
    }

    public function getLoginUser(Request $request)
    {
        $email = $request->input('email', null);
        $messageNotify = session('message_notify', null);
        return view('admin.authenticate.loginuser', compact('email', 'messageNotify'));
    }

    public function postLoginUser(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $credentials = [
            'email' => $email,
            'password' => $password,
            'role' => 0
        ];
        $request->validate([
            'email' => 'required|min:5|max:255',
            'password' => 'required|min:4|max:255',
        ]);
        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('home');
        }

        session()->flash('message_notify', 'Không đúng tài khoản hoặc mật khẩu ' . $email);
        return redirect()->route('users.authenticate.getLoginUser', compact('email'));
    }

    public function logoutUse()
    {
        Auth::guard('users')->logout();
        return redirect()->route('users.authenticate.getLoginUser');
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.authenticate.getLogin');
    }

    public function forgotPassword()
    {
        return view('admin.authenticate.forgotpassword');
    }

    public function postForgotpassword(Request $request)
    {
        $email = $request->input('email', null);
        // kiểm tra xem mail này đã tồn tại trong db hay chưa 
        $user = $this->usersRepository->getUsersByMail($email);
        if (!empty($user)) {
            $passwordNew = $this->passwordDefault();
            Mail::to($email)->send(new ForgotPassword($passwordNew));
            return redirect()->route('admin.authenticate.getLogin');
        }
        return redirect()->back()->withInput();
    }

    private function passwordDefault()
    {
        return "Abcd1234!";
    }
}
