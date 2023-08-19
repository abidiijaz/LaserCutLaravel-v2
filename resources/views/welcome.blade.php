@extends('layouts.user.mainapp')
@section('title','Aqua CNC Solutions Ecommerce Website')
@section('meta_description','Aqua CNC Solutions Ecommerce Website')
@section('meta_keyword','Aqua CNC Solutions Ecommerce Website')
@section('content')
<div class="intro-slider-container mb-5">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
        data-owl-options='{
            "dots": true,
            "nav": true,
            "autoplay":true,
            "autoplayTimeout":"3000",
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": true
                }
            }
        }'>
        @foreach ($sliders as $slider)
        <div class="intro-slide" style="background-image: url('{{ asset('ab_admin/slider/'.$slider->image) }}');">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">{{ $slider->deal }}</h3>
                        <h1 class="intro-title">{{ $slider->name }}</h1>

                        <div class="intro-price">
                            
                                @if(is_int($slider->label))
                                <sup class="intro-old-price">
                                    ${{ number_format((float)$slider->label) }}
                                </sup>
                                @else
                                <sup >
                                    {{ $slider->label }}
                                </sup>
                                @endif
                            
                            <span class="text-third">
                               
                                ${{ number_format((float)$slider->price) }}
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="void:javascript(0)" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
        @endforeach
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="container for-you">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Our Latest Stock</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                    <div class="row justify-content-center">
                        @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="/detail-product/{{ $product->id }}">
                                            <?php $cus_image = json_decode($product->image); ?>
                                            <img src="{{ asset('ab_admin/product/'.$cus_image[0]) }}" alt="{{$product->title}}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#" onclick="AddToCart({{ $product->id }})" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            {{-- <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a> --}}
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="/shop/{{$product->getCategory->keyword}}">{{$product->getCategory->name}}</a>
                                        </div>
                                        <!-- End .product-cat -->
                                        <h3 class="product-title"><a href="/detail-product/{{ $product->id }}">{{$product->title}}</a></h3><!-- End .product-title -->
                                        <div class="product-price mt-2">
                                            <span class="new-price">${{ $product->price }}.00</span>
                                            {{-- <span class="old-price">Was $349.99</span> --}}
                                        </div>
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->

            </div><!-- End .container -->
            <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <h2 class="title text-center mb-4">CO2 Cutting Machine</h2><!-- End .title text-center -->
                <p>CO2 Cutting Machine
                    Cloudray <span style="color: #033267;">Self-Designed</span> CO2 Cutting Machine; Can safely engrave or cut any laser-compatible material As wood, glass, acrylic, fabric, leather, paper, cardboard, rubber etc；<span style="color: #033267;">55-100W CO2 LASER POWER; Ball screw Z-Axis Motorized Table;</span> Pass-through For Greater Flexibility; Working Dimension: 5030 / 6040 / 7050 / 9060; Cloudray CO2 Cutting Machine Reference Parameters Offered
                </p>
                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <img src="user-end/images/banner-co2.jpg" class="mt-4" alt="Category image">
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- End .mb-5 -->
            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Popular categories</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="title-link" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">View All Recommendations<i class="icon-long-arrow-right"></i></a>
                            </li>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach ($pcategories as $category)
                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="/shop/{{ $category->getCategory->keyword }}" class="cat-block">
                                    <figure>
                                        <span class="populer_cata_image">
                                            <img src="{{ asset('ab_admin/category/'.$category->getCategory->image) }}" alt="{{ $category->getCategory->name }}">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div>
                </div>
            </div><!-- End .container -->
            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">CO2 CUTTING MACHINE COMPONENTS</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="title-link" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">View All Recommendations<i class="icon-long-arrow-right"></i></a>
                            </li>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/pppp_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p2_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p3.webp" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                         <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/pppp_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p2_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p3.webp" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                         <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/pppp_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p2_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p3.webp" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                         <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/pppp_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p2_low.png" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="category.html" class="cat-block">
                                <figure>
                                    <span class="populer_cata_image">
                                        <img src="user-end/images/p3.webp" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">QS SERIES (Q-Switched)</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    </div>
                </div>
            </div><!-- End .container -->
              <div class="mb-3"></div><!-- End .mb-5 -->

            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <p class="text-center mx-auto text-dark w-100" style="padding:25px; background-image: url('user-end/images/heading-img.webp');"><span class="title text-center" style="font-weight: 300; font-size: 2.2rem; color: black;">Cloudray Customer Loyalty Program</span>&nbsp;&nbsp;&nbsp;&nbsp; For customers ordered directly on www.cloudraylaser.com</p>
                </div><!-- End .heading -->

                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-6 col-sm-12 col-lg-6">
                            <a href="category.html" class="cat-block" style="pointer-events: none;">
                                <img src="user-end/images/social-banner.webp" alt="Category image">
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                         <div class="col-6 col-sm-12 col-lg-6">
                            <a href="category.html" class="cat-block" style="pointer-events: none;">
                                <img src="user-end/images/social-banner2.webp" alt="Category image">
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                         <div class="col-6 col-sm-12 col-lg-6">
                            <a href="category.html" class="cat-block" style="pointer-events: none;">
                                <img src="user-end/images/social-banner3.webp" alt="Category image">
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        <div class="col-6 col-sm-12 col-lg-6">
                            <a href="category.html" class="cat-block" style="pointer-events: none;">
                                <img src="user-end/images/social-banner4.webp" alt="Category image">
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    </div>
                </div>
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <h2 class="title mb-4">Laser Application</h2><!-- End .title text-center -->
                <p style="font-size: 18px;">Popular materials and industries where laser systems shine. Explore all types of engraving and cutting work. Check more Customer Gallery Here
                </p>
                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <img src="user-end/images/div-img.webp" class="mt-4" alt="Category image">
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->
            <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <h2 class="title mb-4">Cloudray Tech Partners</h2><!-- End .title text-center -->
                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-lg-4 col-mb-4 col-sm-12">
                        <div class="card">
                          <img src="user-end/images/partner-1.webp" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2">SarbarMultimedia</h5>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>

                          </div>
                         </div>
                        </div>
                      <div class="col-lg-4 col-mb-4 col-sm-12">
                      <div class="card">
                          <img src="user-end/images/partner-2.webp" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2">Tim Meschke</h5>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>

                          </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-mb-4 col-sm-12">
                        <div class="card">
                          <img src="user-end/images/partner-3.webp" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2">MWLASER</h5>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>

                          </div>
                         </div>
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->
             <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <h2 class="title mb-4 text-center">Laser Guide</h2><!-- End .title text-center -->
                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-lg-4 col-mb-4 col-sm-12">
                        <div class="card">
                          <img src="user-end/images/guid-1.png" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2 text-center">SarbarMultimedia</h5>
                            <p class="card-text mt-1 mb-2 text-justify">Laser part marking technology is becoming more and more important in all realms of manufacturing, from automotive to aerospace and medical industries. This is because of the growing demand from manufacturers and federal regulations to be able to track and trace products....</p>
                             <a href="" class="btn btn-outline-success btn-sm d-inline">Read More</a> | <a href="" class="btn btn-outline-danger btn-sm d-inline"><i class="fa fa-heart-o"></i></a>
                          </div>
                         </div>
                        </div>
                      <div class="col-lg-4 col-mb-4 col-sm-12">
                      <div class="card">
                          <img src="user-end/images/guid-2.png" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2 text-center">Tim Meschke</h5>
                            <p class="card-text mt-1 mb-2 text-justify">Today, let's share the basic information concerning the the Components and Maintenance of Laser Marking/Engraving Machine.<br> Usually, when we want to order the suitable laser machine while there are kinds of different machine for us to choose...</p>
                           <a href="" class="btn btn-outline-success btn-sm d-inline">Read More</a> | <a href="" class="btn btn-outline-danger btn-sm d-inline"><i class="fa fa-heart-o"></i></a>
                          </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-mb-4 col-sm-12">
                        <div class="card">
                          <img src="user-end/images/guid-3.png" alt="" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title mt-2 text-center">MWLASER</h5>
                            <p class="card-text mt-1 mb-2 text-justify">With the increased availability of user-friendly laser systems,people all over the world have transformed their simple idea or hobby into a successful business. In fact, many entrepreneurs run their businesses from the comfort of their homes. If you have an appreciation for craftsmanship, enjoy working with a broad range...</p>
                           <a href="" class="btn btn-outline-success btn-sm d-inline">Read More</a> | <a href="" class="btn btn-outline-danger btn-sm d-inline"><i class="fa fa-heart-o"></i></a>
                          </div>
                         </div>
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->
@endsection
