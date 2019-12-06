 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#"></a>
          <span class="divider">/</span>
        </li>
        <li class="active"></li>
      </ul>       
      <h1 class="heading1"><span class="maintext">Giỏ Hàng</span><span class="subtext">Tất cả sản phẩm đã chọn</span></h1>
      <!-- Cart-->
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

          <form method="POST" action="">
          	<input type="hidden" name="_token" value="{{csrf_token()}}" />
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
            <!-- <button type="submit" class="btn btn-default"><a href="{!! url('thanh-toan')!!}"><h3>Thanh Toán</h3></a></button> -->
            <!-- <input type="submit" value="Thanh Toán" class="btn btn-orange pull-right"> -->
            <button  onclick="return khaosatnd()" class="btn btn-default"><h3>Thanh Toán</h3></button>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection
