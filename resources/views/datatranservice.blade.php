<!-- BEGIN: Head-->
@include('layouts.header')
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
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>title</th>
										<th>category</th>
                                        <th>location</th>
                                        <th>emloyee</th>
                                        <th>duration</th>
                                        <th>price</th>
                                        <th>Day of the week</th>
                                        <th>Allow</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{$service->title}}</td>
										<td>{{$service->category}}</td>
                                        <td>{{$service->location}}</td>
                                        <td>{{$service->employee}}</td>
                                        <td>{{$service->duration_name}}</td>
                                        <td>{{$service->price}}</td>
                                        <td>{{$service->sun == 1 ? 'Sun' : ''}} {{$service->mon == 1 ? 'Mon' : ''}} {{$service->tue == 1 ? 'Tue' : ''}} {{$service->wed == 1 ? 'Wed' : ''}} {{$service->thu == 1 ? 'Thu' : ''}} {{$service->fri == 1 ? 'Fri' : '' }} {{$service->sat == 1 ? 'Sat' : ''}}</td>
                                        <td>{{$service->allow}}</td>
                                        <td>
                                            <button class="dropdown-item update_service d-inline" data-id="{{$service->id}}" data-title="{{$service->title}}" data-duration = "{{$service->duration}}" data-duration_name="{{$service->duration_name}}" data-price="{{$service->price}}" data-sun="{{$service->sun}}" data-mon="{{$service->mon}}" data-tue="{{$service->tue}}" data-wed="{{$service->wed}}" data-thu="{{$service->thu}}" data-sat="{{$service->sat}}" data-fri="{{$service->fri}}" data-allow="{{$service->allow}}" data-category="{{$service->category}}" data-employee="{{$service->employee}}" data-location="{{$service->location}}">
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
                                        
                                            <button class="dropdown-item d-inline delete_service" data-id="{{$service->id}}">
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

                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                                                       
                                </tbody>
                            </table>
                        </div>
                        {{-- <!-- Modal to add new user starts-->
                        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="add-new-user modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" class="form-control dt-full-name" id="title"
                                                placeholder="Title" name="title" aria-label="title"
                                                aria-describedby="title" />
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="category">Category</label>
                                            <select class="form-control"  name="category" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="location">Location</label>
                                            <select class="form-control"  name="location" required>
                                                @foreach ($locations as $location)
                                                    <option value="{{$location->name}}">{{$location->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="employee">Employee</label>
                                            <select class="form-control"  name="employee" required>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
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
                                        <div class="form-group">
                                            <label class="form-label" for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="price"
                                                placeholder="10.00" name="price" aria-label="price"
                                                aria-describedby="price" />
                                        </div>
                                        
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="sun" name="sun" checked />
                                            <label class="custom-control-label" for="sun">sun</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="mon" name="mon" checked />
                                            <label class="custom-control-label" for="mon">mon</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="tue" name="tue" checked />
                                            <label class="custom-control-label" for="tue">tue</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="wed" name="wed" checked />
                                            <label class="custom-control-label" for="wed">wed</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="thu" name="thu" checked />
                                            <label class="custom-control-label" for="thu">thu</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="fri" name="fri" checked />
                                            <label class="custom-control-label" for="fri">fri</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="sat" name="sat" checked />
                                            <label class="custom-control-label" for="sat">sat</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="allow">Allow</label>
                                            <input type="number" min="1" step="1" class="form-control" id="allow" name="allow" value="1" required/>
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
                                        <h5 class="modal-title">Update Service</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="utitle">Title</label>
                                            <input type="text" class="form-control dt-full-name" id="utitle"
                                                placeholder="Title" name="utitle" aria-label="utitle"
                                                aria-describedby="utitle" />
                                        </div>

										<div class="form-group">
                                            <label class="form-label" for="category">Category</label>
                                            <select class="form-control" id="ucategory" name="ucategory" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="location">Location</label>
                                            <select class="form-control" id="ulocation" name="ulocation" required>
                                                @foreach ($locations as $location)
                                                    <option value="{{$location->name}}">{{$location->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="employee">Employee</label>
                                            <select class="form-control" id="uemployee" name="uemployee" required>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="uduration_name">Duration</label>
                                            <input type="text" name="uduration_name" class="uduration_name_value" hidden>
                                            <select name="uduration" id="uduration" class="form-control uduration_value">
                                                <option value="900">15 min</option>
                                                <option value="1800">30 min</option>
                                                <option value="2700">45 min</option>
                                                <option value="3600">1 hour</option>
                                                <option value="5400">1 hour 30 min</option>
                                                <option value="7200">2 hour</option>
                                                <option value="10800">3 hour</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uprice">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="uprice"
                                                placeholder="10.00" name="uprice" aria-label="uprice"
                                                aria-describedby="uprice" />
                                        </div>
                                       
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="usun" name="usun" />
                                            <label class="custom-control-label" for="usun">Sun</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="umon" name="umon" />
                                            <label class="custom-control-label" for="umon">Mon</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="utue" name="utue" />
                                            <label class="custom-control-label" for="utue">Tue</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="uwed" name="uwed" />
                                            <label class="custom-control-label" for="uwed">Wed</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="uthu" name="uthu" />
                                            <label class="custom-control-label" for="uthu">Thu</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="ufri" name="ufri" />
                                            <label class="custom-control-label" for="ufri">Fri</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="usat" name="usat" />
                                            <label class="custom-control-label" for="usat">Sat</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uallow">Allow</label>
                                            <input type="number" min="1" step="1" class="form-control" id="uallow" name="uallow" value="1" required/>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update new user Ends--> --}}
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
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-service.js') }}"></script>
    <!-- END: Page JS-->

    <script>
    $(function() {

        var duration_name = $('.duration_name_value:text');
        var duration = $('.duration_value option:selected').text();
        
        duration_name.val(duration);
        
        $('.duration_value').change(function(e){
            duration = $('.duration_value option:selected').text();
            duration_name.val(duration);
        });

        $(document).on('click', '.add_new_service', function(){
            var url = '{{route('datatrans.service.create')}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                success: function(data) {
                    if(data['success']){
                        console.log('success', data['success']);
                        window.location.href = 'datatrans-service-list/' + data['success'];
                    }
                    else{
                        console.log('error');
                    }
                }
            })
        });
        
        $(document).on("click", ".update_service", function()  {
            var id = $(this).data('id');
            
            // window.location.href = 'datatrans-service-update/' + id;
            
            var url = 'datatrans-service-update/' + ($(this).data('id'));
            $("#utitle").val($(this).data('title'));
            $("#uprice").val($(this).data('price'));
            $(".uduration_value").val($(this).data('duration'));
            var uduration_name = $('.uduration_name_value:text');
            var uduration = $('.uduration_value option:selected').text();
            uduration_name.val(uduration);
            $('.uduration_value').change(function(e){
                uduration = $('.uduration_value option:selected').text();
                uduration_name.val(uduration);
            });

            $("#uallow").val($(this).data('allow'));
			$("#ucategory").val($(this).data('category'));
            $("#ulocation").val($(this).data('location'));
            $("#uemployee").val($(this).data('employee'));

            if($(this).data('sun') == 1){
                $("#usun").attr({checked:true});
            }
            if($(this).data('sun') != 1){
                $("#usun").attr({checked:false});
            }
            if($(this).data('mon') == 1){
                $("#umon").attr({checked:true});
            }
            if($(this).data('mon') != 1){
                $("#umon").attr({checked:false});
            }
            if($(this).data('tue') == 1){
                $("#utue").attr({checked:true});
            }
            if($(this).data('tue') != 1){
                $("#utue").attr({checked:false});
            }
            if($(this).data('wed') == 1){
                $("#uwed").attr({checked:true});
            }
            if($(this).data('wed') != 1){
                $("#uwed").attr({checked:false});
            }
            if($(this).data('thu') == 1){
                $("#uthu").attr({checked:true});
            }
            if($(this).data('thu') != 1){
                $("#uthu").attr({checked:false});
            }
            if($(this).data('fri') == 1){
                $("#ufri").attr({checked:true});
            }
            if($(this).data('fri') != 1){
                $("#ufri").attr({checked:false});
            }
            if($(this).data('sat') == 1){
                $("#usat").attr({checked:true});
            }
            if($(this).data('sat') != 1){
                $("#usat").attr({checked:false});
            }
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
                            console.log('error');
                        }
                    }
                })
            });
        });

        $(document).on("click", ".delete_service", function(e) {
            var url = 'datatrans-service-delete/' + $(this).data('id');
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

        var timePickr = $('.flatpickr-time');

        // Time
        if (timePickr.length) {
          timePickr.flatpickr({
            enableSeconds: true,
            enableTime: true,
            noCalendar: true,
            time_24hr: true 
          });
        }
        
    })
   
    </script>
</body>
<!-- END: Body-->

</html>