   <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a href="{{ url('/') }}">Trang chủ</a>
        
          </li>
          <?php
            $menu_level_1 = DB::table('hanggiays')->get();
          ?>
          @foreach($menu_level_1 as $item_level_1)
          <li><a   href="{!! url('loai-san-pham',[$item_level_1->id,$item_level_1->Ten]) !!}">{!! $item_level_1->Ten!!}</a>
            
          </li>
          @endforeach
        
         
          <li><a href="{!!url('goi-y-sanpham')!!}">Tìm kiếm</a>
			      
          </li>  
          <li>

              <form action="tim-kiem" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="form-group">
                  <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
                  <button type="submit" class="btn btn-success" style="height: 35px">Tìm kiếm</button>
              </div>
              
          </form>
            
          </li>       
        </ul>
      </nav>
    </div>