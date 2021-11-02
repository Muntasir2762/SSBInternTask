@extends('backend.layout.template')

@section('body')

    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Add New Slider</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
     </div>

     <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12 col-xl-12">

          	<!--Body Content start-->
          		<div class="card bd-0 shadow-base">
			      <div class="d-md-flex justify-content-between pd-25">
			        <div>
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Slider</h6>
			        </div>
			      </div>
			       <div class="pd-l-25 pd-r-15 pd-b-25">

			       	<!--Form Start-->
			   			<form action=" {{route('slider.store')}} " method="POST" enctype="multipart/form-data">
			   				<!--This the security token-->
			   				@csrf

			   				<div class="form-group">
			   					<label>Slider Title</label>
			   					<input type="text" name="title" class="form-control">
			   				</div>

			   				<div class="form-group">
			   					<label>Slider Sub Title</label>
			   					<input type="text" name="subtitle" class="form-control">
			   				</div>

			   				<div class="form-group">
			   					<label>Slider Description</label>
			   					<input type="text" name="description" class="form-control">
			   				</div>

			   				<div class="form-group">
			   					<label>Button Text</label>
			   					<input type="text" name="button_text" class="form-control">
			   				</div>

			   				<div class="form-group">
			   					<label>Button Url</label>
			   					<input type="text" name="button_url" class="form-control">
			   				</div>


			      		    <div class="form-group">
			      		    	<label>Slider Image</label>
			      		    	<input type="file" name="image" class="form-control-file">
			      		    	
			      		    </div>

			      		    <div class="form-group">
			      		    	<input type="submit" name="addSlider" class="btn-btn-primary" value="Add New Slider">
			      		    	
			      		    </div>
			   				
			   			</form>
			       	<!--Form End-->
			       </div>
			   </div>
			   <!--Body Content end-->

          </div>
       </div>
     </div>


@endsection