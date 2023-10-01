<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

{{--{{ dd($products) }}--}}

<body>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=2097544893840527&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        {{--<div class="mobile-nav">--}}
            {{--<!-- Navbar Brand -->--}}
            {{--<div class="amado-navbar-brand">--}}
                {{--<a href="index.html"><img src="img/core-img/sithneth.png" alt=""></a>--}}
            {{--</div>--}}
            {{--<!-- Navbar Toggler -->--}}
            {{--<div class="amado-navbar-toggler">--}}
                {{--<span></span><span></span><span></span>--}}
            {{--</div>--}}
        {{--</div>--}}

      @include('layout.sidebar')

        <!-- Product Catagories Area Start -->
        @if(session('name'))

        <div class=" bithub-full-width text-center">

            <img class="bithub-cover-dev " onerror="this.src='{{ URL::to('/img/cover_funn.jpg') }}'" src="{{ session('fb_cover') }}">
            <img class=" logo-custom-bithub bithub-cus-profile" src="{{ session('high_avatar') }}" alt="">

        </div>
@endif

<div class="text-center bithub-body-padding"  >


<div class="col-12 bithub-h1 ">
    {{--<h1>{{ $product->app_name }}</h1>--}}

</div>

        <div class="col-12 row bithub-no-margin no-margin ">



            <div class=" text-center bihhub-likethat-box bithub-image-app col-12 col-lg-12 ">

                <div class="  ">
                    <h1 class="bithub-headerbar">
                        {{ $product->app_name }}
                    </h1>

                </div>
                <div class="single_product_thumb">
                    <div id="1product_details_slider" class= "" >

                        @if(session('name'))

                            <div class="text-center bithub_share_head_set">

                                <div class="col-12  ">
                                    <a class="bithub-fb-button-cus btn amado-btn    share-btn"  onclick="send_fb_sh_bithub('//www.facebook.com/sharer/sharer.php?app_id={{ env('FACEBOOK_CLIENT_ID') }}&sdk=joey&u={{ url()->current() }}&display=popup&ref=plugin&src=share_button')"> <i class="fab fa-facebook-square"></i> Share On Facebook</a>


                                </div>

                                {{--<div class="col-12">--}}

                                {{--<div class=" bithub-fb-head fb-like" data-href="{{ url()->current() }}" data-width="800px" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>--}}


                                {{--</div>--}}



                            </div>

                            <script>
                                function send_fb_sh_bithub( this1) {

                                    //console.log('done');
                                    $.get( "https://funnymemes.test:8890/bitH_set_shared/{{ $image_name }}", function( data ) {
                                        $( ".result" ).html( data );
                                    });

                                    window.open(this1, 'Facebook', 'width=640,height=580');
                                }

                            </script>


                                <a class="gallery_img" href="{{ URL::to('/'.$image_gen) }}">
                                    <img class="d-block w-100" src="{{ URL::to('/'.$image_gen) }}" alt="First slide">
                                </a>


                            @else



                            <a class="gallery_img" href="{{ URL::to('/app_images/'.$product->cover_image) }}">
                                <img class="d-block w-100" src="{{ URL::to('/app_images/'.$product->cover_image) }}" alt="First slide">
                            </a>
                        @endif

                    </div>
                </div>

                <div class="short_overview my-5">

                    <p>
                        {{ $product->description }}


                    </p>
                </div>

                <div class="text-center cart clearfix" method="post">

                    @if(session('name'))


                        <script>

                            $('meta[name=description]').remove();
                            $('head').append( '<meta property="og:site_name" content="<?php echo env('APP_NAME'); ?>">\n' +
                                '            <meta property="og:url" content="<?php echo url()->current();  ?>">\n' +

                                '            <meta property="og:type" content="article">\n' +
                                '            <meta property="og:title" content="<?php echo $product->app_name; ?>">\n' +
                                '            <meta property="og:description" content="<?php echo $product->description; ?>">\n' +
                                '            <meta property="og:image" content=" <?php echo URL::to('/app_images/'.$product->cover_image); ?>">\n' +
                                '            <meta property="fb:app_id" content="<?php echo  env('FACEBOOK_CLIENT_ID'); ?>">\n' +
                                '          ' );
                        </script>

                        <a class="bithub-fb-cus-btn-2 btn share-btn"  onclick="send_fb_sh_bithub('//www.facebook.com/sharer/sharer.php?app_id={{ env('FACEBOOK_CLIENT_ID') }}&sdk=joey&u={{ url()->current() }}&display=popup&ref=plugin&src=share_button')"> <i class="fab fa-facebook-square"></i> Share On Facebook</a>

                        <div class="fb-like" data-href="{{ url()->current() }}" data-width="800px" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>

                    @else

                        <a class="btn amado-btn bithub-fb-button-cus " href="{{ url('auth/facebook') }}" type="">Login</a>


                    @endif
                </div>
            </div>

        </div>







<div class=" bihhub-likethat-box " >



<div class="  ">
    <h1 class="bithub-headerbar">
        <i class="fas fa-otter"></i> Other Apps
    </h1>

</div>
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->




            @foreach ($products as $product)
                <div>

                    <div class="single-products-catagory clearfix">
                        <a href="/Apps/{{ $product->app_ref  }}">
{{--                            <img src="img/product-img/{{ $product->cover_image  }}" alt="">--}}

                            <img class="lazy" data-src="{{ URL::to('/app_images/'.$product->cover_image) }}" alt="">
                            {{--<img src="{{ URL::to('/img/product-img/'.$product->cover_image) }}" alt="">--}}
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>

                                <h4>{{ $product->app_name }}</h4>
                            </div>


                        </a>
                    </div>


                </div>


                @endforeach


            </div>
        </div>

</div>


        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->

    <!-- ##### Newsletter Area End ##### -->



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






        //add metas






    </script>
    </div>

  @include('layout.footer')

</body>

</html>
