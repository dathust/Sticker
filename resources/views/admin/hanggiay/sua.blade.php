@extends('admin.layout.index')

@section('content') 
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hãng Giày
                            <small>{{$hanggiay->Ten}}</small>
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
                        <form action="admin/hanggiay/sua/{{$hanggiay->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên Hãng</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên hãng giày" value="{{$hanggiay->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Xuất xứ</label>l
                                <input class="form-control" name="Xuatxu" placeholder="Xuất xứ" value="{{$hanggiay->Xuatxu}}" />
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