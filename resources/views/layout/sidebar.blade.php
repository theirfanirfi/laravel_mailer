<!-- Header Area Start -->
<header class=" nav-bithub clearfix">


    <!-- Close Icon -->
    {{--<div class="nav-close">--}}
        {{--<i class="fa fa-close" aria-hidden="true"></i>--}}
    {{--</div>--}}
    <!-- Logo -->
    {{--<div class="clearfix logo ">--}}
        {{--<a href="{{ URL::to('/') }}"><img class="logo-custom-bithub" src="{{ URL::to('/img/core-img/sithneth.png') }}" alt=""></a>--}}
    {{--</div>--}}
    <!-- Amado Nav -->
    {{--<nav class="amado-nav">--}}
        {{--<ul>--}}
            {{--<li class="active"><a href="{{ URL::to('/') }}">Home</a></li>--}}
            {{--<li><a href="shopf.blade.php">Shop</a></li>--}}
            {{--<li><a href="product-details.html">Product</a></li>--}}
            {{--<li><a href="cart.html">Cart</a></li>--}}
            {{--<li><a href="checkout.html">Checkout</a></li>--}}
        {{--</ul>--}}
    {{--</nav>--}}
    <!-- Button Group -->
    {{--<div class="amado-btn-group mt-30 mb-100">--}}
        {{--<a href="#" class="btn amado-btn mb-15">%Discount%</a>--}}
        {{--<a href="#" class="btn amado-btn active">New this week</a>--}}
    {{--</div>--}}
    <!-- Cart Menu -->
    {{--<div class="cart-fav-search mb-100">--}}
        {{--<a href="cart.html" class="cart-nav"><img src="{{ URL::to('/img/core-img/cart.png') }}" alt=""> Cart <span>(0)</span></a>--}}
        {{--<a href="#" class="fav-nav"><img src="{{ URL::to('/img/core-img/favorites.png') }}" alt=""> Favourite</a>--}}
        {{--<a href="#" class="search-nav"><img src="{{ URL::to('/img/core-img/search.png') }}" alt=""> Search</a>--}}
    {{--</div>--}}
    <!-- Social Button -->
    {{--<div class="social-info d-flex justify-content-between">--}}
        {{--<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>--}}
        {{--<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
        {{--<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
        {{--<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
    {{--</div>--}}

    <nav class="  nav-bithub navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
        {{--<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<i class="fa fa-bars"></i>--}}
        {{--</button>--}}

        <a class="navbar-brand" href="{{ URL::to('/') }}"><img class="logo-custom-bithub" src="{{ URL::to('/img/funnymemes.png') }}" alt=""></a>
        {{--<a class="navbar-brand" href="#">Navbar</a>--}}

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            {{--<ul class="navbar-nav mr-auto mt-2 mt-lg-0">--}}
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}

                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}



            {{--</ul>--}}

            <ul class="nav navbar-nav navbar-right">

                <li class="nav-item active">
                <a class="nav-link" href="{{ url('') }}"><i class="glyphicon glyphicon-bullhorn bithub-glyphicon-light"></i> New <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="glyphicon glyphicon-compressed bithub-glyphicon-light"></i> About <span class="sr-only">(current)</span></a>
                </li>
                  @if(session('name'))
                    <li>
                        <a class="   bithub-nav-log-button" href="{{ url('auth/facebook_logout') }}" type=""><span class="glyphicon glyphicon-log-out bithub-glyphicon-light"> </span> Logout</a>

                    </li>

                    <li>

                    <div class="avatar-bithub-nav" >

                        <img class="logo-custom-bithub" src="{{ session('avatar') }}" alt=""><span>Hi, {{ session('name') }} </span>

                    </div>

                    </li>


                @else
                    <li>
                    <a class="   bithub-nav-log-button" href="{{ url('auth/facebook') }}" type=""><span class="glyphicon glyphicon-log-in bithub-glyphicon-light"></span> Login</a>
                    </li>
                @endif
            </ul>
            {{--<form class="form-inline my-2 my-lg-0">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}






            {{--</form>--}}
        </div>


            </div>
        </div>
    </nav>




    {{--<nav class="navbar navbar-inverse navbar-static-top">--}}
        {{----}}
    {{--</nav>--}}


</header>
<!-- Header Area End -->
