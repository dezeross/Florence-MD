@extends('backend.layout')
@section('controller')

<?php 
	$act = Request::get("act")!=null?Request::get("act"):'';
	$id = Request::get('id');
	$m  = DB::table("tbl_service")->where("pk_service_id","=",$id)->first();
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
			<div class="row">
        			<div class="col-md-4"><label>Image</label></div>
        			<div class="col-md-4">
        				<div class="file btn btn-info">
							Upload
							<input type="file" name="c_img" id="file" onchange="file_img()"  accept="image/x-png,image/gif,image/jpeg" @if($act=="add") required @endif  />
					</div>
					<div class="col-md-4"></div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8" id="abc" style="padding: 10px">
        				@if($act=='edit') <img src="{{ asset('public/upload/services/'.$m->c_img) }}" alt="" width="100%" >@endif
        			</div>
        			<div class="col-md-2"></div>
        			<script>
        				function file_img(){
						var tmppath = URL.createObjectURL(event.target.files[0]);
					    
					    	$("#abc").html("<div id='box-img' width='300px'><img src="+URL.createObjectURL(event.target.files[0])+" id='img' width='300px'></div>");
					}
        			</script>
        		</div>

        		<div class="row" >
              <div class="col-md-2"><label>Title</label></div>
              <div class="col-md-8">
                <input type="text" name="c_title" @if($act=='edit') value="{{ $m->c_title }}" @endif class="form-control">
                
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
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button type="submit" class="btn btn-primary">@if($act=="add") Add @else Edit @endif</button>
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
			<button class="btn btn-danger"><a href="{{ url('admin/service?act=add') }}" style="color:white;">Add service</a></button>
		</div>
		<div class="col-md-4"></div>
	</div>
	<?php foreach ($service as $rows): ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-8 slider" >
					<img src="{{ asset('public/upload/services/'.$rows->c_img) }}"  width="100%">
					<div class="caption">
            <h3><?php echo $rows->c_title; ?></h3>
						<p><?php echo $rows->c_caption ; ?></p>
					</div>
			</div>

			<div class="col-md-4">
				<button class="btn btn-primary"><a href="{{ url('admin/service?act=edit&id='.$rows->pk_service_id) }}" style="color: white">Edit</a></button>&nbsp;
				<button class="btn btn-danger"><a href="{{ url('admin/service/delete/'.$rows->pk_service_id) }}" style="color: white" onclick="return confirm('Are you sure ?')">Delete</a></button>
			</div>
		</div>
	<?php endforeach ?>
@endsection