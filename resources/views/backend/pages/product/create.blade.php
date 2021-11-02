@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
	    <i class="icon ion-ios-home-outline"></i>
	    <div>
	      <h4>Create New Product</h4>
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
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Product</h6>
			        </div>
			      </div>

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			      	
			      	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
			      		@csrf 

			      		<div class="container-fluid">
			      			<div class="row">
			      				<!-- First Column -->
			      				<div class="col-sm-4">
			      					
			      					<div class="form-group">
						      			<label>Product Title</label>
						      			<input type="text" name="title" class="form-control">
						      		</div>

						      		<div class="form-group">
						      			<label>Regular Price</label>
						      			<input type="text" name="regular_price" class="form-control">
						      		</div>

						      		<div class="form-group">
						      			<label>Offer Price</label>
						      			<input type="text" name="offer_price" class="form-control">
						      		</div>

						      		<div class="form-group">
						      			<label>Quantity</label>
						      			<input type="number" name="quantity" class="form-control">
						      		</div>

						      		<div class="form-group">
						      			<label>SKU Code</label>
						      			<input type="text" name="sku_code" class="form-control">
						      		</div>

			      				</div>

			      				<!-- Middle Column -->
			      				<div class="col-sm-4">
			      					<div class="form-group">
						      			<label>Featured Product?</label>
						      			<select class="form-control" name="is_featured">
						      				<option value="0">Please Select the Featured Status</option>
						      				<option value="1">Yes Featured</option>
						      				<option value="0">Not Featured</option>
						      			</select>			      			
						      		</div>

						      		<div class="form-group">
						      			<label>Product Brand</label>
						      			<select class="form-control" name="brand_id">
						      				<option value="0">Please Select the Product Brand</option>
						      				@foreach( $brands as $brand )
						      					<option value="{{ $brand->id }}">{{ $brand->name }}</option>
						      				@endforeach
						      				
						      			</select>			      			
						      		</div>

						      		<div class="form-group">
						      			<label>Product Category</label>
						      			<select class="form-control" name="category_id">
						      				<option value="0">Please Select the Product Category</option>
											@foreach (  App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0 )->get() as $parent_cat )						      				
						      					<option value="{{ $parent_cat->id }}">{{ $parent_cat->name }}</option>

						      					@foreach (  App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parent_cat->id)->get() as $child_cat )

						      						<option value="{{ $child_cat->id }}">-- {{ $child_cat->name }}</option>

						      					@endforeach

						      				@endforeach
						      			</select>			      			
						      		</div>

						      		<div class="form-group">
						      			<label>Product Type/Condition</label>
						      			<select class="form-control" name="product_type">
						      				<option value="0">Please Select the Product Type/Condition</option>
						      				<option value="1">New</option>
						      				<option value="0">Pre-Owned</option>
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

						      		

			      				</div>

			      				<!-- Last Column -->
			      				<div class="col-sm-4">
			      					<div class="form-group">
						      			<label>Product Short Description</label>
						      			<textarea class="form-control" name="short_desc" rows="5"></textarea>
						      		</div>

						      		<div class="form-group">
						      			<label>Product Description</label>
						      			<textarea class="form-control" name="desc" rows="5"></textarea>
						      		</div>

						      		<div class="form-group">
						      			<label>Tags</label>
						      			<input type="text" name="tags" class="form-control">
						      		</div>
						      		
			      				</div>
			      			</div>
			      		</div>

			      		<div class="container-fluid">
			      			<div class="row">
			      				<div class="col-sm-12">
			      					<div class="form-group">
						      			<label>Product Image</label>
						      			<input type="file" class="form-control-file" name="image"> 
						      		</div>

			      					<div class="form-group">
						      			<input type="submit" name="addProduct" class="btn btn-primary" value="Add New Product">
						      		</div>
			      				</div>
			      			</div>
			      		</div>
			      		
			      	</form>
			      	
			      </div>
			    </div>
		  	<!-- Body Content End -->
		  </div>
		</div>
	</div>


@endsection