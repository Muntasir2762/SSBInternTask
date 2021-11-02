
@extends('frontend.layout.account')

@section('body')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row">
			<div class="shopping-cart">
				<div class="col-md-12">
					<h2>Checkout</h2>
				</div>
					<div class="row">
					<!-- Customer Form -->
					<div class="col-md-8">
						<form action="{{route('order.store')}} " method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="fname" class="form-control" required="required">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" required="required">
									</div>

									<div class="form-group">
										<label>Shipping Address</label>
										<input type="text" name="address" class="form-control" required="required">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" name="lname" class="form-control">
									</div>

									<div class="form-group">
										<label>Phone No.</label>
										<input type="text" name="phone" class="form-control" required="required">
									</div>

									<div class="form-group">
										<label>Zip Code</label>
										<input type="text" name="zipcode" class="form-control" required="required">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Additional Message[Optional]</label>
										<textarea class="form-control" name="additional_message" rows="3"></textarea>
									</div>
								</div>
							</div>
						
					</div>
					<!-- Order Summary -->
					<div class="col-md-4">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th scope="col">Product Name</th>
									<th scope="col">Price</th>
								</tr>
							</thead>
							<tbody>
								@foreach(App\Models\Frontend\Cart::totalCarts() as $item)
								<tr>
									<td>
								      @if(!is_null($item->product->image))
										  <img src="{{asset('Backend/img/product') .'/' .$item->product->image}}" alt="" width="50">
									  @else
										   No Image Found
								      @endif
									</td>
									<td>{{$item->product->title}} </td>
									<td>
										@if(!is_null($item->product->offer_price))
							               BDT{{$item->product->offer_price}} 
							            @else
						                   BDT{{$item->product->regular_price}}
					                	@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<td>Sub Total</td>
									<td>BDT{{App\Models\Frontend\Cart::totalPrices()}}</td>

								</tr>

								<tr>
									<td>Final Amount</td>
									<td>BDT{{App\Models\Frontend\Cart::totalPrices()}}</td>
								</tr>
							</tbody>
						</table>

						<div class="payment-option">
							<h4>Please Slect The Payment Method</h4>
							@foreach(App\Models\Backend\Paymentoption::orderBy('priority','desc')->get() as $gateway)
							  <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="{{ $gateway->slug}}" value="{{$gateway->id}} " checked>
                                 <label class="form-check-label" for="{{ $gateway->slug}} ">
                                    {{$gateway->name}}
                                 </label>
                              </div>

                         	  @if($gateway->slug=='bkash')
                         	       <div class="gateway-option {{ $gateway->slug}} hidden">
                              	       <h5>Please Send Money to This <strong>{{$gateway->number}}</strong> and Insert the Transaction Id</h5>
                              	      <div class="form-group">
                              		       <input type="text" name="btransaction_id" class="form-control" placeholder="Transaction Id">
                              	       </div>
                                   </div>

                         	  @elseif($gateway->slug=='rocket')
                         	  		 <div class="gateway-option {{ $gateway->slug}} hidden">
                              	       <h5>Please Send Money to This <strong>{{$gateway->number}}</strong> and Insert the Transaction Id</h5>
                              	      <div class="form-group">
                              		       <input type="text" name="rtransaction_id" class="form-control" placeholder="Transaction Id">
                              	       </div>
                                   </div>
                         	  @elseif($gateway->slug=='nagad')
                         	  		 <div class="gateway-option {{ $gateway->slug}} hidden">
                              	       <h5>Please Send Money to This <strong>{{$gateway->number}}</strong> and Insert the Transaction Id</h5>
                              	      <div class="form-group">
                              		       <input type="text" name="ntransaction_id" class="form-control" placeholder="Transaction Id">
                              	       </div>
                                   </div>
                         	  @else
                         	  		<div class="gateway-option {{ $gateway->slug}} hidden">
                         	  			<h5>Please Proceed the Order.Once You Receive the Products You Have to Pay Amount to the Delivery Man</h5>
                         	  		</div>
                         	  @endif

                            @endforeach 

                            <!-- Few Hidden Information -->	
                            <input type="hidden" name="product_finalprice" value="{{App\Models\Frontend\Cart::totalPrices()}} ">
                            <div class="form-group">
                            	<input type="submit" name="order" class="btn btn-primary" value="Place Your Order">
                            </div>

                            </form>
						</div>

					</div>
					
				</div>
			</div>
		</div>

	</div>
	
</div>

@endsection