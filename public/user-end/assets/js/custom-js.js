

function AddToCart(id){
    $.ajax({
        type:'POST',
        dataType:'JSON',
        url:'/AddToCart',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{ 'id':id },
        success:function(data){
            // if(typeof data.cart == 'object'){
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
            // }else if(data.cart){
                console.log([Object.keys(data.cart)]);
            // }
           
           
        }
        });
}
