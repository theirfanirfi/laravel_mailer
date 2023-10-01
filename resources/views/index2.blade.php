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
        <div class="products-catagories-area clearfix"><h1 class="bithub-h1" >New Arrivals</h1>

            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->




            @foreach ($products as $product)
                <div class="lazy1"   >

                    <div class="single-products-catagory clearfix">
                        <a href="/Apps/{{ $product->app_ref  }}">
                            {{--<img src="img/product-img/{{ $product->cover_image  }}" alt="">--}}
                            <img class="lazy" data-src="app_images/{{ $product->cover_image  }}" alt="">
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
    </script>

  @include('layout.footer')



    @if(session()->exists('error'))

        <script>

            swal("Error!", "{{ session()->get('error') }}", "error");
        </script>

    @endif
</body>

</html>
