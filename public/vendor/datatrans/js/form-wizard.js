/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var temp = [];
$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: 'Select value',
      dropdownParent: $this.parent()
    });
  });

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          service_name: {
            required: true
          },
          masseuse_name: {
            required: true
          },
          select_date: {
            required: true
          },
          timezone_name: {
            required: true
          },
          datatrans_day: {
            required: true
          },
          datatrans_hour: {
            required: true
          },
          client_name: {
            required: true
          },
          phone_num: {
            required: true
          },
          client_email: {
            required: true,
            email: true
          },
          // comment: {
          //   required: true
          // },
          payment_method_datatrans: {
            required: true,
          }
        }
      });
    });

    $(horizontalWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });
    // var checkings = checkvalue.split(',');
    // console.log('checkvalues', checkvalues);
    var calendar_events_times = calendar_events.split('.');

    $(horizontalWizard)
      .find('.btn-next-serivce-select')
      .each(function () {
        $(this).on('click', function (e) {

          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {

            var select_date_val = $('#select_date').val();
            // console.log('select_date_val', select_date_val);
            var select_date = new Date(select_date_val);
            var initial_start_day = select_date.getTime();
            var temp_service_name = $('#service_name').val();
            var temp_category_name = $('#category_name').val();
            var temp_service_price = $('.service_name_option:selected').data('price');

            $('.service__name').text(temp_service_name);
            $('.service__price').text(temp_service_price);

            if (temp_service_price == 0.00) {
              $('.content-header-explain-text').css('display', 'none');
            }
            var start_day = initial_start_day;

            var employeename = $('#employee').val();

            var temp_service_duration = $('.service_name_option:selected').data('duration') * 1000;
            var defference_time = Number(temp_service_duration);
            var temp_sun = $('.service_name_option:selected').data('sun') != 1 ? 'Sun,' : '';
            var temp_mon = $('.service_name_option:selected').data('mon') != 1 ? 'Mon,' : '';
            var temp_tue = $('.service_name_option:selected').data('tue') != 1 ? 'Tue,' : '';
            var temp_wed = $('.service_name_option:selected').data('wed') != 1 ? 'Wed,' : '';
            var temp_thu = $('.service_name_option:selected').data('thu') != 1 ? 'Thu,' : '';
            var temp_fri = $('.service_name_option:selected').data('fri') != 1 ? 'Fri,' : '';
            var temp_sat = $('.service_name_option:selected').data('sat') != 1 ? 'Sat' : '';
            var temp_week_sums = temp_sun + temp_mon + temp_tue + temp_wed + temp_thu + temp_fri + temp_sat;
            var week_sums = temp_week_sums.split(',');
            var service_id = $('.service_name_option:selected').data('id');
            
            // console.log('service------------------->id', service_id);
            var week_data_get = '/datatrans-service-select-get/' + service_id;
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: week_data_get,
              success: function(data) {
                  if(data){
                    // Page Calendar-------------------------------------
                    var time, header, body, i;

                    var stag = '<div class="datatrans-column">',
                      etag = '</div>',
                      page = $('#datatrans_time_screen');

                      // console.log(data);
                      var mondays = data.mondays;
                      var tuesdays = data.tuesdays;
                      var wednesdays = data.wednesdays;
                      var thursdays = data.thursdays;
                      var fridays = data.fridays;
                      var saturdays = data.saturdays;
                      var sundays = data.sundays;
                      for (var day = start_day; day <= (start_day + 365 * 86400000); day += 86400000) {

                        var header = '<button class="datatrans-day" type="button" name="datatrans_day" data-week="' + Dateweeks(day) + '" value="' + Dateyears(day) + '">' + Datedays(day) + '</button>';
          
                        for (var k = 0; k < (week_sums.length); k++) {
          
                          if (Dateweeks(day) == week_sums[k]) {
                            header = '#';
                          }
                        }
                        if (header != '#') {
                          temp.push(header);
                        }
                        if(Dateweeks(day) == 'Mon'){
                          DisplayData(mondays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Tue'){
                          DisplayData(tuesdays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Wed'){
                          DisplayData(wednesdays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Thu'){
                          DisplayData(thursdays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Fri'){
                          DisplayData(fridays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Sat'){
                          DisplayData(saturdays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        if(Dateweeks(day) == 'Sun'){
                          DisplayData(sundays, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time);
                        }
                        
                      }

                      var test = '';
                      for (i = 0; i < temp.length; i++) {
                        if (i % 10 == 0) {
                          test = test + stag;
                        }
                        test = test + temp[i];
          
          
                        if (i % 10 == 9 && i > 1 || i == temp.length - 1) {
                          test = test + etag;
                        }
                      }
          
                      page.html(test)

                      
                      numberedStepper.next()

                      // End Page Calendar-------------------------------------

                      // Pagenation
                      // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

                      var items = $(".datatrans-time-screen .datatrans-column");
                      var numItems = items.length;
                      var perPage = 8;

                      items.slice(perPage).hide();
                      $('#pagination-container').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: "<",
                        nextText: ">",

                        onPageClick: function (pageNumber) {
                          var showFrom = perPage * (pageNumber - 1);
                          var showTo = showFrom + perPage;
                          items.hide().slice(showFrom, showTo).show();
                        }
                      });
                  }
                  else{
                      console.log('error');
                  }
              }
            })
            
            // var temp_start_time = '06:00:00';
            // var temp_end_time = '09:00:00';
            // var temp_start_time = $('.service_name_option:selected').data('start_time');
            // var temp_start_time_get = temp_start_time.split(':');

            // var mile_start_time = (Number(temp_start_time_get[0]) * 3600 + Number(temp_start_time_get[1]) * 60 + Number(temp_start_time_get[2])) * 1000;

            // // var temp_end_time = $('.service_name_option:selected').data('end_time');
            // var temp_end_time_get = temp_end_time.split(':');
            // var mile_end_time = (Number(temp_end_time_get[0]) * 3600 + Number(temp_end_time_get[1]) * 60 + Number(temp_end_time_get[2])) * 1000;


            // var start_time = mile_start_time;
            // var end_time = mile_end_time;
            
            // numberedStepper.next()

            // // Page Calendar-------------------------------------
            // var temp = [], time, header, body, i;

            // var stag = '<div class="datatrans-column">',
            //   etag = '</div>',
            //   page = $('#datatrans_time_screen');

            //   for (var day = start_day; day <= (start_day + 86400000 * 365); day += 86400000) {

            //     var header = '<button class="datatrans-day" type="button" name="datatrans_day" data-week="' + Dateweeks(day) + '" value="' + Dateyears(day) + '">' + Datedays(day) + '</button>';
  
            //     for (var k = 0; k < (week_sums.length); k++) {
  
            //       if (Dateweeks(day) == week_sums[k]) {
            //         header = '#';
            //       }
            //     }
            //     if (header != '#') {
            //       temp.push(header);
            //     }
  
            //     for (time = start_time; time <= end_time; time += defference_time) {
            //       body = '<button class="datatrans-hour btn-next-hour "  type="button" name="datatrans_hour" value="' + Datehours(time) + '" data-time="' + Datehours(time) + '" data-day="' + Dateyears(day) + '" data-week="' + Dateweeks(day) + '" ><span class="ladda-label datatrans-time-main"><i class="datatrans-hour-icon"><span></span></i><span>' + Datehours(time) + '</span></span></button>';
  
            //       for (var j = 0; j < (calendar_events_times.length - 1); j++) {
            //         var calendar_events_time = calendar_events_times[j].replaceAll('"', '').split(',');
            //         var views_time = day + time;
            //         var event_start_time = calendar_events_time[0] * 1000 - defference_time;
            //         var event_end_time = calendar_events_time[1] * 1000;
  
            //         if (event_start_time < views_time && views_time < event_end_time) {
            //           body = '#';
            //         }
            //       }
            //       var orderchecking = '"' + temp_service_name + ':' + Dateyears(day) + ':' + Datehours(time) + ':00' + '"';
  
            //       var employeechecking = '"' + temp_service_name + ':' + employeename + ':' + Dateyears(day) + ':' + Datehours(time) + ':00' + '"';
  
            //       for (var index = 0; index < (emorders.length - 1); index++) {
  
            //         if (employeechecking == emorders[index]) {
            //           body = '#';
            //         }
            //       }
  
            //       for (var j = 0; j < (checkvalues.length - 1); j++) {
            //         var ordertime = checkvalues[j];
  
            //         if (ordertime == orderchecking) {
            //           body = '#';
            //         }
            //       }
  
            //       for (var k = 0; k < (week_sums.length); k++) {
  
            //         if (Dateweeks(day) == week_sums[k]) {
            //           body = '#';
            //         }
            //       }
            //       if (body != '#') {
            //         temp.push(body);
            //       }
  
            //     }
            //   }

            // var test = '';
            // for (i = 0; i < temp.length; i++) {
            //   if (i % 10 == 0) {
            //     test = test + stag;
            //   }
            //   test = test + temp[i];


            //   if (i % 10 == 9 && i > 1 || i == temp.length - 1) {
            //     test = test + etag;
            //   }
            // }

            // page.html(test)

            // // End Page Calendar-------------------------------------

            // // Pagenation
            // // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

            // var items = $(".datatrans-time-screen .datatrans-column");
            // var numItems = items.length;
            // var perPage = 8;

            // items.slice(perPage).hide();
            // $('#pagination-container').pagination({
            //   items: numItems,
            //   itemsOnPage: perPage,
            //   prevText: "<",
            //   nextText: ">",

            //   onPageClick: function (pageNumber) {
            //     var showFrom = perPage * (pageNumber - 1);
            //     var showTo = showFrom + perPage;
            //     items.hide().slice(showFrom, showTo).show();
            //   }
            // });

          } else {
            e.preventDefault();
          }
        });
      });
    $(horizontalWizard)
      .find('.btn-next-hour')
    var datatrans_day, datatrans_time, btn_next_hour, transaction = '/datatrans-service-transaction';;
    $(document).on("click", ".btn-next-hour", function () {
      btn_next_hour = $(this).data('time'),
        datatrans_day = $(this).data('day'),
        datatrans_time = $(this).data('time');
      $('.service__time').text(btn_next_hour);
      numberedStepper.next();
    });

    $('#go_pay_button').on('click', function (e) {

      var service_name = $('#service_name').val(),
        category_name = $('#category_name').val(),
        timezone_name = $('#timezone_name').val(),
        client_name = $('#client_name').val(),
        phone_num = $('#phone_num').val(),
        client_email = $('#client_email').val(),
        client_comment = $('#client_comment').val(),
        datatrans_payment = $('.datatrans-payment:checked').val(),
        own_id = $(this).data('own_id'),
        submerchantid = $(this).data('submerchantid');
      var service_price = Number($('.service__price').text()) * 100;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('#csrf_token_hidden').val()
        },
        type: 'post',
        url: transaction,
        data: { price: service_price, service_name: service_name, category_name: category_name, timezone_name: timezone_name, datatrans_day: datatrans_day, datatrans_time: datatrans_time, client_name: client_name, phone_num: phone_num, client_email: client_email, client_comment: client_comment, datatrans_payment: datatrans_payment, own_id: own_id, submerchantid: submerchantid },
        success: function (data) {
          if (data['success']) {
            window.location.href = 'https://pay.datatrans.com/v1/start/' + data['success'];
          }
          else {
            console.log('error');
          }
        }
      })
    });

    $('.btn_final_submit').on('click', function (e) {
      console.log('asd', $('#location').val());
      var service_name = $('#service_name').val(),
        category_name = $('#category_name').val(),
        timezone_name = $('#timezone_name').val(),
        client_name = $('#client_name').val(),
        phone_num = $('#phone_num').val(),
        client_email = $('#client_email').val(),
        client_comment = $('#client_comment').val(),
        datatrans_payment = $('.datatrans-payment:checked').val(),
        own_id = $(this).data('own_id'),
        location = $('#location').val(),
        employee = $('#employee').val(),
        url = '/datatrans-service-create';
      var service_price = Number($('.service__price').text()) * 100;

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('#csrf_token_hidden').val()
        },
        type: 'post',
        url: url,
        data: { service_name: service_name, category_name: category_name, timezone_name: timezone_name, datatrans_day: datatrans_day, datatrans_time: datatrans_time, client_name: client_name, phone_num: phone_num, client_email: client_email, client_comment: client_comment, datatrans_payment: datatrans_payment, location: location, employee : employee, own_id: own_id },
        success: function (data) {
          if (data['success']) {
            console.log('success')
          }
          else {
            console.log('errorsadsadsad');
          }
        }
      })

      e.preventDefault();

    });


    $(horizontalWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          numberedStepper.next();
        }
      });
  }

});

function Dateyears(param) {

  var date = new Date(param),
    dd = [String(date).replaceAll(' ', ',')],
    datachild = dd[0].split(','),
    dayname = Number(datachild[2]),
    year = date.getFullYear(),
    month = date.getMonth() + 1;

  return year + ':' + month + ':' + dayname;
}
function Dateweeks(param) {
  var date = new Date(param),
    dd = [String(date).replaceAll(' ', ',')],
    datachild = dd[0].split(','),
    week = datachild[0];
  return week;
}

function Datedays(param) {
  var date = new Date(param),
    dd = [String(date).replaceAll(' ', ',')],
    datachild = dd[0].split(','),
    weekname = datachild[0],
    monthname = datachild[1],
    dayname = Number(datachild[2]),
    minutes = date.getMinutes(),
    hour = date.getHours(),
    day = date.getDay(),
    year = date.getFullYear(),
    month = date.getMonth() + 1;

  return weekname + ',' + monthname + ' ' + dayname;
}

function Datehours(seconds) {
  var second = seconds / 1000;
  var hour = parseInt(second / 3600),
    minute = parseInt((second % 3600) / 60);
  if (hour < 10) { hour = "0" + hour; }
  if (minute < 10) { minute = "0" + minute; }
  return hour + ':' + minute;
}

function Allsecondtimeget(params) {
  var d = new Date(params);

}
function Eventgetsecond(params) {
  var d = new Date(params)
  return d.getTime();
}
function DateYDT(params) {
  var param = params.split(':');

  var seconds = new Date(param[0], param[1], param[2] + 0000, 00, 00);
  var second = seconds.getTime();
  return second;
}
function Currenttimeget(params) {
  var date = new Date(params),
    dd = [String(date).replaceAll(' ', ',')],
    datachild = dd[0].split(','),
    time = datachild[4],
    day = datachild[2],
    year = datachild[3];
  month = date.getMonth() + 1;
  return year + ':' + month + ':' + day + ':' + time;
}
function Currentdayget(param) {
  var x = Number(param) / 86400;
  var y = Number(x) * 86400;
  return y;
}
// Tel
$(function () {
  $(".phone_num").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js",
    initialCountry: "ch",
    formatOnDisplay: true
  });
})

// Timezone
function convertTZ(date, tzString) {
  return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", { timeZone: tzString }));
}

$(function () {
  $('#timezone_name').change(function (e) {
    e.preventDefault();
    var timezone = $('#timezone_name').val()
    var d = new Date();
    var value = convertTZ(d, timezone);

    var dd = [String(value).replaceAll(' ', ',')]

    datachild = dd[0].split(',');
    var weekname = datachild[0];
    var monthname = datachild[1];
    var dayname = Number(datachild[2]);
    var date = new Date(value)
    var minutes = date.getMinutes();
    var hour = date.getHours();
    var day = date.getDay();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;

  })
});

function DisplayData(params, day, calendar_events_times, temp_service_name, employeename, week_sums, defference_time){
  for(var i = 0; i < params.length; i++){
    var param = params[i];
    if(param.date_check != 1){
      
      var temp_start_time = param.start_time;
      var temp_end_time = param.end_time;
      

      var temp_start_time_get = temp_start_time.split(':');
      var mile_start_time = (Number(temp_start_time_get[0]) * 3600 + Number(temp_start_time_get[1]) * 60 + Number(temp_start_time_get[2])) * 1000;

      var temp_end_time_get = temp_end_time.split(':');
      var mile_end_time = (Number(temp_end_time_get[0]) * 3600 + Number(temp_end_time_get[1]) * 60 + Number(temp_end_time_get[2])) * 1000;

      var start_time = mile_start_time;
      var end_time = mile_end_time;

      for (time = start_time; time <= end_time; time += defference_time) {
        body = '<button class="datatrans-hour btn-next-hour "  type="button" name="datatrans_hour" value="' + Datehours(time) + '" data-time="' + Datehours(time) + '" data-day="' + Dateyears(day) + '" data-week="' + Dateweeks(day) + '" ><span class="ladda-label datatrans-time-main"><i class="datatrans-hour-icon"><span></span></i><span>' + Datehours(time) + '</span></span></button>';

        for (var j = 0; j < (calendar_events_times.length - 1); j++) {
          var calendar_events_time = calendar_events_times[j].replaceAll('"', '').split(',');
          var views_time = day + time;
          var event_start_time = calendar_events_time[0] * 1000 - defference_time;
          var event_end_time = calendar_events_time[1] * 1000;

          if (event_start_time < views_time && views_time < event_end_time) {
            body = '#';
          }
        }
        var orderchecking = '"' + temp_service_name + ':' + Dateyears(day) + ':' + Datehours(time) + ':00' + '"';

        var employeechecking = '"' + temp_service_name + ':' + employeename + ':' + Dateyears(day) + ':' + Datehours(time) + ':00' + '"';

        for (var index = 0; index < (emorders.length - 1); index++) {

          if (employeechecking == emorders[index]) {
            body = '#';
          }
        }

        for (var j = 0; j < (checkvalues.length - 1); j++) {
          var ordertime = checkvalues[j];

          if (ordertime == orderchecking) {
            body = '#';
          }
        }

        for (var k = 0; k < (week_sums.length); k++) {

          if (Dateweeks(day) == week_sums[k]) {
            body = '#';
          }
        }
        if (body != '#') {
          temp.push(body);
        }

      }
    }
    else{
      
      var select_date = new Date(param.selectdata);
      var real_day = select_date.getTime();
      console.log(real_day);
      console.log('real-day', real_day);

      var temp_start_time = param.start_time;
      var temp_end_time = param.end_time;
      

      var temp_start_time_get = temp_start_time.split(':');
      var mile_start_time = (Number(temp_start_time_get[0]) * 3600 + Number(temp_start_time_get[1]) * 60 + Number(temp_start_time_get[2])) * 1000;

      var temp_end_time_get = temp_end_time.split(':');
      var mile_end_time = (Number(temp_end_time_get[0]) * 3600 + Number(temp_end_time_get[1]) * 60 + Number(temp_end_time_get[2])) * 1000;

      var start_time = mile_start_time;
      var end_time = mile_end_time;

      for (time = start_time; time <= end_time; time += defference_time) {
        body = '<button class="datatrans-hour btn-next-hour "  type="button" name="datatrans_hour" value="' + Datehours(time) + '" data-time="' + Datehours(time) + '" data-day="' + Dateyears(real_day) + '" data-week="' + Dateweeks(real_day) + '" ><span class="ladda-label datatrans-time-main"><i class="datatrans-hour-icon"><span></span></i><span>' + Datehours(time) + '</span></span></button>';

        for (var j = 0; j < (calendar_events_times.length - 1); j++) {
          var calendar_events_time = calendar_events_times[j].replaceAll('"', '').split(',');
          var views_time = real_day + time;
          var event_start_time = calendar_events_time[0] * 1000 - defference_time;
          var event_end_time = calendar_events_time[1] * 1000;

          if (event_start_time < views_time && views_time < event_end_time) {
            body = '#';
          }
        }
        var orderchecking = '"' + temp_service_name + ':' + Dateyears(real_day) + ':' + Datehours(time) + ':00' + '"';

        var employeechecking = '"' + temp_service_name + ':' + employeename + ':' + Dateyears(real_day) + ':' + Datehours(time) + ':00' + '"';

        for (var index = 0; index < (emorders.length - 1); index++) {

          if (employeechecking == emorders[index]) {
            body = '#';
          }
        }

        for (var j = 0; j < (checkvalues.length - 1); j++) {
          var ordertime = checkvalues[j];

          if (ordertime == orderchecking) {
            body = '#';
          }
        }

        if(Dateyears(day) != Dateyears(real_day)){
          body = '#';
        }

        for (var k = 0; k < (week_sums.length); k++) {

          if (Dateweeks(real_day) == week_sums[k]) {
            body = '#';
          }
        }
        if (body != '#') {
          temp.push(body);
        }
        

      }
    }
  }
}
