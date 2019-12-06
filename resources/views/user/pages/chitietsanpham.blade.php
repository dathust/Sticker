 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <br><br><br><br>

      <div class="row">
       <!-- Left Image-->

        <div class="span7">
          <ul class="thumbnails mainimage">
            <li class="span7">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('upload/loaigiay/'.$product_detail->Anh) !!}">
                <img src="{!! asset('upload/loaigiay/'.$product_detail->Anh) !!}" alt="" title="">
              </a>
            </li>
          </ul>
         
        </div>
         <!-- Right Details-->
        <div class="span5">
          <div class="row">
            <div class="span5">
              <h1 class="productname"><span class="bgnone">{!!$product_detail->Ten!!}</span></h1>

               
              <div class="productprice">
                <div class="productpageprice">
                  <span class=""></span>{!!number_format($product_detail->Giaban)!!} vnđ
                 </div>
              </div>
               
              <ul class="productpagecart">
                <li><a class="cart" href="{!! url('mua-hang',[$product_detail->id])!!}">Thêm vào giỏ</a>
                </li>
              </ul>
              <div>
              
               <?php $hg = DB::table('hanggiays')->where('id',$product_detail->idHanggiay)->first(); ?>
              	 <h1 class="heading1"><span class="subtext"><a href="{!! url('loai-san-pham',[$hg->id,$hg->Ten]) !!}">Hãng giày: {!!$hg->Ten!!}</a> </span></h1>
              </div>
         <!-- Product Description tab & comments-->
        
         	  <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Giới thiệu</a>
                  </li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <h2>{!!$product_detail->Gioithieu!!}</h2>   
                  </div>

				</div>    
			   </div>

            </div>
          </div>


        </div>


     </div>

       
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container" >
      <h1 class="heading1" ><span class="maintext">Sản phẩm cùng loại</span></h1>
      <ul class="thumbnails">
      @foreach($product_cate as $pc)
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$pc->id,$pc->idHanggiay])!!}">{!!$pc->Ten!!}</a>
          <div class="thumbnail">
           
            <a href="{!! url('chi-tiet-san-pham',[$pc->id,$pc->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$pc->Anh) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">Thêm vào giỏ</a>
              <div class="price">
                <div class="pricenew">{!! number_format($pc->Giaban)  !!}</div>
                
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
</div>
@endsection