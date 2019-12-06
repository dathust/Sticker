@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     <?php $kh = DB::table('khachhangs')->where('id',$donhang["idKhachhang"])->first(); ?>
                        <h1 class="page-header">Đơn hàng
                            <small>{{$kh->Hoten}}</small>
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
                        <form action="admin/donhang/sua/{{$donhang->id}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           
                            
                            
                            
                            <div class="form-group">
                                <label>Thời gian gửi</label>
                                <input class="form-control" name="Thoigiangui"  value="{{$donhang->Thoigiangui}}"/>
                            </div>
                            <div class="form-group">
                                <label>Thời gian nhận</label>
                                <input class="form-control" name="Thoigiannhan"  value="{{$donhang->Thoigiannhan}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tổng số lượng</label>
                                <input class="form-control" name="Soluong"  value="{{$donhang->Soluong}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tổng thu</label>
                                <input class="form-control" name="Tongthu"  value="{{$donhang->Tongthu}}"/>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="Ghichu"  value="{{$donhang->Ghichu}}"/>
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
