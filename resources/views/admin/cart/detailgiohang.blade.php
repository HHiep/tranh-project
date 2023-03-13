@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-heading">
                            Danh sách sản phẩm
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartList as $index => $cart)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $cart->product_name }}</td>
                                                <td>
                                                    <img src="{{ asset($cart->picture) }}" alt=""
                                                        style="height: 100px ">
                                                </td>
                                                <td>{{ $cart->amount }}</td>
                                                <td>{{ $cart->original_price }}</td>
                                                <td>{{ $cart->amount * $cart->original_price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
