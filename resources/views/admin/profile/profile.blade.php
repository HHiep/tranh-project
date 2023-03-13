@extends('admin.layouts.indext')
@section('main_content')
    <div id="alert">
        @if (!empty($messageNotify))
            <div class="col-8">
                <div class="ma">
                    {{ $messageNotify }}
                </div>
            </div>
        @endif
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Profile</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <form role="form" method="POST" enctype="multipart/form-data"
                                        action="{{ route('admin.users.postprofile', ['id' => $userlist->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ $userlist->name }}">
                                            @error('name')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="{{ $userlist->email }}">
                                            @error('email')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password" name="passwordold" class="form-control form-control-lg"
                                                id="exampleInputPassword1" placeholder="Nhập mật khẩu hiện tại">
                                            @error('passwordold')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                id="exampleInputPassword1" placeholder="Nhập mật khẩu mới">
                                            @error('password')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại Mật khẩu</label>
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                                id="exampleInputPassword1" placeholder="Nhập lại mật khẩu">
                                            @error('password_confirmation')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div> <img class="img" src="{{ $userlist->picture }}" /></div>
                                        <div class="form-group ">
                                            <label>Tải</label>
                                            <input type="file" name="picture" value="{{ $userlist->picture }}">
                                            @error('picture')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn badge badge-primary">Update</button>
                                        <a class=" ahre btn badge badge-gradient-success"
                                            href="{{ route('admin.users.getList') }}">Back</a>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#alert").toggle(5000);
        })
    </script>
@endsection
