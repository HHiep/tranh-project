<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản trị viên màu tím</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/css/vendor.bundle.base.css') }}>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./Quản trị viên màu tím_files/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href={{ asset('assets/admin/assets/images/favicon.ico') }} />
    <link rel="stylesheet" href={{ asset('assets/admin/assets/css/style.css') }}>
    <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <h2 style=" text-align: center;color: blueviolet;">Users đăng nhập</h2>
                            <br>
                            <div class="brand-logo">
                                <img src="{{ asset('assets/admin/assets/images/logo.svg') }}">
                            </div>

                            <h4>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Xin chào! </font>
                                    <font style="vertical-align: inherit;">Bắt đầu nào</font>
                                </font>
                            </h4>
                            <h6 class="font-weight-light">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> Hãy đăng nhập để tiếp tục.</font>
                                </font>
                            </h6>
                            <div id="alert2">
                                @if (!empty($messageNotify))
                                    <div>
                                        <div>
                                            <h1 class="h">{{ $messageNotify }}</h1>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <form class="pt-3" action="{{ route('users.authenticate.postLoginUser') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Tài khoản" value="{{ old('email') }}">
                                    @error('email')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Mật khẩu">
                                    @error('password')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <div class="form-group input-group">
                                        <button type="submit"
                                            class="col-12  add btn btn-gradient-primary font-weight-bold todo-list-add-btn ">Đăng
                                            nhập</button>
                                    </div>
                                    <div> <a class=" col-12 btn btn  btn badge-gradient-success"
                                            href="{{ route('user.authenticate.register') }}">Đăng
                                            ký</a>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $("#alert2").fadeOut(4000);
        })
    </script>
</body>
