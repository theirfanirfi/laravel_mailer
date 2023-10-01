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
          	<h3><i class="fa fa-angle-right"></i> Font</h3>

              <form class="" method="POST" action="{{ route('bitH-font-add') }}" enctype="multipart/form-data">


                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  {{--<p>--}}
                      {{--{{ $errors->first('email') }}--}}
                      {{--{{ $errors->first('password') }}--}}
                  {{--</p>--}}
          	
          	<!-- BASIC FORM ELELEMNTS -->


          	

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
                          <div action="#" class="form-horizontal style-form">


                              <div class="form-group last">
                                  <label class="control-label col-md-3">Font Add</label>
                                  <div class="col-md-9">
                                      <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                          </div>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                          <div>

                                              <span style=" color: red;" >  {{ $errors->first('font') }} </span>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select Font</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>

                        <input name="font"  id="font" type="file" class="default" required />
                        </span>
                                              <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                          </div>
                                      </div>
                                      <span class="label label-info">NOTE!</span>
                                      <span>
                      Attached image thumbnail is
                      supported in Latest Firefox, Chrome, Opera,
                      Safari and Internet Explorer 10 only
                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /form-panel -->
                  </div>
                  <!-- /col-lg-12 -->
              </div>




              <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Save Font</h4>








                      <input type="submit" class="btn btn-primary btn-lg btn-block"></input>
                      <br>
                  </div>

              </div><!-- /form-panel -->
              </div>

              </form>
          	
		</section><! --/wrapper -->


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

        swal("Good job!", "{{ session()->get('error') }}", "error");
    </script>

@endif
</html>
