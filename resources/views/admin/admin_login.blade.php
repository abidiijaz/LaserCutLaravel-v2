<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laser Cut</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="eCommerce ">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('user-end/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('user-end/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user-end/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('user-end/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('user-end/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('user-end/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="application-name" content="">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('user-end/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('user-end/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('user-end/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/skins/skin-demo-4.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/demos/demo-4.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body>
    <div class="page-wrapper">
       
        <!-- End .header -->

        <main class="main d-flex align-items-center">
       
            <div class="login-page h-100 box w-100">
            	<div class="container">
            		<div class="col-md-12">
                    <div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    
							</ul>
							<div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form method="POST" action="{{ url('admin') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <!-- <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label> -->
                                                
                                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="signin-remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            
                                            </div><!-- End .custom-checkbox -->

                                            <!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <!-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p> -->
                                        <!-- <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div>
                                        </div> -->
                                    <!-- </div> -->
                                </div><!-- .End .tab-pane -->
                                
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
                    </div>
            </div><!-- End .login-page section-bg -->

            
        </main><!-- End .main -->
      
    <!-- Plugins JS File -->
    <script src="{{asset('user-end/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.countdown.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('user-end/assets/js/main.js')}}"></script>
    <script src="{{asset('user-end/assets/js/demos/demo-4.js')}}"></script>
<script type="text/javascript">
    $("document").ready(function(){
        $(".menu li").hover(function() {
            $(".menu-vertical li:first-child").addClass('show');
            $("div.inner-div-megamenu1").css("display","block");
        });
    });
</script>
</body>
</html>