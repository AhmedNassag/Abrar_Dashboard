<!-- Title -->
<title> Coding System - Dashboard Template </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('public/assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!--  Custom Scroll bar-->
<link href="{{URL::asset('public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('public/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">


@yield('css')
<!-- Internal DataTable css -->
<link href="{{ URL::asset('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('public/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('public/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal Notify -->
<link href="{{ URL::asset('public/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<!--- Internal Select2 css-->
<link href="{{ URL::asset('public/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('public/assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('public/assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
<!---Internal Fileuploads css-->
<link href="{{ URL::asset('public/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal FancyUploder css-->
<link href="{{ URL::asset('public/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />


<!---Internal Owl Carousel css-->
<link href="{{URL::asset('public/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('public/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal  Prism css-->
<link href="{{URL::asset('public/assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('public/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('public/assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">


<!-- Print -->
<style>
    @media print {
        .notPrint {
            display: none;
        }
    }
</style>

@if (App::getLocale() == 'ar')
    <!-- Icons css -->
    <link href="{{URL::asset('public/assets/css-rtl/icons.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('public/assets/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Style-dark css -->
    <link href="{{URL::asset('public/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skin-modes css-->
    <link href="{{URL::asset('public/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else
    <!-- Icons css -->
    <link href="{{URL::asset('public/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/css/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('public/assets/css/style.css')}}" rel="stylesheet">
    <!--- Style-dark css -->
    <link href="{{URL::asset('public/assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skin-modes css-->
    <link href="{{URL::asset('public/assets/css/skin-modes.css')}}" rel="stylesheet">
@endif