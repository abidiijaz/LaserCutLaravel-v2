@extends('layouts.user.mainapp')
@section('content')

<section class="h-100 gradient-custom ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8 pt-2 pb-2">
            <a href="javascript:void(0)" onclick="getPDF()" class="btn btn-success float-right">download PDF</a>
        </div>

        <div class="col-lg-10 col-xl-8 canvas_div_pdf">
          <div class="card" style="border-radius: 10px;border: 0.1rem solid #ebebeb;">
            <div class="card-header px-4 py-5">
              <h5 class="text-muted mb-0">Order Details</h5>
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                <p class="small text-muted mb-0">Receipt Voucher : {{ $order->id }}</p>
              </div>
              <div class="d-flex justify-content-between pb-2">
                <p class="fw-bold mb-0"><b>Order Status</b></</p>
                <p class="text-muted mb-0">@include("components.admin.order_status")</p>
              </div>
                    <?php $total=0; ?>
                    @foreach ($orderitems as $item)
                    <div class="card shadow-0 border mb-4">
                        <div class="card-body p-0">
                          <div class="row">
                            <div class="col-md-2">
                                <?php $cus_image = json_decode($item->product->image); ?>
                                <img src="{{ asset('ab_admin/product/'.$cus_image[0]) }}" alt="{{$item->title}}" class="img-fluid">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0">{{ $item->product->title }}</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">White</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Capacity: 64GB</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Qty: {{ $item->quantity }}</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <?php
                                    $price = ($item->quantity*$item->product->price);
                                    $total += $price;
                                ?>
                                <p class="text-muted mb-0 small">${{ sprintf("%.2f",$item->product->price) }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0"><b>Order Details</b></</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"><b>Total</b></span> ${{ sprintf("%.2f",$total) }}</p>
              </div>

              <div class="d-flex justify-content-between ">
                <p class="text-muted mb-0">User Email : {{ Auth::user()->email }}</p>

              </div>
              <div class="d-flex justify-content-between ">
                <p class="text-muted mb-0">Address : {{ $order->s_address }},{{ $order->city }},<br/>{{ $order->state }},{{ $order->country }},{{ $order->postcode }}</p>
                {{-- <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $0.00</p> --}}
              </div>
              <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Invoice Date : 22 Dec,2019</p>
                {{-- <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span> 0</p> --}}
                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $0.00</p>
              </div>

              <div class="d-flex justify-content-between mb-5">
                <p class="text-muted mb-0">Payment Method : {{ $order->payment_method }}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
              </div>
            </div>
            <div class="card-footer border-0 px-4 py-5"
              style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                paid: <span class="h2 mb-0 ms-2">${{ sprintf("%.2f",$order->grand_total) }}</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    function getPDF(){

        var HTML_Width = $(".canvas_div_pdf").width();
        var HTML_Height = $(".canvas_div_pdf").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


        html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height+"  "+canvas.width);


            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);


            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }

            pdf.save("HTML-Document.pdf");
        });
    };
  </script>
@endsection
