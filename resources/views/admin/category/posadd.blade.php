@extends('admin.layouts.indext')
@section('main_content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
                <h4 class="panel-heading">Add Category</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <form action="{{ route('admin.category.getpostadd') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name </label>
                                    <input type="text" name="name" value="{{$name }} "
                                        class=form-control placeholder="điền họ ">

                                    @if (empty($name) == true)
                                        <p style="color: brown">nhập giá trị</p>
                                    @endif

                                </div>
                                <button class="btn btn-success" type="submit">Hoàn thành</button>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
