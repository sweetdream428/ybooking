<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static d-flex align-items-center" >
    <div class="w-100 100vh">
        <div class="content-wrapper justify-content-center d-flex">
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    
                    <div class="auth-inner py-2">
                        <!-- Forgot Password v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success mb-5 d-flex justify-content-center align-items-center" role="alert" style="height: 60px;">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="warning alert-warning text-danger mb-5 d-flex justify-content-center align-items-center" style="height: 60px;">{{ $errors->first('email') }}</span>
                                @endif
                                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

                                <form class="auth-forgot-password-form mt-2" action="{{ route('forget.password.post') }}" method="POST">
                                    {{csrf_field()}}
                                   
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email_address" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus required/>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{ route('login')}}"> <i data-feather="chevron-left"></i> Back to login </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Forgot Password v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

<!-- BEGIN: Footer-->
@include('layouts.footer')
<!-- END: Footer-->   