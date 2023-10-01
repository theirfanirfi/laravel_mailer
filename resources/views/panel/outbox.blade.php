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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="col-md-12 mt padding-top">
                <div class="content-panel ">
                    <table class="table table-hover ">


                        Outbox


                        <a href="{{ route('bitH-mailer') }}" class="btn btn-round btn-theme03 mx-1 float-right">Send Mail</a>
                        <a href="{{ route('clearOutbox') }}" class="btn btn-round btn-danger mx-1 float-right">Clear Out Box </a>
                        <hr>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Started</th>
                            <th>Completed</th>
                            <th>Successful</th>
                            <th>Status</th>
                            <th>Message Letter</th>


                        </tr>
                        </thead>
                        <tbody>



                        {{--<tr>--}}
                            {{--<td>1</td>--}}

                            {{--<td>2019-01-10--}}
                            {{--</td>--}}
                            {{--<td>acc@abc.com--}}
                            {{--</td>--}}
                            {{--<td>Offer--}}
                            {{--</td>--}}



                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td>1/1 sent--}}


                            {{--</td>--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>1</td>--}}

                            {{--<td>2019-01-10--}}
                            {{--</td>--}}
                            {{--<td>acc@abc.com--}}
                            {{--</td>--}}
                            {{--<td>Offer--}}
                            {{--</td>--}}



                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td>1/1 sent--}}


                            {{--</td>--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>1</td>--}}

                            {{--<td>2019-01-10--}}
                            {{--</td>--}}
                            {{--<td>acc@abc.com--}}
                            {{--</td>--}}
                            {{--<td>Offer--}}
                            {{--</td>--}}



                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td><span class="badge badge-success">--}}
                                    {{--yes--}}
                                {{--</span></td>--}}
                            {{--<td>1/1 sent--}}


                            {{--</td>--}}

                        {{--</tr>--}}

                        @if(count($outbox_data)==0)
<tr>
    <td  colspan="8"  ><div class="centered " ><h3>  No Data</h3> </div></td>
</tr>

                        @else

                        @php
                        $count=1;
                        @endphp

                        @foreach($outbox_data as $data)





                            <tr>
                                <td>{{ $count }}</td>

                                <td>{{ $data->date }}
                                </td>
                                <td>{{ $data->senderEmail }}
                                </td>
                                <td>{{ $data->subject }}
                                </td>



                                <td><div class=" disaplay-inline  {{ $data->id }}_started">

                                    @if($data->started==1)
                                    <span class="badge badge-success">
                                    yes
                                </span>
                                        @else
                                        <span class="badge badge-progress">
                                    no
                                </span>

                                    @endif

                                    </div>

                                </td>
                                <td><div class=" disaplay-inline  {{ $data->id }}_completed">

                                    @if($data->completed==1)
                                        <span class="badge badge-success">
                                    yes
                                </span>
                                    @else
                                        <span class="badge badge-progress">
                                    no
                                </span>

                                    @endif

                                    </div>

                                </td>
                                <td><div class=" disaplay-inline  {{ $data->id }}_success">

                                    @if($data->is_successful==1)
                                        <span class="badge badge-success">
                                    yes
                                </span>
                                    @else
                                        <span class="badge badge-progress">
                                    no
                                </span>

                                    @endif

                                    </div>

                                </td>
                                <td > <div class=" disaplay-inline  {{ $data->id }}_count"> {{ $data->successful_sent_count }} </div>/{{ $data->total }} sent


                                </td>

                            <td> <a id="{{ $data->id }}_text" onclick="hidebody({{ $data->id }});"> Show</a> </td>

                            </tr>

                            <tr class=" {{ $data->id }}_body"  style="display: none">
                                <td colspan="9" >
                                    {{--<div class=" {{ $data->id }}_body">--}}
                                    <div>

                                        <?php echo ($data->messageLetter)?>
                                    </div>

                                    {{--</div>--}}

                                </td>
                            </tr>

                            @php
                            $count++;
                            @endphp

                            @endforeach

                            @endif

                        </tbody>
                    </table>

                    <table id='resulttable' class=" table table-hover " style="margin-top:auto">






                        <hr>
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>Receiver</th>

                            <th>Started</th>
                            <th>valid email</th>
                            <th>error</th>



                        </tr>
                        </thead>
                        <tbody id="tblebody1" >

                        {{--<tr>--}}
                        {{--<td>1</td>--}}

                        {{--<td>2019-01-10--}}
                        {{--</td>--}}
                        {{--<td>acc@abc.com--}}
                        {{--</td>--}}
                        {{--<td>Offer--}}
                        {{--</td>--}}



                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td>1/1 sent--}}


                        {{--</td>--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>1</td>--}}

                        {{--<td>2019-01-10--}}
                        {{--</td>--}}
                        {{--<td>acc@abc.com--}}
                        {{--</td>--}}
                        {{--<td>Offer--}}
                        {{--</td>--}}



                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td><span class="badge badge-success">--}}
                        {{--yes--}}
                        {{--</span></td>--}}
                        {{--<td>1/1 sent--}}


                        {{--</td>--}}

                        {{--</tr>--}}



                        </tbody>
                    </table>
                </div>

            </div><!-- /col-md-12 -->
            </div>




        </section>
    </section>

<script>
    $('#resulttable').hide();





@if(count($outbox_data)!=0)



function hidebody(id) {




    $('.'+id+'_body').show();
    $('#'+id+'_text').text('Hide');

    $('#'+id+'_text').attr("onclick","showbody("+id+")");








}

function showbody(id) {

    $('.'+id+'_body').hide();
    $('#'+id+'_text').text('Show');
    $('#'+id+'_text').attr("onclick","hidebody("+id+")");


}




    function showcurentdata(){


        $('#resulttable').show();
        @foreach($outbox_data as $data)

        getemailslogs({{ $data->id }});
        @endforeach
    }



    function getupdateofoutbox(id){

        $.ajax({
            url: '{{ route('getOutboxupdates') }}',
            method: 'post',
            data: {
                id: id,
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
                    $('.'+ id +'_count').html('');
                    $('.'+ id +'_count').html(obj.successful_sent_count);



                    if(obj.started==1){

                        $('.'+ id +'_started').html('');
                        $('.'+ id +'_started').html(' <span class="badge badge-success">\n' +
                            '                                    yes\n' +
                            '                                </span>');
                    }

                    if(obj.is_successful==1){

                        $('.'+ id +'_success').html('');
                        $('.'+ id +'_success').html(' <span class="badge badge-success">\n' +
                            '                                    yes\n' +
                            '                                </span>');
                    }

                    //return response.ref;


                    if(obj.completed==1){

                        $('.'+ id +'_completed').html('');
                        $('.'+ id +'_completed').html(' <span class="badge badge-success">\n' +
                            '                                    yes\n' +
                            '                                </span>');

                        if(myVar){
                            clearInterval(myVar);
                        }

                    }
                }

            },error: function (res) {
                console.log(res);
            }


        });
    }


   function getemailslogs(id) {

       getupdateofoutbox(id);


       $.ajax({
           url: '{{ route('getemailLog') }}',
           method: 'post',
           data: {
               id: id,
           },

           headers:
               {
                   'X-CSRF-TOKEN': '{{ csrf_token() }}'
               },
           success: function (response) {


               if (response) {
                   $('#tblebody1').html('');

                   console.log('res');
                   //console.log(response);
                   var obj = JSON.parse(response);

                   console.log(obj);
                 //  var itemlist=obj.data;

                   var itcount=1;
                   obj.forEach(function (itm) {
                       var dataset = JSON.parse(itm.data);
                       istsatrted=' <td><span class="badge badge-error">\n' +
                           '                        no\n' +
                           '                        </span></td>';

                       isvalidemil=' <td><span class="badge badge-error">\n' +
                           '                        no\n' +
                           '                        </span></td>';
                       if(dataset.started==1){

                           istsatrted=' <td><span class="badge badge-success">\n' +
                           '                        yes\n' +
                           '                        </span></td>';

                       }

                       if(dataset.is_valid_email==1){

                           isvalidemil=' <td><span class="badge badge-success">\n' +
                               '                        yes\n' +
                               '                        </span></td>';

                       }
                       erortext='N/A';
                       if(dataset.send_error!=null){
                           erortext=dataset.send_error;

                       }


                       $('#tblebody1').append('<tr>\n' +
                           '                        <td>'+ itcount +'</td>\n' +
                           '\n' +

                           '                        <td>'+ dataset.email +
                           '                        </td>\n' +

                           '\n' +
                           '\n' +
                           '\n' + istsatrted + isvalidemil +

                           '                        <td>'+ erortext +
                           '\n' +
                           '\n' +
                           '                        </td>\n' +
                           '\n' +
                           '                        </tr>');

                     //  console.log(dataset);
                       itcount++;

                   });





                   //return response.ref;
               }

           },error: function (res) {
               console.log(res);
           }


       });

   }


   @endif

    </script>

@include('panel.layout.footer')
    @if(isset($current) && $current==true )

        <script>

            var myVar = setInterval("showcurentdata()", 5000);

        </script>

@endif

{{--@if($data->completed ==1)--}}
        {{--<script>--}}

            {{--clearInterval(myVar);--}}

        {{--</script>--}}


    {{--@endif--}}



</body>
</html>
