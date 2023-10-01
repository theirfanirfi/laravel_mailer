<!DOCTYPE html>


<html lang="en">
  @include('panel.layout.header')

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
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">

                  	<div class="row mtbox">
                  		<div class="col-md-6 col-sm-6  box0">
                  			<div class="box1">
					  			<span class="li_heart"></span>
								<h4>Total</h4>
					  			<h3>{{ round($total/1000) }}K</h3>
                  			</div>
					  			<p>{{ $total }} of total emails send. Whoohoo!</p>
                  		</div>
                  		<div class="col-md-6 col-sm-6 box0">
                  			<div class="box1">
					  			<span class="li_cloud"></span>
								<h4>Today</h4>


								@if(round($today/1000)==0)
									<h3>{{  $today }}</h3>
								@else


									<h3>{{  round($today/1000) }}K</h3>

								@endif

                  			</div>
					  			<p> You have send {{ $today }} mails today.</p>
                  		</div>
                  		<div class="col-md-6 col-sm-6 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
								<h4>Servers</h4>
					  			<h3>{{ $servers }}</h3>
                  			</div>
					  			<p>You have {{ $servers }} servers in your account.</p>
                  		</div>
                  		<div class="col-md-6 col-sm-6 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
								<h4>Success</h4>

								@if(round($successful_sent_count/1000)==0)
									<h3>{{  $successful_sent_count }}</h3>
									@else


					  			<h3>{{  round($successful_sent_count/1000) }}K</h3>

									@endif
                  			</div>
					  			<p>You have send {{ $successful_sent_count }} mails successfully. </p>
                  		</div>


                  	</div><!-- /row mt -->




                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->


              </div>
          </section>
      </section>

      <!--main content end-->

@include('panel.layout.footer')

  </body>
</html>
