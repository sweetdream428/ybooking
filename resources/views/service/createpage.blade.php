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
                                                    <div class="col-12 row">
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
            var timePickr = $('.flatpickr-time');
            if (timePickr.length) {
                timePickr.flatpickr({
                    enableSeconds: true,
                    enableTime: true,
                    noCalendar: true,
                    time_24hr: true 
                });
            }
            $('.btn-sunday').on('click', function(e){
                $('.form-sunday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="start_time">Start Time</label><input type="text" class="form-control flatpickr-time sun_start_time text-left" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left sun_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.sun_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.sun_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });
            $('.btn-monday').on('click', function(e){
                $('.form-monday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left mon_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left mon_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.mon_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.mon_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });
            $('.btn-tuesday').on('click', function(e){
                $('.form-tuesday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="tue_start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left tue_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="tue_end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left tue_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.tue_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.tue_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });

            $('.btn-wednesday').on('click', function(e){
                $('.form-wednesday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="wed_start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left wed_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="wed_end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left wed_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.wed_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.wed_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });

            $('.btn-thursday').on('click', function(e){
                $('.form-thursday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="thu_start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left thu_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="thu_end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left thu_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.thu_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.thu_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });

            $('.btn-friday').on('click', function(e){
                $('.form-friday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="fri_start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left fri_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="fri_end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left fri_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.fri_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.fri_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
            });

            $('.btn-saturday').on('click', function(e){
                
                $('.form-saturday').append('<div class="row col-12 px-0 mx-0"><div class="col-md-4 col-12"><label class="form-label invisible" for="cancel">Cancel</label><div class=""><button type="button" class="btn-cancel btn btn-outline-secondary">Cancel</button></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="sat_start_time">Start Time</label><input type="text" class="form-control flatpickr-time text-left sat_start_time" placeholder="HH:MM" style="height: 34px;" required/></div></div><div class="col-md-4 col-12"><div class="form-group"><label class="form-label" for="sat_end_time">End Time</label><input type="text" class="form-control flatpickr-time text-left sat_end_time" placeholder="HH:MM" style="height: 34px;" required/></div></div></div>');
                var timePickr = $('.sat_start_time').last();
                if (timePickr.length) {
                    timePickr.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                var timePickrEnd = $('.sat_end_time').last();
                if (timePickrEnd.length) {
                    timePickrEnd.flatpickr({
                        enableSeconds: true,
                        enableTime: true,
                        noCalendar: true,
                        time_24hr: true 
                    });
                }
                
                
            });
            
            $(document).on('click', '.btn-cancel', function(e){
                $(this).parent().parent().parent().remove();
            });
            $('.create-data-submit').on('submit', function(e){
                var sunlength = $('.sun_start_time').length;
                var monlength = $('.mon_start_time').length;
                var tuelength = $('.tue_start_time').length;
                var wedlength = $('.wed_start_time').length;
                var thulength = $('.thu_start_time').length;
                var frilength = $('.fri_start_time').length;
                var satlength = $('.sat_start_time').length;
                console.log('monlength', monlength);
                console.log('tuelength', tuelength);
                console.log('tuelength', tuelength);
                console.log('wedlength', wedlength);
                
                for(var i = 0; i<sunlength; i++){
                    console.log('sun_start_time', $('.sun_start_time').eq(i).val());
                    console.log('sun_end_time', $('.sun_end_time').eq(i).val());
                }
                for(var i = 0; i<monlength; i++){
                    console.log('mon_start_time', $('.mon_start_time').eq(i).val());
                    console.log('mon_end_time', $('.mon_end_time').eq(i).val());
                }
                for(var i = 0; i<tuelength; i++){
                    console.log('tue_start_time', $('.tue_start_time').eq(i).val());
                    console.log('tue_end_time', $('.tue_end_time').eq(i).val());
                }
                for(var i = 0; i<wedlength; i++){
                    console.log('wed_start_time', $('.wed_start_time').eq(i).val());
                    console.log('wed_end_time', $('.wed_end_time').eq(i).val());
                }
                for(var i = 0; i<thulength; i++){
                    console.log('thu_start_time', $('.thu_start_time').eq(i).val());
                    console.log('thu_end_time', $('.thu_end_time').eq(i).val());
                }
                for(var i = 0; i<frilength; i++){
                    console.log('fri_start_time', $('.fri_start_time').eq(i).val());
                    console.log('fri_end_time', $('.fri_end_time').eq(i).val());
                }
                for(var i = 0; i<satlength; i++){
                    console.log('sat_start_time', $('.sat_start_time').eq(i).val());
                    console.log('sat_end_time', $('.sat_end_time').eq(i).val());
                }
                
            });
        });
        
   
    </script>
</body>
<!-- END: Body-->

</html>