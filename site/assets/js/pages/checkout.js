



function handleCheckout(checkoutForm) {
    event.preventDefault();
    console.log('this', checkoutForm.elements['tongdonhang'].value);

    if($("#checkout-form #vnpayPayment").hasClass("show")) {
        console.log('vnpay');

        $.ajax({
            type: "POST",
            url: "./logic/cart.php?act=vnpay_payment",
            data: {
                tongdonhang: checkoutForm.elements['tongdonhang'].value
            },
            // dataType: "dataType",
            success: function (response) {
                
            }
        });
    }else if($("#checkout-form #codPayment").hasClass("show")) {
        console.log('code');
    }else if($("#checkout-form #momoPayment").hasClass("show")) {
        console.log('momo');
    }

   
}