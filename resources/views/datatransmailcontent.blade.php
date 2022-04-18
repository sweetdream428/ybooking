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
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column nav-left">
                                <!-- Order -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-pill-Service" data-toggle="pill" href="#account-vertical-service" aria-expanded="true">
                                        <i class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Order</span>
                                    </a>
                                </li>
                                <!-- Confirm -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-confirmmailcontent" data-toggle="pill" href="#account-vertical-confirmmailcontent" aria-expanded="false">
                                        <i class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Confirm</span>
                                    </a>
                                </li>
                                <!-- declined -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-declinedmailcontent" data-toggle="pill" href="#account-vertical-declinedmailcontent" aria-expanded="false">
                                        <i class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Declined</span>
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
                                        <!-- mailcontents tab -->
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-service" aria-labelledby="account-pill-service" aria-expanded="true">
                                            @foreach ($mailcontents as $mailcontent)
                                                <!-- form -->
                                                <form class="validate-form update-mailcontents-page mt-2">
                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-12 col-sm-3"></div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="ordersetfrom">From</label>
                                                                    <input type="text" class="form-control" id="ordersetfrom" name="ordersetfrom" placeholder="Title" value="{{$mailcontent->ordersetfrom}}" required/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3"></div>
                                                        </div>
                                                        <div class="row col-12">
                                                            <div class="col-12 col-sm-3"></div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="ordersetsubject">Subject</label>
                                                                    <input type="text" class="form-control" id="ordersetsubject" name="ordersetsubject" placeholder="Title" value="{{$mailcontent->ordersetsubject}}" required/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3"></div>
                                                        </div>
                                                        <div class="row col-12">
                                                            <div class="col-12 col-sm-3"></div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="ordersetcontent">Content</label>
                                                                    <textarea class="form-control" id="ordersetcontent" name="ordersetcontent" rows="5" required>{{ $mailcontent->ordersetcontent }}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3"></div>
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                    </div>
                                                </form>
                                                <!--/ form -->
                                            @endforeach
                                        </div>
                                        <!--/ mailcontents tab -->

                                        <!-- confirmmailcontent tab -->
                                        <div role="tabpanel" class="tab-pane" id="account-vertical-confirmmailcontent" aria-labelledby="account-pill-confirmmailcontent" aria-expanded="true">

                                            <!-- form -->
                                            <form class="validate-form update-confirmmailcontent-page mt-2">
                                                    
                                                <div class="row">
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="confirmsetfrom">From</label>
                                                                <input type="text" class="form-control" id="confirmsetfrom" name="confirmsetfrom" placeholder="" value="{{$mailcontent->confirmsetfrom}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="confirmsetsubject">Subject</label>
                                                                <input type="text" class="form-control" id="confirmsetsubject" name="confirmsetsubject" placeholder="" value="{{$mailcontent->confirmsetsubject}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="confirmsetcontent">Content</label>
                                                                <textarea class="form-control" id="confirmsetcontent" name="confirmsetcontent" rows="5" required>{{ $mailcontent->confirmsetcontent }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                </div>

                                            </form>
                                            <!--/ form -->

                                        </div>
                                        <!--/ confirmmailcontent tab -->

                                        <!-- declinedmailcontent tab -->
                                        <div role="tabpanel" class="tab-pane" id="account-vertical-declinedmailcontent" aria-labelledby="account-pill-declinedmailcontent" aria-expanded="true">

                                            <!-- form -->
                                            <form class="validate-form update-declinedmailcontent-page mt-2">
                                                    
                                                <div class="row">
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="declinedsetfrom">From</label>
                                                                <input type="text" class="form-control" id="declinedsetfrom" name="declinedsetfrom" placeholder="" value="{{$mailcontent->declinedsetfrom}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="declinedsetsubject">Subject</label>
                                                                <input type="text" class="form-control" id="declinedsetsubject" name="declinedsetsubject" placeholder="" value="{{$mailcontent->declinedsetsubject}}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="declinedsetcontent">Content</label>
                                                                <textarea class="form-control" id="declinedsetcontent" name="declinedsetcontent" rows="5" required>{{ $mailcontent->declinedsetcontent }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                </div>

                                            </form>
                                            <!--/ form -->

                                        </div>
                                        <!--/ declinedmailcontent tab -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
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
    $(function() {        
        $('.update-mailcontents-page').on("submit", function(e) {
            var id = "{{Auth::user()->id}}";
            var url = 'datatrans-ordermailcontent-update/' + id;
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

        $('.update-confirmmailcontent-page').on("submit", function(e) {
            var id = "{{Auth::user()->id}}";
            var url = 'datatrans-confirmmailcontent-update/' + id;
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

        $('.update-declinedmailcontent-page').on("submit", function(e) {
            var id = "{{Auth::user()->id}}";
            var url = 'datatrans-declinedmailcontent-update/' + id;
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
    })
   
    </script>
</body>
<!-- END: Body-->

</html>