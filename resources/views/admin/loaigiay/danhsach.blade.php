@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Giày
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

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

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hãng giày</th>
                                <th>Ảnh</th>
                                <th>Kích thước</th>
                                <th>Số lượng</th>
                                <th>Giá nhập</th>
                                <th>Giá bán</th>
                                
                                <th>Quản lý</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaigiay as $lg)
                            <tr class="odd gradeX" align="center">
                                <td>{!!$lg["id"]!!}</td>
                                <td>{!!$lg["Ten"]!!}</td>
                                <td>
                                    <?php $hg = DB::table('hanggiays')->where('id',$lg["idHanggiay"])->first(); ?>
                                    @if(!empty($hg->Ten))
                                        {!!$hg->Ten!!}
                                    @endif
                                </td>
                               
                                <td>
                                    <img width="200px" src="upload/loaigiay/{{$lg->Anh}}"/>
                                </td>
                                <td>
                                    @foreach($kichco as $kc)
                                        @if (($kc->idLoaigiay)==($lg->id))
                                        {!!$kc->Kichco!!};                                         
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$lg->Soluong}}</td>
                                <td>{{number_format($lg->Gianhap)}}</td>
                                <td>{{number_format($lg->Giaban)}}</td>
                                <td>
                                   <?php $us = DB::table('nguoisudungs')->where('id',$lg["idNguoisudung"])->first(); ?>
                                    @if(!empty($us->Hoten))
                                        {!!$us->Hoten!!}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn chắc muốn xóa?')" href="admin/loaigiay/xoa/{{$lg->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaigiay/sua/{{$lg->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection