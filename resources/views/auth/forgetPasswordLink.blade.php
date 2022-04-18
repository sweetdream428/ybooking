@include('layouts.header')
  
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static d-flex align-items-center" >

    <div class="w-100 100vh">

        <div class="content-wrapper justify-content-center d-flex">
            
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Reset Password v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                
                                <h4 class="card-title mb-1">Reset Password 🔒</h4>
                                <p class="card-text mb-2">Your new password must be different from previously used passwords</p>

                                <form class="auth-reset-password-form mt-2" action="{{ route('reset.password.post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="email_address">E-Mail Address</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="email" class="form-control form-control-merge" id="email_address" name="email" placeholder="email@email.com" aria-describedby="email" tabindex="1" autofocus required/>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">New Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" tabindex="1" minlength="6" autofocus required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i></span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password_confirmation" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" tabindex="2" minlength="6" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="3">Set New Password</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{route('login')}}"> <i data-feather="chevron-left"></i> Back to login </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Reset Password v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->
</body>