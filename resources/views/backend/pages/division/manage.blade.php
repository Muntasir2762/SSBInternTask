@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
	    <i class="icon ion-ios-home-outline"></i>
	    <div>
	      <h4>Manage All Division</h4>
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
			          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Division</h6>
			        </div>
			      </div>

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			      	<div class="bd rounded table-responsive">
			      		<!-- Table Start -->
				      	<table class="table table-bordered table-striped">
						  <thead>
						    <tr>
						      <th scope="col">#Sl.</th>
						      <th scope="col">Division Name</th>
						      <th scope="col">Priority No.</th>
						      <th scope="col">Action</th>						      
						    </tr>
						  </thead>
						  <tbody>

						  	@php  $i = 1; @endphp
						  	@foreach ( $divisions as $division )

							    <tr>
							      <th scope="row">{{ $i }}</th>
							      <td>{{ $division->name }}</td>
							      <td>{{ $division->priority }}</td>
							      <td>
							      	<div class="action-icons">
							      		<ul>
							      			<li><a href="{{ route('division.edit', $division->id) }}"><i class="fa fa-edit"></i></a></li>
							      			<li><a href="" data-toggle="modal" data-target="#deleteDivision{{ $division->id }}"><i class="fa fa-trash"></i></a></li>
							      		</ul>

							      		<!-- Delete Modal Start -->
							      		<div class="modal fade" id="deleteDivision{{ $division->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete the Division?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<form action="{{ route('division.destroy', $division->id) }}" method="POST">
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

							    @php  $i++; @endphp
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