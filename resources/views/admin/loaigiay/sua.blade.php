@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Giày
                            <small>{{$loaigiay->Ten}}</small>
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
                        <form action="admin/loaigiay/sua/{{$loaigiay->id}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Hãng giày</label>
                                <select class="form-control" name="idHanggiay">
                                    @foreach($hanggiay as $hg)
                                    <option value="{{$hg->id}}">{{$hg->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="idNguoisudung">
                                    @foreach($user as $us)
                                    <option value="{{$us->id}}">{{$us->Hoten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Tên giày</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên mới" value="{{$loaigiay->Ten}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Ảnh</label>
                                <p>
                                	<img width="400px" src="upload/loaigiay/{{$loaigiay->Anh}}">
                                </p>
                                <input class="form-control" name="Anh" type="file" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="Soluong" placeholder="Nhập số lượng" value="{{$loaigiay->Soluong}}"/>
                            </div>
                            <div class="form-group">
                                <label>Giá nhập</label>
                                <input class="form-control" name="Gianhap" placeholder="Nhập giá nhập" value="{{$loaigiay->Gianhap}}"/>
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control" name="Giaban" placeholder="Nhập giá bán" value="{{$loaigiay->Giaban}}"/>
                            </div>

                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection