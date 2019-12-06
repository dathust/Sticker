@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê
                            <small>Sản phẩm</small>
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

                      <form action="admin/thongke/sanpham" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                              <h3>Danh sách</h3>
                          <?php  
                            $count = count($month);
         //                   $countsp = 0;
         // //                    $i=4;
                  
                  // for($j =0; $j<$count;$j++){
                  //  for($i =1;$i<13;$i++){
                  //    if($i==$month[$j]){
                  //      $countsp++;
                  //    }
                  //  }
                  //    echo "Tháng " .$month[$j] ." bán được " .$countsp. " sản phẩm: <br>";
                
                  //  //$lg = DB::table('chitietdonhangs')->where('idDonhang',$id[$j])->first();
                  //    //echo "<h1>";
                  //      //$lg['idLoaigiay'];
                  //    //echo "</h1>";
                    
                      
                  
                  //  $countsp =0;
                      
                  // }
                  

                    
                $xthang = array();
                $dem1 =0;
               
                          ?>

                          <!-- @for($i=0; $i<3;$i++)
                            <h5>123</h5>
                          @endfor
                 -->
              

                @foreach($thang as $th)
                                  
                                  
                    <?php 
                    //$lg = DB::table('chitietdonhangs')->where('idDonhang',$id[$i])->list('idLoaigiay');   
                    //$idtemp = $id[$i];  
                    $arr_idDH = array();
                  
                    $ysoluong = array();
                    $i= -1;
                   ?>
                  
                    @foreach($month as $mt)
                                    <!-- <h2>{{$th}}</h2> -->

                        <?php 
                            if (($i<$count)) {
                                $i++;
                            }
                        ?>
                        @if(!strcasecmp($mt,$th))
                          <?php
                            $dem1++;
                                        //$i++;
                            array_push($arr_idDH, $id[$i]);

                          ?>
                                      
                        @endif
                                    
                    @endforeach
                    <?php
                      array_push($xthang, $dem1);
                     
                     // for($j=0;$j<count($xthang);$j++)
                     //  {
                         //echo $xthang[$j];
                     //  }
                      

                    ?>
                    @if($dem1!=0)
                      <h4>Tháng {{$th}} có {{$dem1}} đơn hàng bao gồm các sản phẩm:
                      </h4>
                      @foreach($arr_idDH as $arr_id)
                         @foreach($chitietdonhang as $ctdh)
                            @if(!strcasecmp($arr_id,$ctdh['idDonhang']))
                               <h4> + {{$ctdh->idLoaigiay}}</h4>

                            @endif
                         @endforeach

                      @endforeach

                     @endif
                    
                    <?php 
                                    
                                    // if (($i<$count-1)&&($dem1!=0)) {
                                    //  $i++;
                                    // }
                      $dem1 =0;
                                    
                    ?>
                @endforeach

                      
                            </div>
                
                         
                 <div id="chart" style="height: 250px;"></div>
<script>
   var d0 = <?php echo json_encode($xthang[1]);?>;
    var d1 = <?php echo json_encode($xthang[1]);?>;
     var d2 = <?php echo json_encode($xthang[2]);?>;
      var d3 = <?php echo json_encode($xthang[3]);?>;
       var d4 = <?php echo json_encode($xthang[4]);?>;
        var d5 = <?php echo json_encode($xthang[5]);?>;
         var d6 = <?php echo json_encode($xthang[6]);?>;
          var d7 = <?php echo json_encode($xthang[7]);?>;
           var d8 = <?php echo json_encode($xthang[8]);?>;
            var d9 = <?php echo json_encode($xthang[9]);?>;
             var d10 = <?php echo json_encode($xthang[10]);?>;
              var d11 = <?php echo json_encode($xthang[11]);?>;

 

  // alert($d);
    Morris.Bar({
      element: 'chart',
      data: [

        { date: 'Tháng 1', value: d0 },
        { date: 'Tháng 2', value: d1 },
        { date: 'Tháng 3', value: d2 },
        { date: 'Tháng 4', value: d3 },
        { date: 'Tháng 5', value: d4 },
        { date: 'Tháng 6', value: d5 },
        { date: 'Tháng 7', value: d6 },
        { date: 'Tháng 8', value: d7 },
        { date: 'Tháng 9', value: d8 },
        { date: 'Tháng 10', value: d9 },
        { date: 'Tháng 11', value: d10 },
        { date: 'Tháng 12', value: d11 }

      ],
      xkey: 'date',
      ykeys: ['value'],
      labels: ['Đơn hàng']
    });
</script>         
                        </form>
            
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection