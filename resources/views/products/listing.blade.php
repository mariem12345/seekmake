@extends('layouts.frontLayout.front_design')

@section('content')


<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('layouts.frontLayout.front_sidebar')
			</div>


					@foreach($productsAll as $pro)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{ url('/product/'.$pro->id) }}"><img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
                                        <p><b> {{ $pro->product_name }} </b>  </p>
                                        <h2> {{ $pro->price }}TND</h2>



                                    </div>

							</div>

						</div>
					</div>
					@endforeach


				</div><!--features_items-->

			</div>
		</div>
	</div>
</section>

@endsection
