@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Thêm Sản Phẩm</h4>
                        <table class="table">
                            <tbody>
                                <form role="form" method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.product.getpostadd') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label> Thêm Danh mục sản phẩm </label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Chọn danh mục . . .</option>
                                                @foreach ($categories as $index => $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Nhập tên sản phẩm . . .">
                                            @error('name')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Tên tác giả</label>
                                        <input type="text" class="form-control" name="author"
                                            placeholder="Nhập tên sản phẩm . . .">
                                        @error('author')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="row"></div>
                                    <div class="form-group col-lg-12">
                                        <label>Giá gốc</label>
                                        <input type="number" class="form-control" name="original_price"
                                            placeholder="Nhập giá gốc . ">
                                        @error('original_price')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Giá khuyến mãi</label>
                                        <input type="number" class="form-control" name="promotional_price"
                                            placeholder="Nhập giá khuyến mãi . ">
                                        @error('promotional_price')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Thông tin</label>
                                            <input type="text" class="form-control" name="posts"
                                                placeholder="Nhập thông tin . . .">
                                            @error('posts')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Tổng số lượng sản phẩm</label>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="Nhập số lượng . ">
                                        @error('amount')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Ảnh</label>
                                        <input type="file" name="picture">
                                        @error('picture')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Ảnh chi tiết</label>
                                        <input type="file" name="picture_detail">
                                        @error('picture_detail')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                    </div>
                    <button type="submit" class="btn btn-success">Hoàn thành</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
