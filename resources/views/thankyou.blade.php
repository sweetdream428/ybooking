
<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <div class="navbar d-flex justify-content-end py-3">
        <div class="mr-5">
            <a href="/lang/{en}" class="mr-1">EN</a>
            <a href="/lang/{ge}" class="mr-1">GE</a>
        </div>
       
    </div>
    <!-- BEGIN: Content-->
    <div class="container">
     
        <div class="content-wrapper">
           
            <div class="content-body">
                <!-- Horizontal Wizard -->
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#page-done">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3"> {{ trans('locale.FrontendThankYou') }}</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>

                        <div class="bs-stepper-content">
                                
                            <div id="page-done" class="content">
                                <div class="content-header">
                                    <span class="content-header-explain">
                                        {{ trans('locale.FrontendDoneMessage') }}
                                    </span>
                                </div>
                                
                                <div class="d-flex justify-content-between btn-pagenation pt-4">
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /Horizontal Wizard -->

            </div>
        </div>
    </div>

    @include('layouts.footer')

   
     
    {{-- End Footer --}}

    {{-- Page --}}

    {{-- End Page --}}
</body>
<!-- END: Body-->
