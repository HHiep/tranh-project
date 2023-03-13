@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading card-title">Thêm tài khoản</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <form role="form" method="POST"
                                        enctype="multipart/form-data"action="{{ route('admin.users.getpostadd') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên tài khoản</label>
                                            <input class="form-control" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Chức danh</label>
                                            <select class="form-control form-control-lg" name="role"
                                                id="exampleFormControlSelect1">
                                                @if ($userlist->role == 9)
                                                    <option value="9">Manager</option>
                                                    <option value="1">Admin</option>
                                                    <option value="0">User</option>
                                                @else
                                                    <option value="0">User</option>
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" type="password" name="password">
                                            @error('password')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại Mật khẩu</label>
                                            <input class="form-control" type="password" name="password_confirmation">
                                            @error('password_confirmation')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label>File input</label>
                                            <input type="file" name="picture">
                                            @error('picture')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Hoàn thành</button>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
