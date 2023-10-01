<!DOCTYPE html>
<html lang="en">
@include('panel.layout.header')

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">


                  <form class="form-login" method="POST" action="{{ route('bitH_do_login') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">



					  <div class="title2 text-center" id="zlogin_container_title">Sign In to access Xtramailer Dashboard</div>
		        <div class="login-wrap">


					<div class="labele">

		            <input  name="email_add" type="text" class=" inputclass" placeholder="Email" autofocus>

					</div>


					<div class="labele">
		            <input name="password" type="password" class=" inputclass" placeholder="Password">

					</div>


					<p  style="color: #e26571 ; padding: 0px">
						{{ $errors->first('email') }}
						{{ $errors->first('password') }}
					</p>
                <button class="btn btn-theme btn-block red-bt" type="submit"><i class="fa fa-lock"></i> Sign In</button>

					<div class="forgotpasslink" onclick="goToForgotPassword();">Forgot Password?</div>


		        </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>



  </body>
</html>
