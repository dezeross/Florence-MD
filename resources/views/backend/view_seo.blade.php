@extends('backend.layout')
@section('controller')
<?php $act = Request::get("act");
		$id = Request::get("id");
		$m = DB::table("tbl_meta")->where("pk_meta_id","=",$id)->first();
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
        <h4 class="modal-title">META</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" >
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label for="">Name</label></div>
        			<div class="col-md-8">
        				<input type="text" name="c_name" placeholder="Name" class="form-control" @if($act=="edit") value="{{ $m->c_name }}" @endif required="">
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label for="">Content</label></div>
        			<div class="col-md-8">
        				<textarea name="c_content" style="width: 100%" rows="10" required="" >
        					@if($act=="edit") {{ $m->c_name }} @endif
        				</textarea>
        			</div>
        		</div>
        	</div>
    
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button class="btn btn-success" type="submit">Send</button>
        				<button class="btn btn-danger" type="reset	">Reset</button>
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
<h3>HEAD</h3>
<div class="row" style="margin-bottom: 100px">
	<div class="col-md-2">Title :</div>
	<div class="col-md-6"><input type="text" id="title" value="{{ $title->c_content }}" class="form-control" placeholder="title for your website"></div>
	<div class="col-md-4"><button class="btn btn-danger" id="save">Save</button></div>
	<script type="text/javascript">
		var base_url = $("#url").attr("href");
		$("#save").click(function(event) {
		var title = $("#title").val();
			$.ajax({
				url: base_url+'/seo/'+title,
				type: 'get',
				dataType: 'html',
				data: {"title": title},
				success:function(data){
					$("#title").attr('value', data);;
					alert("Save : " +data);
				}
			})
			
		});
	</script>
</div>
<button class="btn btn-warning"><a href="{{ url('/admin/seo?act=add') }}">ADD</a></button>
<table class="table table-hover" style="background: #fff">
	<thead>
		<th>Name</th>
		<th>Content</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach ($meta as $rows): ?>
		<tr>
			<td>{{ $rows->c_name }}</td>
			<td>{{ $rows->c_content }}</td>
			<td>
				<a href="{{ url('/admin/seo?act=edit&id='.$rows->pk_meta_id) }}">Edit</a>&nbsp;<a href="{{ url('/admin/seo/delete/'.$rows->pk_meta_id) }}" onclick="return confirm('Are you sure ?')">Delete</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<h4 style="text-align: center;">Google-Meta</h4>
<div style="padding: 5px">
	Thẻ meta là một cách tuyệt vời dành cho nhà quản trị trang web để cung cấp cho công cụ tìm kiếm thông tin về trang web của họ. Thẻ meta có thể được sử dụng để cung cấp thông tin cho tất cả các loại ứng dụng và mỗi hệ thống chỉ xử lý những thẻ meta mà hệ thống hiểu được và bỏ qua những thẻ còn lại. Thẻ meta được thêm vào phần <head> trên trang HTML của bạn và thường trông giống như sau:
	<pre>
		<?php echo htmlspecialchars("
			<html>
				 <head>
				   <meta charset='utf-8'>
				    <meta name='Description' CONTENT='Tác giả: A.N. Author, Người minh họa: P. Picture, Danh mục: Sách, Giá:  £9,24, Số trang: 784 trang'>
				    <meta name='google-site-verification' content='+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34='/>
				    <title>Sách mẫu - sách cũ chất lượng cao dành cho trẻ em</title>
				    <meta name='robots' content='noindex,nofollow'>"); ?>
	</pre>

Google hiểu các thẻ meta sau (và các mục liên quan):
<table class="nice-table table">
  <tbody>
    <tr >
      <td style="width: 40%"><code>&lt;meta name="description" content="Mô tả về trang" /&gt;</code></td>
      <td>Thẻ này cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm. <a href="/webmasters/answer/35264">Thông tin khác</a></td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;title&gt;Tiêu đề trang&lt;/title&gt;</code></td>
      <td>Mặc dù về mặt kỹ thuật đây không phải là thẻ meta nhưng thẻ này thường được sử dụng cùng với thẻ meta "description". Nội dung của thẻ này thường được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm (và cả trong trình duyệt của người dùng). <a href="/webmasters/answer/35264">Thông tin khác</a></td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;meta name="robots" content="..., ..." /&gt;<br>
      &lt;meta name="googlebot" content="..., ..." /&gt;</code></td>
      <td>Các thẻ meta này có thể kiểm soát hành vi của công cụ tìm kiếm khi thu thập dữ liệu và lập chỉ mục. Thẻ meta <strong>robots</strong> áp dụng với tất cả công cụ tìm kiếm, trong khi thẻ meta "googlebot" chỉ dành cho Google. Các giá trị mặc định là "lập chỉ mục, theo dõi" (tương tự "tất cả") và không cần phải được chỉ định. Chúng tôi hiểu các giá trị sau (khi chỉ định nhiều giá trị, ngăn cách chúng bằng dấu phẩy):
      <ul>
        <li><a href="/webmasters/answer/61050">noindex</a>: Ngăn không cho lập chỉ mục một trang.</li>
        <li><a href="/webmasters/answer/96569">nofollow</a>: Ngăn không cho Googlebot theo dõi các liên kết từ trang này.</li>
        <li><a href="/webmasters/answer/35624#nosnippet">nosnippet</a>: Ngăn không cho hiển thị một đoạn trích hay xem trước video trong kết quả tìm kiếm. Đối với video, một hình ảnh tĩnh sẽ được hiển thị để thay thế, nếu có thể.</li>
        <li>noarchive: Ngăn không cho Google hiển thị liên kết được đã lưu trong <strong>Bộ nhớ cache</strong> của một trang.</li>
        <li>unavailable_after:[date]: Cho phép bạn chỉ định thời gian và ngày chính xác mà bạn muốn dừng thu thập dữ liệu và lập chỉ mục trang này</li>
        <li><a href="/webmasters/answer/61050">noimageindex</a>: Cho phép bạn chỉ định rằng bạn không muốn trang của bạn xuất hiện dưới dạng một trang tham khảo cho hình ảnh xuất hiện ở kết quả tìm kiếm của Google.</li>
        <li>none: Tương đương với <code>noindex, nofollow</code>.</li>
      </ul>

      <p>Hiện bạn có thể xác định thông tin nào trong phần tiêu đề của trang của bạn bằng cách sử dụng lệnh "X-Robots-Tag" trong tiêu đề HTTP. Điều này đặc biệt hữu ích nếu bạn muốn hạn chế việc lập chỉ mục với các tệp không phải HTML như tệp đồ họa hoặc các loại tài liệu khác. <a href="http://code.google.com/web/controlcrawlindex/docs/robots_meta_tag.html" target="_blank">Thêm thông tin về thẻ meta robots.</a></p>
      </td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;meta name="google" content="nositelinkssearchbox" /&gt;</code></td>
      <td>Khi người dùng tìm kiếm trang web của bạn, kết quả trên Google Tìm kiếm đôi khi hiển thị một hộp tìm kiếm riêng cho trang web của bạn, cùng với các liên kết trực tiếp khác đến trang web của bạn. Thẻ meta này cho Google biết không được hiển thị hộp tìm kiếm liên kết trang web. Tìm hiểu thêm về <a href="https://developers.google.com/webmasters/richsnippets/sitelinkssearch">hộp tìm kiếm liên kết trang web</a>.</td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;meta name="google" content="notranslate" /&gt;</code></td>
      <td>Khi chúng tôi nhận ra nội dung của một trang không phải ngôn ngữ mà người dùng có thể muốn đọc, chúng tôi thường cung cấp một liên kết đến bản dịch trong kết quả tìm kiếm. Nói chung, việc này đem đến cho bạn cơ hội để cung cấp nội dung hấp dẫn và độc nhất của bạn tới một nhóm người dùng lớn hơn rất nhiều. Tuy nhiên, có thể có những trường hợp mà việc này không được mong muốn. Thẻ meta này cho Google biết rằng bạn không muốn chúng tôi cung cấp bản dịch cho trang này.</td>
    </tr>
    <tr >
      <td style="width: 40%"><code>&lt;meta name="google-site-verification" content="..." /&gt;</code></td>
      <td>Bạn có thể sử dụng thẻ này trên trang cấp cao nhất của trang web của bạn để xác minh quyền sở hữu cho Search Console. Xin lưu ý rằng mặc dù các giá trị của thuộc tính "name" và "content" cần khớp chính xác với những gì được cung cấp tới bạn (bao gồm chữ hoa và chữ thường), không quan trọng nếu bạn thay đổi thẻ từ XHTML sang HTML hoặc nếu định dạng của thẻ khớp với định dạng trang của bạn. <a href="/webmasters/answer/35659">Thông tin khác</a></td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;meta http-equiv="Content-Type" content="...; charset=..." /&gt;</code><br>
      <code>&lt;meta charset="..." &gt;</code></td>
      <td>Thẻ này xác định loại nội dung và bộ ký tự của trang. Đảm bảo rằng bạn đưa giá trị của thuộc tính nội dung vào trong ngoặc kép - nếu không thuộc tính bộ ký tự có thể bị thông dịch sai. Chúng tôi khuyên bạn nên sử dụng Unicode/UTF-8 khi có thể. <a href="http://code.google.com/webstats/2005-12/metadata.html">Thông tin khác</a></td>
    </tr>
    <tr>
      <td style="width: 40%"><code>&lt;meta http-equiv="refresh" content="...;url=..." /&gt;</code></td>
      <td>Thẻ meta này đưa người dùng tới URL mới sau một khoảng thời gian nhất định và thỉnh thoảng được dùng như một biểu mẫu chuyển hướng đơn giản. Tuy nhiên, nó không được hỗ trợ bởi tất cả trình duyệt và có thể gây khó khăn cho người dùng. Trang web W3C <a href="http://www.w3.org/TR/WCAG10-HTML-TECHS/#meta-element">khuyên rằng không nên sử dụng thẻ này</a>. Chúng tôi khuyên bạn sử dụng chuyển hướng 301 phụ của máy chủ thay thế.</td>
    </tr>
  </tbody>
</table>
<p style="padding: 10px">Các điểm khác cần lưu ý:

Google có thể đọc cả thẻ meta dạng HTML và XHTML, cho dù trang sử dụng mã nào.
Ngoại trừ thẻ verify, chữ hoa thường không quan trọng trong thẻ meta.</p>
<p>
Đây không phải là danh sách duy nhất của các thẻ meta hiện có và bạn nên thoải mái sử dụng các thẻ meta chưa được liệt kê nếu chúng quan trọng với trang web của bạn. Chỉ cần nhớ rằng Google sẽ bỏ qua thẻ meta mà nó không biết.</p>
</div>
@endsection