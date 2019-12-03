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
										<img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
                                        <p class="disc">-50%</p>
                                        <p><b> {{ $pro->product_name }} </b>  </p>
                                        <h2> {{ $pro->price/2 }}TND</h2>
                                        <h5><strike> {{ $pro->price }}TND</strike> </h5>

										<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>

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
