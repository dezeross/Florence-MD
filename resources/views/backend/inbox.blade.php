@extends("backend.layout")
@section("controller")

<?php 
	$reply = Request::get("reply")!=null?Request::get("reply"):"";
	$id = Request::get("id")!=null?Request::get("id"):0;
	if ($id!=0) {
		$m = DB::table("inbox")->where("pk_inbox_id","=",$id)->first();
	}
 ?>
@if($reply=="do")
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
        <h4 class="modal-title">Reply customer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-2"></div>
        	<div class="col-sm-8">
        		<h5>Message</h5>
        		<p>Name :{{ $m->c_name }}</p>
        		<p>Email :{{ $m->c_email }}</p>
        		<p>Phone :{{ $m->c_phone }}</p>
        		<p><i>{{ $m->created_at }}</i></p>
        		<p><i>{{ $m->c_message }}</i></p>
        	</div>
        	<div class="col-sm-2"></div>
        </div> 
        <form action="{{ url('admin/inbox/send-mail') }}" method="post" >
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label for="">Title</label></div>
        			<div class="col-md-8">
        				<input type="text" name="title" placeholder="Title" class="form-control">
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label for="">To </label></div>
        			<div class="col-md-2"><input type="text" name="pk_inbox_id" value="{{ $m->pk_inbox_id }}" readonly="" style="display: none;"></div>
        			<div class="col-md-2"><input type="text" name="customer_name" value="{{ $m->c_name }}" class="form-control" readonly=""></div>
        			<div class="col-md-3">
        				<input type="text" name="customer_email" value="{{ $m->c_email }}" readonly="" class="form-control">
        			</div>
        			<div class="col-md-3">
        				<input type="text" name="customer_phone" value="{{ $m->c_phone }}" readonly="" class="form-control">
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label for="">Message</label></div>
        			<div class="col-md-8">
        				<textarea name="message">
        					
        				</textarea>
        				<script>
        					CKEDITOR.replace("message");
        				</script>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button class="btn btn-danger" type="submit">Send</button>
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
	$act = Request::get("act")!=null?Request::get("act"):"";
 ?>
@if($act=="did")
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert"><i class="la la-remove"></i></button>
    <strong><i class="la la-chevron-down" style="font-size: 25px"></i>&nbsp;Success!</strong> Đã gửi email thành công !...
 </div>
@endif


	<h4>Inbox</h4>
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
			<div class="card-sub">
				
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th>Name</th>
						<th>Time</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody id="body-inbox">
						<?php foreach ($inbox as $i): ?>
						<tr @if($i->status==0) style="background: #f7f1e3" @endif >
							<td><p style="font-weight: bolder;">{{ $i->c_name }}</p> <i>{{ substr($i->c_message,0,50) }}...</i></td>
							<td>{{ $i->created_at }}</td>
							<td>{{ $i->c_email }}</td>
							<td>{{ $i->c_phone }}</td>
							<td id="status-inbox">
								
								<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value="" @if($i->status==1) checked @endif >
								<span class="form-check-sign" ></span>
								</label></td>
							<td style="padding: 5px 0;">
								<a href="{{ url('admin/inbox/?reply=do&id='.$i->pk_inbox_id) }}"><i class="la la-weixin btn-info" style="font-size: 25px"></i></a>
							&nbsp;
								<a href="{{ url('admin/inbox/delete-inbox/'.$i->pk_inbox_id) }}"><i class="la la-trash btn-danger" style="font-size: 25px" onclick="return confirm('Are you sure delete letter?')"></i></a>
							</td>
						
						</tr>
						<?php endforeach ?>

					</tbody>
				</table>
				<div class="paginate">
					{{ $inbox->render() }}
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