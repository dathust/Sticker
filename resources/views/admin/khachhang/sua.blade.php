@extends('admin.layout.index')

@section('content') 
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>{{$khachhang->Ten}}</small>
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
                        <form action="admin/khachhang/sua/{{$khachhang->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                              <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên khách hàng" value="{{$khachhang->Ten}}"/>                                         
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="Sodienthoai" placeholder="Nhập số điện thoại" value="{{$khachhang->Sodienthoai}}" />                                         
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="Diachi" placeholder="Nhập địa chỉ giao hàng" value="{{$khachhang->Diachi}}"/>                                         
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="Ghichu" placeholder="" value="{{$khachhang->Ghichu}}"/>                                         
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Trở lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection