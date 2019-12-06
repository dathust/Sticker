@extends('admin.layout.index')

@section('content')  
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết Đơn Hàng
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

                        <form action="admin/chitietdonhang/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />  

                            <div class="form-group">
                                <label>Mã Đơn Hàng</label>
                                <select class="form-control" name="idDonhang">
                                    @foreach($donhang as $dh)
                                    <option value="{{$dh->id}}">{{$dh->id}}</option>
                                    @endforeach
                               </select>
                                                   
                            </div>

                            <div class="form-group">
                                <label>Loại giày</label>
                                <select class="form-control" name="idLoaigiay" id="Truyen">
                                    @foreach($loaigiay as $lg)
                                         <option value="{{$lg->id}}">{{$lg->Ten}}
                                         </option>
                                    @endforeach
                               </select>
                                                  
                            </div>

                             <div class="form-group">
                                <label>Giá bán</label>
                                <select class="form-control" name="Giaban" id="Giaban">
                                  
                                  
                                         <option value="{{$lg->Giaban}}">{{$lg->Giaban}}
                                         </option>
                                  
                            
                               </select>
                                                  
                            </div>
                                  
                             <div class="form-group">

                                <label>Số Lượng</label>
                                <input class="form-control" name="Soluong" placeholder="Nhập số lượng" />
                            </div>

                            <div class="form-group">
                                <label>Giá Tiền</label>
                                <input class="form-control" name="tien" placeholder="Nhập giá tiền" value="0" />
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

@section('script')
    <script>
        $(document).ready(function(){
           $("#Truyen").change(function(){
                var idTruyen = $(this).val();
                 $.get("admin/ajax/giaban/"+idTruyen,function(data){
                    $("#Giaban").html(data);
                });
           });
        });
    </script>
@endsection

