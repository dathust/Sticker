@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn Hàng
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
                                <th>Khách hàng</th>
                                <th>Thời gian gửi</th>   
                                <th>Thời gian nhận</th> 
                                <th>Tổng số sản phẩm</th>     
                                <th>Tổng thu</th> 
                                <th>Ghi chú</th>
                                <th>Tỉnh/Thành phố</th>
                                <th>Huyện/Quận</th>
                                <th>Địa chỉ chi tiết</th>                         
                                <th>Xóa</th>
                                <th>Sửa</th>
                                <th>Xuất đơn hàng</th>
                                <!-- <th>In đơn hàng</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $dh)
                            <tr class="odd gradeX" align="center">
                                <td>{!!$dh["id"]!!}</td>
                                 <td>
                                    <?php $kh = DB::table('khachhangs')->where('id',$dh["idKhachhang"])->first(); ?>
                                    @if(!empty($kh->Hoten))
                                        {!!$kh->Hoten!!}
                                    @endif
                                </td>
                                <td>{!!$dh["Thoigiangui"]!!}</td>
                                 <td>{!!$dh["Thoigiannhan"]!!}</td>

                               


                               
                                
                                   
                                    <?php $tongthu = DB::table('chitietdonhangs')->where('idDonhang',$dh["id"])->get() 
                                   ?>
                                   
                                    @foreach($tongthu as $tt)
                                       {{$dh->Tongthu = $dh->Tongthu + $tt->Giatien}}
                                       {{$dh->Soluong = $dh->Soluong + $tt->Soluong}}
                                    @endforeach
                                    
                                <td>{{$dh->Soluong}}</td>
                                   
                                <td>
                                    {{$dh->Tongthu}} 
                                </td>
                              
                                <td>{!!$dh["Ghichu"]!!}</td>
                                <td>{!!$dh["TinhThanhpho"]!!}</td>
                                <td>{!!$dh["HuyenQuan"]!!}</td>
                                <td>{!!$dh["Diachichitiet"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn chắc muốn xóa?')" href="admin/donhang/xoa/{{$dh->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$dh->id}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/in/{{$dh->id}}">Xuất</a></td>
                                <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/indh/{{$dh->id}}" class="btnPrint">In</a></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script type="text/javascript">
            $(document).ready(function(){
                $('.btnPrint').printPage();
            });
        </script>
        </div>

        <!-- /#page-wrapper -->
@endsection