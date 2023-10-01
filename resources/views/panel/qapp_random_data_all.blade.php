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
          	<h3><i class="fa fa-angle-right"></i> Q App Add</h3>

              <form class="" method="POST" action="" enctype="multipart/form-data">


                  <input type="hidden" name="_token" value="{{ csrf_token() }} " id="_token">

                  {{--<p>--}}
                      {{--{{ $errors->first('email') }}--}}
                      {{--{{ $errors->first('password') }}--}}
                  {{--</p>--}}
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Random Data Q App</h4>
                      <div class="form-horizontal style-form" >




                          {{--<div class="form-group">--}}
                              {{--<label class="col-sm-2 col-sm-2 control-label">Price</label>--}}
                              {{--<div class="col-sm-10">--}}

                                  {{--<span style=" color: red;" >  {{ $errors->first('product_price') }} </span>--}}
                                  {{--<input required type="number"  name="product_price" class="form-control round-form">--}}
                              {{--</div>--}}
                          {{--</div>--}}



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">App Name </label>
                              <div class="col-sm-10">
                                  <select  name="app_id" class="form-control" id="app_id">



                                      @foreach($app_list as $dt)



                                          <option  value="{{ $dt['app_id'] }}">{{ $dt['app_name'] }} </option>
                                          @endforeach

                                  </select>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Random Item Text</label>
                              <div class="col-sm-10">

                                  <input id="text" required type="text" name="text" class="form-control round-form">
                              </div>
                          </div>

                          <div class="row mt">
                              <div class="col-lg-12">
                                  <div class="form-panel">
                                      <div action="#" class="form-horizontal style-form">


                                          <div class="form-group last">
                                              <label class="control-label col-md-3">Random Image</label>
                                              <div class="col-md-9">
                                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                                      </div>
                                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                      <div>

                                                          <span style=" color: red;" >  {{ $errors->first('font') }} </span>
                                                          <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Add Random image If Available</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>


                        <input name="ran_img[]"  id="ran_img" type="file" class="default" required multiple />
                        </span>
                                                          <br>
                                                          <progress></progress>
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

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Random Item Sex</label>
                              <div class="col-sm-10">
                                  <select name="sex" class="form-control" id="sex">

<option value="male" selected >Male</option>
                                      <option value="female" >Female</option>
                              </select>

                              </div>
                          </div>






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
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Save Product</h4>






                      <button onclick="SaveDataSet()" type="button" class="btn btn-primary btn-lg">Save</button>

                      {{--<input type="submit" class="btn btn-primary btn-lg btn-block"></input>--}}
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


function SaveDataSet() {



var text=$('#text').val();
var sex=$('#sex').val();
var app_id=$('#app_id').val();



if(!text){
    swal("Fuck", "Text Empty", "error");
}else if(!sex){

    swal("Fuck", "sex Empty", "error");
}else if(!app_id){
    swal("Fuck", "id Empty", "error");

}else{

    $.ajax({
        url     : '/addRandomDataALL',
        method  : 'post',
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        //
        data: new FormData($('form')[0]),
        headers:
            {
                'X-CSRF-TOKEN': $('#_token').val()
            },

        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        $('progress').attr({
                            value: e.loaded,
                            max: e.total,
                        });
                    }
                } , false);
            }
            return myXhr;
        },

        success : function(response){

            swal("Good job!", response, "success");

        }



    });

}


}


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
