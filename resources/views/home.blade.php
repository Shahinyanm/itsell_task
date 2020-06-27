@extends('layouts.master')

@section('content')

	<div class="row mt-5">

		<div class="col-3" style="margin-top:100px">
			<div class="card bg-light mb-3">
				<div class="card-header  text-white text-uppercase category-header"><i class="fa fa-list"></i> Категории
				</div>
				<ul class="list-group category_block">
					@foreach($categories as $category)
						<li class="list-group-item category-item @if(request()->slug === $category->slug) category-item-active @endif"
						    data-title="{{$category->slug}}"><a
									href="{{route('home',$category->slug)}}">{{$category->title}}</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="col-8">
			<div class="container">
				<h3 class="h3">Products List </h3>
				<div class="row">
					@foreach($products as $product)
						<div class="col-md-3 col-sm-6 mt-3 mb-3">
							<div class="product-grid {{$product->category->slug}} product-hovered">
								<div class="product-image">
									<a href="#">
										<img class="pic-1" alt="{{$product->title}}  First image"
										     src="{{asset($product->image)}}">
										<img class="pic-2" alt="{{$product->title}}  Second image"
										     src="{{asset($product->image)}}">
									</a>
									<span class="product-new-label">{{$product->category->title}}</span>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="#">{{$product->title}}</a></h3>
									<div class="price">₴{{$product->price}}
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="text-center">
					{{$products->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script>

      $(function () {

        $('.category-item').hover(
          function () {
            let productClass = $(this).data('title')
            $(`.${productClass}`).addClass('product-hovered')
          }, function () {
            let productClass = $(this).data('title')
            $(`.${productClass}`).removeClass('product-hovered')
          })

      })
	</script>
@endpush