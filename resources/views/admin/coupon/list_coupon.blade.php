        
@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>



    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">

      <?php
      $message = Session::get('message');
      if($message)
        echo '<span class="text-alert"> ',$message.' </span>';


      Session::put('message', null);
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Điều kiện giảm giá</th>
            <th>Số giảm</th>
            <th>Date Update</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $v_coupon)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$v_coupon->coupon_name}}</td>
            <td>{{$v_coupon->coupon_code}}</td>
            <td>{{$v_coupon->coupon_time}}</td>
            <td><span >
              <?php
              if ($v_coupon->coupon_condition ==1) {
                ?>
                Giảm giá theo phần trăm
                <?php

              }elseif ($v_coupon->coupon_condition ==2) {
                ?>
                Giảm theo tiền
                <?php  
              }
              ?>
            </span>
          </td>

          <td><span >
              <?php
              if ($v_coupon->coupon_condition ==1) {
                ?>
                {{$v_coupon->coupon_number}} %
                <?php

              }elseif ($v_coupon->coupon_condition ==2) {
                ?>
                {{$v_coupon->coupon_number}}
                <?php  
              }
              ?>
            </span>
          </td>

          <td>{{$v_coupon->updated_at}}</td>
          <td>           

            <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-coupon/'.$v_coupon->coupon_id)}}" class ="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i>
            </a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <footer class="panel-footer">
    <div class="row">

      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        <ul class="pagination pagination-sm m-t-none m-b-none">
          <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
          <li><a href="">1</a></li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">4</a></li>
          <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</div>

@endsection