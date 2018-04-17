@extends('backend.layout')
@section('controller')

<?php 
	$act = Request::get("act")!=null?Request::get("act"):'';
 ?>
 @if($act=='add')
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
              <div class="col-md-2"><label>Alt</label></div>
              <div class="col-md-8">
                <input type="text" name="alt" class="form-control">
                
          	</div>
          </div>
        		
        		<div class="row" style="padding: 10px 0px;">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button type="submit" class="btn btn-primary"> Add </button>
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
<section id="images">
	<div class="row">
		<div class="col-4"><h5>Images-Upload</h5></div>
		<div class="col-4">
			<button class="btn btn-success"><a href="{{ url('admin/upload-images?act=add') }}" style="color: white">Upload-Slider</a></button>
			</div>
		</div>
		<div class="col-4"></div>
	</div>

	<hr>
	<div class="row" id="images-upload">
		<?php foreach ($images as $rows): ?>
			<div class="col-md-3">
				<div id="box-img" style="width: 100%" class="btn-images">
					<img src="{{ asset('public/upload/images/'.$rows->c_img) }}" alt="" width="100%" id="img"  data-toggle="tooltip" title="Click to delete file  !" " >
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<script>
		$(document).on('click', '.btn-images img', function(event) {
			if (confirm('Are you sure ?')) {
				var src = $(this).attr('src');
				var file  = src.split('/');
				var name_file = file[file.length-1];
				var base_url = "http://localhost/icidcomplex/admin/"
				$.ajax({
					url: base_url+'delete-images/'+name_file,
					type: 'get',
					dataType: 'html',
					data: {'name_file': name_file},
					success:function(data){
						$('#images-upload').html(data);
					}
				})
				
				
			}
		});
	</script>
	<div class="row">
		<div class="col-md-4">
			{{ $images->render() }}
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
	</div>
</section>
<section id="silder" style="padding: 5px 0px;">
	<div class="row">
		<div class="col-4"><h5>Slider-Upload</h5></div>
		<div class="col-4">
			<button class="btn btn-success"><a href="{{ url('admin/images/slider?act=add') }}" style="color: white">Upload-Slider</a></button>
		</div>
		<div class="col-4"></div>
	</div>
	<hr>
	<div class="row" style="padding: 5px">
		<?php foreach ($slider as $rows): ?>
			<div class="col-md-3">
				<div id="box-img" style="width: 100%">
					<img src="{{ asset('public/upload/slider/'.$rows->c_img) }}" alt="" width="100%" id="img">
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ $slider->render() }}
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
	</div>
</section>
<section id="service" style="padding: 5px 0px;">
	<div class="row">
		<div class="col-4"><h5>Service-Upload</h5></div>
		<div class="col-4">
			<button class="btn btn-success"><a href="{{ url('admin/service?act=add') }}" style="color: white">Upload-Service</a></button>
		</div>
		<div class="col-4"></div>
	</div>
	<hr>
	<div class="row" style="padding: 5px">
		<?php foreach ($service as $rows): ?>
			<div class="col-md-3">
				<div id="box-img" style="width: 100%">
					<img src="{{ asset('public/upload/services/'.$rows->c_img) }}" alt="" width="100%" id="img">
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ $service->render() }}
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
	</div>
</section>
<section id="news" style="padding: 5px 0px;">
	<div class="row">
		<div class="col-4"><h5>News-Upload</h5></div>
		<div class="col-4">
			<button class="btn btn-success"><a href="{{ url('admin/news?act=add') }}" style="color: white">Upload-News</a></button>
		</div>
		<div class="col-4"></div>
	</div>
	<hr>
	<div class="row" style="padding: 5px">
		<?php foreach ($news as $rows): ?>
			<div class="col-md-3">
				<div id="box-img" style="width: 100%">
					<img src="{{ asset('public/upload/news/'.$rows->c_img) }}" alt="" width="100%" id="img">
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ $news->render() }}
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
	</div>
</section>
<section id="profile" style="padding: 5px 0px;">
	<div class="row">
		<div class="col-4"><h5>Profile-Upload</h5></div>
		<div class="col-4">
			<button class="btn btn-success"><a href="{{ url('admin/new-account') }}" style="color: white">Upload_Profile</a></button>
		</div>
		<div class="col-4"></div>
	</div>
	<hr>
	<div class="row" style="padding: 5px">
		<?php foreach ($admin as $rows): ?>
			<div class="col-md-3">
				<div id="box-img" style="width: 100%">
					<img src="{{ asset('public/upload/admin/'.$rows->c_img) }}" alt="" width="100%" id="img">
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ $admin->render() }}
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
	</div>
</section>

@endsection