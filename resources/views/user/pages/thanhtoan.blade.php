 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')

<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
     
      <div class="row">        
        <!-- Account Login-->
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
        <form action="dat-mua" method="POST">
          <input type="hidden" name="_token" value="{{csrf_token()}}" />


        <div class="span12">
           
          <div class="checkoutsteptitle">Điền đầy đủ thông tin
          </div>
         
          <div class="checkoutstep">
            <div class="row">
              
		
      

                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Họ Tên<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="Hoten">
                      </div>
                    </div>
                    
                    
                    <div class="control-group">
                      <label class="control-label" >Số điện thoại<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="Sodienthoai">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Tỉnh/Thành phố<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="TinhThanhpho">
                      </div>
     
                  </div>

                   <div class="span4">
                    
                    </div>
                    
                  
     
                  </div>

                  <div class="span4">
                     
                    <div class="control-group">
                      <label class="control-label" >Huyện/Quận<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="HuyenQuan">
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" >Địa chỉ giao hàng<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="Diachi">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Ghi chú</label>
                      <div class="controls">
                      @if($tmp==1)
                        <input type="text" name="Ghichu" value="Hoàn thành khảo sát" readonly>
                      @else
                        <input type="text" name="Ghichu" value="Không" readonly>
                      @endif
                      </div>
                    </div>
                    
                   
                 
                  </div>
                </fieldset>
               
            
            </div>
            
          </div>
          
	
          <!-- 1form -->
          <div class="checkoutsteptitle">Kiểm tra đơn hàng
          </div>
    <div class="checkoutstep">
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Hình ảnh</th>
            <th class="name">Tên sản phẩm</th>
            <th class="quantity">Số lượng</th>
            <th class="kichthuoc">Kích thước</th>
            <th class="total">Cập nhật</th>
            <th class="price">Giá bán</th>
            <th class="total">Tổng cộng</th>
           
          </tr>

          
          @foreach($content as $item)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('upload/loaigiay/'.$item->options->Anh) !!}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{!!$item->name!!}</a></td>
          
      
            
            <td class="quantity"><input class="qty span1" type="text" size="1" value='{!!$item->qty!!}' name="quantity[40]" ></td>
            
           <td class="kichthuoc">
              <!-- <input class="size span1" type="text" size="1" value='{!! $item->options->Kt !!}' name="kichthuoc" > -->
              <?php $kichco = DB::table('kichcos')->where('idLoaigiay',$item->id)->get(); ?>
              <select class="size span1" name="kichthuoc" >
                  <option value="{!! $item->options->Kt !!}">{!! $item->options->Kt !!}</option>
                 <!--  <option value="14">14</option>
                  <option value="13">13</option>
                  <option value="15">15</option> -->
                  @foreach($kichco as $kc)
                    <option value="{{$kc->Kichco}}">{{$kc->Kichco}}</option>p
                  @endforeach
              </select>
            </td>
             
            <!-- <td class="kt">{!!number_format($item->options->Kichthuoc)!!}</td> -->
            <td class="total">
               <a href="#" class="updatecart" id="{!!$item['rowid']!!}"><img class="tooltip-test" data-original-title="Update" src="{!! asset('user_asset/img/update.png')!!}" alt="" ></a>
                <a href="{!! url('xoa-san-pham',['id'=>$item['rowid']])!!}"><img class="tooltip-test" data-original-title="Remove"  src="{!! asset('user_asset/img/remove.png')!!}" alt=""></a>
            </td>                      
            <td class="price">{!!number_format($item->price) !!}</td>
            <td class="total">{!!number_format($item->price*$item->qty) !!}</td>
             
          </tr>  
            @endforeach 
           </form>  
        </table>
      </div>
            <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
             
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{!!number_format($total)!!}</span></td>
              </tr>
            </table>
            <!-- button  onclick="return khaosatnd()" class="btn btn-default"><h3>Đặt Hàng</h3></button> -->
             <!--  <a href="khao-sat" onclick="return confirm('Bạn có chắc chắn xóa không ?')" ><input value="Thanh Toán" type="submit" class="btn btn-orange pull-right"></a> -->
            <button type="submit" class="btn btn-default"><h3>Đặt Hàng</h3></button>
          </div>
        </div>
        </div>
        </div>
       
        <!-- Sidebar Start-->
       
        <!-- Sidebar End-->
        
      </div>
      </form>
    </div>
  </section>
</div>

@endsection
