@if($order->order_status == 0 )
<button class="ab_OrderAccepted" disabled>Order Accepted</button>
@elseif($order->order_status == 1)
<button class="ab_InProcess" disabled>In Processing</button>
@elseif($order->order_status == 2)
<button class="ab_Deliver" disabled>Deliver</button>
@elseif($order->order_status == 3)
<button class="ab_Delivered" disabled>Delivered</button>
@endif
