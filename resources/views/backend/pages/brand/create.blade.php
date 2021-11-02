@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
	    <i class="icon ion-ios-home-outline"></i>
	    <div>
	      <h4>Create New Brand</h4>
	      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
	    </div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
		  <div class="col-sm-12 col-xl-12">
		  	<!-- Body Content Start -->
		  	<div class="card bd-0 shadow-base">
			      <div class="d-md-flex justify-content-between pd-25">
			        <div>
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Brand</h6>
			        </div>
			      </div>

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			      	
			      	<form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
			      		<!-- This is the Security Tocken + No one can Embad this Form using iframe tag -->
			      		@csrf 

			      		<div class="form-group">
			      			<label>Brand Name</label>
			      			<input type="text" name="name" class="form-control">
			      		</div>

			      		<div class="form-group">
			      			<label>Brand Description</label>
			      			<textarea class="form-control" name="description" rows="5"></textarea>
			      		</div>

			      		<div class="form-group">
			      			<label>Is Featured</label>
			      			<select class="form-control" name="is_featured">
			      				<option value="0">Please Select the Featured Status</option>
			      				<option value="1">Yes Featured</option>
			      				<option value="0">Not Featured</option>
			      			</select>			      			
			      		</div>

			      		<div class="form-group">
			      			<label>Status</label>
			      			<select class="form-control" name="status">
			      				<option value="0">Please Select the Status</option>
			      				<option value="1">Active</option>
			      				<option value="0">Inactive</option>
			      			</select>			      			
			      		</div>

			      		<div class="form-group">
			      			<label>Brand Image / Logo</label>
			      			<input type="file" class="form-control-file" name="image"> 
			      		</div>

			      		<div class="form-group">
			      			<input type="submit" name="addBrand" class="btn btn-primary" value="Add New Brand">
			      		</div>
			      	</form>
			      	
			      </div>
			    </div>
		  	<!-- Body Content End -->
		  </div>
		</div>
	</div>


@endsection