<!DOCTYPE html>
<html lang="en" dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>تسجيل الدخول</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
        <!-- css -->
        <link href="{{ URL::asset('public/assets/css/rtl.css') }}" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">
            <!--start preloader -->
            <div id="pre-loader">
                <img src="{{URL::asset('public/assets/img/loader-01.svg')}}" alt="">
            </div>
            <!--end preloader -->

            <!--start login-->
            <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url('{{ asset('assets/img/sativa.png')}}');">
                <div class="container">
                    <div class="row justify-content-center no-gutters vertical-align">
                        <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url('{{ asset('assets/img/sativa.png')}}');">
                            <div class="login-fancy">
                                <h2 class="text-white mb-20">مرحباً..!!</h2>
                                <p class="mb-20 text-white">شاشة تسجيل الدخول الخاصة بموقع أبرار</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 bg-white">
                            <div class="login-fancy pb-40 clearfix">
                                @if($type == 'student')
                                <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول طالب</h3>
                                @elseif($type == 'teacher')
                                <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول معلم</h3>
                                @else
                                <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول إدارة</h3>
                                @endif
                                <form method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="section-field mb-20 form-group">
                                        <label class="mb-10" for="name">البريدالإلكتروني</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color:lavender;">
                                        <input type="hidden" value="{{$type}}" name="type">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="section-field mb-20">
                                        <label class="mb-10" for="Password">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color:lavender;">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button class="button"><span>دخول</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end login-->
        </div>
        <!-- jquery -->
        <script src="{{ URL::asset('public/assets/js/jquery-3.3.1.min.js') }}"></script>
        <!-- plugins-jquery -->
        <script src="{{ URL::asset('public/assets/js/plugins-jquery.js') }}"></script>
        <!-- plugin_path -->
        <script>
            var plugin_path = 'js/';
        </script>
        <!-- chart -->
        <script src="{{ URL::asset('public/assets/js/chart-init.js') }}"></script>
        <!-- calendar -->
        <script src="{{ URL::asset('public/assets/js/calendar.init.js') }}"></script>
        <!-- charts sparkline -->
        <script src="{{ URL::asset('public/assets/js/sparkline.init.js') }}"></script>
        <!-- charts morris -->
        <script src="{{ URL::asset('public/assets/js/morris.init.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ URL::asset('public/assets/js/datepicker.js') }}"></script>
        <!-- sweetalert2 -->
        <script src="{{ URL::asset('public/assets/js/sweetalert2.js') }}"></script>
        <!-- toastr -->
        @yield('js')
        <script src="{{ URL::asset('public/assets/js/toastr.js') }}"></script>
        <!-- validation -->
        <script src="{{ URL::asset('public/assets/js/validation.js') }}"></script>
        <!-- lobilist -->
        <script src="{{ URL::asset('public/assets/js/lobilist.js') }}"></script>
        <!-- custom -->
        <script src="{{ URL::asset('public/assets/js/custom0.js') }}"></script>
    </body>

</html>
