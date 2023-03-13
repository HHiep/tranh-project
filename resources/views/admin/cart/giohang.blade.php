@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-heading">
                            Danh sách người mua
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Tên người dùng</th>
                                            <th>Địa chỉ Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartList as $index => $cart)
                                            @php
                                                $param = [
                                                    'cart_id' => $cart->id,
                                                ];
                                                $param1 = ['user_id' => $cart->user_id];
                                            @endphp
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $cart->name }}</td>
                                                <td>{{ $cart->email }}</td>
                                                <td>
                                                    <a class="btn btn-info"
                                                        href="{{ route('admin.users.detailgiohang', $param) }}">Chi tiết giỏ
                                                        hàng</a>

                                                    @if ($cart->status == 1)
                                                        <a class="btn btn-info"
                                                            href="{{ route('admin.users.xacnhanadmin', [
                                                                'cart_id' => $cart->id,
                                                                'user_id' => $cart->user_id,
                                                            ]) }}">Xác
                                                            nhận</a>
                                                    @endif
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
