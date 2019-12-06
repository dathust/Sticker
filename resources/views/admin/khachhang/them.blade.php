@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                        <form action="admin/khachhang/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" name="Hoten" placeholder="Nhập tên khách hàng" />                                         
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input  type="number" class="form-control" name="Sodienthoai" placeholder="Nhập số điện thoại" />                                         
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" name="password" placeholder="Nhập mật khẩu" />                                         
                            </div>
                            <div class="form-group">
                                <label>Tinh/Thành Phố</label>
                                <select class="form-control" name="TinhThanhpho">
                                    <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                    <option value="Hải Phòng">Hải Phòng</option>
                                    <option value="Hải Dương">Hải Dương</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Huyện/Quận</label>
                                <select class="form-control" name="HuyenQuan">
                                    <option value="Quận 1">Quận 1</option>
                                    <option value="Quận 2">Quận 2</option>
                                    <option value="Quận 3">Quận 3</option>
                                    <option value="Quận 4">Quận 4</option>
                                    <option value="Quận 5">Quận 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ chi tiết</label>
                                <input class="form-control" name="Diachichitiet" placeholder="Nhập địa chỉ chi tiết" />                                         
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection