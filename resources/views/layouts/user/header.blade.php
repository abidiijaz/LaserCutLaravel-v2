<style>
    .demo-list a{
        color:black !important;
    }
</style>
<header class="header header-intro-clearance header-4 sticky-header">
            <div class="header-top pt-1 pb-1">
                <div class="container">
                    <div class="header-left">
                        <p><a href="mailto:info@cloudray.com" title="Contact Us" class="d-md-none d-sm-block" aria-label="Contact Us" style="font-weight: 500; color: #f44336;">info@aquacncsolutions.com</a></p>
                        <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                    </div><!-- End .header-left -->

                    <div class="header-right d-none d-sm-none d-md-block">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <!-- <li>
                                        <div class="header-dropdown">
                                            <a href="#">USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">English</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <!-- <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li> -->
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <!-- <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li> -->
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle ">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                            <img src="{{ asset('user-end/images/logo.avif') }}" alt="Logo" width="225" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="/top-search" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="top_search" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <a href="mailto:info@cloudray.com" title="Contact Us" class="text-dark d-none d-md-block" aria-label="Contact Us" style="font-weight: 500;">Contact Us:info@cloudray.com</a>
                        <div class="dropdown compare-dropdown">
                             <!-- Right Side Of Navbar -->

                        @guest
                            {{-- <a href="#signin-modal" data-toggle="modal" data-display="static" title="Account" aria-label="Account">
                                <div class="icon">
                                    <i class="fa fa-user-o" style="font-size:25px;" aria-hidden="true"></i>
                                </div>
                                <p>Account</p>
                            </a> --}}
                        @else

                        {{-- <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                            <div class="icon">
                                    <i class="fa fa-user-o" style="font-size:25px;" aria-hidden="true"></i>
                                </div>
                                <p>{{ Auth::user()->name }}</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="width:135px; font-size:1.3rem; padding:0px;">
                                <ul class="compare-products">
                                    <li class="compare-product">
                                        <a class="dropdown-item" href="/profile"> Profile </a>
                                    </li>
                                    <li class="compare-product">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    </li>

                                </ul>
                            </div> --}}
                        @endguest


                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">@if(session('cart')){{ count(session('cart')) }}@else 0 @endif</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="width: 280px;">
                                <div class="dropdown-cart-products">
                                    <?php $total = 0; ?>
                                    @if(session('cart'))
                                        @foreach (session('cart') as $id=>$details)
                                            <?php $total += $details['price']*$details['quantity']; ?>
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="{{ url('detail-product/'.$id) }}">{{ $details['name'] }}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{ $details['quantity'] }}</span>
                                                        x ${{ $details['price'] }}
                                                    </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{ asset('ab_admin/product/'.$details['image']) }}" alt="product">
                                                    </a>
                                                </figure>
                                                <button class="btn-remove remove-from-cart" data-id="{{ $id }}"><i class="icon-close"></i></button>
                                            </div><!-- End .product -->
                                        @endforeach
                                    @endif
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">${{ $total }}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{url('/view-cart')}}" class="btn btn-primary">View Cart</a>
                                    {{-- <a href="#" onclick="SentWhatsApp()" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a> --}}
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom">
                <div class="container">
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                            <li class="megamenu-container">
                                    <a href="#" class="sf-with-ul">LASER MACHINE</a>

                                    <div class="megamenu">
                                        <div class="menu-col" style="padding:0px !important">
                                            <div class="demo-list">
                                                <div class="col-md-3">
                                                     <ul class="menu-vertical">
                                                        <li class="item-lead">
                                                        <!--<a href="/shop/laser-engraver-machine" class="sf-with-ul pl-5 w-auto">Laser Engraver Machine</a>-->
                                                        <a href="void:javascript(0)" class="sf-with-ul pl-5 w-auto">Laser Engraver Machine</a>
                                                        <div class="megamenu inner-div-megamenu1">
                                                        <div class="menu-col" >
                                                            <div class="demo-list">
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <a href="/shop/qs-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/111_7cf8ce55-9676-4cd9-9504-6d16b305cb29.jpg); width:220px !important; border:none; padding:25%;" ></span>
                                                                        <span class="demo-title text-center mx-auto">QS Series (Q-Switched)</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <a href="/shop/mp-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/3e242416da033622b675af17de14b9b5_5b422d66-e375-4ea3-a182-bdda1bb696e0.jpg); width:220px !important; border:none; padding:25%;"></span>
                                                                        <span class="demo-title">MP series (MOPA)</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <a href="/shop/ar-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/3-2.jpg); width:220px !important;  border:none; padding:25%;"></span>
                                                                        <span class="demo-title">Ar SERIES (2.5D Engraving)</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <a href="/shop/ec-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/111_7cf8ce55-9676-4cd9-9504-6d16b305cb29.jpg); width:220px !important; border:none; padding:25%;"></span>
                                                                        <span class="demo-title">Ec SERIES (CO2 Laser)</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                </div><!-- End .demo-list -->

                                                            </div><!-- End .menu-col -->
                                                        </div><!-- End .megamenu --></li>
                                                    <!--<li ><a href="/shop/laser-engraver-machine-parts" class="sf-with-ul pl-5">Laser Engraver Machine Parts</a>-->
                                                    <li ><a href="void:javascript(0)" class="sf-with-ul pl-5">Laser Engraver Machine Parts</a>
                                                    <div class="megamenu inner-div-megamenu">
                                                        <div class="menu-col" >
                                                            <div class="demo-list">
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Necessary Tools</h6>
                                                                    <a href="/shop/laser-rotary"><p class="d-flex"><img src="{{ asset('assets/menu_images/laserRotary.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Laser Rotary</span></p></a>
                                                                    <a href="/shop/fume-extraction-system"><p class="d-flex"><img src="{{ asset('assets/menu_images/Fume-Extraction1.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Fume Extraction System</span></p></a>
                                                                    <a href="/shop/laser-safety-glasses"><p class="d-flex"><img src="{{ asset('assets/menu_images/Laser-Safety-Goggles-1.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Laser Safety Glasses</span></p></a>
                                                                    <a href="/shop/protective-cover"><p class="d-flex"><img src="{{ asset('assets/menu_images/protection.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Protective Cover</span></p></a>
                                                                    <a href="/shop/working-table"><p class="d-flex"><img src="{{ asset('assets/menu_images/Fiber-Marking1.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Working Table</span></p></a>
                                                                    <a href="/shop/metal-sheet-holder"><p class="d-flex"><img src="{{ asset('assets/menu_images/2.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Metal Sheet Holder</span></p></a>
                                                                    <a href="/shop/software"><p class="d-flex"><img src="{{ asset('assets/menu_images/laserRotary.webp') }}" width="45"> <span style="margin-left:15px; line-height:3;">Software</span></p></a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Customization & Upgrading</h6>
                                                                    <a href="/shop/f-theta-lens"><p class="d-flex"><img src="{{ asset('assets/menu_images/F-theta-Scan-Lens-1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">F-theta Lens</span></p></a>
                                                                    <a href="/shop/jcz-controller"><p class="d-flex"><img src="{{ asset('assets/menu_images/c91289a8f21e51b6b2133e5b9bd46b8c.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">JCZ Controller</span></p>
                                                                    <a href="/shop/galvo-head"><p class="d-flex"><img src="{{ asset('assets/menu_images/1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Galvo Head</span></p></a>
                                                                    <a href="/shop/laser"><p class="d-flex"><img src="{{ asset('assets/menu_images/8c59b7f06202cc3d9adb46986e3fd72d.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Laser</span></p></a>
                                                                    <a href="/shop/laser-path"><p class="d-flex"><img src="{{ asset('assets/menu_images/Fiber-Laser-Path-1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Laser Path</span></p></a>
                                                                    <a href="/shop/lifting-colume"><p class="d-flex"><img src="{{ asset('assets/menu_images/1-500.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Lifting Colume</span></p></a>
                                                                    <a href="/shop/machine-cabinet"><p class="d-flex"><img src="{{ asset('assets/menu_images/Split_Marking_Housing_Set-1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Machine Cabinet</span></p></a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Materials</h6>
                                                                    <a href="/shop/laser-marking-materials"><p class="d-flex"><img src="{{ asset('assets/menu_images/Laser-Cutting-Files-1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Laser Marking Materials</span></p></a>
                                                                    <a href="/shop/engraving-files"><p class="d-flex"><img src="{{ asset('assets/menu_images/0248484a5747708d0a713fd59e4581a6.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Engraving Files</span></p></a>
                                                                </div><!-- End .demo-item -->
                                                            </div><!-- End .demo-list -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .megamenu -->
                                                </li>
                                                <li><a href="void:javascript(0)" class="sf-with-ul pl-5">Making/Engraver/Cutting Materials</a>
                                                    <div class="megamenu inner-div-megamenu">
                                                        <div class="menu-col" >
                                                            <div class="demo-list">
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Laser Marking/Engraving Materials</h6>
                                                                    <a href="/shop/material-package"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Material Package</span></p></a>
                                                                    <a href="/shop/metal"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Metal</span></p></a>
                                                                    <a href="/shop/slate"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Slate</span></p></a>
                                                                    <a href="/shop/acrylic"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Acrylic</span></p></a>
                                                                    <a href="/shop/wood"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Wood</span></p></a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Laser Cutting Materials</h6>
                                                                    <a href="/shop/cutting-material-package"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Cutting Material Package</span></p></a>
                                                                    <a href="/shop/wood"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Wood</span></p></a>
                                                                    <a href="/shop/acrylic"><p class="d-flex"><span style="margin-left:15px; line-height:3;">Acrylic</span></p></a>

                                                                </div><!-- End .demo-item -->

                                                                <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                    <h6>Materials</h6>
                                                                    <p class="d-flex"><img src="{{ asset('assets/menu_images/Laser-Cutting-Files-1.jpg') }}" width="45"> <span style="margin-left:15px; line-height:3;">Cloudray Decoration Pattern Cutting Files AI/DWG/DXF</span></p>

                                                                </div><!-- End .demo-item -->
                                                                </div><!-- End .demo-list -->
                                                            </div><!-- End .menu-col -->
                                                        </div><!-- End .megamenu -->
                                                    </li>
                                                    <!--<li><a href="/shop/laser-cutting-machine" class="sf-with-ul pl-5">Laser Cutting Machine</a>-->
                                                    <li><a href="void:javascript(0)" class="sf-with-ul pl-5">Laser Cutting Machine</a>
                                                        <div class="megamenu inner-div-megamenu">
                                                        <div class="menu-col" >
                                                            <div class="demo-list">
                                                                <div class="demo-item">
                                                                    <a href="/shop/cr-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/11_178da23a-6b7b-4eae-b33b-8c9b3dcf3b20.jpg);"></span>
                                                                        <span class="demo-title">CR Series</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                <div class="demo-item">
                                                                    <a href="/shop/russ-series">
                                                                        <span class="demo-bg" style="background-image: url(/assets/menu_images/221.jpg);"></span>
                                                                        <span class="demo-title">RUSS Series</span>
                                                                    </a>
                                                                </div><!-- End .demo-item -->
                                                                </div><!-- End .demo-list -->

                                                            </div><!-- End .menu-col -->
                                                        </div><!-- End .megamenu -->
                                                        </li>

                                                    </ul><!-- End .menu-vertical -->
                                                </div>
                                                <div class="col-md-9"></div>

                                            </div><!-- End .demo-list -->

                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="megamenu-container">
                                    <a href="#" class="sf-with-ul">Accessories</a>
                                    <div class="megamenu">
                                        <div class="menu-col" style="padding:0px !important">
                                            <div class="demo-list">
                                                <div class="col-md-3">
                                                     <ul class="menu-vertical">
                                                        <li class="item-lead">
                                                        <a href="void:javascript(0)" class="sf-with-ul pl-5 w-auto">CO2 Laser Accessories</a>
                                                        <div class="megamenu inner-div-megamenu1">
                                                            <div class="menu-col" >
                                                                <div class="demo-list">
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/co2-laser-lense">
                                                                            <!--<span class="demo-bg" style="background-image: url(/user-end/images/3374d25c4f89d02657460d4d3fc2de66.png); width:170px !important;height:100px !important; border:none; padding:25%; background-repeat: no-repeat;-->
                                                                            <!--background-size: 170px 100px;" ></span>-->
                                                                            <img src="/user-end/images/3374d25c4f89d02657460d4d3fc2de66.png" width="170"/>
                                                                            <span class="demo-title">CO2 Laser Lense</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/co2-laser-tube">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/500-500.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/500-500.jpg" width="170"/>
                                                                            <span class="demo-title">CO2 Laser Tube</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/co2-laser-controller">
                                                                            <!--<span class="demo-bg" style="background-image: url(/user-end/images/567e4f1dd0374baec4d4333df195dd2c.png);width:220px !important; border:none; padding:25%;"></span>-->
                                                                             <img src="/user-end/images/567e4f1dd0374baec4d4333df195dd2c.png" width="170"/>
                                                                            <span class="demo-title">CO2 Laser Controller</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/industrial-chiller">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/CW-3000.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/CW-3000.jpg" width="170"/>
                                                                            <span class="demo-title">Industrial Chiller</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/power-supply">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/MYJG50.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/MYJG50.jpg" width="170"/>
                                                                            <span class="demo-title">Power Supply</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/laser-head-set">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/CO2_MECHANICAL_PARTS_6_6e2fb919-f411-40a6-aa14-a2d3014fe7c0.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/CO2_MECHANICAL_PARTS_6_6e2fb919-f411-40a6-aa14-a2d3014fe7c0.jpg" width="170"/>
                                                                            <span class="demo-title">Laser Head set</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="row w-100">
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>CO2 Mechanical Parts</h6>
                                                                            <a href="/shop/metal-parts-set">Metal Parts set</a>
                                                                            <a href="/shop/nozzles-&-lens-tube">Nozzles & Lens Tube</a>
                                                                            <a href="/shop/guide-rail-parts">Guide Rail Parts</a>
                                                                            <a href="/shop/honey-comb">Honey Comb</a>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>CO2 Accessories</h6>
                                                                            <a href="/shop/general-accessories">General Accessories</a>
                                                                            <a href="/shop/mounting-accessories">Mounting Accessories</a>
                                                                            <a href="/shop/switch-power-supply">Switch Power Supply</a>
                                                                            <a href="/shop/flyback-transformer">Flyback Transformer</a>
                                                                        </div>
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>Upgrade Kits</h6>
                                                                            <a href="/shop/beam-combiner-&-expander">Beam Combiner & Expander</a>
                                                                            <a href="/shop/z-axis-focus-sensor">Z-axis Focus Sensor</a>
                                                                            <a href="/shop/red-dot-pointer">Red Dot Pointer</a>
                                                                            <a href="/shop/laser-power-meter">Laser Power Meter</a>
                                                                        </div>
                                                                       
                                                                        
                                                                    </div>
                                                                </div>
    
                                                            </div><!-- End .menu-col -->
                                                        </div><!-- End .megamenu --></li>
                                                    <li ><a href="#" class="sf-with-ul pl-5">Fiber Cutting Accessories</a>
                                                    <div class="megamenu inner-div-megamenu">
                                                        <div class="menu-col" >
                                                             <div class="demo-list">
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/fiber-laser-source">
                                                                            <!--<span class="demo-bg" style="background-image: url(/user-end/images/3374d25c4f89d02657460d4d3fc2de66.png); width:170px !important;height:100px !important; border:none; padding:25%; background-repeat: no-repeat;-->
                                                                            <!--background-size: 170px 100px;" ></span>-->
                                                                            <img src="/user-end/images/500-5002.jpg" width="170"/>
                                                                            <span class="demo-title">Fiber Laser Source</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/fiber-control-system">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/500-500.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/FSCUT-1000.jpg" width="170"/>
                                                                            <span class="demo-title">Fiber Control System</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/fiber-chiller">
                                                                            <!--<span class="demo-bg" style="background-image: url(/user-end/images/567e4f1dd0374baec4d4333df195dd2c.png);width:220px !important; border:none; padding:25%;"></span>-->
                                                                             <img src="/user-end/images/S_A_Chiller.jpg" width="170"/>
                                                                            <span class="demo-title">Fiber Chiller</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/fiber-laser-cutting-head">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/CW-3000.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/c2865398a0ab3aef9dde30e2d106c285.jpg" width="170"/>
                                                                            <span class="demo-title">Fiber Laser Cutting Head</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/laser-nozzles">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/MYJG50.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/8118299cb961f40db1935299039de46d.jpg" width="170"/>
                                                                            <span class="demo-title">Laser Nozzles</span>
                                                                        </a>
                                                                    </div>
    
                                                                    <div class="demo-item" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                        <a href="/shop/laser-ceramics">
                                                                           <!--<span class="demo-bg" style="background-image: url(/user-end/images/CO2_MECHANICAL_PARTS_6_6e2fb919-f411-40a6-aa14-a2d3014fe7c0.jpg);width:220px !important; border:none; padding:25%;"></span>-->
                                                                           <img src="/user-end/images/272996f0135c9316b263fc00280b52ea.jpg" width="170"/>
                                                                            <span class="demo-title">Laser Ceramics</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="row w-100">
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>Laser Cutting Head Parts</h6>
                                                                            <a href="/shop/metal-parts-set">Nozzle Connector</a>
                                                                            <a href="/shop/nozzles-&-lens-tube">Lense Insertion Tool</a>
                                                                            <a href="/shop/guide-rail-parts">O-ring Washer</a>
                                                                            <a href="/shop/honey-comb">Sensor Cable</a>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>Fiber Laser lens</h6>
                                                                            <a href="/shop/general-accessories">Fiber Focusing & Collimating Lens</a>
                                                                            <a href="/shop/mounting-accessories">Fiber Lens With Tube</a>
                                                                            <a href="/shop/switch-power-supply">Protective Windows</a>
                                                                            <a href="/shop/flyback-transformer">Clean Wipe/Cotton Web</a>
                                                                        </div>
                                                                        <div class="col-md-4" style="flex: 0 0 33%; max-width:33%; text-align:left;">
                                                                            <h6>Fiber Accessories</h6>
                                                                            <a href="/shop/beam-combiner-&-expander">Checks Solenoid valve</a>
                                                                            <a href="/shop/z-axis-focus-sensor">Protective Connector</a>
                                                                            <a href="/shop/red-dot-pointer">Fiber Reducer</a>
                                                                            
                                                                        </div>
                                                                       
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div><!-- End .menu-col -->
                                                        </div><!-- End .megamenu -->
                                                        </li>
                                                        <!--<li><a href="#" class="sf-with-ul pl-5">Motor & Driver</a>-->
                                                        <!--<div class="megamenu inner-div-megamenu">-->
                                                        <!--    <div class="menu-col" >-->
                                                        <!--        <div class="demo-list">-->
    
    
                                                                   
                                                        <!--            </div>-->
    
                                                        <!--        </div>-->
                                                        <!--    </div>-->
                                                        <!--</li>-->
                                                       
                                                    </ul><!-- End .menu-vertical -->
                                                </div>
                                                <div class="col-md-9"></div>

                                            </div><!-- End .demo-list -->

                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu -->

                                </li>
                                <!--<li style="position: relative; width: 154px;">-->
                                <!--    <a href="#" class="sf-with-ul">Flash Sale</a>-->

                                <!--    <ul>-->
                                <!--        <li><a href="#">Classic</a></li>-->
                                <!--        <li><a href="#">Listing</a></li>-->
                                <!--        <li>-->
                                <!--            <a href="#">Grid</a>-->
                                <!--            <ul>-->
                                <!--                <li><a href="#">Grid 2 columns</a></li>-->
                                <!--                <li><a href="#">Grid 3 columns</a></li>-->
                                <!--                <li><a href="#">Grid 4 columns</a></li>-->
                                <!--                <li><a href="#">Grid sidebar</a></li>-->
                                <!--            </ul>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#">Masonry</a>-->
                                <!--            <ul>-->
                                <!--                <li><a href="#">Masonry 2 columns</a></li>-->
                                <!--                <li><a href="#">Masonry 3 columns</a></li>-->
                                <!--                <li><a href="#">Masonry 4 columns</a></li>-->
                                <!--                <li><a href="#">Masonry sidebar</a></li>-->
                                <!--            </ul>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#">Mask</a>-->
                                <!--            <ul>-->
                                <!--                <li><a href="#">Blog mask grid</a></li>-->
                                <!--                <li><a href="#">Blog mask masonry</a></li>-->
                                <!--            </ul>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#">Single Post</a>-->
                                <!--            <ul>-->
                                <!--                <li><a href="#">Default with sidebar</a></li>-->
                                <!--                <li><a href="#">Fullwidth no sidebar</a></li>-->
                                <!--                <li><a href="#">Fullwidth with sidebar</a></li>-->
                                <!--            </ul>-->
                                <!--        </li>-->
                                <!--    </ul>-->
                                <!--</li>-->
                                <li style="position: relative; width: 154px;">
                                    <a href="#" class="sf-with-ul">Support</a>

                                    <ul>
                                        <li><a href="#">Facebook Group</a></li>
                                    </ul>
                                </li>
                                <li style="position: relative; width: 154px;">
                                    <a href="#" class="sf-with-ul">Resource</a>
                                    <ul>
                                        {{-- <li><a href="#">Download</a></li> --}}
                                        {{-- <li><a href="/portfolio">Gallery</a></li> --}}
                                        {{-- <li><a href="#">Laser Solution</a></li> --}}
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </li>
                                <li style="position: relative; width: 154px;">
                                    <a href="#" class="sf-with-ul">CloudRay</a>
                                    <ul>
                                        {{-- <li><a href="/about">About</a></li> --}}
                                        <li><a href="/contact">Contact Us</a></li>
                                    </ul>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->


                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header>
