<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->
<style>
    
</style>
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
                    @if (Auth::user()->setcalendar == 1)
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn calendar_cancel_btn btn-outline-secondary">
                                Cancel
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="28px" height="28px"><rect width="22" height="22" x="13" y="13" fill="#fff"/><polygon fill="#1e88e5" points="25.68,20.92 26.688,22.36 28.272,21.208 28.272,29.56 30,29.56 30,18.616 28.56,18.616"/><path fill="#1e88e5" d="M22.943,23.745c0.625-0.574,1.013-1.37,1.013-2.249c0-1.747-1.533-3.168-3.417-3.168 c-1.602,0-2.972,1.009-3.33,2.453l1.657,0.421c0.165-0.664,0.868-1.146,1.673-1.146c0.942,0,1.709,0.646,1.709,1.44 c0,0.794-0.767,1.44-1.709,1.44h-0.997v1.728h0.997c1.081,0,1.993,0.751,1.993,1.64c0,0.904-0.866,1.64-1.931,1.64 c-0.962,0-1.784-0.61-1.914-1.418L17,26.802c0.262,1.636,1.81,2.87,3.6,2.87c2.007,0,3.64-1.511,3.64-3.368 C24.24,25.281,23.736,24.363,22.943,23.745z"/><polygon fill="#fbc02d" points="34,42 14,42 13,38 14,34 34,34 35,38"/><polygon fill="#4caf50" points="38,35 42,34 42,14 38,13 34,14 34,34"/><path fill="#1e88e5" d="M34,14l1-4l-1-4H9C7.343,6,6,7.343,6,9v25l4,1l4-1V14H34z"/><polygon fill="#e53935" points="34,34 34,42 42,34"/><path fill="#1565c0" d="M39,6h-5v8h8V9C42,7.343,40.657,6,39,6z"/><path fill="#1565c0" d="M9,42h5v-8H6v5C6,40.657,7.343,42,9,42z"/></svg>
                                </i>
                            </button>
                        </div>
                        
                        <!-- list section start -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="data-list-table table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                        <tr>
                                            <td>{{$event->getSummary()}}</td>
                                            <td>{{ date('j F Y, H:i ', strtotime($event->start->dateTime)+ 3600) }}</td>
                                            <td>{{ date('j F Y, H:i ', strtotime($event->end->dateTime)+ 3600) }}</td>
                                        
                                        </tr>
                                        @endforeach
                                                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END section start -->
                    @else
                        <button class="btn calendar_btn btn-primary">
                            Integrate
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="28px" height="28px"><rect width="22" height="22" x="13" y="13" fill="#fff"/><polygon fill="#1e88e5" points="25.68,20.92 26.688,22.36 28.272,21.208 28.272,29.56 30,29.56 30,18.616 28.56,18.616"/><path fill="#1e88e5" d="M22.943,23.745c0.625-0.574,1.013-1.37,1.013-2.249c0-1.747-1.533-3.168-3.417-3.168 c-1.602,0-2.972,1.009-3.33,2.453l1.657,0.421c0.165-0.664,0.868-1.146,1.673-1.146c0.942,0,1.709,0.646,1.709,1.44 c0,0.794-0.767,1.44-1.709,1.44h-0.997v1.728h0.997c1.081,0,1.993,0.751,1.993,1.64c0,0.904-0.866,1.64-1.931,1.64 c-0.962,0-1.784-0.61-1.914-1.418L17,26.802c0.262,1.636,1.81,2.87,3.6,2.87c2.007,0,3.64-1.511,3.64-3.368 C24.24,25.281,23.736,24.363,22.943,23.745z"/><polygon fill="#fbc02d" points="34,42 14,42 13,38 14,34 34,34 35,38"/><polygon fill="#4caf50" points="38,35 42,34 42,14 38,13 34,14 34,34"/><path fill="#1e88e5" d="M34,14l1-4l-1-4H9C7.343,6,6,7.343,6,9v25l4,1l4-1V14H34z"/><polygon fill="#e53935" points="34,34 34,42 42,34"/><path fill="#1565c0" d="M39,6h-5v8h8V9C42,7.343,40.657,6,39,6z"/><path fill="#1565c0" d="M9,42h5v-8H6v5C6,40.657,7.343,42,9,42z"/></svg>
                            </i>
                        </button>
                    @endif
                    
                </section>   
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

    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-calendar.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        $('.calendar_btn').on('click', function(e){
            var url = '/google-calendar/setcalenadr';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {setcalendar:1},
                success: function(data) {
                    if(data['success']){
                        window.location.reload();
                    }
                    else{
                        console.log('error');
                    }
                }
            });
        });
        $('.calendar_cancel_btn').on('click', function(e){
            var url = '/google-calendar/setcalenadr';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {setcalendar:0},
                success: function(data) {
                    if(data['success']){
                        window.location.reload();
                    }
                    else{
                        console.log('error');
                    }
                }
            });
        });
    </script>
</body>
<!-- END: Body-->

</html>