<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description') ">
    <meta name="author" content="Aqua CNC Solutions">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('user-end/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('user-end/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user-end/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('user-end/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('user-end/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('user-end/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Aqua CNC Solutions">
    <meta name="application-name" content="Aqua CNC Solutions">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('user-end/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('user-end/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('user-end/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/skins/skin-demo-4.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/demos/demo-4.css')}}">
    <link rel="stylesheet" href="{{asset('user-end/assets/css/plugins/nouislider/nouislider.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script>
        var public_path = "{{ asset('/ab_admin/product') }}";
    </script>
      <style>

        .whatsapp{    
            position: fixed;
            right: 25px;
            bottom: 20px;
            z-index: 100;

        }
    </style>
</head>

<body>
    <div class="page-wrapper overflow-hidden">
        @include('layouts.user.header')
        <!-- End .header -->

        <main class="main">
            @yield('content')
            <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <h2 class="title mb-4 text-center">FAQs</h2><!-- End .title text-center -->
                <div class="cat-blocks-container">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                             <div class="panel-group" id="faqAccordion">
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                     <h5 class="panel-title" style="position: relative; letter-spacing: 0px;line-height: 1.5;">
                                        <a href="javascript:void(0)" class="ing text-dark">Which Configurations of Machine I need to choose?</a>
                                        <span style="position: absolute; top: 0; right: 0;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  </h5>

                                </div>
                                <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                         <h5><span class="label label-primary">Answer</span></h5>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five <a href="http://jquery2dotnet.com/" class="label label-success">http://jquery2dotnet.com/</a> centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                     <h5 class="panel-title" style="position: relative; letter-spacing: 0px;line-height: 1.5;">
                                        <a href="javascript:void(0)" class="ing text-dark">Is there any difference to order on Cloudray Official Website (www.cloudraylaser.com) directly or in Cloudray stores on shopping platforms?</a>
                                       <span style="position: absolute; top: 0; right: 0;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  </h5>

                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                         <h5><span class="label label-primary">Answer</span></h5>

                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                     <h5 class="panel-title" style="position: relative; letter-spacing: 0px;line-height: 1.5;">
                                        <a href="javascript:void(0)" class="ing text-dark">How Long is the delivery time？</a>
                                        <span style="position: absolute; top: 0; right: 0;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  </h5>

                                </div>
                                <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                         <h5><span class="label label-primary">Answer</span></h5>

                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                     <h5 class="panel-title" style="position: relative; letter-spacing: 0px;line-height: 1.5;">
                                        <a href="javascript:void(0)" class="ing text-dark">Where is your Return & Exchange Policy; Shipping Policy; Payment & Taxes?</a>
                                        <span style="position: absolute; top: 0; right: 0;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  </h5>

                                </div>
                                <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                         <h5><span class="label label-primary">Answer</span></h5>

                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                    </div>
                                </div>
                            </div>
                             <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                                     <h5 class="panel-title" style="position: relative; letter-spacing: 0px;line-height: 1.5;">
                                        <a href="javascript:void(0)" class="ing text-dark">What's the guarantee, in case the machine breaks down?</a>
                                        <span style="position: absolute; top: 0; right: 0;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  </h5>

                                </div>
                                <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                         <h5><span class="label label-primary">Answer</span></h5>

                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/panel-group-->
                        </div>

                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->



            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="container">
                <hr class="mb-0 for-loging-ab">
            </div><!-- End .container -->

            <div class="icon-boxes-container bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>Orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>when you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->
        @include('layouts.user.footer')
        <div class="whatsapp">
            <a href="https://wa.me/923114208995" target="_blank" style=" display: flex;">
                {{-- <a href="#" onclick="SentWhatsApp()" style=" display: flex;"> --}}
                <img src="{{asset('assets/menu_images/whatsapp.png')}}" width="60">
            </a>
        </div>
    <!-- Plugins JS File -->
    <script src="{{asset('user-end/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('user-end/assets/js/jquery.elevateZoom.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('user-end/assets/js/main.js')}}"></script>
    <script src="{{asset('user-end/assets/js/demos/demo-4.js')}}"></script>
    <script src="{{asset('user-end/assets/js/custom-js.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">
    $("document").ready(function(){
        $(".menu li").hover(function() {
            $(".menu-vertical li:first-child").addClass('show');
            $("div.inner-div-megamenu1").css("display","block");
        });
    });
</script>
    <script type="text/javascript">
       
        function ab_quantity__plus(id,price){
            // alert(id);
            var value = $('#input-'+id).val();
            value++;
            if(value > 0){
                $('#input-'+id).val(value);
                $('.ab_total-col_'+id).empty();
                $('.ab_total-col_'+id).append("$"+(price*value).toFixed(2));
                $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: id, quantity: value},
                success: function (data) {
                //    window.location.reload();
                var total = 0;
                $('.dropdown-cart-products').empty();
                $('.cart-count').empty();
                $('.cart-total-price').empty();
                $('.cart-count').append(Object.keys(data.cart).length);
                for(var i = 0; i < Object.keys(data.cart).length; i++){
                    total += data.cart[Object.keys(data.cart)[i]]['quantity']*data.cart[Object.keys(data.cart)[i]]['price'];
                    $('.dropdown-cart-products').append("<div class='product'><div class='product-cart-details'><h4 class='product-title'><a href='/detail-product/"+Object.keys(data.cart)[i]+"'>"+data.cart[Object.keys(data.cart)[i]]['name']+"</a></h4><span class='cart-product-info'> <span class='cart-product-qty'>"+data.cart[Object.keys(data.cart)[i]]['quantity']+"</span> x $"+data.cart[Object.keys(data.cart)[i]]['price']+"</span></div><figure class='product-image-container'><a href='product.html' class='product-image'><img src='"+public_path+"/"+data.cart[Object.keys(data.cart)[i]]['image']+"' alt='product'></a></figure><a href='#' class='btn-remove' title='Remove Product'><i class='icon-close'></i></a></div>");
                }
                $('.cart-total-price').append("$"+total);
                $('#ab_sub_total').empty();
                $('#ab_sub_total').append("$"+total);
               }
            });
            }
        }
        function ab_quantity__minus(id,price){
            var value = $('#input-'+id).val();
            value--;
            if(value > 0){
                $('#input-'+id).val(value);
                $('.ab_total-col_'+id).empty();
                $('.ab_total-col_'+id).append("$"+(price*value).toFixed(2));
                $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: id, quantity: value},
               success: function (data) {
                var total = 0;
                $('.dropdown-cart-products').empty();
                $('.cart-count').empty();
                $('.cart-total-price').empty();
                $('.cart-count').append(Object.keys(data.cart).length);
                for(var i = 0; i < Object.keys(data.cart).length; i++){
                    total += data.cart[Object.keys(data.cart)[i]]['quantity']*data.cart[Object.keys(data.cart)[i]]['price'];
                    $('.dropdown-cart-products').append("<div class='product'><div class='product-cart-details'><h4 class='product-title'><a href='/detail-product/"+Object.keys(data.cart)[i]+"'>"+data.cart[Object.keys(data.cart)[i]]['name']+"</a></h4><span class='cart-product-info'> <span class='cart-product-qty'>"+data.cart[Object.keys(data.cart)[i]]['quantity']+"</span> x $"+data.cart[Object.keys(data.cart)[i]]['price']+"</span></div><figure class='product-image-container'><a href='product.html' class='product-image'><img src='"+public_path+"/"+data.cart[Object.keys(data.cart)[i]]['image']+"' alt='product'></a></figure><a href='#' class='btn-remove' title='Remove Product'><i class='icon-close'></i></a></div>");
                }
                $('.cart-total-price').append("$"+total);
               }
            });
            }
            
            
        }
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>

</body>
</html>
