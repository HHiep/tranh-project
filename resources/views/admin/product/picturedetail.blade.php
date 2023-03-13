@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="panel-heading">Danh sách ảnh chi tiết sản phẩm</h1>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Serial </th>
                                    <th>Picture </th>
                                    <th>Name </th>
                                    <th> <a class="btn badge badge-gradient-success"
                                            href="{{ route('admin.product.picturedetailadd') }}">Add</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pictureDetail as $index => $picture)
                                    @php
                                        $param = [
                                            'id' => $picture->id,
                                        ];
                                        // dd( $picture->id);
                                    @endphp
                                    {{-- Mỗi sản phẩm --}}
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($picture->picture) }}" alt="">
                                        </td>
                                        <td>{{ $picture->picture_detail_name }}</td>
                                        <td>
                                            <a class="btn badge badge-gradient-info"
                                                href="{{ route('admin.product.deletepicture', $param) }}">Deleted</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
