@extends('layouts.frontLayout.front_design')

@section('content')

<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($banners as $key => $banner)
								<li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
							@endforeach
						</ol>

						<div class="carousel-inner">
							@foreach($banners as $key => $banner)
							<div class="item @if($key==0) active @endif">
								<a href="{{ $banner->link }}" title=""><img src="images/frontend_images/banners/{{ $banner->image }}"></a>
							</div>
							@endforeach
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>

</section><!--/slider-->

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Nos Articles</h2>
						@foreach($productsAll as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
                                            <p><b> {{ $pro->product_name }} </b></p>
                                            <p class="disc">-50%</p>
                                            <h2>{{ $pro->price/2 }}TND</h2>
                                            <h5><strike> {{ $pro->price }}TND </strike></h5>

											<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
										</div>

								</div>

							</div>
						</div>
						@endforeach


					</div><!--features_items-->

					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">

							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
</section>

@endsection
