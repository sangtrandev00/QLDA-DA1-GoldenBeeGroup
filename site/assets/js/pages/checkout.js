



function handleCheckout(checkoutForm) {
   
    if($("#checkout-form #vnpayPayment").hasClass("show")) {
        console.log('vnpay');
        checkoutForm.action = "./index.php?act=checkoutbtn&type=vnpay";
        console.log('form: ', checkoutForm);
        // $.ajax({
        //     type: "POST",
        //     url: "./logic/cart.php?act=vnpay_payment",
        //     data: {
        //         tongdonhang: checkoutForm.elements['tongdonhang'].value
        //     },
        //     // dataType: "dataType",
        //     success: function (response) {
                
        //     }
        // });
    }else if($("#checkout-form #codPayment").hasClass("show")) {
        console.log('cod');
        checkoutForm.action = "./index.php?act=checkoutbtn&type=cod";
        console.log('form: ', checkoutForm);
    }else if($("#checkout-form #momoPayment").hasClass("show")) {
        console.log('momo');
        checkoutForm.action = "./index.php?act=checkoutbtn&type=momo";
        console.log('form: ', checkoutForm);
    }
    // event.preventDefault();
    // console.log('this', checkoutForm.elements['tongdonhang'].value);
   
}