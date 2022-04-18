<!-- BEGIN: Head-->
@include('layouts.header')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/pages/app-invoice.css') }}"> --}}
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
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control dt-full-name" id="title"
                                            placeholder="Title" name="title" aria-label="title"
                                            aria-describedby="title" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <select class="form-control" id="category" name="category" required>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-md-6 col-12">
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
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="price">Price</label>
                                        <input type="number" step="0.01" class="form-control dt-full-name" id="price" placeholder="10.00" name="price" aria-label="price" aria-describedby="price" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12 form-sunday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="sunday">Sunday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox mt-1">
                                        <input type="checkbox" class="custom-control-input" id="sun" name="sun" checked />
                                        <label class="custom-control-label" for="sun">Sun</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left sun_start_time" placeholder="HH:MM" style="height: 34px;" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left sun_end_time" placeholder="HH:MM" style="height: 34px;" required/>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-sunday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-monday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="monday">Monday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="mon" name="mon" checked />
                                        <label class="custom-control-label" for="mon">Mon</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="mon_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left mon_start_time"  placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="mon_end_time">End Time</label>
                                        <input type="text" class="form-control mon_end_time flatpickr-time text-left"  placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-monday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-tuesday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="Tuesday">Tuesday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="tue" name="tue" checked />
                                        <label class="custom-control-label" for="tue">Tue</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="tue_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left tue_start_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="tue_end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left tue_end_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-tuesday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-wednesday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="start_time">Wednesday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="wed" name="wed" checked />
                                        <label class="custom-control-label" for="wed">Wed</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="wed_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left wed_start_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="wed_end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left wed_end_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-wednesday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-thursday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="">Thursday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="thu" name="thu" checked />
                                        <label class="custom-control-label" for="thu">Thu</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="thu_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left thu_start_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="thu_end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left thu_end_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-thursday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-friday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="">Friday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="fri" name="fri" checked />
                                        <label class="custom-control-label" for="fri">Fri</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="fri_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left fri_start_time"  placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="fri_end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left fri_end_time" placeholder="HH:MM" style="height: 34px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-friday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>

                            <div class="row col-12 mt-2 form-saturday">
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="Saturday">Saturday</label>
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sat" name="sat" checked />
                                        <label class="custom-control-label" for="sat">Sat</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="sat_start_time">Start Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left sat_start_time"  placeholder="HH:MM" style="height: 34px;" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="sat_end_time">End Time</label>
                                        <input type="text" class="form-control flatpickr-time text-left sat_end_time" placeholder="HH:MM" style="height: 34px;" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <button type="button" class="btn btn-primary btn-saturday ml-3">
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>
                            <div class="row col-12 mt-4">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="allow">Allow</label>
                                        <input type="number" class="form-control" id="allow"
                                            placeholder="1" name="allow" aria-label="allow"
                                            aria-describedby="allow" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                </div>
                                
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    submit
                                </button>
                            </div>
                            {{-- create-data-submit --}}
                        </form>
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