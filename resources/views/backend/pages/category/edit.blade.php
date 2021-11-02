@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
	    <i class="icon ion-ios-home-outline"></i>
	    <div>
	      <h4>Update Catagory Information</h4>
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
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Catagory Information</h6>
			        </div>
			      </div>

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			      	
			      	<form action="{{ route('category.update', $category->id ) }}" method="POST" enctype="multipart/form-data">
			      		<!-- This is the Security Tocken + No one can Embad this Form using iframe tag -->
			      		@csrf 

			      		<div class="form-group">
			      			<label>Catagory Name</label>
			      			<input type="text" name="name" class="form-control" value="{{ $category->name }}">
			      		</div>

			      		<div class="form-group">
			      			<label>Catagory Description</label>
			      			<textarea class="form-control" name="description" rows="5">{{ $category->description }}</textarea>
			      		</div>

			      		<div class="form-group">
			      			<label>Is Parent</label>
			      			<select class="form-control" name="is_parent">
			      				<option value="0">Please Select the Parent Catagory if any</option>
			      				@foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentcat )

			      				    <!-- value="{{ $parentcat->id }}" -->
			      					<option value="0" @if( $parentcat->is_parent == 0 && $category->id == $parentcat->id) selected @endif>{{$parentcat->name}} </option>

			      					@foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent',  $parentcat->id)->get() as $childcat )
			      						<option value="{{ $parentcat->id }}" @if($category->id==$childcat->id) selected="" @endif >• {{ $childcat->name }}</option>
			      					@endforeach
			      				@endforeach
			      			</select>			      			
			      		</div>

			      		<div class="form-group">
			      			<label>Status</label>
			      			<select class="form-control" name="status">
			      				<option value="0">Please Select the Status</option>
			      				<option value="1" @if ( $category->stattus == 1 ) selected @endif >Active</option>
			      				<option value="0" @if ( $category->stattus == 0 ) selected @endif >Inactive</option>
			      			</select>			      			
			      		</div>

			      		<div class="form-group">
			      			<label>Catagory Image / Logo</label><br>

			      			@if ( !is_null($category->image) )
					      		<img src="{{ asset('Backend/img/category') }}/{{ $category->image }}" width="40">
					      	@else
					      		No Thumbnail
					      	@endif
					      	<br><br>
			      			<input type="file" class="form-control-file" name="image"> 
			      		</div>

			      		<div class="form-group">
			      			<input type="submit" name="updateCatagory" class="btn btn-primary" value="Save Changes">
			      		</div>
			      	</form>
			      	
			      </div>
			    </div>
		  	<!-- Body Content End -->
		  </div>
		</div>
	</div>


@endsection