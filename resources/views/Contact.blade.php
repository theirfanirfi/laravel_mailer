<?php
/**
 * Created by PhpStorm.
 * User: naveen
 * Date: 10/27/18
 * Time: 4:49 PM
 */
?>


        <!DOCTYPE html>
<html lang="en">

@include('layout.headerv2')

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="yummy-load"></div>
</div>

<!-- Background Pattern Swither -->
{{--<div id="pattern-switcher">--}}
{{--Bg Pattern--}}
{{--</div>--}}


@include('layout.navigation')
<section class="archive-area section_padding_80">
    <div class="container">


        <div class="contact-form-area">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s" style="background-image: url({{ url('img/bg-img/contact.jpg') }});">
                    </div>
                </div>
                <div class="col-12 col-md-7 item">
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                        <h2 class="contact-form-title mb-30">If You Have Any Question Contact Us Today !</h2>
                        <!-- Contact Form -->
                        <form action="{{ route('contact_do') }}" method="post">



                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <span> {{ $errors->first('name') }}</span>
                                <input value="{{ old('name') }}" type="text" class="form-control" id="contact-name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <span> {{ $errors->first('email') }}</span>
                                <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="contact-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="web" class="form-control" id="contact-website" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <span> {{ $errors->first('message') }}</span>
                                <textarea  class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn contact-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</body>
@if(session()->exists('error'))

    <script>

        swal("Success!", "{{ session()->get('error') }}", "success");
    </script>

@endif

@include('layout.footerv2')