@extends('admin.layouts.indext')
@section('main_content')
    <div id="alert">
        @if (!empty($messageNotify))
            <div class="col-8">
                <div class="ma">
                    <strong>Chúc Mừng!</strong>{{ $messageNotify }}
                </div>
            </div>
        @endif
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product.getproductList') }}" method="GET">
                            <div class="col-6">
                                <label class="form-label">Tìm kiếm </label>
                                <input type="text" name="name" value="{{ $name }} " class=form-control
                                    placeholder="Nhập dữ liệu ">
                            </div>
                            <button class="  btn-gradient-primary" type="submit">Hoàn thành</button>
                        </form>
                        <br>
                        <h4 class="panel-heading">Thùng rác</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Tên sản phẩm</th>
                                    <th><a class="btn btn-info"
                                            href="{{ route('admin.product.restoreall') }}">RestoreAll</a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $item)
                                    @php
                                        $param = [
                                            'id' => $item->id,
                                        ];
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ route('admin.product.restore', $param) }}">Restore
                                            </a>
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.product.getdeletedforever', $param) }}">Deleted</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-danger" href="{{ route('admin.product.getdeletedall') }}">DeletedAll</a>
                        <a class="btn btn-gradient-success"
                            href="{{ route('admin.product.getproductList') }}">ReturnList</a>
                    </div>
                </div>
                <div class="ma1">
                    {{ $product->links('admin.component.pagination') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#alert").toggle(2000);
            // setTimeout(function() {
            //     $("#alert").slideUp(5000);
            // },5000);
        })
    </script>
@endsection
