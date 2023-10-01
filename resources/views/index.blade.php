


<!DOCTYPE html>
<html lang="en">

@include('layout.headerv2')

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="yummy-load"></div>
</div>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNDV5DV"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Background Pattern Swither -->
{{--<div id="pattern-switcher">--}}
    {{--Bg Pattern--}}
{{--</div>--}}


@include('layout.navigation')

<!-- ****** Archive Area Start ****** -->
<section class="archive-area section_padding_80">
    <div class="container">
        <div class="row">


            @foreach ($products as $product)
                {{--<div class="lazy1"   >--}}

                    {{--<div class="single-products-catagory clearfix">--}}
                        {{--<a href="/Apps/{{ $product->app_ref  }}">--}}
                            {{--<img src="img/product-img/{{ $product->cover_image  }}" alt="">--}}
                            {{--<img class="lazy" data-src="app_images/{{ $product->cover_image  }}" alt="">--}}
                            {{--<!-- Hover Content -->--}}
                            {{--<div class="hover-content">--}}
                                {{--<div class="line"></div>--}}

                                {{--<h4>{{ $product->app_name }}</h4>--}}
                            {{--</div>--}}


                        {{--</a>--}}
                    {{--</div>--}}


                {{--</div>--}}


                <div class="col-12 col-md-6 col-lg-4 lazy1">
                    {{--<a href="/Apps/{{ $product->app_ref  }}">--}}
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Post Thumb -->
                        <a href="/Apps/{{ $product->app_ref  }}">
                        <div class="post-thumb">
                            {{--<img src="app_images/{{ $product->cover_image  }}" alt="">--}}
                            <img class="lazy" data-src="app_images/{{ $product->cover_image  }}" alt="">
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
            {{--<div class="col-12 col-md-6 col-lg-4">--}}
                {{--<div class="single-post wow fadeInUp" data-wow-delay="0.1s">--}}
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





        </div>
    </div>
</section>
<!-- ****** Archive Area End ****** -->

<!-- ****** Instagram Area Start ****** -->

<!-- ****** Our Creative Portfolio Area End ****** -->
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




@if(session()->exists('error'))

    <script>

        swal("Error!", "{{ session()->get('error') }}", "error");
    </script>

@endif
</body>

@include('layout.footerv2')

