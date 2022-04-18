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

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

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
            <div class="content-body mb-5">
                <!-- users list start -->
                <section class="app-user-list">
                    <div class="card">
                        <form class="validate-form update-confirmmailcontent-page mt-2">
                            @foreach ($settings as $setting)
                                
                                <div class="row">
                                    <div class="col-12 justify-content-center d-flex">
                                        <div class="form-group">
                                            <label for="exampleColorInput" class="form-label">Color picker</label>
                                            <input type="text" class="form-control form-control-color" id="exampleColorInput" value="{{$setting->setcolor}}" title="Choose your color" maxlength="7" >
											<input type="color" class="form-control form-control-color mt-3" id="exampleColorInputtext" value="{{$setting->setcolor}}" title="Choose your color" style="height: 60px;">
                                        </div>
                                    </div>
									<div class="col-12 justify-content-center d-flex">
                                        <div class="form-group">
                                            <label for="Online Payment" class="form-label"> Online payment</label>
                                            <label class="switch">
                                                <input type="checkbox" class="online-payment-check" {{$setting->setpayment == 1 ? 'checked' : ''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 justify-content-center d-flex">
                                        <button type="button" class="btn btn-primary btn_save_color mt-2 d-flex justify-content-center" data-id="{{$setting->id}}">Save changes</button>
                                    </div>
                                    
                                </div> 
                            
                                

                            @endforeach                    
                        </form>
                    </div>
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
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-setting.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(function(){
			var color;
            $('#exampleColorInputtext').on('change', function(e){
                
                $('#exampleColorInput').val($('#exampleColorInputtext').val());
            })
            $('#exampleColorInput').on('change, keyup', function(e){
                
                $('#exampleColorInputtext').val($('#exampleColorInput').val());
            })
            $(document).on("click", ".btn_save_color", function() {
                var id = $(this).data('id');
                var url = 'datatrans-setting-update/' + id;
                var color = $('#exampleColorInput').val();
				var onlinepayment = $('.online-payment-check').is(':checked') ? 1 : 0;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {color: color, onlinepayment : onlinepayment},
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            
                        }
                    }
                });         
            });
            
        })        
       
    </script>
</body>
<!-- END: Body-->

</html>