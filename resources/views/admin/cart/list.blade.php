@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="panel-heading">Danh sách giỏ hàng</h1>
                        <br><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Tên người dùng</th>
                                    <th>Địa chỉ Email</th>
                                    {{-- <th><a class="btn btn-info" href="{{ route('admin.product.add') }}">Thêm</a></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartList as $index => $cart)
                                    @php
                                        $param = [
                                            'user_id' => $cart->user_id,
                                        ];
                                    @endphp
                                    {{-- Mỗi sản phẩm --}}
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->email }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('admin.users.giohang', $param) }}"> chi
                                                tiết giỏ
                                                hàng</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $products->links('admin.component.pagination') }} --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
