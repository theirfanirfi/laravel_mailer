<!DOCTYPE html>
<html lang="en">
@include('panel.layout.header')
<link rel="stylesheet" type="text/css" href="{{ asset('js/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <body>

  <section id="container" >
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
      <!--sidebar end-->
      {{--ont_list--}}
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> User Name & Password Change</h3>

              <form class="" method="POST" action="{{ route('bith-changepw') }}" enctype="multipart/form-data">


                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  {{--<p>--}}
                      {{--{{ $errors->first('email') }}--}}
                      {{--{{ $errors->first('password') }}--}}
                  {{--</p>--}}
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add New Details</h4>
                      <div class="form-horizontal style-form" >


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                              <div class="col-sm-10">
                                  <span style=" color: red;" > {{ $errors->first('username') }} </span>
                                  <input required type="text" name="username" class="form-control round-form"  value="{{ old('username') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <span style=" color: red;" > {{ $errors->first('password') }} </span>
                                  <input required type="text" name="password" class="form-control round-form">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password Again</label>
                              <div class="col-sm-10">
                                  <span style=" color: red;" > {{ $errors->first('password_confirm') }} </span>
                                  <input required type="text" name="password_confirm" class="form-control round-form">
                              </div>
                          </div>

                          {{--<div class="form-group">--}}
                              {{--<label class="col-sm-2 col-sm-2 control-label">Price</label>--}}
                              {{--<div class="col-sm-10">--}}

                                  {{--<span style=" color: red;" >  {{ $errors->first('product_price') }} </span>--}}
                                  {{--<input required type="number"  name="product_price" class="form-control round-form">--}}
                              {{--</div>--}}
                          {{--</div>--}}







                      </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	

          	

          	<!-- INPUT MESSAGES -->
          	{{--<div class="row mt">--}}
          		{{--<div class="col-lg-12">--}}
          			{{--<div class="form-panel">--}}
                  	  {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Product Availability</h4>--}}

						{{----}}


						{{----}}

						{{----}}

						{{--<select name="stock_availability" class="form-control">--}}
						  {{--<option selected value="1" >Stock Available</option>--}}
						  {{--<option value="0" >Stock Not Available</option>--}}

						{{--</select>--}}
						{{--<br>--}}
                    {{--</div>--}}

          			{{--</div><!-- /form-panel -->--}}
          		{{--</div><!-- /col-lg-12 -->--}}




              <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Save Details</h4>








                      <input type="submit" class="btn btn-primary btn-lg btn-block"></input>
                      <br>
                  </div>

              </div><!-- /form-panel -->
              </div>

              </form>
          	
		</section>


      </section>

      </section><!-- /MAIN CONTENT -->



      <!--main content end-->
      <!--footer start-->
  @include('panel.layout.footer')



  <script src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>

  <script src="{{ asset('js/jscolor.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>

  <!-- include summernote css/js -->


  <script>



  </script>

  {{--@include('layout.footer')--}}
  <!-- ##### Footer Area End ##### -->



  </body>



@if(session()->exists('success'))

    <script>

        swal("Good job!", "{{ session()->get('success') }}", "success");
    </script>

@endif

@if(session()->exists('error'))

    <script>

        swal("err!", "{{ session()->get('error') }}", "error");
    </script>

@endif
</html>
