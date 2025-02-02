<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="{{asset('image')}}/logo-timi.png" alt="Timihost"></th>
        <th style="text-align:right;font-weight:400;">{{$now}}</th>
      </tr>
    </thead>
    <tbody>
    
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Trạng thái đơn hàng : </span><b style="color:green;font-weight:normal;margin:0">Chờ xác nhận</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Mã đơn hàng : </span> #timi{{$id_invoice}}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Số tiền : </span> {{Session('Cart')->products['price']}}</p>
        </td>
      </tr>
     
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Tên : </span> {{Auth::user()->name}}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email : </span> {{Auth::user()->email}}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phương thức thanh toán  : </span> 
                           
                            {{$invoice_payment}}
          </p>   
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Hạn chót thanh toán : </span> {{$now}} <b>đến</b> {{$times}} (3 Ngày)</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Dịch vụ</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            
              <span style="display:block;font-size:13px;font-weight:normal;">{{Session('Cart')->products['product']}}</span> 
          
            <span> <b style="font-size:12px;font-weight:300;">Thời gian :</b> {{Session('Cart')->products['time']}} </span>
            <span><b style="font-size:12px;font-weight:300;">Giá tiền : </b> {{Session('Cart')->products['price']}} </span>

          </p>
         
        </td>

      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Hướng dẫn thanh toán :</td>
      
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">{!! $how_to_pay !!}</td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">TIMIHOST</strong> <br>
          <b>SĐT:</b> 0836080801<br>
          <b>Email:</b> contact@timihost.com
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>