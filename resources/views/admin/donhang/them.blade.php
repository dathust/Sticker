@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn Hàng
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

                        <form action="admin/donhang/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                 <label>Khách hàng</label>
                                <select class="form-control" name="idKhachhang">
                                    @foreach($khachhang as $kh)
                                    <option value="{{$kh->id}}">{{$kh->Hoten}}</option>
                                    @endforeach
                               </select>
                                                   
                            </div>

                             <div class="form-group">
                                <label>Thời gian gửi</label>
                                <input class="form-control" name="Thoigiangui" type="Date" placeholder="Nhập Thời gian" />
                            </div>
                             <div class="form-group">
                                <label>Thời gian nhận</label>
                                <input class="form-control" name="Thoigiannhan" type="date" placeholder="Nhập Thời gian" />
                            </div>
                             <div class="form-group">
                                <label>Tổng số lượng</label>
                                <input class="form-control" name="Soluong" placeholder="Nhập tổng số lượng" />
                            </div>
                             <div class="form-group">
                                <label>Tổng thu</label>
                                <input class="form-control" name="Tongthu" placeholder="Nhập tổng thu" />
                            </div>
                             <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="Ghichu" placeholder="Ghi chú" />
                            </div>
                            <div class="form-group">
                                <label>Tỉnh/Thành Phố</label>
                                <input class="form-control" name="TinhThanhpho" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Huyện/Quận</label>
                                <input class="form-control" name="HuyenQuan" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ chi tiết</label>
                                <input class="form-control" name="Diachichitiet" placeholder="" />
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