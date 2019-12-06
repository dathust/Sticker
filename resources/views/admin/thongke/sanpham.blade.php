@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hãng Giày
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

                      <form action="admin/thongke/sanpham" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <h3>Số lượng giày theo tháng: </h3>
                                <?php 
                                	//use Carbon\Carbon 
                                	$count=0;
									// for ($i = 1; $i < 13; $i++){
   										 foreach ($month as $mt) {
											
											
                                    		
                                    		// if($mt == $i){
                                    		// 	$count++;
                                    		// }
                        echo $mt;
                                    	}
                                   	
                                    echo "Sản phẩm trong tháng $i là: $count <br>";
                                    $count=0;
									//}
									
                                ?>
                   				
                               	
                            </div>
                         
                          
                        </form>
            
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection