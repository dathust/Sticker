 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')
<section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm tìm kiếm</span><span class="subtext"> Kết quả tìm kiếm cho: {{$tukhoa}}</span></h1>
      <ul class="thumbnails">
       @foreach($sanpham1 as $item)
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
  </section>
  
  <!-- Latest Product-->
 
  @endsection