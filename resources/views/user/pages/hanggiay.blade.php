 @extends('user.master')
 @section('description','Trang chủ')
 @section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
         <!--  <a href="#">Home</a> -->
          <span class="divider">/</span>
        </li>
        <!-- <li class="active">Category</li> -->
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Hãng Giày</span></h2>
            <ul class="nav nav-list categories">
            <!-- <?php
            $menu_level_1 = DB::table('hanggiays')->get();
           ?> -->
            @foreach($cate as $ct)
              <li>
                <a href="{!! url('loai-san-pham',[$ct->id,$ct->Ten]) !!}">{!!$ct->Ten!!}</a>
              </li>
             @endforeach
            </ul>
          </div>
         <!--  Best Seller -->  
         
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Sản Phẩm Mới Nhất</span></h2>
            <ul class="bestseller">
            @foreach($productlast as $pl)
              <li>
                <img width="50" height="30" src="{!! asset('upload/loaigiay/'.$pl->Anh) !!}" alt="product" title="product">
                <a class="productname" href="{!! url('chi-tiet-san-pham',[$pl->id,$pl->idHanggiay])!!}">{!!$pl->Ten!!}</a>
                
                <span class="price">{!!$pl->Giaban!!}</span>
              </li>
             @endforeach
            </ul>
          </div>
          <!--  Must have -->  
          <div class="sidewidt">
         
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                  @foreach($product_cate as $item_cate)
                    <li class="span3">
                      <a class="prdocutname" href="product.html">{!! $item_cate->Ten !!}</a>
                      <div class="thumbnail">
                       
                        <a href="{!! url('chi-tiet-san-pham',[$item_cate->id,$item_cate->idHanggiay])!!}"><img alt="" src="{!! asset('upload/loaigiay/'.$item_cate->Anh) !!}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">Thêm vào giỏ</a>
                          <div class="price">
                            <div class="pricenew">{!! number_format($item_cate->Giaban)  !!}</div>
                            <div class="priceold"></div>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                    @if($product_cate->currentPage() !=1)
                      <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1))!!}">Prev</a>
                    @endif
                      @for($i =1 ; $i <= $product_cate->lastPage() ; $i = $i+1)
                      </li>
                      <li class="{!! ($product_cate->currentPage() ==$i)? 'active' : '' !!}">
                        <a href="{!!str_replace('/?','?',$product_cate->url($i))!!}">{!! $i !!}</a>
                      </li>
                     @endfor
                      @if($product_cate->currentPage() != $product_cate->lastPage())
                      <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1))!!}">Next</a>
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection