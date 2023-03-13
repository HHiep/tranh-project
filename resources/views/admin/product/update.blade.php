@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Update Product</h4>

                        <table class="table">
                            <tbody>
                                <form role="form" method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.product.getpostupdate', ['id' => $products->id]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Danh mục sản phẩm</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Chọn danh mục . . .</option>
                                                @foreach ($categories as $index => $category)
                                                    <option @selected($products->category_id == $category->id) value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $products->name }}">
                                            @error('name')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Tên tác giả</label>
                                            <input type="text" class="form-control" name="author"
                                                value="{{ $products->author }}">
                                            @error('author')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Giá gốc</label>
                                            <input type="number" class="form-control" name="original_price"
                                                placeholder="Nhập giá gốc . . ." value="{{ $products->original_price }}">
                                            @error('original_price')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Giá khuyến mãi</label>
                                            <input type="number" class="form-control" name="promotional_price"
                                                placeholder="Nhập giá khuyến mãi . . ."
                                                value="{{ $products->promotional_price }}">
                                            @error('promotional_price')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Tổng sản phẩm</label>
                                            <input type="number" class="form-control" name="amount"
                                                placeholder="Nhập tổng sản phẩm . . ." value="{{ $products->amount }}">
                                            @error('amount')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Bài viết</label>
                                            <textarea class="form-control" rows="3" name="posts" placeholder="Nhập bài viết . . ."></textarea>
                                        </div>
                                        <div >
                                            <img class="img" src="{{ $products->picture }}" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tải ảnh</label>
                                            <input type="file" name="picture">
                                            @error('picture')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <img class="img" src="{{ $products->picture_detail }}" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tải ảnh chi tiết</label>
                                            <input type="file" name="picture_detail">
                                            @error('picture_detail')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Hoàn thành</button>
                                </form>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @endsection
