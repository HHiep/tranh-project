<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bootstrap Admin Template : Bluebox</title>
        <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}>
        <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/css/vendor.bundle.base.css') }}>
        <link rel="stylesheet" href={{ asset('assets/admin/assets/css/style.css') }}>
        <link rel="shortcut icon" href={{ asset('assets/admin/assets/images/favicon.ico') }} />
        <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
    </head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/admin/assets/images/logo.svg') }}">
                            </div>
                            <h4>Đăng ký tài khoản?</h4>
                            <h6 class="font-weight-light">Đăng ký dễ dàng. Chỉ vài bước</h6>
                            <div id="alert2">
                                @if (!empty($messageNotify))
                                    <div >
                                        <div >
                                            <h1 class="h">{{ $messageNotify }}</h1>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <form class="pt-3" enctype="multipart/form-data"
                                action="{{ route('user.authenticate.postRegister') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-lg"
                                        id="exampleInputUsername1" value="{{old('name') }}"
                                        placeholder="Nhập  Tên Tài khoản">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email"class="form-control form-control-lg"
                                        id="exampleInputEmail1" value="{{old('email') }}"
                                        placeholder="Nhập Địa Chỉ Email">
                                    @error('email')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Nhập mật khẩu">
                                    @error('password')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Nhập lại mật khẩu">
                                    @error('password_confirmation')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label>Tải</label>
                                    <input type="file" name="picture">
                                    @error('picture')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <div class="form-group input-group">
                                        <button type="submit"
                                            class=" col-12 btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Hoàn
                                            thành</button>
                                    </div>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Bạn đã sẵn sàng để đăng nhập? <a
                                        href="{{ route('users.authenticate.getLoginUser') }}" class="text-primary">Đăng
                                        nhập</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#alert2").fadeOut(5000);
    })
</script>

</html>
