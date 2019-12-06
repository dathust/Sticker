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
          <span class="divider"></span>
        </li>
        <li class="active"></li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
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
                    
    <form action="goi-y-sanpham" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}" />
        

        <div class="row">
          <h1 class="heading1"><span class="maintext">Gợi ý sản phẩm cho khách hàng</span><span class="subtext"></span></h1>
         	<h3>Lựa chọn các thông tin phù hợp với bản thân</h3>
          <div class="span6">
            <h3 class="heading3"></h3>
            <div class="registerbox">
              <fieldset>
               <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Giới tính</label>
                  <div class="controls">
                   	<select name="Gioitinh">
                   		<option value="nam">Nam</option>
                   		<option value="nữ">Nữ</option>                   		
                   	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Độ tuổi</label>
                  <div class="controls">
                   	<select name="Dotuoi">
                   		<option value="1517">15-17</option>
                   		<option value="1719">17-19</option>
                   		<option value="1921">19-21</option>
                   		<option value="2123">21-23</option>
                   		<option value="2325">23-25</option>
                   		<option value="2527">25-27</option>            		
                   	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Tính cách</label>
                  <div class="controls">
                   	<select name="Tinhcach">
                   		<option value="1">Vui vẻ - Hòa đồng</option>
                   		<option value="2">Khép kín</option> 
                   		<option value="3">Trầm ngâm - ít nói</option>                   		
                   	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Chiều cao</label>
                  <div class="controls">
                   	<select name="Chieucao">
                   		<option value="1516">1m5-1m6</option>
                   		<option value="1617">1m6-1m7</option>
                   		<option value="1718">1m7-1m8</option>
                   		<option value="1819">1m8-1m9</option>
                   	</select>
                  </div>
                </div>
                 
              </fieldset>
            </div>
          </div>
          <div class="span6">
            <h3 class="heading3"> </h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Màu sắc yêu thích</label>
                  <div class="controls">
                  <select name="Mausac">
                   		<option value="do" style="background-color: #ff0000">Đỏ</option>
                   		<option value="trang" style="background-color:#ffffff ">Trắng</option>
                   		<option value="xanh" style="background-color: #3cfa08">Xanh</option>
                   		<option value="vang" style="background-color: #ffff05">Vàng</option>
                   		<option value="tim" style="background-color: #802c71">Tím</option>
                   	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Hoạt động</label>
                  <div class="controls">
                   	<select name="Hoatdong">
                   		<option value="1">Vui chơi</option>
                   		<option value="2">Du lịch</option>
                   		<option value="3">Làm việc - Học tập</option>
                   		<option value="4">Thể thao</option>
                   	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Cân nặng</label>
                  <div class="controls">
                   	<select name="Cannang">
                   		<option value="4050">40-50 (kg)</option>
                   		<option value="5060">50-60 (kg)</option>
                   		<option value="6070">60-70 (kg)</option>
                   		<option value="7080">70-80 (kg)</option>
                   		<option value="8090">80-90 (kg)</option>
                   	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span>Nghề nghiệp</label>
                  <div class="controls">
                   	<select name="Nghenghiep">
                   		<option value="1">Học sinh</option>
                   		<option value="2">Sinh viên</option>
                   		<option value="3">Đã đi làm</option>
                   		
                   	</select>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
          
       
        <!-- Sidebar Start-->
       
        <!-- Sidebar End-->
        
     
      
        </div>
          
         
          <br>
       <button type="submit" class="btn btn-default"><h3>Tìm kiếm</h3></button>
         
      </div>
    
  </section>
</form>
</div>
  @endsection