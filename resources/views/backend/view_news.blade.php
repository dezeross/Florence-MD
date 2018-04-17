@extends("backend.layout")
@section("controller")

<?php 
	$act = Request::get("act")!=null?Request::get("act"):"";
	$id = Request::get("id")!=null?Request::get("id"):0;
	if ($id!=0) {
		$m = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
	}
 ?>
@if($act=="edit"||$act=="add")
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Title</label></div>
        			<div class="col-md-8">
        				<input type="text" name="c_name" value="{{ isset($m->c_name)?$m->c_name:'' }}" class="form-control" required="" >
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Image</label></div>
        			<div class="col-md-2">
        				<div class="file btn btn-info">
							Upload
							<input type="file" name="c_img" id="file" onchange="file_img()"  accept="image/x-png,image/gif,image/jpeg" @if($act=="add") required @endif  />
					</div>
        			</div>
        			<div class="col-md-8">
        				<div id="box-img">
        				<img src="{{ isset($m->pk_news_id)?asset('public/upload/news/'.$m->c_img):'' }}" alt="" id="img" width="220px">
        			</div>
        			</div>
        			<script>
        				function file_img(){

						var tmppath = URL.createObjectURL(event.target.files[0]);
					    $("#img").fadeIn(2000).attr('src',URL.createObjectURL(event.target.files[0]));
					}
        			</script>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Description</label></div>
        			<div class="col-md-8">
        				<textarea name="c_description" id="" cols="30" rows="10" required="">
        					{{ isset($m->c_description)?$m->c_description:'' }}
        				</textarea>
        				<script>
        					CKEDITOR.replace('c_description');
        				</script>
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Content</label></div>
        			<div class="col-md-8">
        				<textarea name="c_content" id="" cols="30" rows="10" required="">
        					{{ isset($m->c_content)?$m->c_content:'' }}
        				</textarea>
        				<script>
        					CKEDITOR.replace('c_content');
        				</script>
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Now </label></div>
        			<div class="col-md-8" id="time-zone">
        				
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
				<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button type="submit" class="btn btn-success">@if(isset($m->pk_news_id)) Edit @else Create @endif</button>
        			</div>
        			<div class="col-md-2"></div>
        		</div>
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
<?php 
	$reply = Request::get("reply")!=null?Request::get("reply"):"";
 ?>
@if($reply=="did")
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert"><i class="la la-remove"></i></button>
    <strong><i class="la la-chevron-down" style="font-size: 25px"></i>&nbsp;Success!</strong>
 </div>
@endif


	<h4>News Edit</h4>
	<p id="time-zone"></p>
	<script>
					var weekday = new Array(7);
						weekday[0] =  "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var d = new Date();
					var month = new Array();
					month[0] = "January";
					month[1] = "February";
					month[2] = "March";
					month[3] = "April";
					month[4] = "May";
					month[5] = "June";
					month[6] = "July";
					month[7] = "August";
					month[8] = "September";
					month[9] = "October";
					month[10] = "November";
					month[11] = "December";
					setInterval(function(){
						var today = new Date();
					    var h = today.getHours()<10?"0"+today.getHours():today.getHours();
					    var m = today.getMinutes()<10?"0"+today.getMinutes():today.getMinutes();
					    var s = today.getSeconds()<10?"0"+today.getSeconds():today.getSeconds();
						var D = weekday[today.getDay()];
						var M = month[today.getMonth()];
						var Y = today.getFullYear(); 
					   	var str = D+", "+M+" - "+Y+"   Time : "+h+" : "+m+" : "+s+" GMT+7"; 
					   	$("#time-zone").html("<h7><i>"+str+"</i></h7>");
					},1000);
			</script>

	<!-- table inbox -->
	<div style="background: white;">
		<div class="card-body">
			<div class="card-sub" style="padding: 5px">
				<button class="btn btn-danger" >
					<a href="{{ url('admin/news?act=add') }}" style="color: white;text-decoration: none;">Add new NEWs</a>
				</button>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th>Image</th>
						<th>Name</th>
						<th>Description</th>
						<th>Created at</th>
						<th>Action</th>
					</thead>
					<tbody id="body-inbox">
						<?php foreach ($news as $rows): ?>
							<tr>
								<td><img src="{{ asset('public/upload/news/'.$rows->c_img) }}" width="120px" alt=""></td>
								<td>{{ $rows->c_name }}</td>
								<td>{{ $rows->c_description }}</td>
								<td>{{ $rows->created_at }}</td>
								<td style="font-size: 25px">
									<a href="{{ url('admin/news?act=edit&id='.$rows->pk_news_id) }}"><i class="la la-edit"></i></a>&nbsp;
									<a onclick="return confirm('Are you sure ?')" href="{{ url('admin/news/delete/'.$rows->pk_news_id) }}"><i class="la la-trash" style="color:red;"></i></a>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
				<div class="paginate">
					{{ $news->render() }}
				</div>
				<script>
					jQuery(document).ready(function($) {
						$(".form-check-label input").click(function(event) {
							if ($(this).is(':checked')) {
								$(this).attr('checked', true);
								// $("#inbox-tool").show(1000);
							}else{
								$(this).attr('checked', false);
							}
						});
					});
				</script>
			</div>

		</div>
	</div>
@endsection