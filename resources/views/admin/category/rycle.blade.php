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
                        <h4 class="panel-heading">Thể loại tranh</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial </th>
                                        <th>Name </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryList as $index => $item)
                                        @php
                                            $param = [
                                                'id' => $item->id,
                                            ];
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><a class="btn badge badge-gradient-danger"
                                                    href="{{ route('admin.category.getdeletedforever', $param) }}">Deleted</a>
                                                <a class="btn badge badge-gradient-success"
                                                    href="{{ route('admin.category.restore', $param) }}">Restore</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn badge badge-gradient-danger"
                                href="{{ route('admin.category.getdeletedall') }}">DeletedAll</a>
                            <a class="btn badge badge-gradient-success"
                                href="{{ route('admin.category.restoreall') }}">RestoreAll</a>
                            <a class="btn badge badge-gradient-info"
                                href="{{ route('admin.category.getList') }}">ReturnList</a>
                        </div>
                    </div class="ma1">
                    {{ $categoryList->links('admin.component.pagination') }}
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
