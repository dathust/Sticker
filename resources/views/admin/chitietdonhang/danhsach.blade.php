@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết Đơn Hàng
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
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Loại giày</th>   
                                <th>Số Lượng</th>  
                                <th>Giá Tiền</th> 
                                <th>Mã Đơn Hàng</th>                            
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitietdonhang as $ctdh)
                            <tr class="odd gradeX" align="center">
                                <td>{!!$ctdh["id"]!!}</td>
                                 
                                <td>
                                     <?php $ctlg = DB::table('loaigiays')->where('id',$ctdh["idLoaigiay"])->first(); ?>
                                     @if(!empty($ctlg->Ten))
                                        {!!$ctlg->Ten!!}
                                    @endif
                                </td>
                                 <td>{!!$ctdh["Soluong"]!!}</td>
                                <td>
                                        
                                     <?php $ctlg = DB::table('loaigiays')->where('id',$ctdh["idLoaigiay"])->first(); ?>
                                    @if(!empty($ctlg->Giaban))
                                        {!!$ctlg->Giaban * $ctdh->Soluong!!}
                                    @endif
            
                                </td>
                                 <td>{!!$ctdh["idDonhang"]!!}</td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn chắc muốn xóa?')" href="admin/chitietdonhang/xoa/{{$ctdh->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitietdonhang/sua/{{$ctdh->id}}">Sửa</a></td>
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