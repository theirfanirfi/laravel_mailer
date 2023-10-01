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

            <div class="content-panel col-md-12 mt padding-top">
                <div class="">
                    <form name="form" id="form" method="POST" enctype="multipart/form-data" action="{{ route('SendNewMail') }}">
                    <div class="col-lg-8"><h3><font color="green"><span class="glyphicon glyphicon-leaf"></span></font>
                            Send Mail</h3>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="form-group col-lg-6 "><label for="senderEmail">Email   <span style=" color: red;" > {{ $errors->first('senderEmail') }} </span></label><input
                                            type="text" id="senderEmail" name="senderEmail" value=""
                                            class="form-control  input-sm inputclass "></div>

                                <div class="form-group col-lg-6 "><label for="senderName">Sender Name   <span style=" color: red;" > {{ $errors->first('senderName') }} </span></label><input
                                            type="text" id="senderName" name="senderName" value=""
                                            class="form-control  input-sm inputclass"></div>
                            </div>
                            <div class="row"><span class="form-group col-lg-6  "><label for="attachment">Attachment <small>(Multiple Available)</small></label><input
                                            type="file" name="attachment[]" id="attachment[]"
                                            multiple="multiple"></span>
                                <div class="form-group col-lg-6"><label for="replyTo">Reply-to</label><input type="text"
                                                                                                             id="replyTo"
                                                                                                             name="replyTo"
                                                                                                             value=""
                                                                                                             class="form-control  input-sm inputclass">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 "><label for="subject">Subject <span style=" color: red;" > {{ $errors->first('subject') }} </span></label><input
                                            type="text" id="subject" name="subject" value=""
                                            class="form-control  input-sm inputclass"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6"><label for="messageLetter">Message
                                        Letter   <span style=" color: red;" > {{ $errors->first('messageLetter') }} </span></label><textarea name="messageLetter" id="messageLetter" rows="10"
                                                                class="form-control"></textarea></div>
                                <div class="form-group col-lg-6 "><label for="emailList">Email List <span style=" color: red;" > {{ $errors->first('emailList') }} </span> </label><textarea
                                            name="emailList" id="emailList" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 "><label for="messageType">Message Type</label>

                                    HTML <input type="radio" name="messageType" id="messageType" value="1">

                                    Plain<input type="radio" checked="checked" name="messageType" id="messageType"
                                                value="2">
                                    <div><label for="">Demo Mode <input type="checkbox" value="1"
                                                                        name="is_demo"></label></div>
                                    <div><label for="">Enable Zero Font <input type="checkbox" value="1"
                                                                               name="enable_zerofont"></label></div>
                                </div>
                                <div class="form-group col-lg-3 "><label for="encode">Encode Type</label> <select
                                            id="encode" name=" " class="form-control input-sm">
                                        <option value="UTF-8">UTF-8 Encode</option>
                                        <option value="UTF-8">ISO Encode</option>
                                    </select></div>
                            </div>
                        {{--<i class="glyphicon glyphicon-send"></i>--}}
                            {{--<input type="submit"  name="action"  class="btn btn-success btn-theme04">--}}
                        {{--<span class="glyphicon glyphicon-arrow-up"></span>ff--}}
                        {{--</input>--}}
                        <br>

                        <button onclick="$('form#form').submit();" type="button" class="btn-mail">
                            <span class="glyphicon glyphicon-send"></span> Send
                        </button>

                    </div>

                    <div class="col-lg-4"><br> <label for="well">Instruction</label>
                        <div id="well" class="well well"><h4>Server Information</h4>


                            <div class=" col-6 "><label for="encode">Select Server</label> <select
                                        id="server" name="server" class="form-control input-sm">
                                    <option value="0771856t">Split With Servers</option>
                                    @foreach($server as $sv)

                                        <option value="{{ $sv->server_hash }}">{{ $sv->nickname }}</option>

                                        @endforeach


                                </select></div>



                            {{--<ul>--}}
                                {{--<li>ServerIP : <b>172.18.0.8</b></li>--}}
                            {{--</ul>--}}
                            <h4>HELP</h4>
                            <ul>
                                <li>[-email-] : <b>Reciver Email</b></li>
                                <li>[-domain-] : <b>Reciver Domain</b></li>
                                <li>[-kemail-] : <b>Reciver name</b></li>
                                <li>[-time-] : <b>Date and Time</b> ('.date("m/d/Y h:i:s a", time()).')</li>
                                <li>[-emailuser-] : <b>Email User</b> (emailuser@emaildomain)</li>
                                <li>[-randomstring-] : <b>Random string (0-9,a-z)</b></li>
                                <li>[-randomnumber-] : <b>Random number (0-9) </b></li>
                                <li>[-randomletters-] : <b>Random Letters(a-z) </b></li>
                                <li>[-randommd5-] : <b>Random MD5 </b></li>
                            </ul>
                            <h4>example</h4>

                            Reciver Email = <b>user@domain.com</b><br>
                            <ul>
                                <li>hello <b>[-emailuser-]</b> -&gt; hello <b>user</b></li>
                                <li>your code is <b>[-randommd5-]</b> -&gt; your code is <b>e10adc3949ba59abbe56e057f20f883e</b>
                                </li>
                            </ul>
                        </div>
                    </div>

                    </form>
                </div>

            </div>
            </div>
        </section>
    </section>


@include('panel.layout.footer')

</body>
</html>
