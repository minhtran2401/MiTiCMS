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
				<section class="ftco-section">
					<div class="container">
						<div class="row justify-content-center ">
					  <div class="col-md-12 text-center heading-section ftco-animate">
						<h1 >KIỂM TRA TÊN MIỀN</h1>
					  </div>
					</div>
					
					</div>
				</section>
				
                <section class="ftco-domain">
                    <div class="container">
                        <div class="row d-flex align-items-center pt-5">
                            <div class="col-lg-6 heading-white mb-4 mb-sm-4 mb-lg-0 ftco-animate">
                                <h2>TÌM KIẾM TÊN MIỀN</h2>
                                <p>Chọn một tên miền thật đẹp theo ý của bạn</p>
                            </div>
                            <div class="col-lg-6 py-lg-6 ftco-wrap ftco-wrap-2 ftco-animate">
                                <form id="check-domain-form" method="POST" action="{{route('domain.check')}}" class="domain-form d-flex mb-3">
                                    @csrf
                          <div class="form-group domain-name">
                            <input name="name-domain" type="text" class="form-control name px-4" placeholder="Tìm tên miền...">
                          </div>
                          <div class="form-group domain-select d-flex">
                            <input type="submit" class="search-domain btn btn-primary text-center" value="Tìm">
                            </div>
						</form>
					
                        <p class="domain-price mt-2">
                            <span><small>.com</small> $9.75</span> 
                            <span><small>.net</small> $9.50</span> 
                            <span><small>.biz</small> $8.95</span> 
                            <span><small>.co</small> $7.80</span>
                            <span><small>.me</small> $7.95</span>
						</p>
						<div id="mutext" class="mutex mb-2"><p id="alert-domain"></p></div>
                            </div>
                        </div>
                    </div>
                </section>
				
				<section class="ftco-section">
					<div class="container">
						<div class="dm_khung row">
						
								<div class="col-lg-12 heading-white mb-4 mb-sm-4 mb-lg-0 ftco-animate">
									<h2>NHANH HƠN VỚI KIỂM TRA MỘT LÚC NHIỀU TÊN MIỀN</h2>
									<p>Nhập tên miền và chọn đuôi miền, hệ thống sẽ tìm cho bạn những tên miền khả dụng.</p>
								</div>
							<table class="table" border="2" cellpadding="3" cellspacing="3">
								<tr width="20%">
								<td class="dm_khung_td ">
									<input title="Click chọn hoặc bỏ tất cả domain phổ biến..!" id="phobien" class="phobien" name="phobien" type="checkbox" value="-1" />
									<label for="phobien"> <b>Phổ Biến</b> </label>
								</td>
								<td class="dm_khung_com" width="80%">
									<div style="display: inline-block; margin: 0 5px;">
										<input id="com" title=".com" class="pb" name="com" type="checkbox" value=".com" />
										<label for="com">.com</label>
									</div>
									<div style="display: inline-block; margin: 10px 5px;">
										<input id="net" title=".net" class="pb" name="net" type="checkbox" value=".net" />
										<label for="net">.net</label>
									</div>
									<div style="display: inline-block; margin: 0 5px;">
										<input id="org" title=".org" class="pb" name="org" type="checkbox" value=".org" />
										<label for="org">.org</label>
									</div>
									<div style="display: inline-block; margin: 0 5px;">
										<input id="vn" title=".vn" class="pb" name="vn" type="checkbox" value=".vn" />
										<label for="vn">.vn</label>
									</div>
									<div style="display: inline-block; margin: 0 5px;">
										<input id="comvn" title=".com.vn" class="pb" name="comvn" type="checkbox" value=".com.vn" />
										<label for="comvn">.com.vn</label>
									</div>
									<div style="display: inline-block; margin: 0 5px;">
										<input id="netvn" title=".net.vn" class="pb" name="netvn" type="checkbox" value=".net.vn" />
										<label for="netvn">.net.vn</label>
									</div>
								</td>
							  </tr>
							  <tr>
								<td class="dm_khung_td">
									<input id="vietnam" title="Click chọn hoặc bỏ tất cả domain Việt Nam..!" class="vietnam" name="vietnam" type="checkbox" value="-2" />
									<label for="vietnam">Việt Nam</label>
								</td>
								<td class="dm_khung_com">
									<input title="ac.vn" class="dvn" name="acvn" type="checkbox" value=".ac.vn" />.ac.vn
									<input title=".edu.vn" class="dvn" name="eduvn" type="checkbox" value=".edu.vn" />.edu.vn
									<input title=".info.vn" class="dvn" name="infovn" type="checkbox" value=".info.vn" />.info.vn
									<input title=".org.vn" class="dvn" name="orgvn" type="checkbox" value=".org.vn" />.org.vn
									<input title=".biz.vn" class="dvn" name="bizvn" type="checkbox" value=".biz.vn" />.biz.vn
									<input title=".gov.vn" class="dvn" name="govvn" type="checkbox" value=".gov.vn" />.gov.vn
									<input title=".name.vn" class="dvn" name="namevn" type="checkbox" value=".name.vn" />.name.vn
									<input title=".pro.vn" class="dvn" name="provn" type="checkbox" value=".pro.vn" />.pro.vn
									<input title=".health.vn" class="dvn" name="healthvn" type="checkbox" value=".health.vn" />.health.vn
								</td>
							  </tr>
							  <tr>
								<td class="dm_khung_td">
									<input id="quocte" title="Click chọn hoặc bỏ tất cả domain quốc tế..!" class="quocte" name="quocte" type="checkbox" value="-3" />
									<label for="quocte">Quốc tế</label>
								</td>
								<td class="dm_khung_com">
									<input title=".asia" class="qt" name="asia" type="checkbox" value=".asia" />.asia
									<input title=".biz" class="qt" name="biz" type="checkbox" value=".biz" />.biz
									<input title=".bz" class="qt" name="bz" type="checkbox" value=".bz" />.bz
									<input title=".cc" class="qt" name="cc" type="checkbox" value=".cc" />.cc
									<input title=".co" class="qt" name="co" type="checkbox" value=".co" />.co
									<input title=".co.uk" class="qt" name="couk" type="checkbox" value=".co.uk" />.co.uk
									<input title=".com.co" class="qt" name="comco" type="checkbox" value=".com.co" />.com.co
									<input title=".com.tw" class="qt" name="comtw" type="checkbox" value=".com.tw" />.com.tw
									<input title=".de" class="qt" name="de" type="checkbox" value=".de" />.de
									<input title=".eu" class="qt" name="eu" type="checkbox" value=".eu" />.eu
									<input title=".in" class="qt" name="in" type="checkbox" value=".in" />.in
									<input title=".info" class="qt" name="info" type="checkbox" value=".info" />.info
									<input title=".jp" class="qt" name="jp" type="checkbox" value=".jp" />.jp
									<input title=".me" class="qt" name="me" type="checkbox" value=".me" />.me
									<input title=".mobi" class="qt" name="mobi" type="checkbox" value=".mobi" />.mobi
									<input title=".name" class="qt" name="name" type="checkbox" value=".name" />.name
									<input title=".net.co" class="qt" name="netco" type="checkbox" value=".net.co" />.net.co
									<input title=".net.tw" class="qt" name="nettw" type="checkbox" value=".net.tw" />.net.tw
									<input title=".nom.co" class="qt" name="nomco" type="checkbox" value=".nom.co" />.nom.co
									<input title=".org.tw" class="qt" name="orgtw" type="checkbox" value=".org.tw" />.org.tw
									<input title=".pro" class="qt" name="pro" type="checkbox" value=".pro" />.pro
									<input title=".tel" class="qt" name="tel" type="checkbox" value=".tel" />.tel
									<input title=".tv" class="qt" name="tv" type="checkbox" value=".tv" />.tv
									<input title=".tw" class="qt" name="tw" type="checkbox" value=".tw" />.tw
									<input title=".us" class="qt" name="us" type="checkbox" value=".us" />.us
									<input title=".ws" class="qt" name="ws" type="checkbox" value=".ws" />.ws
									<input title=".xxx" class="qt" name="xxx" type="checkbox" value=".xxx" />.xxx
								</td>
							  </tr>
							  <tr>
								<td class="dm_khung_td">	
								<input type="submit" class="dm_khung_nut btn btn-primary" value="Tìm Kiếm">
								</td>
								<td class="dm_khung_com">
									<input type="text" class="dm_domain_text form-control" name="domain" placeholder="Domain cách nhau bằng dấu phẩy(,) nếu bạn nhập domain có domain.(*) thì hệ thống chỉ check domain.(*) đó, nếu domain không .(*) thì hệ thống check theo .(*) bạn chọn phía trên."></textarea>
								</td>
							  </tr>
							</table>
							<table class="table table-striped" border="1" cellpadding="5" cellspacing="5">
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
			$("#alert-domain").text("Bạn có thể mua tên miền " + data +  " ✔").css('color', 'green');
			}
		});
       }
     });


});    
</script>
<script src="{{asset('assets')}}/js/escovietnam.js"></script>

<script>
//luu y phai chen thu vien jquey moi su dung dc.
var link_whois="{{route('index')}}"; 
var link_dk="{{route('index')}}"; 

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
			var links_dk_domain=link_dk+"?domain="+domain_gets;//links đăng ký domain
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
@endsection
