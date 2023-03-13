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
                        <form action="{{ route('admin.category.getList') }}" method="GET">
                            <div class="col-12">
                                <label class=" form-label">Tìm kiếm </label>
                                <input type="text" name="name" value="{{ $name }} " class=form-control
                                    placeholder="Nhập dữ liệu ">
                            </div>
                            <button class="  btn-gradient-primary" type="submit">Hoàn thành</button>
                        </form>
                        
                        <h1 class="panel-heading">Danh sách Thể loại</h1>
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Serial </th>
                                    <th>Name </th>
                                    <th>Picture </th>
                                    <th> <a class="btn badge badge-gradient-success"
                                            href="{{ route('admin.category.getadd') }}">Add</a></th>
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
                                        <td>
                                            <img src="{{ asset($item->picture) }}" alt="">
                                        </td>
                                        <td>
                                            <a class="btn badge badge-gradient-info"
                                                href="{{ route('admin.category.getdetail', $param) }}">Detail</a>
                                            <a class="btn  badge badge-primary"
                                                href="{{ route('admin.category.getupdate', $param) }}">Update</a>
                                            <button class="btn badge badge-gradient-danger event-delete"
                                                data-id={{ $item->id }}>Deleted</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn badge badge-gradient-warning" href="{{ route('admin.category.getrycle') }}">Rycle</a>
                    </div class="ma1">
                    {{ $categoryList->links('admin.component.pagination') }}
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn thật sự muốn xóa?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/category/deleted?id=' + id;

                }
            });
            $("#alert").toggle(2000);
        })
    </script>
@endsection
