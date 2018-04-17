@extends('backend.layout')
@section('controller')

<?php 
	$act = Request::get("act")!=null?Request::get("act"):'';
	$id = Request::get('id');
	$m  = DB::table("tbl_property")->where("pk_property_id","=",$id)->first();
 ?>
 @if($act=='add'||$act=='edit')
 <script type="text/javascript">
 	$(window).on('load', function(event) {
 		$("#myModal").modal("show");
 	});
 </script>
 <div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form action="" method="post" enctype="multipart/form-data">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      		<div class="row" style="padding: 10px 0px">
      			<div class="col-md-4">Select Tower</div>
      			<div class="col-md-4">
      				<select name="fk_tower_id" >
      					<?php $tower = DB::table("tower")->orderBy("pk_tower_id","desc")->get() ?>
      					<?php foreach ($tower as $rows): ?>
      						<option value="{{ $rows->pk_tower_id }}">{{ $rows->c_name }}</option>
      					<?php endforeach ?>
      					
      				</select>
      			</div>
      			<div class="col-md-4"></div>
      		</div>
			<div class="row">
        			<div class="col-md-4"><label>Image</label></div>
        			<div class="col-md-4">
        				<div class="file btn btn-info">
							Upload
							<input type="file" name="c_img[]" id="file" onchange="file_img()"  accept="image/x-png,image/gif,image/jpeg" @if($act=="add") required @endif multiple="" />
					</div>
					<div class="col-md-4"></div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8" id="abc" style="padding: 10px">
        				@if($act=='edit')
        					<?php $img = json_decode($m->c_img) ?>
        					<?php foreach ($img as $i): ?>
        						
        				 	<img src="{{ asset('public/upload/property/'.$i) }}" alt="" width="100px" >

        					<?php endforeach ?>
        				@endif
        			</div>
        			<div class="col-md-2"></div>
        			<script>
        				function file_img(){
						var tmppath = URL.createObjectURL(event.target.files[0]);
						var file = $("#file")[0].files;
						console.log(file.length);
						$("#abc").html("");
					    for (var i = 0; i < file.length; i++) {
					    	$("#abc").append("<img src="+URL.createObjectURL(event.target.files[i])+" id='img' width='100px'>");
					    }
					}
        			</script>
        		</div>

        		<div class="row" >
              <div class="col-md-2"><label>Name</label></div>
              <div class="col-md-8">
                <input type="text" name="c_name" @if($act=='edit') value="{{ $m->c_name }}" @endif class="form-control" required="">
                
          </div>
          <div class="col-md-2"></div>
              </div>
              <div class="row" style="padding: 5px 0px">
        			<div class="col-md-2"><label>Caption</label></div>
        			<div class="col-md-8">
        				<textarea name="c_caption" id="" cols="50" rows="10">
        					@if($act=='edit') {{ $m->c_caption }} @endif
        				</textarea>
        				<script>
        					CKEDITOR.replace("c_caption");
        				</script>
					</div>
					<div class="col-md-2"></div>
        			</div>
        		
        		
        		<div class="row" style="padding: 10px 0px;">
        			<div class="col-md-3"><label>Tầng(cách nhau bới dấu ",")</label></div>
        			<div class="col-md-8">
        				<input type="text" name="tang" class="form-control" @if($act=='edit') value="{{ $m->tang }}" @endif>
					</div>
					<div class="col-md-1"></div>
        		</div>
        		<div class="row" style="padding: 10px 0px;">
        			<div class="col-md-3"><label>Phòng(cách nhau bới dấu ",")</label></div>
        			<div class="col-md-8">
        				<input type="text" name="phong" class="form-control" @if($act=='edit') value="{{ $m->phong }}" @endif>
					</div>
					<div class="col-md-1"></div>
        		</div>
        		<div class="row" style="padding: 10px 0px;">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button type="submit" class="btn btn-primary">@if($act=="add") Add @else Edit @endif</button>&nbsp;
        				<button type="reset" class="btn btn-danger">Reset</button>
					</div>
					<div class="col-md-2"></div>
        		</div>
        		
        	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 @endif
 <?php $reply = Request::get("reply") ?>
 @if($reply=="did")
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong><i class="la la-check"></i>Success!</strong>
	</div>
 @endif
	<div class="row" style="padding: 10px 0;">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="text-align: center;">
			<button class="btn btn-danger"><a href="{{ url('admin/property?act=add') }}" style="color:white;">Add property</a></button>
		</div>
		<div class="col-md-4"></div>
	</div>
	<table class="table table-hover">
		<thead>
			<th>Tower</th>
			<th>Image</th>
			<th>Name</th>
			<th>Floor</th>
			<th>Room</th>
			<th>Action</th>
		</thead>
	<tbody>
	<?php foreach ($property as $rows): ?>
		<tr>
			<?php $tower = DB::table("tower")->where("pk_tower_id","=",$rows->fk_tower_id)->first() ?>
			<td>{{ $tower->c_name }}</td>
			<td>
				<?php $img = json_decode($rows->c_img) ?>
				<?php foreach ($img as $i): ?>
					<img src="{{ asset('public/upload/property/'.$i) }}" alt="" width="60px">	
				<?php endforeach ?>
			</td>
			<td>{{$rows->c_name}}</td>
			<td>{{ $rows->tang }}</td>
			<td>{{ $rows->phong }}</td>
			
			<td>
				<a href="{{ url('admin/property?act=edit&id='.$rows->pk_property_id) }}" style="color: blue">Edit</a>&nbsp;
				<a href="{{ url('admin/property/delete/'.$rows->pk_property_id) }}" style="color: red" onclick="return confirm('Are you sure ?')">Delete</a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
	</table>
@endsection