<!DOCTYPE html>


<html lang="en">
@include('panel.layout.header')

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
@include('panel.layout.navi_bar')
<!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
@include('panel.layout.side_bar')
<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

        <section id="main-content" class="">

            <div class="col-md-12 mt padding-top">
                <div class="wrapper">

                    <h1>{{ $serverdt->nickname }}</h1>
                    <p>
                        @if(isset($serverst))
                        {{ $serverst->memory_usage }}% Of Memory Used
                    @endif
                    </p>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
                        {{--<li class=""><a href="#Activities" data-toggle="tab">Activities</a></li>--}}
                        {{--<li class=""><a href="#ServerConsole" data-toggle="tab">Server Console</a></li>--}}
                        <li class=""><a href="#ServerLogs" data-toggle="tab">Server Logs</a></li>



                    </ul>




                    <div class="tab-content">
                        <div id="Details" class="tab-pane fade in active">
                            <h3>Details</h3>


                            <div class="col-12"><table class="table table-striped"><tbody><tr><td>Name</td> <td><strong>{{ $serverdt->nickname }}</strong></td></tr> <tr><td>IP Address</td> <td><strong>{{ $serverdt->ip }}</strong></td></tr> <tr><td>Worker Path</td> <td><strong>/XtraWorker/worker.php</strong></td></tr> <tr><td>Is Php Mail Working?</td> <td>


                                            @if(isset($serverst) && $serverst->php_mail_status==1)
                                            <span class="badge badge-success">
                                        healthy
                                        </span>
                                            @else
                                                <span class="badge badge-error">
                                        No
                                        </span>
                                            @endif

                                        </td></tr> <tr>


                                        <td>Is SendMail Working?</td> <td>


                                            @if(isset($serverst) && $serverst->sendmail_status==1)
                                                <span class="badge badge-success">
                                        healthy
                                        </span>
                                            @else
                                                <span class="badge badge-error">
                                        No
                                        </span>
                                            @endif


                                        </td></tr></tbody></table></div>
                        </div>




                        <div id="Activities" class="tab-pane fade">
                            <h3>Product</h3>
                            <p>Advanced extended doubtful he he blessing together. Introduced far law gay considered frequently entreaties difficulty. Eat him four are rich nor calm. By an packages rejoiced exercise. To ought on am marry rooms doubt music. Mention entered an through company as. Up arrived no painful between. It declared is prospect an insisted pleasure. </p>
                        </div>
                        <div id="ServerLogs" class="tab-pane fade">
                            <h3>ServerLogs</h3>
                            <p>No data</p>
                        </div>
                        <div id="CSS" class="tab-pane fade">
                            <h3>CSS Tutorial</h3>
                            <p>CSS is a stylesheet language that describes the presentation of an HTML (or XML) document. CSS describes how elements must be rendered on screen, on paper, or in other media. This tutorial will teach you CSS from basic to advanced.</p>
                        </div>
                        <div id="Javascript" class="tab-pane fade">
                            <h3>Javascript Tutorial</h3>
                            <p>JavaScript is the programming language of HTML and the Web. Programming makes computers do what you want them to do. JavaScript is easy to learn. This tutorial will teach you JavaScript from basic to advanced.</p>
                        </div>
                        <div id="Bootstrap" class="tab-pane fade">
                            <h3>Bootstrap Tutorial</h3>
                            <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.</p>
                        </div>
                        <div id="Jquery" class="tab-pane fade">
                            <h3>Jquery Tutorial</h3>
                            <p>jQuery UI is a curated set of user interface interactions, effects, widgets, and themes built on top of the jQuery JavaScript Library. Whether you're building highly interactive web applications or you just need to add a date picker to a form control, jQuery UI is the perfect choice.</p>
                        </div>
                    </div>

                </div>
            </div><!-- /col-md-12 -->
            </div>
        </section>



@include('panel.layout.footer')

</body>
</html>
