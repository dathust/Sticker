@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     <?php $lg = DB::table('loaigiays')->where('id',$Kichco["idLoaigiay"])->first(); ?>
                        <h1 class="page-header">Kích cỡ
                            <small>{{$lg->Ten}}</small>
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
                        <form action="admin/kichco/sua/{{$Kichco->id}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           
                            
                             <div class="form-group">
                                <label>Tên Giày</label>
                                <select class="form-control" name="idLoaiGiay">
                                    @foreach($loaigiay as $lg)
                                    <option value="{{$lg->id}}">{{$lg->Ten}}</option>
                                    @endforeach
                               </select>
                                                   
                            </div>
                            
                            <div class="form-group">
                                <label>Kích cỡ</label>
                                <input class="form-control" name="Kichco" placeholder="Nhập kích thước" value="{{$kichco->kichco}}"/>
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