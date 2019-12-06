<!DOCTYPE html>
<html>
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" ">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <title>ĐƠN HÀNG</title>
   <style type="text/css">
       table{
        width: 600px;
       
        border: 1px solid;
       }
       td,th{
        border: 1px solid;
       }
   </style>
</head>
<body>
    <?php $kh = DB::table('khachhangs')->where('id',$donhang["idKhachhang"])->first(); ?>
    <h1>CỬA HÀNG GIÀY STICKER</h1>
    <h2>ĐƠN HÀNG</h2>
    <h2>Khách Hàng: {{$kh->Hoten}}</h2>
    <h2>Địa chỉ: {{$kh->Diachichitiet}} - {{$kh->HuyenQuan}} - {{$kh->TinhThanhpho}}</h2>
    <h2>Số điện thoại: {{$kh->Sodienthoai}}</h2>
    <h2>Ngày mua hàng: {{$donhang->Thoigiangui}}</h2>
    <h2>Ghi chú: {{$donhang->Ghichu}}</h2>
    <h2>Tổng thu: {{$donhang->Tongthu}}</h2>
    <?php $chitietdh = DB::table('chitietdonhangs')->where('idDonhang',$donhang["id"])->first(); ?>

    <h1 class="page-header">Chi Tiết Đơn Hàng</h1>
    
     <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                
                                <th>Tên Sản Phẩm</th>   
                                <th>Số Lượng</th>  
                                <th>Giá Tiền</th> 
                                <th>Mã Đơn Hàng</th>                            
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitietdonhang as $ctdh)
                            @if($ctdh->idDonhang == $donhang->id)
                               
                            
                            <tr class="odd gradeX" align="center">
                                
                                 
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
                               
                              
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
   
<script src="js/bootstrap.min.js"></script>
</body>
</html>