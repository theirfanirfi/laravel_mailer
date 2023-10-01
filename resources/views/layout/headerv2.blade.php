<?php
/**
 * Created by PhpStorm.
 * User: naveen
 * Date: 10/27/18
 * Time: 10:41 AM
 */?>

<head>

    <!-- Google Tag Manager -->
    {{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
                {{--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
            {{--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
            {{--'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
        {{--})(window,document,'script','dataLayer','GTM-MNDV5DV');</script>--}}
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="description" content=" Founded in 2018, FunnyMemes.me’s mission is to Entertain communities who use social medias including
    Facebook, Twitter and WhatsApp.

    FunnyMemes.me was develop and design by bitHub.lk

        We will never use your personal information and never store any password or any sensitive data. ">

    {{--@if(!isset($product->description))--}}
        {{--<meta name="description" content="Funny Memes ">--}}
        {{--@else--}}

        {{--<meta name="description" content="{{ $product->description }}">--}}
        {{--@endif--}}


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->



    <meta property="og:site_name" content="<?php echo env('APP_NAME'); ?>">
    <meta property="og:image:height " content="480">
    <meta property="og:image:width" content="800">

    @if(isset($image_gen))
            <meta property="og:image" content="{{ URL::to('/'.$image_gen) }}">


    @endif
    <meta property="og:url" content="{{ url()->current() }}">

               <meta property="og:type" content="article">

    @if(isset($product->app_name))
            <meta property="og:title" content="<?php echo $product->app_name; ?>">
        <meta property="og:description" content="<?php echo $product->description; ?>">
    @endif


    <meta property="fb:app_id" content="<?php echo  env('FACEBOOK_CLIENT_ID'); ?>">



    <meta property="og:locale" content="en_US">







   <!-- Title -->
     <title>{{ env('APP_NAME') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="{{ URL::to('style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ URL::to('css/responsive/responsive.css') }}" rel="stylesheet">
    <script src="{{ URL::to('/js/jquery/jquery-2.2.4.min.js') }}"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

</head>
