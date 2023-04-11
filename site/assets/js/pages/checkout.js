

function handleCheckout(checkoutForm) {
    event.preventDefault();
    // Kiểm tra tồn kho ở đây!!! trước khi thanh toán
    $.ajax({
        type: "POST",
        url: "./logic/cart.php?act=checkinventory",
        data: "data",
        // dataType: "dataType",
        success: function (response) {
                const {status, content} = JSON.parse(response);
                if(status == 0) {
                     // Add some message for customer
                     $("#cartModalBtn").trigger("click");
                     $("#cartModalLabel").text(`Vượt quá tồn kho`);
                     $("#cartModal .modal-body").text(`${content}, load lại trang để xem số lượng`);   
                     $("#cartModal .continue-btn").val("Load lại giỏ hàng");  
                     $("#cartModal .continue-btn").addClass("main-bg-color main-border-color");  
                     $("#cartModal .close-modal-btn").addClass("d-none");
                     $("#cartModal .continue-btn").click(function(e) {
                        e.preventDefault();
                        location.reload();
                     })
                     return;
                }else if(status == 1) {
                    // Nếu đã thỏa mãn (đủ điều kiện ở dưới kho);
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
                
                    checkoutForm.submit();
                    // event.preventDefault();
                    // console.log('this', checkoutForm.elements['tongdonhang'].value);                
                


                }
        }
    });


    
    
   
}

function applyCoupon(iduser) {
    event.preventDefault();
    const subTotal = +$("#subtotal-hidden").val();
    const couponCode = $("#coupon-code").val();

    $.ajax({
        type: "POST",
        url: "./logic/cart.php?act=applycoupon",
        data: {
            coupon: couponCode,
            subtotal: subTotal,
            iduser
        },
        // dataType: "dataType",
        success: function (response) {
            const {status, content} = JSON.parse(response);
            if(status == 1) {
                const discountPercent = content;
                
                const discountMoney = subTotal * +discountPercent / 100;
                console.log('discount percent', discountPercent);
                console.log('sub: ', subTotal);
                console.log('discountMoney' , discountMoney);
                $(".coupon-row .td-titl-1").text(`Áp dụng mã giảm giá (${couponCode}) -${discountPercent}%`)
                $("#discount-money").text(discountMoney.toLocaleString("en-us") +" VND");
                $("#coupon-code-hidden").val(couponCode);
                const shippingFee = +$("#shipping-fee-hidden").val();
                const vatFee = +$("#vat-fee-hidden").val();
                const totalFee =subTotal + shippingFee  +vatFee - discountMoney;
                console.log("show:", shippingFee, vatFee, totalFee);
                calcAllTotal(shippingFee,vatFee, totalFee);
                // $(".coupon-discount").attr("hidden", true);

                showToast("Áp dụng mã giảm giá", `Bạn đã áp dụng mã giảm giá ${couponCode} thành công!`);
            }else if(status == 0) {
                showToast("Áp dụng mã giảm giá", `${content}`);
            }

            
        }
    });

}