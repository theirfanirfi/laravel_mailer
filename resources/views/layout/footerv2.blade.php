<?php
/**
 * Created by PhpStorm.
 * User: naveen
 * Date: 10/27/18
 * Time: 10:41 AM
 */?>


    <!-- ****** Footer Social Icon Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">

        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

<hr>
                    <p>
                        Disclaimer: All content is provided for entertainment purposes only!
                        We promised.

                    </p>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>Copyright &copy;2018 All rights reserved | Developed And Design By <a href="https://bithub.lk" target="_blank">bitHub.lk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    {{--<!-- Jquery-2.2.4 js -->--}}
    {{--<script src="js/jquery/jquery-2.2.4.min.js"></script>--}}
    {{--<!-- Popper js -->--}}
    {{--<script src="js/bootstrap/popper.min.js"></script>--}}
    {{--<!-- Bootstrap-4 js -->--}}
    {{--<script src="js/bootstrap/bootstrap.min.js"></script>--}}
    {{--<!-- All Plugins JS -->--}}
    {{--<script src="js/others/plugins.js"></script>--}}
    {{--<!-- Active JS -->--}}
    {{--<script src="js/active.js"></script>--}}
<script>

    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });


</script>

{{--<script src="{{ URL::to('js/jquery/jquery-2.2.4.min.js') }}"></script>--}}
<script src="{{ URL::to('js/bootstrap/popper.min.js') }}"></script>
<script src="{{ URL::to('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('js/others/plugins.js') }}"></script>
<script src="{{ URL::to('js/active.js') }}"></script>


