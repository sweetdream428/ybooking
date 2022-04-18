<!-- BEGIN: Head-->
@include('layouts.header')
<style>
    .switch {
        position: relative;
        display: flex;
        width: 60px;
        height: 34px;
    }

    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    /* TIME */

    :root{
        --main-color: #1a535c;
        --secondary-color: #4ecdc4;
        --white-color: #f7fff7;
        --main-accent-color: #ff6b6b;
        --secondary-accent-color: #ffe66d;
        --dark-color: #2D232E;
    }

       
    h3, h4{
        color: var(--main-color)
    }

    h6{
        color: var(--secondary-color);
    }

    .day-txt{
        display: inline-block;
        transition: all ease-out 0.3s;de
    }

    .row:hover .day-txt{
        transform: translateX(5px);
        text-shadow: 0 0 0;
    }

    .tp-start-time,
    .tp-end-time{
        color: var(--main-color);
        cursor: pointer;
        display: inline-block;
        transition: all ease-out 0.3s;
    }

    .tp-start-time:hover,
    .tp-end-time:hover{
        transform: scale(1.2);
        text-shadow: 0 0 0 var(--main-color);
        
    }


        /* timePicker.css */
    #tp-modal .modal-footer{
        border: none;
    }

    #tp-modal .modal-header{
        border: none;
    }

    #tp-time-cont{
        display: flex;
        text-align: center;
        background: white;
        position: relative;
        align-items: stretch;
    }

    #tp-colon{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #tp-time-cont button{
        border: none;
        background: transparent;
        height: auto;
        padding: 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        outline: none!important;
        transition: all ease-out 0.3s;
    }

    #tp-hour-cont,
    #tp-minutes-cont{
        flex-grow: 1;
    }

    #tp-time-cont button:hover{
        transform: scale(1.3);
        color: var(--main-color);
    }

    .tp-value{
        font-size: 2rem;
        line-height: 2rem;
    }

    #tp-set-btn{
        background: var(--main-color);
        border-color: var(--main-color);
    }
    .flatpickr-monday{
        display: none;
    }

</style>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: navbar-->
    @include('layouts.navbar')
    <!-- END navbar -->

    <!-- BEGIN LAYOUT -->
    @include('layouts.layout')
    <!-- END LAYOUT -->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">

                    <!-- list section start -->
                    <div class="card">
                        <form class="create-data-submit">
                            <div class="row mt-2 col-12">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control dt-full-name" id="title"
                                            placeholder="Title" name="title" aria-label="title"
                                            aria-describedby="title" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <select class="form-control" id="category" name="category" required>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="duration_name">Duration</label>
                                        <input type="text" name="duration_name" class="duration_name_value" hidden>
                                        <select name="duration" class="form-control duration_value" required>
                                            <option value="900">15 min</option>
                                            <option value="1800">30 min</option>
                                            <option value="2700">45 min</option>
                                            <option value="3600">1 hour</option>
                                            <option value="5400">1 hour 30 min</option>
                                            <option value="7200">2 hour</option>
                                            <option value="10800">3 hour</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="price">Price</label>
                                        <input type="number" step="0.01" class="form-control dt-full-name" id="price" placeholder="10.00" name="price" aria-label="price" aria-describedby="price" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="location">Location</label>
                                        <select class="form-control" id="location" name="location" required>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->name}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="employee">Employees</label>
                                        <select class="form-control" id="employee" name="employee" required>
                                            @foreach ($employees as $employee)
                                                <option value="{{$employee->name}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <section>
                            <div class="row">
                                <!-- left menu section -->
                                <div class="col-md-3 mb-2 mb-md-0">
                                    <ul class="nav nav-pills flex-column nav-left">
                                        <!-- monday -->
                                        <li class="nav-item">
                                            <a class="nav-link active" id="service-pill-monday" data-toggle="pill" href="#service-vertical-monday" aria-expanded="true">
                                                <span class="font-weight-bold">Monday</span>
                                            </a>
                                        </li>
                                        <!-- tuesday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-tuesday" data-toggle="pill" href="#service-vertical-tuesday" aria-expanded="false">
                                                <span class="font-weight-bold">Tuesday</span>
                                            </a>
                                        </li>
                                        <!-- wednesday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-wednesday" data-toggle="pill" href="#service-vertical-wednesday" aria-expanded="false">
                                                <span class="font-weight-bold">Wednesday</span>
                                            </a>
                                        </li>
                                        <!-- thursday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-thursday" data-toggle="pill" href="#service-vertical-thursday" aria-expanded="false">
                                                <span class="font-weight-bold">Thursday</span>
                                            </a>
                                        </li>
                                        <!-- friday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-friday" data-toggle="pill" href="#service-vertical-friday" aria-expanded="false">
                                                <span class="font-weight-bold">Friday</span>
                                            </a>
                                        </li>
                                        <!-- saturday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-saturday" data-toggle="pill" href="#service-vertical-saturday" aria-expanded="false">
                                                <span class="font-weight-bold">Saturday</span>
                                            </a>
                                        </li>
                                        <!-- sunday -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-pill-sunday" data-toggle="pill" href="#service-vertical-sunday" aria-expanded="false">
                                                <span class="font-weight-bold">Suuday</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--/ left menu section -->
        
                                <!-- right content section -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- monday tab -->
                                                <div role="tabpanel" class="tab-pane active" id="service-vertical-monday" aria-labelledby="service-pill-general" aria-expanded="true">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="monday" class="form-label font-weight-bold">Monday:</label>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="switch">
                                                                <input type="checkbox" class="monday-status">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button class="btn btn-info add-monday" type="button">Add</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!--/ monday tab -->
        
                                                <!-- tuesday-->
                                                <div class="tab-pane fade" id="service-vertical-tuesday" role="tabpanel" aria-labelledby="service-pill-tuesday" aria-expanded="false">
                                                    
                                                </div>
                                                <!--/ tuesday-->
        
                                                <!-- wednesday -->
                                                <div class="tab-pane fade" id="service-vertical-wednesday" role="tabpanel" aria-labelledby="service-pill-wednesday" aria-expanded="false">
                                                    
                                                </div>
                                                <!--/ wednesday -->
        
                                                <!-- thursday -->
                                                <div class="tab-pane fade" id="service-vertical-thursday" role="tabpanel" aria-labelledby="service-pill-thursday" aria-expanded="false">
                                                   
                                                </div>
                                                <!--/ thursday -->
        
                                                <!-- friday -->
                                                <div class="tab-pane fade" id="service-vertical-friday" role="tabpanel" aria-labelledby="service-pill-friday" aria-expanded="false">
                                                    
                                                </div>
                                                <!--/ friday -->

                                                <!-- saturday -->
                                                <div class="tab-pane fade" id="service-vertical-saturday" role="tabpanel" aria-labelledby="service-pill-saturday" aria-expanded="false">
                                                    
                                                </div>
                                                <!--/ saturday -->

                                                <!-- sunday -->
                                                <div class="tab-pane fade" id="service-vertical-sunday" role="tabpanel" aria-labelledby="service-pill-sunday" aria-expanded="false">
                                                    
                                                </div>
                                                <!--/ sunday -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ right content section -->
                            </div>
                        </section>
                    </div>
                   
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->

    <script>

        $(function(){
            $('.add-monday').on('click', function(e){
                $('.service-vertical-monday').html('<div class="row mt-2 tp-day-cont d-flex align-items-center"><div class="col-md-4 col-12"><button type="button" class="btn btn-danger remove-monday">Remove</button><button type="button" class="btn btn-success save-monday">Save</button></div><div class="col-md-2 col-6"><span class="tp-start-time">00:00</span></div><div class="col-md-2 col-6"><span class="tp-end-time">00:00</span></div><div class="col-md-2 col-6"><input type="checkbox" class="mon_check"/></div><div class="col-md-2 col-6"><input type="text" class="form-control flatpickr-monday" placeholder="YYYY-MM-DD" /></div></div>')
            })
        });
        $('.mon_check').on('change', function(e){
            $(this).is(':checked') ? $('.flatpickr-monday').css('display', 'inline') : $('.flatpickr-monday').css('display', 'none')
        })
        // Default
        
            $('.flatpickr-monday').flatpickr({
                min: 'today',
                minDate: 'today',
                format: 'yyyy-m-d',
                maxDate: new Date().fp_incr(365),
                enable: [
                    function(dateObj){
                        return dateObj.getDay() %7 == 1;
                    }
                ]
            });
        

        $(document).ready(function(){
            
            $(document).on('click', '.tp-start-time', function(){
                timePicker($(this));
            });
            
            $(document).on('click', '.tp-end-time', function(){
                startTime = $(this).closest('.tp-day-cont').find('.tp-start-time').html();
                timePicker($(this), 5, getHour(startTime));
            });
            });

            function timePicker($elem, minutesStep = 5, startHour = 0, startMinutes = 0, endHour = 23, endMinutes = 59, defaultTime)
            {
            let currentHour = '12';
            let currentMinutes = '00';
            if(startHour < 0 || startHour > 23){
                startHour = 0;
            }
            if (endHour < startHour || endHour > 23){
                endHour = 23;
            }
            
            if (startMinutes < 0 || startMinutes > 59){
                startMinutes = 0;
            }
            if (endMinutes <= startMinutes || endMinutes > 59){
                endMinutes = 59;
            }
            
            if (minutesStep < 1 || minutesStep > 60){
                minutesStep = 5;
            }
            
            if (!defaultTime){
                let currentTime = $elem.html();
                if(isValidTime(currentTime)){
                currentHour = getHour(currentTime);
                currentMinutes = getMinutes(currentTime);
                }
            }
            let modal = '<div id="tp-modal" class="modal fade" tabindex="-1">' +
                '<div class="modal-dialog modal-sm">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header"><h4>Set Time</h4></div>' +
                    '<div class="modal-body pt-0 pl-0 pr-0 ">' +
                        '<div id="tp-time-cont">' +
                        '<div id="tp-hour-cont" class="mr-1 text-right">' +
                            '<button id="tp-h-up" class="ml-auto"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>' +
                            '</svg></button>' +
                            '<div id="tp-h-value" class="tp-value">12</div>' +
                            '<button id="tp-h-down" class="ml-auto">' +
                            '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>' +
                            '</svg>' +
                            '</button>' +
                        '</div>' +
                        '<div id="tp-colon">:</div>' +
                        '<div id="tp-minutes-cont" class="ml-1 text-left">' +
                            '<button id="tp-m-up"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>' +
                            '</svg></button>' +
                            '<div id="tp-m-value" class="tp-value">12</div>' +
                            '<button id="tp-m-down">' +
                            '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                        '<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>' +
                            '</svg>' +
                            '</button>' +
                        '</div>' +
                        '</div>' +
                    '<div class="modal-footer">' +
                        '<button type="button" id="tp-cancel-btn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
                        '<button type="button" id="tp-set-btn" class="btn btn-primary">Set</button>' +
                    '</div>' +
                    '</div>' +
                '</div>' +
                '</div>';
            $('body').append(modal);
            
            $('#tp-h-value').html(currentHour);
            $('#tp-m-value').html(currentMinutes);
            
            $('#tp-h-up').off('click').on('click', function(){
                let val = parseInt($('#tp-h-value').html()) + 1;
                if (val == endHour + 1){
                $('#tp-h-value').html(('0' + startHour).substr(-2));
                } else {
                $('#tp-h-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-h-down').off('click').on('click', function(){
                let val = parseInt($('#tp-h-value').html()) - 1;
                if (val == startHour - 1){
                $('#tp-h-value').html(('0' + endHour).substr(-2));
                } else {
                $('#tp-h-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-m-up').off('click').on('click', function(){
                let val = parseInt($('#tp-m-value').html()) + minutesStep;
                if (val >= endMinutes + 1){
                $('#tp-m-value').html((startMinutes == 0)? '00' : ('0' + (startMinutes + minutesStep - startMinutes % minutesStep)).substr(-2));
                } else {
                $('#tp-m-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-m-down').off('click').on('click', function(){
                let val = parseInt($('#tp-m-value').html()) - minutesStep;
                if (val <= startMinutes - 1){
                $('#tp-m-value').html(('0' + (endMinutes - endMinutes % minutesStep)).substr(-2));
                } else {
                $('#tp-m-value').html(('0' + val).substr(-2));
                }
            });
            
            $('#tp-set-btn').off('click').on('click', function(){
                let h = $('#tp-h-value').html();
                let m = $('#tp-m-value').html();
                
                $elem.html(h + ':' + m);
                
                if ($elem.hasClass('tp-start-time')){
                let $endTimeElem = $elem.closest('.tp-day-cont').find('.tp-end-time');
                if ($endTimeElem.length > 0){
                    if (compareTimes($elem.html(), $endTimeElem.html()) == 0 || compareTimes($elem.html(), $endTimeElem.html()) == 1){
                    $endTimeElem.html(newEndTime($elem.html(), minutesStep));
                    }
                }
                } else {
                let $startTimeElem = $elem.closest('.tp-day-cont').find('.tp-start-time');
                if ($startTimeElem.length > 0){
                    if (compareTimes($startTimeElem.html(), $elem.html()) == 0 || compareTimes($startTimeElem.html(), $elem.html()) == 1){
                    $elem.html(newEndTime($startTimeElem.html(), minutesStep));
                    }
                }
                }
                $('#tp-modal').modal('hide');
            });
            
            $('#tp-modal').modal('show');
            }
            
            function getHour(time){
            return time.substr(0, time.indexOf(':'));
            }

            function getIntHour(time){
            return parseInt(getHour(time));
            }

            function getMinutes(time){
            return time.substr(time.indexOf(':') + 1);
            }

            function getIntMinutes(time){
            return parseInt(getMinutes(time));
            }

            function isValidTime(time){
            let patt = /([01]?\d):([0-5]\d)/g;
            return patt.test(time);
            }

            function compareTimes(time1, time2){
            if (!isValidTime(time1) || !isValidTime(time2)) {
                return -1;
            }
            if (time1 == time2){
                return 0;
            } else if(getIntHour(time1) > getIntHour(time2)) {
                return 1;
            } else if(getIntHour(time1) == getIntHour(time2)) {
                if (getIntMinutes(time1) > getIntMinutes(time2)) {
                return 1;
                }
                else {
                return 2;
                }
            } else {
                return 2;
            }
            }

            function newEndTime(startTime, minutesStep){
            if (!isValidTime(startTime)){
                return -1;
            }
            
            let hour = getIntHour(startTime);
            let minutes = getIntMinutes(startTime);
            
            if (minutes + minutesStep > 59){
                minutes = 0;
                hour++;
                if (hour > 23){
                return startTime;
                }
            } else {
                minutes += minutesStep;
            }
            
            hour = ("0" + hour).substr(-2);
            minutes = ("0" + minutes).substr(-2);
            return hour + ":" + minutes;
        }
        
   
    </script>
</body>
<!-- END: Body-->

</html>