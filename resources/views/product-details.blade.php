<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body>
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
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="#"><img src="{{ URL::to('img/core-img/sithneth.png') }}" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

@include('layout.sidebar')

    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{ $product[0]->product_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                                @php

                                {{
                                $count1=0;
                                $count2=0;


                                }}
                                @endphp


                                @foreach($images as $image)





                                    <li  @if($count1 ==0) class="active" @endif data-target="#product_details_slider" data-slide-to="{{ $count1 }}" style="background-image: url({{ URL::to('/img/product-img-carousel/'.$image->image) }});">
                                    </li>

                                    @php
                                    {{
                                    $count1++;
                                    }}

                                    @endphp


                                @endforeach



                            </ol>
                            <div class="carousel-inner">



                                @foreach($images as $image)








                                    <div class="carousel-item item @if($count2 ==0) active @endif">
                                        <a class="gallery_img" href="{{ URL::to('/img/product-img-carousel/'.$image->image) }}">
                                            <img class="d-block w-100" src="{{ URL::to('/img/product-img-carousel/'.$image->image) }}" alt="First slide">
                                        </a>
                                    </div>

                                    @php
                                        {{
                                        $count2++;
                                        }}

                                    @endphp


                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">Rs {{ $product[0]->product_price }}</p>
                            <a href="product-details.html">
                                <h6>{{ $product[0]->product_name }}</h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Avaiable -->
                          @if( $product[0]->stock==1)

                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>

                              @else
                                <p class="avaibility"><i class="fa fa-circle"  style=" color: #ff2519;" ></i> Out Of Stock</p>

                            @endif



                        </div>

                        <div class="short_overview my-5">



                         <?php echo $product[0]->description ?>


                        </div>

                        <!-- Add to Cart Form -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->



<!-- ##### Footer Area Start ##### -->



</body>

</html>