<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

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
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>
                                            <button class="dropdown-item userupdate_new d-inline" data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-email="{{$employee->email}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-edit-2 mr-50">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline delete_employeedata" data-id="{{$employee->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-trash mr-50">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                </svg>
                                                <span></span>
                                            </button>

                                            <button class="dropdown-item d-inline employee_google_calendar" data-id="{{$employee->id}}" disabled>
                                                @if ($employee->setcalendar != 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="28px" height="28px"><rect width="22" height="22" x="13" y="13" fill="#fff"/><polygon fill="#1e88e5" points="25.68,20.92 26.688,22.36 28.272,21.208 28.272,29.56 30,29.56 30,18.616 28.56,18.616"/><path fill="#1e88e5" d="M22.943,23.745c0.625-0.574,1.013-1.37,1.013-2.249c0-1.747-1.533-3.168-3.417-3.168 c-1.602,0-2.972,1.009-3.33,2.453l1.657,0.421c0.165-0.664,0.868-1.146,1.673-1.146c0.942,0,1.709,0.646,1.709,1.44 c0,0.794-0.767,1.44-1.709,1.44h-0.997v1.728h0.997c1.081,0,1.993,0.751,1.993,1.64c0,0.904-0.866,1.64-1.931,1.64 c-0.962,0-1.784-0.61-1.914-1.418L17,26.802c0.262,1.636,1.81,2.87,3.6,2.87c2.007,0,3.64-1.511,3.64-3.368 C24.24,25.281,23.736,24.363,22.943,23.745z"/><polygon fill="#fbc02d" points="34,42 14,42 13,38 14,34 34,34 35,38"/><polygon fill="#4caf50" points="38,35 42,34 42,14 38,13 34,14 34,34"/><path fill="#1e88e5" d="M34,14l1-4l-1-4H9C7.343,6,6,7.343,6,9v25l4,1l4-1V14H34z"/><polygon fill="#e53935" points="34,34 34,42 42,34"/><path fill="#1565c0" d="M39,6h-5v8h8V9C42,7.343,40.657,6,39,6z"/><path fill="#1565c0" d="M9,42h5v-8H6v5C6,40.657,7.343,42,9,42z"/></svg>
                                                
                                                @else
                                                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="28px" height="28px"><path d="M 23 17.015625 C 19.691 17.015625 17 19.706625 17 23.015625 L 17 77.015625 C 17 80.324625 19.691 83.015625 23 83.015625 L 66.5 83.015625 C 66.76 83.015625 67.009313 82.914375 67.195312 82.734375 L 82.695312 67.71875 C 82.891313 67.53075 83 67.271 83 67 L 83 23.015625 C 83 19.706625 80.309 17.015625 77 17.015625 L 23 17.015625 z M 23 19.015625 L 66 19.015625 L 66 33 L 35 33 C 33.897 33 33 33.897 33 35 L 33 66 L 19 66 L 19 23.015625 C 19 20.809625 20.794 19.015625 23 19.015625 z M 67 19.015625 L 77 19.015625 C 79.206 19.015625 81 20.809625 81 23.015625 L 81 33 L 67 33 L 67 19.015625 z M 26.5 22 C 24.019 22 22 24.019 22 26.5 L 22 51.5 C 22 51.776 22.224 52 22.5 52 C 22.776 52 23 51.776 23 51.5 L 23 26.5 C 23 24.57 24.57 23 26.5 23 L 33.5 23 C 33.776 23 34 22.776 34 22.5 C 34 22.224 33.776 22 33.5 22 L 26.5 22 z M 70 22 C 69.724 22 69.5 22.224 69.5 22.5 C 69.5 22.776 69.724 23 70 23 L 73.5 23 C 75.43 23 77 24.57 77 26.5 C 77 26.776 77.224 27 77.5 27 C 77.776 27 78 26.776 78 26.5 C 78 24.019 75.981 22 73.5 22 L 70 22 z M 77.5 29 C 77.224 29 77 29.224 77 29.5 L 77 30.5 C 77 30.776 77.224 31 77.5 31 C 77.776 31 78 30.776 78 30.5 L 78 29.5 C 78 29.224 77.776 29 77.5 29 z M 67 34 L 81 34 L 81 66 L 67 66 L 67 34 z M 35 35 L 65 35 L 65 65 L 35 65 L 35 35 z M 59.28125 39.363281 C 59.03125 39.363281 58.782203 39.487328 58.533203 39.736328 L 55.880859 42.880859 C 55.534859 43.150859 55.361328 43.485672 55.361328 43.888672 C 55.361328 44.157672 55.448094 44.39375 55.621094 44.59375 C 55.794094 44.79575 56.005859 44.896484 56.255859 44.896484 C 56.465859 44.896484 56.669328 44.792078 56.861328 44.580078 L 57.927734 42.994141 L 57.927734 59.597656 C 57.927734 59.867656 58.046109 60.079422 58.287109 60.232422 C 58.528109 60.386422 58.811672 60.462891 59.138672 60.462891 C 59.465672 60.462891 59.748281 60.386422 59.988281 60.232422 C 60.228281 60.078422 60.347656 59.867656 60.347656 59.597656 L 60.347656 40.226562 C 60.347656 39.957563 60.238578 39.74675 60.017578 39.59375 C 59.796578 39.43975 59.55125 39.363281 59.28125 39.363281 z M 45.964844 39.392578 C 44.868844 39.392578 43.913656 39.555813 43.097656 39.882812 C 42.280656 40.209813 41.670578 40.627719 41.267578 41.136719 C 40.863578 41.645719 40.569719 42.155062 40.386719 42.664062 C 40.204719 43.173062 40.113281 43.668438 40.113281 44.148438 C 40.113281 44.628438 40.195375 44.955906 40.359375 45.128906 C 40.522375 45.301906 40.862812 45.388672 41.382812 45.388672 C 42.149813 45.388672 42.533203 45.034125 42.533203 44.328125 C 42.533203 43.585125 42.788828 42.941437 43.298828 42.398438 C 43.806828 41.854437 44.67625 41.582031 45.90625 41.582031 C 48.05925 41.582031 49.136719 42.701453 49.136719 44.939453 C 49.136719 46.241453 48.858781 47.140672 48.300781 47.638672 C 47.742781 48.135672 46.906969 48.384766 45.792969 48.384766 C 45.234969 48.384766 44.955078 48.721531 44.955078 49.394531 C 44.955078 50.067531 45.234969 50.402344 45.792969 50.402344 C 48.367969 50.402344 49.654297 51.575922 49.654297 53.919922 L 49.654297 54.466797 C 49.654297 57.119797 48.367969 58.445312 45.792969 58.445312 C 44.523969 58.445312 43.576172 58.148734 42.951172 57.552734 C 42.326172 56.957734 42.015625 56.2925 42.015625 55.5625 C 42.015625 55.2355 41.924188 54.995797 41.742188 54.841797 C 41.558187 54.688797 41.236391 54.611328 40.775391 54.611328 C 40.352391 54.611328 40.059484 54.688797 39.896484 54.841797 C 39.733484 54.996797 39.650391 55.295328 39.650391 55.736328 C 39.650391 56.985328 40.179328 58.113047 41.236328 59.123047 C 42.293328 60.133047 43.813969 60.638672 45.792969 60.638672 C 47.675969 60.638672 49.194656 60.138672 50.347656 59.138672 C 51.500656 58.139672 52.076172 56.58275 52.076172 54.46875 L 52.076172 53.921875 C 52.076172 51.654875 51.096719 50.125891 49.136719 49.337891 C 49.847719 49.012891 50.414891 48.429938 50.837891 47.585938 C 51.259891 46.742938 51.470703 45.718719 51.470703 44.511719 C 51.470703 41.099719 49.635844 39.392578 45.964844 39.392578 z M 22.5 54 C 22.224 54 22 54.224 22 54.5 L 22 58.5 C 22 58.776 22.224 59 22.5 59 C 22.776 59 23 58.776 23 58.5 L 23 54.5 C 23 54.224 22.776 54 22.5 54 z M 22.5 61 C 22.224 61 22 61.224 22 61.5 L 22 62.5 C 22 62.776 22.224 63 22.5 63 C 22.776 63 23 62.776 23 62.5 L 23 61.5 C 23 61.224 22.776 61 22.5 61 z M 19 67 L 33 67 L 33 81.015625 L 23 81.015625 C 20.794 81.015625 19 79.221625 19 77.015625 L 19 67 z M 34 67 L 66 67 L 66 81.015625 L 34 81.015625 L 34 67 z M 67 67 L 80.5625 67 L 67 80.138672 L 67 67 z"/></svg>
                                                @endif
                                            </button>

                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                                                       
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal to add new user starts-->
                        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="add-new-user modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Employee</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="employee">Employee</label>
                                            <input type="text" class="form-control dt-full-name" id="employee"
                                                placeholder="employee" name="employee" aria-label="employee"
                                                aria-describedby="employee" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">E-Mail</label>
                                            <input type="email" class="form-control dt-full-name" id="email"
                                                placeholder="email" name="email" aria-label="email"
                                                aria-describedby="email" />
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->

                        <!-- Modal to update new user starts-->
                        <div class="modal modal-slide-in update_user_modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="update-new-user modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title">Update Employee</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="uemployee">employee</label>
                                            <input type="text" class="form-control" id="uemployee"
                                                placeholder="employee" name="uemployee" aria-label="uemployee"
                                                aria-describedby="uemployee"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uemail">E-Mail</label>
                                            <input type="email" class="form-control dt-full-name" id="uemail"
                                                placeholder="Email" name="uemail" aria-label="uemail"
                                                aria-describedby="uemail" />
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mr-1 data-submit update_data_user">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update new user Ends-->
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

    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-employee.js') }}"></script>
    <!-- END: Page JS-->

    <script>
    $(function() {
        var isRtl = $('html').attr('data-textdirection') === 'rtl';
        $(document).on("click", ".userupdate_new", function()  {
            var id = $(this).data('id');
            var url = 'datatrans-employee-update/' + ($(this).data('id'));
            $("#uemployee").val($(this).data('name'));
            $("#uemail").val($(this).data('email'));
            $(".update_user_modal").modal('show');

            $('.update-new-user').on("submit", function(e) {
                var formData = new FormData(this);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    cache:false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            toastr['error']('This email is already saved.', 'Error!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: isRtl
                            });
                        }
                    }
                })
            });
        });
        $(document).on("click", ".delete_employeedata", function(e) {
            var url = 'datatrans-employee-delete/' + $(this).data('id');
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: url,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data['success']){
                        window.location.reload();
                    }
                    else{
                        console.log('error');
                    }
                }
            })
        });

        $(document).on("click", ".employee_google_calendar", function(){
            var id = $(this).data('id');
            var url = '/getevents';
            var loginid = '{{Auth::user()->id}}';
            
            if(id == loginid){
                window.location.href = url;
            }
            else{
                alert("If you want this Location's Google Calendar info, you'll need to sign in to this Location info.");
            }
         
        })

    })
   
    </script>
</body>
<!-- END: Body-->

</html>