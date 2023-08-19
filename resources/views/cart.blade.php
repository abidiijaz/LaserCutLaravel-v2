@extends('layouts.user.mainapp')
@section('content')
<?php $total = 0; ?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @if(session('cart'))
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach (session('cart') as $id=>$details)
                                <?php $total += $details['price']*$details['quantity']; ?>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ url('detail-product/'.$id) }}">
                                                    <img src="{{ asset('ab_admin/product/sm-'.$details['image']) }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{ url('detail-product/'.$id) }}">{{ $details['name'] }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">${{ $details['price'] }}</td>
                                    <td class="quantity-col">
                                        <div class="ab_quantity">
                                            <a href="javascript:void(0);" onclick="ab_quantity__minus({{ $id }},{{ $details['price'] }})" class="ab_quantity__minus"><span>-</span></a>
                                            <input name="quantity" min="1" type="text" value="{{ $details['quantity'] }}" id="input-{{ $id }}" class="ab_quantity__input" value="1">
                                            <a href="javascript:void(0)" onclick="ab_quantity__plus({{ $id }},{{ $details['price'] }})" class="ab_quantity__plus"><span>+</span></a>
                                          </div>
                                    </td>
                                    <td class="total-col ab_total-col_{{ $id }}">${{ $details['price']*$details['quantity'] }}.00</td>
                                    <td class="remove-col"><button class="btn-remove remove-from-cart" data-id="{{ $id }}"><i class="icon-close"></i></button></td>
                                </tr>
                               @endforeach

                            </tbody>
                        </table><!-- End .table table-wishlist -->
                        @else
                        <h3 class="text-center">Cart is Empty!</h3>
                        @endif

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td id="ab_sub_total">${{ $total }}.00</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping Note:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <label >For Shipping charges Details Please contact to Whatsapp</label>
                                        </td>
                                    </tr><!-- End .summary-shipping-row -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="#" onclick="SentWhatsApp()" class="btn btn-outline-primary-2 btn-order btn-block">CHECKOUT With WhatsApp</a>
                        </div><!-- End .summary -->

                        <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script type="text/javascript">
    function SentWhatsApp(){
        let userData="";
        let i=0;
        @if(session()->has('cart'))
            var zoektermen_json = "{{ json_encode(session()->get('cart')) }}";
            var json = zoektermen_json.replace(/&quot;/g, '"');
            var zoektermen = JSON.parse(json);
                $.each(zoektermen, function (key, val) {
                    userData +="*Product-"+(i+1)+"*%0a"+"Name: "+val.name+"%0a"+"Quantity: "+val.quantity+"%0a"+"Price: $"+val.price +"%0a--------------%0a"; 
                });
        @endif
        console.log(userData);
        let url = "https://wa.me/923114208995?text="+userData;
        window.open(url, '_blank').focus();
    }
</script>
@endsection
