<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Datatrans Payment">
    <meta name="keywords" content="Datatrans Payment">
    <meta name="author" content="Dmytro">
    <title>Datatrans</title>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/vendors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/pickers/form-pickadate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    {{-- tell --}}
    <link rel="stylesheet" href="https://jackocnr.com/assets/intl-tel-input-large/css/intlTelInput.css?5"/>

    
    <!-- Begin style CSS   -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/style.css') }}">
    <!-- End style CSS   -->
    <style>
		 .toast-message{
            font-size: 16px;
            font-weight: 500;
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after, table.dataTable thead .sorting::before, table.dataTable thead .sorting_asc::before, table.dataTable thead .sorting_desc::before, table.dataTable thead .sorting_asc_disabled::before, table.dataTable thead .sorting_desc_disabled::before{
            right: 0px;
            content: "";
        }
        .dropdown-item{
            width: auto;
        }
        table> tbody>tr td:first-child{
            cursor: pointer;
        }
        table> tbody>tr td:first-child:hover{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .picker{
            max-width: 340px;
            min-width: 200px;
            top: auto;
        }
        
        .btn-primary, .btn-primary:hover, .btn-primary:disabled, .btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active,.show>.btn-primary.dropdown-toggle {
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .btn-outline-primary{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        } 
        .btn-outline-primary:hover{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .btn-outline-primary.disabled,.btn-outline-primary:disabled{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .btn-outline-primary:not(:disabled):not(.disabled).active,.btn-outline-primary:not(:disabled):not(.disabled):active,.show>.btn-outline-primary.dropdown-toggle{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .btn-link{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .dropdown-item.active,.dropdown-item:active{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before{
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .custom-range::-webkit-slider-thumb{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .custom-range::-moz-range-thumb{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .custom-range::-ms-thumb{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .nav-pills .nav-link.active,.nav-pills .show>.nav-link{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .page-link{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .page-item.active .page-link{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .badge-primary{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        a.badge-primary:focus,a.badge-primary:hover{
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        a{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .user-name {
            background-color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .text-primary{
            color:<?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }
        .bg-primary{
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }

        .bs-stepper .step-trigger.disabled, .bs-stepper .step-trigger:disabled{
            opacity: 1;
        }
        .btn-next-bgcolor{
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            padding: 9px 18px;
            border-radius: 4px;
        }
        .btn-back-bgcolor{
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            padding: 9px 30px;
            border-radius: 4px;
            height: 48px;
        }
        .btn-next-font{
            font-size: 14px;
        }
        .btn-next-bgcolor:hover, .btn-back-bgcolor:hover{
            color: #fff;
        }
        .progress-step{
            height: 15px;
            width: calc(100% - 10px);
            background-color: #bec3c7;
        }
        .step:first-child > .progress-step{
            border-radius: 5px 0 0 5px;
        }
        .step:last-child > .progress-step{
            border-radius: 0 5px 5px 0;
        }
        .active > .progress-step, .crossed > .progress-step{
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .step{
            width: 20%;
        }
        .content-header-explain{
            box-sizing: border-box;
            font-family: inherit;
            font-size: 16px;
            line-height: inherit;
        }
        .btn-pagenation{
            border-top: 1px solid silver !important;
        }
        a.bg-primary:focus, a.bg-primary:hover, button.bg-primary:focus, button.bg-primary:hover{
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }
        /* ----------------- Begin Calendar Custom ------------------------ */

        .form-select{
            padding: 5px 6px 4px;
            outline: none;
            font-size: 14px;
            line-height: normal;
            border: 1px solid silver;
            border-radius: 4px;
        }
        .form-control{
            font-size: 14px;
            line-height: normal;
            border: 1px solid silver;
            border-radius: 4px;
        }
        .service-label-color{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            font-weight: 600;
        }
        .picker--opened .picker__holder{
            max-width: 320px;
            max-height: 300px;
            background: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-radius: 5px;
        }
        .picker--opened .picker__holder *{
            line-height: 16px !important;
        }
        .picker__button--clear, .picker__button--close{
            display: none !important;
        }
        .picker__day--disabled{
            background: none;
            opacity: 0.5;
            color: #fff;
        }
        .picker__day--disabled:hover, .picker__day--outfocus:hover{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            background: #fff;
            border-radius: 4px;
        }
        .picker__weekday{
            font-weight: normal;
            text-align: center;
            padding: 0;
            padding-bottom: 0.5em;
            border: 0;
            background: none;
            color: #fff ;
            font-size: 14px;
        }
        .picker__year{
            font-style: italic;
            font-size: 14px;
            font-weight: bold;
            border: 0;
            color: #fff;
        }
        .picker__month{
            font-size: 14px;
            font-weight: bold;
            border: 0;
            color: #fff;
        }
        .picker__day--infocus{
            font-size: 14px;
            font-weight: bold;
            border: 0;
            color: #fff;
        }
        .picker__day--infocus:hover{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            border-radius: 4px !important;
        }
        .picker__day--outfocus{
            opacity: 0.5;
            color: #fff;
        }
        .picker__button--today{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            font-size: 14px;
            font-weight: 600;
            border: 0;
            padding: 10px 20px !important;
            margin-bottom: 10px;
        }
        .picker__button--today::before{
            display: none;
        }
        .picker__day{
            padding: 0.3125em 0 !important;
        }
        .pickadate{
            background-color: #fff !important;
        }
        .picker__day--today{
            border: 1px solid #fff !important;
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
            border-radius: 4px !important;
        }
        .picker__day--today::before{
            display: none;
        }
        .picker__day--today:hover{
            color: #fff !important;
        }
        .picker__day--highlighted{
            background-color: #fff !important;
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }
        .picker__nav--next::before{
            border-left: 6px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
            border-right: 0 !important;
            content: " ";
            border-top: 0.5em solid transparent;
            border-bottom: 0.5em solid transparent;
            width: 0;
            height: 0;
            display: block;
            margin: 0 auto
        }
        .picker__nav--next{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
            box-sizing: content-box;
            background: #fff !important;
            border-radius: 50%;
            font-size: 14px!important;
            font-weight: bold!important;
            border: 0!important;
            right: 0;
            position: absolute;
            width: 1em;
            height: 1em;
        }
        .picker__nav--prev::before{
            border-right: 6px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
            border-left: 0 !important;
            content: " ";
            border-top: 0.5em solid transparent;
            border-bottom: 0.5em solid transparent;
            width: 0;
            height: 0;
            display: block;
            margin: 0 auto
        }
        .picker__nav--prev{
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
            box-sizing: content-box;
            background: #fff !important;
            border-radius: 50%;
            font-size: 14px!important;
            font-weight: bold!important;
            border: 0!important;
            right: 0;
            position: absolute;
            width: 1em;
            height: 1em;
        }
        .picker__nav--disabled{
            display: none;
        }

        /* -------------- End Calendar Custom --------------------- */

        /* ----------------------- Time Zone ---------------------- */
        .timezone_name{
            height: auto;
            width: 220px;
        }
        .datatrans-column{
            min-width: 127px;
            padding: 0 5px;
            display: inline-block;
            zoom: 1;
        }
        .datatrans-day{
            background: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: white;
            font-weight: bold;
            border: 1px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            display: block ;
            min-width: 0;
            width: 100%;
            margin: 1.5px 0;
            height: 36px;
            padding: 6px;
            font-size: 13px;
            line-height: 20px;
            text-align: center;
            float: none ;
            text-transform: none;
            border-radius: 4px;
        }
        .datatrans-hour{
            background: white;
            cursor: pointer;
            display: block ;
            min-width: 0;
            width: 100%;
            margin: 1.5px 0;
            height: 36px;
            padding: 6px;
            font-size: 13px;
            line-height: 20px;
            text-align: center;
            float: none ;
            text-transform: none;
            border: 1px solid #cccccc ;
            border-radius: 4px;
            cursor: pointer;
        }
        .datatrans-hour:hover{
            border: 2px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        .datatrans-hour:hover .datatrans-hour-icon{
            background: none;
            border: 2px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            width: auto;
            height: auto;
            padding: 3px;
            border-radius: 25px;
            margin-right: 3px;
        }
        .datatrans-hour:hover .datatrans-hour-icon span{
            background: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            width: 8px;
            height: 8px;
            border-radius: 10px;
            display: block;
        }
        .datatrans-time-main{
            font-weight: normal;
            color: #333 !important;
            display: flex;
            justify-content: center;
        }
        .datatrans-hour-icon{
            display: block;
            float: left;
            width: 18px;
            height: 18px;
            margin-top: 1px;
            margin-right: 5px;
            background: url('/vendor/datatrans/images/success.png') 0 0 no-repeat;
        }
        .datatrans-column{
            vertical-align: top;
        }
        .datatrans-columnizer{
            height: 376.5px;
            overflow: hidden;
        }
        /* End TimeZone -------------------- */

        /* Begin Pagenation Custom ------------------*/
            
        .simple-pagination ul {
            margin: 0 0 20px;
            padding: 0;
            list-style: none;
        }

        .simple-pagination li {
            display: none;
            margin-right: 5px;
        }
        .simple-pagination li:first-child, .simple-pagination li:last-child{
            display: inline-block;
            margin-right: 5px;
        }

        .simple-pagination li a,
        .simple-pagination li span {
            border-radius: 4px;
            background: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: white;
            font-weight: bold;
            padding: 10px 30px;
            font-size: 20px;
            text-align: center;
        }
        .simple-pagination li a:hover,
        .simple-pagination li span:hover{
            background: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: white;
        }


        .simple-pagination .prev.current,
        .simple-pagination .next.current {
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }
        /* End Pagenation -------------------- */

        /* Begin Phone Custom  ----------------- */

        .selected-flag{
            width: 75px !important;
            padding: 0 0 0 5px !important;
        }
        .iti-flag{
            zoom: 0.5;
        }
        @-moz-document url-prefix() {
            .iti-flag {
                margin-left: -15px !important;
                -moz-transform: scale(0.5);
            }
        }
        .intl-tel-input.allow-dropdown input, .intl-tel-input.allow-dropdown input[type=text], .intl-tel-input.allow-dropdown input[type=tel]{
            padding-left: 75px;
        }
        .intl-tel-input{
            height: 34px;
        }
        .country-list{
            width: 300px;
            max-height: 350px !important;
            overflow-x: hidden;
        }
        .intl-tel-input .country-list .country{
            padding: 10px 5px;
        }
        .intl-tel-input{
            display: block;
        }
        .intl-tel-input .country-list .flag-box{
            margin-right: 10px !important;
        }
        .intl-tel-input .country-list .flag-box{
            width: 40px;
        }
        .country-list li{
            width: 100%;
        }

        /* End ------------------------ */

        .bs-stepper {
            background-color: #fff;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
            border-radius: 0.5rem; }

            .bs-stepper .bs-stepper-header {
            padding: 1.5rem 1.5rem;
            flex-wrap: wrap;
            margin: 0; }

            .bs-stepper .bs-stepper-header .line {
            flex: 0;
            min-width: auto;
            min-height: auto;
            background-color: transparent;
            margin: 0;
            color: #6e6b7b;
            font-size: 1.5rem; }

            .bs-stepper .bs-stepper-header .step .step-trigger {
            padding: 0 1.75rem;
            flex-wrap: nowrap;
            font-weight: normal; 
            padding-left: 0px; }

            .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            padding: 0.5em 0;
            font-weight: 500;
            color: #babfc7;
            background-color: rgba(186, 191, 199, 0.12);
            border-radius: 0.35rem; }

            .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-label {
            text-align: left;
            margin: 0;
            margin-top: 0.5rem;}

            .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-label .bs-stepper-title {
            display: inherit;
            color: #000000;
            font-weight: 600;
            line-height: 1rem;
            margin-bottom: 0rem; }

            .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-label .bs-stepper-subtitle {
            font-weight: 400;
            font-size: 0.85rem;
            color: #b9b9c3; }

            .bs-stepper .bs-stepper-header .step .step-trigger:hover {
            background-color: transparent; }

            .bs-stepper .bs-stepper-header .step.active .step-trigger .bs-stepper-box {
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: #fff;
            box-shadow: 0 3px 6px 0 rgba(115, 103, 240, 0.4); }

            .bs-stepper .bs-stepper-header .step.active .step-trigger .bs-stepper-label .bs-stepper-title {
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>; }

            .bs-stepper .bs-stepper-header .step.crossed .step-trigger .bs-stepper-box {
            background-color: rgba(115, 103, 240, 0.12);
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important; }

            .bs-stepper .bs-stepper-header .step.crossed .step-trigger .bs-stepper-label .bs-stepper-title {
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>; }

            .bs-stepper .bs-stepper-header .step.crossed + .line {
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>; }

            .bs-stepper .bs-stepper-header .step:first-child .step-trigger {
            padding-left: 0; }

            .bs-stepper .bs-stepper-header .step:last-child .step-trigger {
            padding-right: 0; }

            .bs-stepper .bs-stepper-content {
            padding: 1.5rem 1.5rem; }

            .bs-stepper .bs-stepper-content .content {
            margin-left: 0; }

            .bs-stepper .bs-stepper-content .content .content-header {
            margin-bottom: 1rem; }

            .bs-stepper.vertical .bs-stepper-header {
            border-right: 1px solid #ebe9f1;
            border-bottom: none; }

            .bs-stepper.vertical .bs-stepper-header .step .step-trigger {
            padding: 1rem 0; }

            .bs-stepper.vertical .bs-stepper-header .line {
            display: none; }

            .bs-stepper.vertical .bs-stepper-content {
            width: 100%;
            padding-top: 2.5rem; }

            .bs-stepper.vertical .bs-stepper-content .content:not(.active) {
            display: none; }

            .bs-stepper.vertical.wizard-icons .step {
            text-align: center; }

            .bs-stepper.wizard-modern {
            background-color: transparent;
            box-shadow: none; }

            .bs-stepper.wizard-modern .bs-stepper-header {
            border: none; }

            .bs-stepper.wizard-modern .bs-stepper-content {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1); }

            .horizontal-wizard,
            .vertical-wizard,
            .modern-horizontal-wizard,
            .modern-vertical-wizard {
            margin-bottom: 2.2rem; }

            .dark-layout .bs-stepper {
            background-color: #283046;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.24); }

            .dark-layout .bs-stepper .bs-stepper-header {
            border-bottom: 1px solid rgba(59, 66, 83, 0.08); }

            .dark-layout .bs-stepper .bs-stepper-header .line {
            color: #b4b7bd; }

            .dark-layout .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-box {
            color: #babfc7; }

            .dark-layout .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-label .bs-stepper-title {
            color: #b4b7bd; }

            .dark-layout .bs-stepper .bs-stepper-header .step .step-trigger .bs-stepper-label .bs-stepper-subtitle {
            color: #676d7d; }

            .dark-layout .bs-stepper .bs-stepper-header .step.active .step-trigger .bs-stepper-box {
            background-color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
            color: #fff;
            box-shadow: 0 3px 6px 0 rgba(115, 103, 240, 0.4); }

            .dark-layout .bs-stepper .bs-stepper-header .step.active .step-trigger .bs-stepper-label .bs-stepper-title {
            color: <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>; }

            .dark-layout .bs-stepper .bs-stepper-header .step.crossed .step-trigger .bs-stepper-label,
            .dark-layout .bs-stepper .bs-stepper-header .step.crossed .step-trigger .bs-stepper-title {
            color: #676d7d; }

            .dark-layout .bs-stepper.vertical .bs-stepper-header {
            border-right-color: #3b4253; }

            .dark-layout .bs-stepper.wizard-modern {
            background-color: transparent;
            box-shadow: none; }

            .dark-layout .bs-stepper.wizard-modern .bs-stepper-header {
            border: none; }

            .dark-layout .bs-stepper.wizard-modern .bs-stepper-content {
            background-color: #283046;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.24); }

            html[data-textdirection='rtl'] .btn-prev,
            html[data-textdirection='rtl'] .btn-next {
            display: flex; }

            html[data-textdirection='rtl'] .btn-prev i,
            html[data-textdirection='rtl'] .btn-prev svg,
            html[data-textdirection='rtl'] .btn-next i,
            html[data-textdirection='rtl'] .btn-next svg {
            transform: rotate(-180deg); }

            @media (max-width: 768px) {
            /* .bs-stepper .bs-stepper-header {
                flex-direction: column;
                align-items: flex-start; } */
            .bs-stepper .bs-stepper-header .step .step-trigger {
                padding: 0.5rem 0 !important;
                flex-direction: row; }
            .bs-stepper .bs-stepper-header .line {
                display: none; }
            .bs-stepper.vertical {
                flex-direction: column; }
            .bs-stepper.vertical .bs-stepper-header {
                align-items: flex-start; }
            .bs-stepper.vertical .bs-stepper-content {
                padding-top: 1.5rem; } }
            @media (max-width: 576px) {
            .bs-stepper-header{
                display: none;
            }
        }
        
        html .pace .pace-progress {
            background : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }

                
        .navbar-container .bookmark-input input:focus {
            border : 1px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }

        .customizer .customizer-toggle {
        background : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        color : #FFFFFF !important;
        display : block;
        box-shadow : -3px 0 8px rgba(34, 41, 47, 0.1);
        border-top-left-radius : 6px;
        border-bottom-left-radius : 6px;
        position : absolute;
        top : 50%;
        width : 38px;
        height : 38px;
        left : -39px;
        text-align : center;
        line-height : 40px;
        cursor : pointer;
        }
        .customizer .color-box.selected:after {
        content : '';
        border : 1px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        height : 30px;
        width : 30px;
        top : -3px;
        left : -3px;
        position : absolute;
        border-radius : 0.5rem;
        }

        .timeline .timeline-item .timeline-point {
        position : absolute;
        left : -0.85rem;
        top : 0;
        z-index : 2;
        display : flex;
        justify-content : center;
        align-items : center;
        height : 1.75rem;
        width : 1.75rem;
        text-align : center;
        border-radius : 50%;
        border : 1px solid <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        background-color : #FFFFFF;
        }

        .timeline .timeline-item .timeline-point.timeline-point-indicator {
        left : -0.412rem;
        top : 0.07rem;
        height : 12px;
        width : 12px;
        border : 0;
        background-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        }

        .timeline .timeline-item .timeline-point i, .timeline .timeline-item .timeline-point svg {
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        font-size : 0.85rem;
        vertical-align : baseline;
        }

        .timeline .timeline-item .timeline-point.timeline-point-indicator:before {
        content : '';
        background : rgba(115, 103, 240, 0.12);
        height : 20px;
        width : 20px;
        display : block;
        position : absolute;
        top : -0.285rem;
        left : -0.285rem;
        border-radius : 50%;
        }

        .timeline .timeline-item .timeline-event {
        position : relative;
        width : 100%;
        min-height : 4rem;
        }

        .timeline .timeline-item .timeline-event .timeline-event-time {
        font-size : 0.85rem;
        color : #B9B9C3;
        }

        .timeline .timeline-item:last-of-type {
        border-left-color : transparent !important;
        }

        .timeline .timeline-item:last-of-type:after {
        content : '';
        position : absolute;
        left : -1px;
        bottom : 0;
        width : 1px;
        height : 100%;
        background : linear-gradient(#EBE9F1, transparent);
        }

        @media screen and (min-width: 0) {
        head {
            font-family : 'xs 0px';
        }
        body:after {
            content : 'xs - min-width: 0px';
        }
        }

        @media screen and (min-width: 544px) {
        head {
            font-family : 'sm 544px';
        }
        body:after {
            content : 'sm - min-width: 544px';
        }
        }

        @media screen and (min-width: 768px) {
        head {
            font-family : 'md 768px';
        }
        body:after {
            content : 'md - min-width: 768px';
        }
        }

        @media screen and (min-width: 992px) {
        head {
            font-family : 'lg 992px';
        }
        body:after {
            content : 'lg - min-width: 992px';
        }
        }

        @media screen and (min-width: 1200px) {
        head {
            font-family : 'xl 1200px';
        }
        body:after {
            content : 'xl - min-width: 1200px';
        }
        }

        head {
        clear : both;
        }

        head title {
        font-family : 'xs 0px, sm 544px, md 768px, lg 992px, xl 1200px';
        }

        body:after {
        display : none;
        }

        *[data-usn-if] {
        display : none;
        }

        .select2-container {
        width : 100% !important;
        margin : 0;
        display : inline-block;
        position : relative;
        vertical-align : middle;
        box-sizing : border-box;
        }

        .select2-container--classic:focus, .select2-container--default:focus {
        outline : none;
        }

        .select2-container--classic .select2-selection__choice, .select2-container--default .select2-selection__choice {
        font-size : 0.9rem;
        margin-top : 6px !important;
        }

        .select2-container--classic .select2-selection--single, .select2-container--default .select2-selection--single {
        min-height : 2.714rem;
        padding : 5px;
        border : 1px solid #D8D6DE;
        }

        .select2-container--classic .select2-selection--single:focus, .select2-container--default .select2-selection--single:focus {
        outline : 0;
        border-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        box-shadow : 0 3px 10px 0 rgba(34, 41, 47, 0.1) !important;
        }

        .select2-container--classic .select2-selection--single .select2-selection__rendered i, .select2-container--classic .select2-selection--single .select2-selection__rendered svg, .select2-container--default .select2-selection--single .select2-selection__rendered i, .select2-container--default .select2-selection--single .select2-selection__rendered svg {
        font-size : 1.15rem;
        height : 1.15rem;
        width : 1.15rem;
        margin-right : 0.5rem;
        }

        .select2-container--classic .select2-selection--single .select2-selection__arrow b, .select2-container--default .select2-selection--single .select2-selection__arrow b {
        background-image : url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23d8d6de\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\' class=\'feather feather-chevron-down\'%3E%3Cpolyline points=\'6 9 12 15 18 9\'%3E%3C/polyline%3E%3C/svg%3E');
        background-size : 18px 14px, 18px 14px;
        background-repeat : no-repeat;
        height : 1rem;
        padding-right : 1.5rem;
        margin-left : 0;
        margin-top : 0;
        left : -8px;
        border-style : none;
        }

        .select2-container--classic.select2-container--open, .select2-container--default.select2-container--open {
        box-shadow : 0 5px 25px rgba(34, 41, 47, 0.1);
        }

        .select2-container--classic.select2-container--open .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--single {
        border-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        outline : 0;
        }

        .select2-container--classic.select2-container--focus, .select2-container--default.select2-container--focus {
        outline : 0;
        }

        .select2-container--classic.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        outline : 0;
        }

        .select2-container--classic .select2-dropdown, .select2-container--default .select2-dropdown {
        border-color : #D8D6DE;
        }

        .select2-container--classic .select2-search--dropdown, .select2-container--default .select2-search--dropdown {
        padding : 0.5rem;
        }

        .select2-container--classic .select2-search--dropdown .select2-search__field, .select2-container--default .select2-search--dropdown .select2-search__field {
        outline : none !important;
        border-radius : 0.357rem;
        border-color : #D8D6DE;
        padding : 0.438rem 1rem;
        }

        .select2-container--classic .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
        min-height : 38px !important;
        border : 1px solid #D8D6DE;
        }

        .select2-container--classic .select2-selection--multiple:focus, .select2-container--default .select2-selection--multiple:focus {
        outline : 0;
        border-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        box-shadow : 0 3px 10px 0 rgba(34, 41, 47, 0.1) !important;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        border-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        color : #FFFFFF;
        padding : 2px 5px;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__rendered, .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding : 0 6px;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__rendered li .select2-search__field, .select2-container--default .select2-selection--multiple .select2-selection__rendered li .select2-search__field {
        margin-top : 7px;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        float : right;
        margin-left : 0.7rem;
        margin-right : 0.5rem;
        font-size : 0;
        display : inline-block;
        position : relative;
        line-height : 1rem;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:before, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:before {
        content : '';
        background-image : url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23fff\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\' class=\'feather feather-x\'%3E%3Cline x1=\'18\' y1=\'6\' x2=\'6\' y2=\'18\'%3E%3C/line%3E%3Cline x1=\'6\' y1=\'6\' x2=\'18\' y2=\'18\'%3E%3C/line%3E%3C/svg%3E');
        background-size : 0.85rem;
        height : 0.85rem;
        width : 0.85rem;
        position : absolute;
        top : 22%;
        left : -4px;
        }

        .select2-container--classic .select2-selection--multiple i, .select2-container--classic .select2-selection--multiple svg, .select2-container--default .select2-selection--multiple i, .select2-container--default .select2-selection--multiple svg {
        position : relative;
        top : 1px;
        margin-right : 0.5rem;
        height : 1.15rem;
        width : 1.15rem;
        font-size : 1.15rem;
        padding-left : 1px;
        }

        .select2-container--classic .select2-results__group, .select2-container--default .select2-results__group {
        padding : 6px 9px;
        font-weight : 600;
        }

        .select2-container--classic .select2-results__option, .select2-container--default .select2-results__option {
        padding : 0.428rem 1rem;
        }

        .select2-container--classic .select2-results__option[role='group'], .select2-container--default .select2-results__option[role='group'] {
        padding : 0;
        }

        .select2-container--classic .select2-results__option[aria-selected='true'], .select2-container--default .select2-results__option[aria-selected='true'] {
        background-color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        color : white !important;
        }

        .select2-container--classic .select2-results__option i, .select2-container--classic .select2-results__option svg, .select2-container--default .select2-results__option i, .select2-container--default .select2-results__option svg {
        height : 1.15rem;
        width : 1.15rem;
        font-size : 1.15rem;
        margin-right : 0.5rem;
        }

        .select2-container--classic .select2-results__option--highlighted, .select2-container--default .select2-results__option--highlighted {
        background-color : rgba(115, 103, 240, 0.12) !important;
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }

        .select2-container--classic .select2-result-repository__avatar img, .select2-container--default .select2-result-repository__avatar img {
        width : 50px;
        }

        .select2-container--classic .select-lg, .select2-container--default .select-lg {
        min-height : 2.714rem !important;
        font-size : 1.2rem;
        margin-bottom : 0 !important;
        padding : 0.3rem 0.7rem;
        }

        .select2-container--classic .select-lg.select2-selection--single .select2-selection__rendered, .select2-container--default .select-lg.select2-selection--single .select2-selection__rendered {
        padding-top : -0.1rem;
        }

        .select2-container--classic .select-lg.select2-selection--single .select2-selection__arrow, .select2-container--default .select-lg.select2-selection--single .select2-selection__arrow {
        top : 0rem !important;
        }

        .select2-container--classic .select-lg.select2-selection--multiple, .select2-container--default .select-lg.select2-selection--multiple {
        padding : 0 0.2rem;
        }

        .select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered {
        padding-top : 0 !important;
        }

        .select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered li, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered li {
        font-size : 1.2rem;
        }

        .select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered li .select2-search__field, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered li .select2-search__field {
        margin-top : 10px;
        }

        .select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
        padding : 5px;
        }

        .select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice .select2-selection__choice__remove:before, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice .select2-selection__choice__remove:before {
        top : 46%;
        }

        .select2-container--classic .select-sm, .select2-container--default .select-sm {
        min-height : 2.142rem !important;
        padding : 0 0.2rem;
        font-size : 0.75rem;
        margin-bottom : 0 !important;
        line-height : 1.5;
        }

        .select2-container--classic .select-sm.select2-selection--single .select2-selection__arrow, .select2-container--default .select-sm.select2-selection--single .select2-selection__arrow {
        top : -0.3rem !important;
        }

        .select2-container--classic .select-sm.select2-selection--multiple, .select2-container--default .select-sm.select2-selection--multiple {
        line-height : 1.3;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-selection__rendered, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__rendered {
        padding : 3px;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-selection__rendered li, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__rendered li {
        font-size : 0.75rem;
        margin-top : 2px;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-selection__rendered li .select2-search__field, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__rendered li .select2-search__field {
        margin-top : 4px;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-selection__choice, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__choice {
        padding : 0 0.2rem;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove:before, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove:before {
        top : 5%;
        }

        .select2-container--classic .select-sm.select2-selection--multiple .select2-search--inline .select2-search__field, .select2-container--default .select-sm.select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top : 0;
        }

        .dark-layout .select2-container .select2-selection, .dark-layout .select2-container .select2-search__field, .dark-layout .select2-container .select2-selection__placeholder {
        background : #283046;
        border-color : #3B4253;
        color : #B4B7BD;
        }

        .dark-layout .select2-container .select2-selection__rendered {
        color : #B4B7BD;
        }

        .dark-layout .select2-container .select2-dropdown {
        background-color : #283046;
        border-color : #3B4253;
        }

        .dark-layout .select2-container .select2-selection--multiple .select2-selection__choice {
        background : rgba(115, 103, 240, 0.12) !important;
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        border : none;
        }

        .dark-layout .select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?> !important;
        }


        .main-menu.menu-light .navigation > li ul .active {
        background : linear-gradient(118deg, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70);
        box-shadow : 0 0 10px 1px <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70;
        border-radius : 4px;
        z-index : 1;
        }

        .main-menu.menu-light .navigation > li.active > a {
        background : linear-gradient(118deg, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70);
        box-shadow : 0 0 10px 1px <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70;
        color : #FFFFFF;
        font-weight : 400;
        border-radius : 4px;
        }

        .main-menu.menu-light .navigation > li .active > a {
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        margin-bottom : 0;
        }

        .main-menu.menu-dark .navigation > li.active > a {
        background : linear-gradient(118deg, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70);
        box-shadow : 0 0 10px 1px <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70;
        color : #FFFFFF;
        font-weight : 400;
        border-radius : 4px;
        }
        .main-menu.menu-dark .navigation > li .active > a {
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        margin-bottom : 0;
        }

        .main-menu.menu-dark .navigation > li ul .active {
        background : linear-gradient(118deg, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>, <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70);
        box-shadow : 0 0 10px 1px <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>70;
        border-radius : 4px;
        z-index : 1;
        }
        .main-menu .navbar-header .navbar-brand .brand-text {
        color : <?php echo (Auth::user() && Auth::user()->setcolor ? Auth::user()->setcolor: (!isset($setcolor) ? '#f4662f' : $setcolor)) ?>;
        padding-left : 1rem;
        margin-bottom : 0;
        font-weight : 600;
        letter-spacing : 0.01rem;
        font-size : 1.45rem;
        -webkit-animation : 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) 0s normal forwards 1 fadein;
                animation : 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) 0s normal forwards 1 fadein;
        }


    </style>
</head>