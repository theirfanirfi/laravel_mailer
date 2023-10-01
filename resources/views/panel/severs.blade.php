<!DOCTYPE html>


<html lang="en">
@include('panel.layout.header')

<body>
<div class="loading">Loading&#8230;</div>


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
    <!--main content start-->

<script>


    $('.loading').hide();


    function disbaleServer(id) {


        $.ajax({
            url: "{{ route('disableSever') }}",
            type: "POST",

            contentType: "application/x-www-form-urlencoded",
            data: {
                "id": id,
                "_token": "{{ csrf_token() }}",
            },
        })
            .done(function(data, textStatus, jqXHR) {
                console.log("HTTP Request Succeeded: " + jqXHR.status);
                updateStatus(id);

                console.log(data);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log("HTTP Request Failed");
            })
            .always(function() {
                /* ... */
            });


    }


    function getSeverSatus(id){



        $.ajax({
            url: "{{ route('SendServerStatus') }}",
            type: "POST",

            contentType: "application/x-www-form-urlencoded",
            data: {
                "server_id": id,
                "_token": "{{ csrf_token() }}",
            },
        })
            .done(function(data, textStatus, jqXHR) {
                console.log("HTTP Request Succeeded: " + jqXHR.status);
                updateStatus(id);

                console.log(data);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log("HTTP Request Failed");
            })
            .always(function() {
                /* ... */
            });




    }

    function updateStatus(id) {





        $.ajax({
            url: '{{ route('getserversatus') }}',
            method: 'post',
            data: {
                server_id: id,
            },

            headers:
                {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            success: function (response) {


                if (response) {
                    console.log('res');
                     console.log(response);
                    var obj = JSON.parse(response);
                    console.log(obj);
                    //return response.ref;
                }

            },error: function (res) {
                console.log(res);
            }


        });










        $.ajax({
            url: "{{ route('getserversatus') }}",
            type: "POST",

            contentType: "application/x-www-form-urlencoded",
            data: {
                "server_id": id,
                "_token": "{{ csrf_token() }}",
            },
        })
            .done(function(data, textStatus, jqXHR) {
                console.log("HTTP Request Succeeded: " + jqXHR.status);


              if(data) {

                  var obj = JSON.parse(data);
                  console.log('obj',obj);

                  if (obj == null) {

                      disbaleServer(id);



                      $('.server_' + id + '_php ').html('');
                      $('.server_' + id + '_php ').html('<span class="badge badge-error ">error </span>');


                      $('.server_' + id + '_send ').html('');
                      $('.server_' + id + '_send ').html('<span class="badge badge-error ">error </span>');




                      $('.server_' + id + '_usage ').html('');
                      $('.server_' + id + '_usage ').html(0);

                      $('.server_' + id + '_worker ').html('');
                      $('.server_' + id + '_worker ').html('<span class="badge badge-error ">sever not supported </span>');

                      $('.server_' + id + '_active ').html('');
                      $('.server_' + id + '_active ').html('<span class="badge badge-error ">no </span>');
                      ///


                  }else{

                      if (obj.php_mail_status == 1) {
                          $('.server_' + id + '_php ').html('');
                          $('.server_' + id + '_php ').html('<span class="badge badge-success ">healthy </span>');

                      } else {

                          $('.server_' + id + '_php ').html('');
                          $('.server_' + id + '_php ').html('<span class="badge badge-error ">error </span>');
                      }


                      if (obj.sendmail_status == 1) {
                          $('.server_' + id + '_send ').html('');
                          $('.server_' + id + '_send ').html('<span class="badge badge-success ">healthy </span>');

                      } else {

                          $('.server_' + id + '_send ').html('');
                          $('.server_' + id + '_send ').html('<span class="badge badge-error ">error </span>');
                      }


                      $('.server_' + id + '_usage ').html('');
                      $('.server_' + id + '_usage ').html(obj.memory_usage);

                      $('.server_' + id + '_worker ').html('');
                      $('.server_' + id + '_worker ').html('<span class="badge badge-success ">yes </span>');

                      $('.server_' + id + '_active ').html('');
                      $('.server_' + id + '_active ').html('<span class="badge badge-success ">yes </span>');


                  }
              }


            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log("HTTP Request Failed");
            })
            .always(function() {
                /* ... */
            });


    }



</script>


    <section id="main-content">
        <section class="wrapper">

            <div class="col-md-12 mt padding-top">
                <div class="content-panel ">
                    <table class="table table-hover ">


                        Servers


                        <button id="myBtn" type="button " class="btn btn-round btn-success mx-1 float-right">Add Server</button>
                        <a href="{{ route('bitH-mailer') }}" class="btn btn-round btn-theme03 mx-1 float-right">Send Mail</a>


                        <hr>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Memory Usage</th>
                            <th>IP Address</th>
                            <th>Php Mail Status</th>
                            <th>SendMail Status</th>
                            <th>Worker Installed</th>
                            <th>Active</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>


                        @php
                            $count=1;
                        @endphp

                        @foreach( $serverd as $sd)

                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $sd->nickname }}</td>
                                <td class="server_{{ $sd->id }}_usage" >0 </td>
                                <td>{{ $sd->ip }}
                                </td>
                                <td class="server_{{ $sd->id }}_php" ><span class="badge badge-progress ">
                                   In Progress
                                </span></td>
                                <td class="server_{{ $sd->id }}_send"  ><span class="badge badge-progress ">
                                     In Progress
                                </span></td>
                                <td  class="server_{{ $sd->id }}_worker"   ><span class="badge badge-progress ">
                                     In Progress
                                </span></td>
                                <td  class=" server_{{ $sd->id }}_active"  ><span class="badge badge-progress">
                                     In Progress
                                </span>


                                </td>
                                <td><a  href="/bitH-sever_one_View/{{  $sd->id   }}" class="mr-3 btn btn-light btn-sm"><span class="fa fa-eye"></span></a>
                                    {{--<a href="#" class="mr-3 btn btn-light btn-sm"><span class="fa  fa-cloud-upload"></span></a>--}}
                                    <a onclick="refreshserver({{ $sd->id }});" href="#" class="mr-3 btn btn-light btn-sm"><span class="fa fa-refresh"></span></a> <a
                                            onclick="deleteServer({{ $sd->id }});"  class="mr-3 btn btn-light btn-sm"><span class="fa fa-times"></span></a>
                                </td>
                            </tr>
                            @php
                            $count++;
                            @endphp

                            <script>

                                getSeverSatus({{ $sd->id }});
                            </script>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <! --/content-panel -->
            </div><!-- /col-md-12 -->
            </div>
        </section>
    </section>


    <div id="myModal" class="modal" style="z-index: 2001;">
        <div class="modal-content" style="margin-top: 15vh;">

            <span class="close">&times;</span>

            <form class="" method="POST" action="{{ route('saveServer') }}" enctype="multipart/form-data">


                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            {{--<p>--}}
            {{--{{ $errors->first('email') }}--}}
            {{--{{ $errors->first('password') }}--}}
            {{--</p>--}}

            <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Add New Server</h4>

                            <div class="form-horizontal style-form" >


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nickname</label>
                                    <span style=" color: red;" > {{ $errors->first('nickname') }} </span>
                                    <div class="col-sm-10">


                                        <input id="nickname" class="form-control round-form" type="text" autocomplete="off"
                                              name="nickname" placeholder="Server Nickname" class="el-input__inner">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">IP
                                        Address</label>

                                    <span style=" color: red;" > {{ $errors->first('ipaddress') }} </span>
                                    <div class="col-sm-10">


                                        <input  class="form-control round-form" type="text" autocomplete="off"
                                                name="ipaddress" placeholder="Server IP Address" class="el-input__inner">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">SSH</label>
                                    <span style=" color: red;" > {{ $errors->first('port') }} </span>
                                    <div class="col-sm-10">


                                        <input  class="form-control round-form" type="text" autocomplete="off"
                                                name="port" placeholder="Server SSH Port" class="el-input__inner" value="22">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                                    <span style=" color: red;" > {{ $errors->first('username') }} </span>
                                    <div class="col-sm-10">


                                        <input  class="form-control round-form" type="text" autocomplete="off"
                                                name="username" placeholder="Username" class="el-input__inner">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                    <span style=" color: red;" > {{ $errors->first('password') }} </span>
                                    <div class="col-sm-10">


                                        <input  class="form-control round-form" type="text" autocomplete="off"
                                                name="password" placeholder="Server Password" class="el-input__inner">
                                    </div>
                                </div>

                                <div class="form-group">
                                <input id="btnSubmit" onclick="disableinoutb();" type="submit" class="btn btn-round  btn-success float-right mx-1" value="Add Server">
                                </div>
                            </div>



                        </div>
                    </div>


                </div>
















    <script>
        
        
        function showseverdata() {

        }
        
        
        
        $('#btnSubmit').attr("disabled", false);
        $('#btnSubmit').click(function () {
            // $("#btnSubmit").attr("disabled", true);
            $('.loading').show();
        })


function disableinoutb() {
   // $("#btnSubmit").attr("disabled", true);
}





        function refreshserver(id){

            $.ajax({
                url: "{{ route('refreshWorker') }}",
                type: "POST",

                contentType: "application/x-www-form-urlencoded",
                data: {
                    "server_id": id,
                    "_token": "{{ csrf_token() }}",
                },
            })
                .done(function(data, textStatus, jqXHR) {
                    console.log("HTTP Request Succeeded: " + jqXHR.status);

                    swal("Sever Refreshed!", "success", "success");
                    console.log(data);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("HTTP Request Failed");
                })
                .always(function() {
                    /* ... */
                });


        }


        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        @if ($errors->first())

            modal.style.display = "block";
        @endif




      function deleteServer(id) {

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this server!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {


                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {


                            $.ajax({
                                url: "{{ route('deleteServer') }}",
                                type: "POST",

                                contentType: "application/x-www-form-urlencoded",
                                data: {
                                    "server_id": id,
                                    "_token": "{{ csrf_token() }}",
                                },
                            })
                                .done(function(data, textStatus, jqXHR) {
                                    console.log("HTTP Rhgdcbfgucceeded: " + data);

                                    swal("Poof! Your server has been deleted!", {
                                        icon: "success",
                                    });

                                    location.reload();
                                    //console.log(data);
                                })
                                .fail(function(jqXHR, textStatus, errorThrown) {
                                    console.log("HTTP Request Failed");
                                })
                                .always(function() {
                                    /* ... */
                                });



                        } else {
                            swal("Your imaginary file is safe!");
                }
                });





                } else {
                    swal("Your imaginary server is safe!");
        }
        });

        }






    </script>

    <!--main content end-->



@include('panel.layout.footer')
                @if(session()->exists('success'))

                    <script>

                        swal("Good job!", "{{ session()->get('success') }}", "success");
                    </script>

                @endif

                @if(session()->exists('error'))

                    <script>

                        swal("Oops!", "{{ session()->get('error') }}", "error");
                    </script>

@endif
</body>
</html>
