@extends('admin.layouts.indext')
@section('main_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-heading">Update Category</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <form role="form" method="POST" enctype="multipart/form-data"
                                        action="{{ route('admin.category.getpostupdate', ['id' => $categoryList->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ $categoryList->name }}">
                                            @error('name')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div> <img class="img" src="{{ $categoryList->picture }}" /></div>
                                        <div class="form-group">

                                            <label></label>
                                            <input type="file" name="picture">
                                            @error('picture')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Hoàn thành</button>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
