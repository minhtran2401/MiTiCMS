@extends('FE.layout')
@section('pagetitle', 'Kiểm Tra Tên Miền ')
@section('jsc')

@endsection
@section('css')

@endsection
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
				<div class="shin-title-page mb-4">
                        <h3>MiTiVPS - Domain - Kiểm tra tên miền</h3>
                    </div>
				<div class="card" style="overflow: hidden">
                    <div class="card-body">
                        <section class="ftco-section">
                            <div class="container">
                                <div class="row d-flex justify-content-center pt-5">
                                    <div class="col-lg-6 col-md-12 text-center heading-white mb-4 mb-sm-4 mb-lg-0 ftco-animate">
                                        <h2 >TÌM KIẾM TÊN MIỀN</h2>
                                        <p>Chọn một tên miền thật đẹp theo ý của bạn</p>
                                    </div>
                                    <div class="col-lg-6 py-lg-12 ftco-wrap ftco-wrap-2 ftco-animate">
                                        <form id="check-domain-form" method="POST" action="{{route('domain.check')}}" class="text-center itemd-flex">
                                            @csrf
                                  <div class="form-group d-flex">
                                    <input name="name-domain" type="text" class="form-control px-4" required placeholder="Tìm tên miền...">
									<input type="submit" class="form-control btn btn-primary text-center" value="Tìm">
                                  </div>
                                </form>
                            <style>
								.shin-domain-break{
									padding: 2px 7px;
									display: inline-block;
									margin: 5px;
									background: #7673F0;
									color: white;
									border-radius: 5px;
								}
								.shin-domain-multi-break{
									padding: 2px 7px;
									display: inline-block;
									margin: 5px;
									border-radius: 5px;
								}
								.shin-domain-type{
									display: inline-block;
									/* padding: 5px; */
									margin: 10px;
								}
								.shin-domain-group{
									display: inline-block;
									/* padding: 4px; */
									margin: 7px;
								}
								</style>
                                <p class="domain-price mt-2">
                                    <span class="shin-domain-break"><sup>.com</sup> $9.75</span> 
                                    <span class="shin-domain-break"><sup>.net</sup> $9.50</span> 
                                    <span class="shin-domain-break"><sup>.biz</sup> $8.95</span> 
                                    <span class="shin-domain-break"><sup>.co</sup> $7.80</span>
                                    <span class="shin-domain-break"><sup>.me</sup> $7.95</span>
                                </p>
                                <div id="mutext" class="mutex mb-2"><p id="alert-domain"></p></div>
                                    </div>
                                </div>
                            </div>
						</section>
                	</div>
				</div>
				<!-- kết thúc phần trên--> 
				<div class="card">
					<div class="card-body">
						<section class="ftco-section">
					<div class="container">
						<div class="dm_khung row justify-content-center">
								<div class="col-lg-12 heading-white mb-4 mb-sm-4 mb-lg-0 ftco-animate text-center">
									<h2>NHANH HƠN VỚI KIỂM TRA MỘT LÚC NHIỀU TÊN MIỀN</h2>
									<p>Nhập tên miền và chọn đuôi miền, hệ thống sẽ tìm cho bạn những tên miền khả dụng.</p>
								</div>

								<!-- start phần chơi--> 
									<div class="col-lg-9 col-md-12 mb-3">
										<div style="border: solid 1px #7673F0; border-radius: 3px 3px 0 0; background: #7673F0; color: white" class="col-lg-12 col-md-12">
											<div class="shin-domain-type">
												<input title="Click chọn hoặc bỏ tất cả domain phổ biến..!" id="phobien" class="phobien" name="phobien" type="checkbox" value="-1" />
												<label for="phobien"> <b>Phổ Biến</b> </label>
											</div>
										</div>
										<div style="border: solid 1px #7673F0; border-radius:0 0 3px 3px; " class="col-lg-12 col-md-12">
											<div class="shin-domain-group">
												<div class="shin-domain-multi-break">
													<input id="com" title=".com" class="pb" name="com" type="checkbox" value=".com" />
													<label for="com">.com</label>
												</div>
												<div class="shin-domain-multi-break">
													<input id="net" title=".net" class="pb" name="net" type="checkbox" value=".net" />
													<label for="net">.net</label>
												</div>
												<div class="shin-domain-multi-break">
													<input id="org" title=".org" class="pb" name="org" type="checkbox" value=".org" />
													<label for="org">.org</label>
												</div>
												<div class="shin-domain-multi-break">
													<input id="vn" title=".vn" class="pb" name="vn" type="checkbox" value=".vn" />
													<label for="vn">.vn</label>
												</div>
												<div class="shin-domain-multi-break">
													<input id="comvn" title=".com.vn" class="pb" name="comvn" type="checkbox" value=".com.vn" />
													<label for="comvn">.com.vn</label>
												</div>
												<div class="shin-domain-multi-break">
													<input id="netvn" title=".net.vn" class="pb" name="netvn" type="checkbox" value=".net.vn" />
													<label for="netvn">.net.vn</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-12 mb-3">
										<div style="border: solid 1px #7673F0; border-radius: 3px 3px 0 0; background: #7673F0; color: white" class="col-lg-12 col-md-12">
											<div class="shin-domain-type">
												<input id="vietnam" title="Click chọn hoặc bỏ tất cả domain Việt Nam..!" class="vietnam" name="vietnam" type="checkbox" value="-2" />
												<label for="vietnam">Việt Nam</label>
											</div>
										</div>
										<div style="border: solid 1px #7673F0; border-radius:0 0 3px 3px; " class="col-lg-12 col-md-12">
											<div class="shin-domain-group">
												<div class="shin-domain-multi-break">
													<input title="ac.vn" class="dvn" name="acvn" type="checkbox" value=".ac.vn"/>
													<label for="acvn">.ac.vn</label>
												</div>
												<div class="shin-domain-multi-break">
													<input title=".edu.vn" class="dvn" name="eduvn" type="checkbox" value=".edu.vn" />
													<label for="eduvn">.edu.vn</label>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-12 mb-3">
										<div style="border: solid 1px #7673F0; border-radius: 3px 3px 0 0; background: #7673F0; color: white" class="col-lg-12 col-md-12">
											<div class="shin-domain-type">
												<input id="quocte" title="Click chọn hoặc bỏ tất cả domain quốc tế..!" class="quocte" name="quocte" type="checkbox" value="-3" />
												<label for="quocte">Quốc tế</label>
											</div>
										</div>
										<div style="border: solid 1px #7673F0; border-radius:0 0 3px 3px; " class="col-lg-12 col-md-12">
											<div class="shin-domain-group">
												<div class="shin-domain-multi-break">
													<input title=".asia" class="qt" name="asia" type="checkbox" value=".asia" />
													<label for="asia">.asia</label>
												</div>
												<div class="shin-domain-multi-break">
													<input title=".jp" class="qt" name="jp" type="checkbox" value=".jp" />
													<label for="jp">.jp</label>
												</div>
											</div>
										</div>
									</div>

								<div class="col-lg-6 col-md-12">
										@csrf
										<div class="form-group d-flex">
											<input type="text" class="dm_domain_text form-control" name="domain" placeholder="Chỉ cần nhập tên và tick chọn đuôi domain, mỗi tên cách nhau bằng dấu phẩy" class="form-control px-4" required>
											<input type="submit" value="Tìm Kiếm" class="dm_khung_nut form-control btn btn-primary text-center">
										</div>
								</div>
								<!-- kết thúc phần chơi--> 

							<table class="table table-striped" border="5" cellpadding="5" cellspacing="5">
								<thead>
									<tr>
									  <th>Tên domain </th>
									  <th>Thông tin</th>
									  <th>Trạng thái</th>
									</tr>
								  </thead>
								  <tbody id="esco_check_domain">
	
								  </tbody>
							</table>
						</div>
					
					</div>
					</section>
					</div>
				</div>
				
				
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Domain Pricing</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="table-responsive">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr>
						        <th>TLD</th>
						        <th>Duration</th>
						        <th>Registration</th>
						        <th>Renewal</th>
						        <th>Transfer</th>
						        <th>Register</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td class="color">.com</td>
						        <td>1 Year</td>
						        <td>$70.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
						        <td><a href="#" class="btn btn-primary">Sign Up</a></td>
						      </tr>
						      <tr>
						        <td class="color">.net</td>
						        <td>1 Year</td>
						        <td>$75.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
						        <td><a href="#" class="btn btn-primary">Sign Up</a></td>
						      </tr>
						      <tr>
						        <td class="color">.org</td>
						        <td>1 Year</td>
						        <td>$65.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
						        <td><a href="#" class="btn btn-primary">Sign Up</a></td>
						      </tr>
						      <tr>
						        <td class="color">.biz</td>
						        <td>1 Year</td>
						        <td>$60.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
						        <td><a href="#" class="btn btn-primary">Sign Up</a></td>
						      </tr>
						      <tr>
						        <td class="color">.info</td>
						        <td>1 Year</td>
						        <td>$50.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
						        <td><a href="#" class="btn btn-primary">Sign Up</a></td>
						      </tr>
						      <tr>
						        <td class="color">.me</td>
						        <td>1 Year</td>
						        <td>$45.00</td>
						        <td>$5.00</td>
						        <td>$5.00</td>
								<td><a href="#" class="btn btn-primary">Sign Up</a></td>
							
						      </tr>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    	</div>
	</section>
	

            </div>
        </div>
    </div>
   
</div>

@endsection
@section('script')

    <script>
// this is the id of the form
$("#check-domain-form").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.
let timerInterval
Swal.fire({
  title: 'Đang kiểm tra',
  html: 'Vui lòng đợi một lát',
  timer: 9000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    // console.log('I was closed by the timer')
  }
})
var form = $(this);
var url = form.attr('action');

$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data)
       {
		$.get('http://api.whoxy.com/?key=779f855599d17c44qd4fb68bb54c6f10e&whois=' + data).then(function (response){
			if(response['status']==0){
				Swal.fire(
						'Tên Miền Sai',
						'Tên miền bạn vừa nhập không chính xác!',
						'error'
						);
			$("#alert-domain").text("Tên miền " + data + " không đúng định dạng, hãy thử lại ✘").css('color', 'red');
			}
			else if(response['domain_registered']=="yes"){
				Swal.fire(
						'Không Thể Mua',
						'Tên miền bạn vừa nhập đã được sử dụng, hãy thử lại tên khác !',
						'warning'
						);
			$("#alert-domain").text("Tên miền " + data + " không khả dụng, hãy thử lại ✘").css('color', 'orange');
			}
			else if(response['domain_registered']=="no"){
				Swal.fire(
						'Có Thể Mua',
						'Tên miền bạn vừa nhập có thể mua , thanh toán ngay !',
						'success'
						);
			$("#alert-domain").text("Bạn có thể mua tên miền " + data +  " ✔" ).css('color', 'green').append( "<a class='btn btn-primary ml-2' href='{{route('view.domain.reg')}}'>Mua ngay</a>");
			}
		});
       }
     });


});    
</script>
<script src="{{asset('assets')}}/js/escovietnam.js"></script>
<script>
//luu y phai chen thu vien jquey moi su dung dc.
var link_whois="{{route('view.domain.reg')}}"; 
var link_dk="{{route('view.domain.reg')}}"; 


// link toi trang whois của bạn hoặc để trống hệ thống lấy trang whois của chúng tôi.
// Luu ý trang whois phải là trang chúng tôi cung cấp whois.html
$(document).ready(function() {
	
	function replace_whois(link_whois){
		if(link_whois!=''){
			$(".esco_doshow").each(function($i){
				var domain_whois=$("#esco_doshow"+$i).attr("val");
				var href_whois=$("#esco_doshow"+$i+" .whoises").attr("href");
				if(href_whois!=''){
					$("#esco_doshow"+$i+" .whoises").attr("href",link_whois+'?domain='+domain_whois);
				}
			});	
		}
	}
	
	function replace_dk(link_dk){
		$(".esco_doshow").each(function($i){
			var domain_gets=$("#esco_doshow"+$i).attr("val");//domain get dc
			var links_dk_domain=link_dk;//links đăng ký domain
			
			$("#esco_doshow"+$i+" .w_dk").attr("href",links_dk_domain);
		});	
	}
	
	$(".phobien,.vietnam,.quocte,.dm_khung_nut,.pb,.dvn,.qt").css("cursor","pointer");//xu ly cac su kien co ban tay khi de chuot vao
	
	$(".dm_khung_nut").mouseover(function(){$(this).addClass("hightlight");});//xu ly doi mau khi de chuot vao nut check
	$(".dm_khung_nut").mouseout(function(){$(this).removeClass("hightlight");});//xu ly doi mau khi bo chuot ra nut check
	
	$("input[class='phobien']").each(function(){this.checked='checked';})//mac dinh check pho bien
	$("input[class='pb']").each(function(){this.checked='checked';})//mac dinh check các .(*) pho bien
	
	//xu ly khi lick vao cac .(*)
	$(".phobien").click(function(){var status=this.checked;
	$("input[class='pb']").each(function(){this.checked=status;})});
	$(".vietnam").click(function(){var status=this.checked;
	$("input[class='dvn']").each(function(){this.checked=status;})});
	$(".quocte").click(function(){var status=this.checked;
	$("input[class='qt']").each(function(){this.checked=status;})});
	
	//xu ly khi enter hoac cach ra thi them ,
	$('.dm_domain_text').keyup(function(e){
		if(e.keyCode==13){var domain = $(this).val()+',';$(this).val(domain.replace(' ', ''))};
		if(e.keyCode==32){var domain = $(this).val()+',';$(this).val(domain.replace(' ', ''))};
	});
	
	
	$(".dm_khung_nut").click(function(){
		var dm_nd=$(".dm_domain_text").attr('value');//domain da nhap
		if(dm_nd=='')
		{
			Swal.fire(
						'Lỗi',
						'Bạn chưa nhập tên miền',
						'error'
						);
		}// kiem tra gia tri da dc nhap chua
		else{
			//xu ly lay mang .(*) da chon
			var listid="";
			$("input[class='pb']").each(function(){if (this.checked) listid = listid+","+this.value;});
			$("input[class='dvn']").each(function(){if (this.checked) listid = listid+","+this.value;});
			$("input[class='qt']").each(function(){if (this.checked) listid = listid+","+this.value;});
			listid=listid.substr(1);var mang_com=listid;var mang_domain=dm_nd;
			$("#esco_check_domain").empty()
			
			//server check
			var host_link='http://escovietnam.vn';
			var esco_xuly=host_link+"/flugins/check_domain/xuly.php?re_arr=?&mang_domain="+mang_domain+"&mang_com="+mang_com;	

			//xu ly ket noi vao server bang getJSON
			$.getJSON(esco_xuly,function(esco_data_xuly){
				$.each(esco_data_xuly, function(num,domain){
					$("#esco_check_domain").append('<tr id="esco_doshow'+num+'" val='+domain+'><td>'+domain+'</td></tr>');// hien loading check khi check
				});
				esco_kq(esco_data_xuly.length);
			});
			
			function esco_kq($esco_length){
				for($i=0 ; $i < $esco_length ; $i++){
					var esco_domain=$('#esco_doshow'+$i).attr("val");
					var esco_kq=host_link+"/flugins/check_domain/get_domain.php?re_kq=?&num="+$i+"&domain="+esco_domain;
					$.getJSON(esco_kq,function(esco_data_kq){
						$.each(esco_data_kq, function(num1,kq){

							$("#esco_doshow"+num1).append('<td>'+kq+'</td><td>Đã kiểm tra xong ✔</td>');// tra ra ket qua khi check xong
						});
						replace_whois(link_whois);
						replace_dk(link_dk);	
					});
				};
			};
		};
	});
});
</script>
<script>
$(document).on('click', '.w_dk', function () {
window.open("{{route('view.domain.reg')}}");
});
	
	</script>
@endsection
