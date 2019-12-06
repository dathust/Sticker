 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')
<section id="featured" class="row mt40">
    <div class="container"> 
      <h1 class="heading1"><span class="maintext">Products</span><span class="subtext"> Level 1</span></h1>
      <ul class="thumbnails">
       @foreach($sanpham1 as $sp1)
			
        <?php 
        	$idsp = $sp1->idLoaigiay;
        	$item = DB::table('loaigiays')->where('id',$idsp)->first(); 

        ?>
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->idHanggiay])!!}">{!! $item->Ten !!}</a>
          <div class="thumbnail">
           <!--  <span class="sale tooltip-test">Sale</span> -->
            <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$item->Anh) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id])!!}" class="productcart">Thêm vào giỏ</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item->Giaban)!!}</div>
               
              </div>
            </div>
          </div>
        </li>
       
       @endforeach
      </ul>
    </div>
    <div class="container">
      <h1 class="heading1"><span class="maintext">Products</span><span class="subtext"> Level 2</span></h1>
      <ul class="thumbnails">
       @foreach($sanphamtmp1 as $sp2)
       	 <?php 
        	$idsp1 = $sp2;
        	$item1 = DB::table('loaigiays')->where('id',$idsp1)->first(); 
        	

        ?>
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item1->id,$item1->idHanggiay])!!}">{!! $item1->Ten !!}</a>
          <div class="thumbnail">
           <!--  <span class="sale tooltip-test">Sale</span> -->
            <a href="{!! url('chi-tiet-san-pham',[$item1->id,$item1->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$item1->Anh) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item1->id])!!}" class="productcart">Thêm vào giỏ</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item1->Giaban)!!}</div>
               
              </div>
            </div>
          </div>
        </li>
       
       @endforeach
      </ul>
    </div>
    <div class="container">
      <h1 class="heading1"><span class="maintext">Products</span><span class="subtext"> Level 3</span></h1>
      <ul class="thumbnails">
       @foreach($sanphamtmp2 as $sp3)
       	 <?php 
        	$idsp2 = $sp3;
        	$item2 = DB::table('loaigiays')->where('id',$idsp2)->first(); 
        	

        ?>
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item2->id,$item2->idHanggiay])!!}">{!! $item2->Ten !!}</a>
          <div class="thumbnail">
           <!--  <span class="sale tooltip-test">Sale</span> -->
            <a href="{!! url('chi-tiet-san-pham',[$item2->id,$item2->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$item2->Anh) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item2->id])!!}" class="productcart">Thêm vào giỏ</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item2->Giaban)!!}</div>
               
              </div>
            </div>
          </div>
        </li>
       
       @endforeach
      </ul>
    </div>

    <div class="container">
      <h1 class="heading1"><span class="maintext">Products</span><span class="subtext"> Level 4</span></h1>
      <ul class="thumbnails">
       @foreach($sanphamtmp3 as $sp4)
       	 <?php 
        	$idsp3 = $sp4;
        	$item3 = DB::table('loaigiays')->where('id',$idsp3)->first(); 
        	

        ?>
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item3->id,$item3->idHanggiay])!!}">{!! $item3->Ten !!}</a>
          <div class="thumbnail">
           <!--  <span class="sale tooltip-test">Sale</span> -->
            <a href="{!! url('chi-tiet-san-pham',[$item3->id,$item3->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$item3->Anh) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item3->id])!!}" class="productcart">Thêm vào giỏ</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item3->Giaban)!!}</div>
               
              </div>
            </div>
          </div>
        </li>
       
       @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
 
  @endsection