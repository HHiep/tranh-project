@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Thể loại tranh</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial </th>
                                        <th>Name </th>
                                        <th>Picture </th>
                                        <th> <a class="btn badge badge-gradient-success"
                                            href="{{ route('admin.category.getList') }}">Back</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryList as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img src="{{ asset($item->picture) }}" alt="">
                                            </td>
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
