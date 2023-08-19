@extends('layouts.user.mainapp')
@section('title',$category->name)
@section('meta_description',$category->description)
@section('meta_keyword',$category->keyword)
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Aqua CNC Solutions <span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <?php 
                    $inputString = Request::getRequestUri();
                    
                    $outputString = preg_replace('/\/shop\//', '', $inputString);
                    $withoutQueryString = strtok($outputString, '?');
                ?>
                <li class="breadcrumb-item active" aria-current="page">{{$withoutQueryString}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                @if(count($products))
                    <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <?php
                                    $total = $products->total();
                                    $currentPage = $products->currentPage();
                                    $perPage = $products->perPage();
                                    
                                    $from = ($currentPage - 1) * $perPage + 1;
                                    $to = min($currentPage * $perPage, $total);
                                ?>
                                Showing <span>{{$from}} to {{$to}} of {{$total}}</span> Products
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-new">New</span> --}}
                                        <a href="/detail-product/{{ $product->id }}">
                                            <?php $cus_image = json_decode($product->image); ?>
                                            <img src="{{ asset('ab_admin/product/'.$cus_image[0]) }}" alt="{{$product->title}}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a> --}}
                                            <!--<a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>-->
                                            {{-- <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a> --}}
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" onclick="AddToCart({{ $product->id }})" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $product->getCategory->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="/detail-product/{{ $product->id }}">{{ $product->title }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            ${{ $product->price }}
                                        </div><!-- End .product-price -->
                                        {{-- <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                            </a>

                                            <a href="#">
                                                <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                            </a>
                                        </div> --}}
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                            

                          
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    @if ($products->hasPages())
                        <div class="pagination-wrapper">
                             {{ $products->links() }}
                        </div>
                    @endif
                    
                </div><!-- End .col-lg-9 -->
                @else
                <h2 class="m-auto">We Are Sorry, Record Not Found!</h2>
                @endif
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                   Machine Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-1">
                                                <label class="custom-control-label" for="cat-1">CR Series</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="false" aria-controls="widget-2">
                                   Accessories
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-1">
                                                <label class="custom-control-label" for="cat-1">CR Series</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                        
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
