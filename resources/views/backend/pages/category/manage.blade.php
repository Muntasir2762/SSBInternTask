@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
	    <i class="icon ion-ios-home-outline"></i>
	    <div>
	      <h4>Manage All Category</h4>
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
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Category</h6>
			        </div>
			      </div>

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			      	<div class="bd rounded table-responsive">
			      		<!-- Table Start -->
				      	<table class="table table-bordered table-striped">
						  <thead>
						    <tr>
						      <th scope="col">#Sl.</th>
						      <th scope="col">Image</th>
						      <th scope="col">Name</th>
						      <!-- <th scope="col">Slug</th>
						      <th scope="col">Description</th> -->
						      <th scope="col">Category / Sub-Category</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>						      
						    </tr>
						  </thead>
						  <tbody>

						  	
						@php  $i = 1; @endphp

						  	@foreach ( $categories as $cat )					  		

						  		@if ( $cat->is_parent == 0 )

							    <tr>
							      <th scope="row">{{ $i++ }}</th>
							      <td>
							      	@if ( !is_null($cat->image) )
							      		<img src="{{ asset('Backend/img/category') }}/{{ $cat->image }}" width="40">
							      	@else
							      		No Thumbnail
							      	@endif
							      </td>
							      <td>{{ $cat->name }}</td>
							      <!-- <td>{{ $cat->slug }}</td>
							      <td>{{ $cat->description }}</td> -->
							      <td>
							      	@if ( $cat->is_parent == 0 )
							      		<span class="badge badge-success">Primary Category</span>
							      	@else
							      		<span class="badge badge-warning"> {{ $cat->parent->name }} </span>
							      	@endif
							      </td>
							      <td>
							      	@if ( $cat->status == 1 )
							      		<span class="badge badge-success">Active</span>
							      	@else
							      		<span class="badge badge-danger">InActive</span>
							      	@endif
							      </td>
							      <td>
							      	<div class="action-icons">
							      		<ul>
							      			<li><a href="{{ route('category.edit', $cat->id) }}"><i class="fa fa-edit"></i></a></li>
							      			<li><a href="" data-toggle="modal" data-target="#deleteCategory{{ $cat->id }}"><i class="fa fa-trash"></i></a></li>
							      		</ul>

							      		<!-- Delete Modal Start -->
							      		<div class="modal fade" id="deleteCategory{{ $cat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete the Category?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<form action="{{ route('category.destroy', $cat->id) }}" method="POST">
										      		@csrf							      	
											        <div class="action-icons">
											        	<ul>
											        		<li><input type="submit" name="delete" value="Delete" class="btn btn-danger"></li>

											        		<li><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></li>
											        	</ul>
											        </div>
										        </form>
										      </div>

										    </div>
										  </div>
										</div>
							      		<!-- Delete Modal End -->
							      	</div>
							      </td>
							    </tr>

								    @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $cat->id)->get() as $subcat )
								    	<!-- Sub Category Item Start -->
								    	<tr>
									      <th scope="row">{{ $i++ }}</th>
									      <td>
									      	@if ( !is_null($subcat->image) )
									      		<img src="{{ asset('Backend/img/category') }}/{{ $subcat->image }}" width="40">
									      	@else
									      		No Thumbnail
									      	@endif
									      </td>
									      <td>- {{ $subcat->name }}</td>
									      <!-- <td>{{ $cat->slug }}</td>
									      <td>{{ $cat->description }}</td> -->
									      <td>
									      		<span class="badge badge-warning"> {{ $subcat->parent->name }} </span>
									      </td>
									      <td>
									      	@if ( $subcat->status == 1 )
									      		<span class="badge badge-success">Active</span>
									      	@else
									      		<span class="badge badge-danger">InActive</span>
									      	@endif
									      </td>
									      <td>
									      	<div class="action-icons">
									      		<ul>
									      			<li><a href="{{ route('category.edit', $subcat->id) }}"><i class="fa fa-edit"></i></a></li>
									      			<li><a href="" data-toggle="modal" data-target="#deleteCategory{{ $subcat->id }}"><i class="fa fa-trash"></i></a></li>
									      		</ul>

									      		<!-- Delete Modal Start -->
									      		<div class="modal fade" id="deleteCategory{{ $subcat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete the Sub Category?</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<form action="{{ route('category.destroy', $subcat->id) }}" method="POST">
												      		@csrf							      	
													        <div class="action-icons">
													        	<ul>
													        		<li><input type="submit" name="delete" value="Delete" class="btn btn-danger"></li>

													        		<li><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></li>
													        	</ul>
													        </div>
												        </form>
												      </div>

												    </div>
												  </div>
												</div>
									      		<!-- Delete Modal End -->
									      	</div>
									      </td>
									    </tr>
								    	<!-- Sub Category Item End -->
								    @endforeach

							    @endif



						    @endforeach
						    
						  </tbody>
						</table>
				      	<!-- Table End -->
				    </div>
			      	
			      </div>
			    </div>
		  	<!-- Body Content End -->
		  </div>
		</div>
	</div>


@endsection