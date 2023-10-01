<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            {{--<p class="centered"><a href="#"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>--}}
            {{--<h5 class="centered">XtraMailer</h5>--}}

            <li class="mt">
                <a href="{{ route('bitH-dashboard') }}">
                    <i class="glyphicon glyphicon-tasks blue-ico"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            {{--<li class="mt">--}}
                {{--<a  href="{{ route('bitH-product-add') }}">--}}
                    {{--<i class="fa fa-desktop"></i>--}}
                    {{--<span>Inbox</span>--}}
                {{--</a>--}}

            {{--</li>--}}
            <li class="mt">
                <a  href="{{ route('bitH-outbox') }}">
                    <i class="glyphicon glyphicon-import purpel-ico"></i>
                    <span>Outbox</span>
                </a>

            </li>
            <li class="mt">
                <a  href="{{ route('bitH-mailer') }}">
                    <i class="glyphicon glyphicon-envelope green-ico"></i>
                    <span>Mailer</span>
                </a>

            </li>

            <li class="mt">
                <a  href="{{ route('bitH-server') }}">
                    <i class="glyphicon glyphicon-tasks orng-ico"></i>
                    <span>Server</span>
                </a>

            </li>

            <li class="mt">
                <a  href="{{ route('bitH-keymailer') }}">
                    <i class="glyphicon glyphicon-modal-window red-ico"></i>
                    <span>KeyMailer</span>
                </a>

            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>




<aside>
    <div id="sidebar2"  class="nav-collapse rightsidebr ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            {{--<p class="centered"><a href="#"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>--}}
            {{--<h5 class="centered">XtraMailer</h5>--}}

            <li class="mt">
                <a href="{{ route('bitH-pass') }}">
                    <i class="glyphicon glyphicon-cog gray-cl"></i>

                </a>
            </li>


            {{--<li class="mt">--}}
            {{--<a  href="{{ route('bitH-product-add') }}">--}}
            {{--<i class="fa fa-desktop"></i>--}}
            {{--<span>Inbox</span>--}}
            {{--</a>--}}

            {{--</li>--}}
            <li class="mt">
                <a >
                    <i class="glyphicon glyphicon-bullhorn gray-cl"></i>
                    <span class="notii">NEW</span>

                </a>

            </li>



        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<script>
    $('.notii').hide();
var lstr;
    getcount(1);


    function getcount(dt) {


        jQuery.ajax({
            url: "http://3.223.239.99/api/keywordscount",
            type: "GET",
        })
            .done(function (data, textStatus, jqXHR) {
                //  console.log("HTTP Request Succeeded: " + jqXHR.status);
                console.log(data);
                //  $res='';


                //data.forEach(function (element) {

                //    $res+='    <li id=selcts'+ element.id +'   ><a  href="/bitH-keywordbox/' + element.id + '">'+element.keyword    + ' | '+ element.count+   '</a> </li>';
                //  $res='<li><a  href="/bitH-KeyoutboxDomainView">Domains Found | '+data.count+'</a></li>'

                //   });
                console.log('x',dt);
if(dt){
    console.log('xq',dt);
    lstr=data.count;
}
else{
    console.log('dd',lstr);
    if(data.count>lstr){

        console.log(33);
        $('.notii').show();
    }

}
               // counts = data.count;
                //console.log(counts);
               // console.log(firstcount);

                $('.countspan').html(data.count)

            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log("HTTP Request Failed");
            })
            .always(function () {
                /* ... */
            });

    }

    const interval = setInterval(function() {
        // method to be executed;
        getcount();



    }, 5000);

  //  clearInterval(interval);





</script>
