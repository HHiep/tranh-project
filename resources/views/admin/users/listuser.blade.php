@extends('admin.layouts.indext')
@section('main_content')
    <div id="alert">
        @if (!empty($messageNotify))
            <div class="col-8">
                <div class="ma">
                    <h1>{{ $messageNotify }}</h1>
                </div>
            </div>
        @endif
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.users.listuser') }}" method="GET">
                            <div class="col-12">
                                <label class=" form-label">Tìm kiếm </label>
                                <input type="text" name="name" value="{{ $name }} " class=form-control
                                    placeholder="Nhập dữ liệu ">
                            </div>
                            <button class="  btn-gradient-primary" type="submit">Hoàn thành</button>
                        </form>
                        <h2 class="panel-heading card-title">Danh sách tài khoản</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Tên tài khoản</th>
                                        <th>Gmail</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listuser as $index => $user)
                                        @php
                                            $param = [
                                                'id' => $user->id,
                                            ];
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $index + 1 }}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <img src="{{ asset($user->picture) }}" alt="">
                                            </td>
                                            <td>
                                                <a class="btn  badge badge-primary"
                                                    href="{{ route('admin.users.updateuse', $param) }}">Update</a>
                                                <button class="btn badge badge-gradient-danger event-delete"
                                                    data-id={{ $user->id }}>Deleted</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div class="ma1"> {{ $listuser->links('admin.component.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn thật sự muốn xóa?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/users/deleted?id=' + id;
                }
            });
            $("#alert").toggle(5000);
        })
    </script>
@endsection
