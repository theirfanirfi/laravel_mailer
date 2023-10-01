<!DOCTYPE html>
<html lang="en">

@include('layout.headerv2')

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNDV5DV"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Preloader Start -->
<div id="preloader">
    <div class="yummy-load"></div>
</div>




<!-- ****** Top Header Area Start ****** -->
@include('layout.navigation')
<!-- ****** Header Area End ****** -->

<!-- ****** Welcome Post Area Start ****** -->

<!-- ****** Welcome Area End ****** -->

<!-- ****** Categories Area Start ****** -->
<section class="categories_area clearfix" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">

                    <div class="catagory-title">
                        <a href="#">
                            <h5>Your Add </h5>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ****** Categories Area End ****** -->

<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 ">
                <div class="row">

                    <!-- Single Post -->
                    <div class="col-12">
                        <div class="single-post wow fadeInUp" data-wow-delay=".2s">

                            <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="post-thumb ">
                                {{--<img src="{{ URL::to('/'.$image_gen) }}" alt="">--}}
                                    @if(session('name'))


                                        <img src=" {{ URL::to('/'.$image_gen) }}" alt="">
                                        @else
                                        <img src="{{ URL::to('/app_images/'.$product->cover_image) }}" alt="">

                                    @endif



                            </div>

                            </div>
                            <div class="col-12 col-lg-4">
                                @if(session('name'))

                                    <script>
                                        function send_fb_sh_bithub( this1) {

                                            //console.log('done');

                                            $.get( "{{ URL::to('bitH_set_shared/'.$image_name) }}", function( data ) {
                                                $( ".result" ).html( data );
                                            });

                                            window.open(this1, 'Facebook', 'width=640,height=580');
                                        }

                                    </script>



                                <div>

                                    <h4>
                                        Hey, {{ session('name') }}

                                    </h4>
                                    <p>
                                        Let's share this on Facebook
                                    </p>
                                </div>

                                <div class="row  text-center">
                                    <div class="col-12">

                                        <div class="fb-like" data-href="{{ url()->current() }}" data-width="800px" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>

                                    </div>
                                    <div class="bithub-fb-dev col-12">

                                        <a class="  bithub-fb-share "  onclick="send_fb_sh_bithub('//www.facebook.com/sharer/sharer.php?app_id={{ env('FACEBOOK_CLIENT_ID') }}&sdk=joey&u={{ URL::to('share/'.$product->app_ref.'/'.$image_gen) }}&display=popup&ref=plugin&src=share_button')"> <i class="fab fa-facebook-square"></i> Share On Facebook</a>

                                    </div>

                                </div>


                                @else

                                    <div>


                                        <h4>
                                            Let's Login to play
                                        </h4>
                                    </div>

                                    <div class="row  text-center">
                                        <div class="bithub-fb-dev col-12">

                                    <a class="bithub-fb-share biyhub-fb-sh " href="{{ url('auth/facebook') }}" type=""><i class="fab fa-facebook-square"></i> Login</a>
                                        </div>
                                    </div>


                                @endif

                            </div>
                            </div>
                            <!-- Post Thumb -->


                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->

                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php

                                                $date = new DateTime($product->added_date);
                                                echo $date->format('d M Y');


                                                ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <h2 class=""> {{ $product->app_name }}</h2>
                                </a>
                                <p>

                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>
                    </div>


                    @foreach ($products as $product)
                        <div class="col-12 col-md-6 col-lg-4 lazy1">
                            {{--<a href="/Apps/{{ $product->app_ref  }}">--}}
                            <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                                <!-- Post Thumb -->
                                <a href="/Apps/{{ $product->app_ref  }}">
                                    <div class="post-thumb">
                                        {{--<img src="app_images/{{ $product->cover_image  }}" alt="">--}}
                                        <img class="lazy" data-src="{{ URL::to('/app_images/'.$product->cover_image) }}" alt="">
                                    </div>
                                </a>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                        {{--<div class="post-author">--}}
                                        {{--<a href="#">By Marian</a>--}}
                                        {{--</div>--}}
                                        <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#"><?php

                                                    $date = new DateTime($product->added_date);
                                                    echo $date->format('d M Y');


                                                    ?></a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/Apps/{{ $product->app_ref  }}">
                                        <h4 class="post-headline">{{ $product->app_name }}</h4>
                                    </a>
                                </div>
                            </div>

                        </div>


                @endforeach

                    <!-- Single Post -->
                    {{--<div class="col-12 col-md-6">--}}
                        {{--<div class="single-post wow fadeInUp" data-wow-delay=".4s">--}}
                            {{--<!-- Post Thumb -->--}}
                            {{--<div class="post-thumb">--}}
                                {{--<img src="img/blog-img/2.jpg" alt="">--}}
                            {{--</div>--}}
                            {{--<!-- Post Content -->--}}
                            {{--<div class="post-content">--}}
                                {{--<div class="post-meta d-flex">--}}
                                    {{--<div class="post-author-date-area d-flex">--}}
                                        {{--<!-- Post Author -->--}}
                                        {{--<div class="post-author">--}}
                                            {{--<a href="#">By Marian</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Date -->--}}
                                        {{--<div class="post-date">--}}
                                            {{--<a href="#">May 19, 2017</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Post Comment & Share Area -->--}}
                                    {{--<div class="post-comment-share-area d-flex">--}}
                                        {{--<!-- Post Favourite -->--}}
                                        {{--<div class="post-favourite">--}}
                                            {{--<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Comments -->--}}
                                        {{--<div class="post-comments">--}}
                                            {{--<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Share -->--}}
                                        {{--<div class="post-share">--}}
                                            {{--<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#">--}}
                                    {{--<h4 class="post-headline">Where To Get The Best Sunday Roast In The Cotswolds</h4>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<!-- Single Post -->--}}
                    {{--<div class="col-12 col-md-6">--}}
                        {{--<div class="single-post wow fadeInUp" data-wow-delay=".6s">--}}
                            {{--<!-- Post Thumb -->--}}
                            {{--<div class="post-thumb">--}}
                                {{--<img src="img/blog-img/3.jpg" alt="">--}}
                            {{--</div>--}}
                            {{--<!-- Post Content -->--}}
                            {{--<div class="post-content">--}}
                                {{--<div class="post-meta d-flex">--}}
                                    {{--<div class="post-author-date-area d-flex">--}}
                                        {{--<!-- Post Author -->--}}
                                        {{--<div class="post-author">--}}
                                            {{--<a href="#">By Marian</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Date -->--}}
                                        {{--<div class="post-date">--}}
                                            {{--<a href="#">May 19, 2017</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Post Comment & Share Area -->--}}
                                    {{--<div class="post-comment-share-area d-flex">--}}
                                        {{--<!-- Post Favourite -->--}}
                                        {{--<div class="post-favourite">--}}
                                            {{--<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Comments -->--}}
                                        {{--<div class="post-comments">--}}
                                            {{--<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Share -->--}}
                                        {{--<div class="post-share">--}}
                                            {{--<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#">--}}
                                    {{--<h4 class="post-headline">The Top Breakfast And Brunch Spots In Hove, Brighton</h4>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<!-- Single Post -->--}}
                    {{--<div class="col-12 col-md-6">--}}
                        {{--<div class="single-post wow fadeInUp" data-wow-delay=".8s">--}}
                            {{--<!-- Post Thumb -->--}}
                            {{--<div class="post-thumb">--}}
                                {{--<img src="img/blog-img/4.jpg" alt="">--}}
                            {{--</div>--}}
                            {{--<!-- Post Content -->--}}
                            {{--<div class="post-content">--}}
                                {{--<div class="post-meta d-flex">--}}
                                    {{--<div class="post-author-date-area d-flex">--}}
                                        {{--<!-- Post Author -->--}}
                                        {{--<div class="post-author">--}}
                                            {{--<a href="#">By Marian</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Date -->--}}
                                        {{--<div class="post-date">--}}
                                            {{--<a href="#">May 19, 2017</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Post Comment & Share Area -->--}}
                                    {{--<div class="post-comment-share-area d-flex">--}}
                                        {{--<!-- Post Favourite -->--}}
                                        {{--<div class="post-favourite">--}}
                                            {{--<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Comments -->--}}
                                        {{--<div class="post-comments">--}}
                                            {{--<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Share -->--}}
                                        {{--<div class="post-share">--}}
                                            {{--<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#">--}}
                                    {{--<h4 class="post-headline">The 10 Best Pubs In The Lake District, Cumbria</h4>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<!-- Single Post -->--}}
                    {{--<div class="col-12 col-md-6">--}}
                        {{--<div class="single-post wow fadeInUp" data-wow-delay="1s">--}}
                            {{--<!-- Post Thumb -->--}}
                            {{--<div class="post-thumb">--}}
                                {{--<img src="img/blog-img/5.jpg" alt="">--}}
                            {{--</div>--}}
                            {{--<!-- Post Content -->--}}
                            {{--<div class="post-content">--}}
                                {{--<div class="post-meta d-flex">--}}
                                    {{--<div class="post-author-date-area d-flex">--}}
                                        {{--<!-- Post Author -->--}}
                                        {{--<div class="post-author">--}}
                                            {{--<a href="#">By Marian</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Date -->--}}
                                        {{--<div class="post-date">--}}
                                            {{--<a href="#">May 19, 2017</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Post Comment & Share Area -->--}}
                                    {{--<div class="post-comment-share-area d-flex">--}}
                                        {{--<!-- Post Favourite -->--}}
                                        {{--<div class="post-favourite">--}}
                                            {{--<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Comments -->--}}
                                        {{--<div class="post-comments">--}}
                                            {{--<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>--}}
                                        {{--</div>--}}
                                        {{--<!-- Post Share -->--}}
                                        {{--<div class="post-share">--}}
                                            {{--<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#">--}}
                                    {{--<h4 class="post-headline">The 10 Best Brunch Spots In Newcastle, England</h4>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}



                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->

        </div>
    </div>
</section>




<a class="  bithub-fb-share "  onclick="send_fb_sh_bithub('//www.facebook.com/sharer/sharer.php?app_id={{ env('FACEBOOK_CLIENT_ID') }}&sdk=joey&u={{ URL::to('tr/') }}&display=popup&ref=plugin&src=share_button')"> <i class="fab fa-facebook-square"></i> Share On Facebook</a>

<!-- ****** Blog Area End ****** -->

<!-- ****** Instagram Area Start ****** -->

<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<script>

    $('.lazy').Lazy({
        // your configuration goes here
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });
</script>
<!-- ****** Footer Social Icon Area Start ****** -->

<div id="fb-root"></div><script src="//connect.facebook.net/en_US/sdk.js"></script><script>
    FB.init({
        appId   : 445770672544176,
        status  : true,
        xfbml   : true,
        version : 'v2.9'
    });
    FB.AppEvents.logPageView();
</script>

<script>
    function sharenow() {
        FB.ui({
            method: 'share',
            mobile_iframe: false,
            //hashtag: '#appzgag',
            href: 'http://funnymemems.me/Contact'
        }, function (response) {
            if (response && !response.error_code) {
                ga('send', {
                    hitType: 'event',
                    eventCategory: app,
                    eventAction: 'Share Success',
                    eventLabel: userid
                });
                console.log("Shared");
            }
            else {
                ga('send', {
                    hitType: 'event',
                    eventCategory: app,
                    eventAction: 'Share Cancelled',
                    eventLabel: userid
                });
                console.log("Share Cancelled");
            }


        });
    }



    function send_fb_sh_bithub( this1) {

        //console.log('done');

        $.get( "{{ URL::to('fr/') }}", function( data ) {
            $( ".result" ).html( data );
        });

        window.open(this1, 'Facebook', 'width=640,height=580');
    }
</script>


@if(session()->exists('error'))

    <script>

        swal("Error!", "{{ session()->get('error') }}", "error");
    </script>

@endif
</body>

@include('layout.footerv2')