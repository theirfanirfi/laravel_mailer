<?php
/**
 * Created by PhpStorm.
 * User: naveen
 * Date: 10/27/18
 * Time: 10:43 AM
 */?>
{{--<script>(function(d, s, id) {--}}
        {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
        {{--if (d.getElementById(id)) return;--}}
        {{--js = d.createElement(s); js.id = id;--}}
        {{--js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=2097544893840527&autoLogAppEvents=1';--}}
        {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
<!-- ****** Top Header Area Start ****** -->
{{--<div class="top_header_area">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-5 col-sm-6">--}}
                {{--<!--  Top Social bar start -->--}}
                {{--<div class="top_social_bar">--}}
                    {{--<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
                    {{--<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
                    {{--<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
                    {{--<a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>--}}
                    {{--<a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!--  Login Register Area -->--}}
            {{--<div class="col-7 col-sm-6">--}}
                {{--<div class="signup-search-area d-flex align-items-center justify-content-end">--}}
                    {{--<div class="login_register_area d-flex">--}}
                        {{--<div class="login">--}}
                            {{--<a href="register.html">Sing in</a>--}}
                        {{--</div>--}}
                        {{--<div class="register">--}}
                            {{--<a href="register.html">Sing up</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Search Button Area -->--}}
                    {{--<div class="search_button">--}}
                        {{--<a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
                    {{--</div>--}}
                    {{--<!-- Search Form -->--}}
                    {{--<div class="search-hidden-form">--}}
                        {{--<form action="#" method="get">--}}
                            {{--<input type="search" name="search" id="search-anything" placeholder="Search Anything...">--}}
                            {{--<input type="submit" value="" class="d-none">--}}
                            {{--<span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- ****** Top Header Area End ****** -->

<!-- ****** Header Area Start ****** -->
<header class="header_area">
    <div class="container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-12">
                <div class="logo_area text-center">
                    <a href="index.html" class="yummy-logo">Funny Memes</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('') }}">Featured</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/About') }}">About</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Privacy Policy') }}">Privacy Policy</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Terms of Use') }}">Terms of Use</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Contact') }}">Contact</a>
                            </li>

                            @if(session('name'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('auth/facebook_logout') }}">Logout</a>
                                </li>


                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('auth/facebook') }}">Login</a>
                                </li>

                            @endif


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ****** Header Area End ****** -->

<!-- ****** Breadcumb Area Start ****** -->

@if(session('name') )



            <div class="breadcumb-area" style="background-image: url({{ session('fb_cover') }});">
                <div class="bithub_user_fb_avatar ">

                    <img src="{{ session('high_avatar') }}"><h2>Hi, {{ session('name') }}</h2>
                </div>

  @else
                    <div class="breadcumb-area" style="background-image: url({{ URL::to('/img/cover_funn.jpg') }});">
                        <div class="bithub_user_fb_avatar ">

                            {{--<img src="{{ URL::to('/img/sample_user.jpg') }}"><h2>Hi, Friend</h2>--}}
                        </div>
@endif



</div>
{{--<div class="breadcumb-nav">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-12">--}}
                {{--<nav aria-label="breadcrumb">--}}
                    {{--<ol class="breadcrumb">--}}
                        {{--<li class="breadcrumb-item"><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">Archive Page</li>--}}
                    {{--</ol>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- ****** Breadcumb Area End ****** -->
