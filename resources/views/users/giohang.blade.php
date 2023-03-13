<meta http-equiv="refresh">
@extends('layoutshome.indext')
@section('conten')
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12  ">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Giỏ hàng User
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cartList as $index => $cart)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $cart->name }}</td>
                                            <td>{{ $cart->email }}</td>
                                            <td>
                                                @if ($cart->status == 2)
                                                    <a class="btn btn-info"
                                                        href="{{ route('home.xacnhanusers', [
                                                            'cart_id' => $cart->id,
                                                            'user_id' => $cart->user_id,
                                                        ]) }}">
                                                        Xácnhận người dùng</a>  
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                window.location.reload(1);
                alert("Vui lòng xác nhận để hoàn tất đơn hàng!")
            }, 30000)

        })
    </script>
    <script>
        $("#alert").toggle(2000);
    </script>
@endsection
