
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script src="https://code.highcharts.com/themes/dark-unica.js"></script> --}} 
    {{-- <script src="https://code.highcharts.com/themes/sand-signika.js"></script> --}}
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/themes/grid-light.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }   
        })
    </script>
    <script>
        $(document).ready(function () {
          $("#addPrice").click(function(){
              $("#insert").append('<div class="row"><small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê - Gói mới</small>' +
                ' <a href="javascript:void(0)" class="del_img btn btn-danger btn-circle icon_del mb-3"><i class="glyphicon glyphicon-remove">Xóa</i></a>'+
                '<div class="col-md"><div class="form-group">'+
                   '<input type="text" class="form-control " name="price[]" placeholder = "giá tiền" ></div></div>'+   
                   '<div class="col-md"><div class="form-group"><div class="input-group">'+
                   '<input type="text" class="form-control" name="time[]" placeholder="thời hạn"></div></div></div>'+                             
                '</div>');

              });
      });
      </script>

<script>
    $(document).ready(function(){
        $("[name='getgroup']").change(function(){ 
             var id_nhomsp= $(this).val();
             var diachi= "{{route('get_type_pro',"")}}/"+id_nhomsp;
                        $("[name='gettype']").load(diachi);
  
        });
    });
  </script>

<script>
    $(document).ready(function() {
  
      $(".del_price").on('click',function() {
        
          var url = "{{route('delPrice')}}";
          var id = $(this).parent().data('id');
          $.ajax({
              url: url ,
              type: 'POST',
            cache: false,
              data: {
                "_token": "{{ csrf_token() }}",
                      id:id,
                  },
              success: function (data) {
                 
                  if (data) {
                      $('#row-price-'+id).remove()
                      Swal.fire(
                        'Thành công',
                        'Đã xóa giá vừa chọn',
                        'success'
                        )
                                
                  } else {
                    Swal.fire(
                        'Thất bại',
                        'Đã có lỗi xảy ra',
                        'error'
                        )
                  }	
                  
              }
          });
      });
  });
  </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
        <script>
            $(document).ready(function() {
      $('.summernote').summernote();
    });
        </script>

<script>
    
  
    
    $('#changetheme').change(function(e){
        // ngăn sự kiện change-status này khi click sẽ lan ra các sự kiện khác
        //thường áp dụng cho các button form hoặc thẻ link ( tag a )
          e.preventDefault();

          //lấy id nhóm sản phẩm từ thẻ td ( data-id )
          var id=$(this).parent().parent().data('id');

        
        var status=$(this).prop('checked')?1:0;
   
          //tạo biến global cho element đang click
          var change=$(this)
          var content=$(this).parent().find('.content-status')
          //nếu có id thì mới gửi ajax
          if(id){
              $.ajax({
                  //tên route có url là ....
                  url:"{{ route('change_theme') }}",
                  // kiểu method nên là post
                  type:"post",

                  //truyền biến id bà status
                  data:{
                      id:id,
                      status:status,
                      "_token": "{{ csrf_token() }}",
                    
                    }

                  //nếu gửi thành công
              }).done(function(result){
                //nếu k nhận dc id
                  if(result=='error'){
                      alert("Không nhận được id.");
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                      return;
                  }
                 
                  if(result==1){
                      change.prop('checked','checked')
                      Swal.fire(
                        'Thành công',
                        'Đã kích hoạt giao diện sáng',
                        'success'
                      )
                      return;
                  }  
                      change.prop('checked','')
                   
                      Swal.fire(
                      'Thành công!',
                      'Đã kích hoạt giao diện tối',
                      'success'
                    )
                    //nếu gửi thất bại
              }).fail(function(){
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                  alert("Xảy ra lỗi từ phía server.");
              })
          }
      })
   
</script>
<!-- Dong Ho !-->
<script>
  /**
* Get the current time
*/
function getNow() {
  var now = new Date();

  return {
      hours: now.getHours() + now.getMinutes() / 60,
      minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
      seconds: now.getSeconds() * 12 / 60
  };
}

/**
* Pad numbers
*/
function pad(number, length) {
  // Create an array of the remaining length + 1 and join it with 0's
  return new Array((length || 2) + 1 - String(number).length).join(0) + number;
}

var now = getNow();

// Create the chart
Highcharts.chart('clock-chart', {

  chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false,
      height: '80%'
  },

  credits: {
      enabled: false
  },

  title: {
      text: 'Giờ hiện tại'
  },

  pane: {
      background: [{
          // default background
      }, {
          // reflex for supported browsers
          backgroundColor: Highcharts.svg ? {
              radialGradient: {
                  cx: 0.5,
                  cy: -0.4,
                  r: 1.9
              },
              stops: [
                  [0.5, 'rgba(255, 255, 255, 0.2)'],
                  [0.5, 'rgba(200, 200, 200, 0.2)']
              ]
          } : null
      }]
  },

  yAxis: {
      labels: {
          distance: -20
      },
      min: 0,
      max: 12,
      lineWidth: 0,
      showFirstLabel: false,

      minorTickInterval: 'auto',
      minorTickWidth: 1,
      minorTickLength: 5,
      minorTickPosition: 'inside',
      minorGridLineWidth: 0,
      minorTickColor: '#666',

      tickInterval: 1,
      tickWidth: 2,
      tickPosition: 'inside',
      tickLength: 10,
      tickColor: '#666',
      title: {
          text: 'Powered by<br/>Highcharts',
          style: {
              color: '#BBB',
              fontWeight: 'normal',
              fontSize: '8px',
              lineHeight: '10px'
          },
          y: 10
      }
  },

  tooltip: {
      formatter: function () {
          return this.series.chart.tooltipText;
      }
  },

  series: [{
      data: [{
          id: 'hour',
          y: now.hours,
          dial: {
              radius: '60%',
              baseWidth: 4,
              baseLength: '95%',
              rearLength: 0
          }
      }, {
          id: 'minute',
          y: now.minutes,
          dial: {
              baseLength: '95%',
              rearLength: 0
          }
      }, {
          id: 'second',
          y: now.seconds,
          dial: {
              radius: '100%',
              baseWidth: 1,
              rearLength: '20%'
          }
      }],
      animation: false,
      dataLabels: {
          enabled: false
      }
  }]
},

// Move
function (chart) {
  setInterval(function () {

      now = getNow();

      if (chart.axes) { // not destroyed
          var hour = chart.get('hour'),
              minute = chart.get('minute'),
              second = chart.get('second'),
              // run animation unless we're wrapping around from 59 to 0
              animation = now.seconds === 0 ?
                  false : {
                      easing: 'easeOutBounce'
                  };

          // Cache the tooltip text
          chart.tooltipText =
                  pad(Math.floor(now.hours), 2) + ':' +
                  pad(Math.floor(now.minutes * 5), 2) + ':' +
                  pad(now.seconds * 5, 2);


          hour.update(now.hours, true, animation);
          minute.update(now.minutes, true, animation);
          second.update(now.seconds, true, animation);
      }

  }, 1000);

});

/**
* Easing function from https://github.com/danro/easing-js/blob/master/easing.js
*/
Math.easeOutBounce = function (pos) {
  if ((pos) < (1 / 2.75)) {
      return (7.5625 * pos * pos);
  }
  if (pos < (2 / 2.75)) {
      return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
  }
  if (pos < (2.5 / 2.75)) {
      return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
  }
  return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
};
</script>
<script>
    var API_URL = "{{ route('api.index') }}";
    $.get(API_URL + '/thong-ke-truy-cap').then(function (response){
        // alert(response);
    });
  </script> 
<script>
$.get(API_URL + '/khach-hang-tiem-nang').then(function (response){
Highcharts.chart('khachhangtiemnang', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Top 10 khách hàng tiềm năng'
    },
 
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Đơn hàng'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y} đơn'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} đơn</b> trong tổng số<br/>'
    },

    series: [
        {
            name: "Khách hàng",
            colorByPoint: true,
            data: response
        }
    ],
});
});
</script>

<script>
    $.get(API_URL + '/san-pham-ban-chay').then(function (response){
    Highcharts.chart('thongkedichvu', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top 10 dịch vụ bán chạy'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Dịch vụ',
        colorByPoint: true,
        data: response
    }]
});
});

</script>