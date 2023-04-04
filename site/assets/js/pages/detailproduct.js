

function buyNow () {
    event.preventDefault();
    console.log('this: ', event.currentTarget);

            const submitBtn = event.currentTarget.nextElementSibling;
            // console.log('submit Btn: ', submitBtn);
            const formElement = getParent(event.currentTarget, 'form');
            console.log('form: ', formElement.elements);
            // USING LOGIC AJAX HERE
            const productId = formElement.elements['id'].value;
            const sl = formElement.elements['sl'].value;
            const tensp = formElement.elements['tensp'].value;
            const danhmuc = formElement.elements['danhmuc'].value;
            const hinh_anh = formElement.elements['hinh_anh'].value;

            $.ajax({
                url: "./logic/cart.php?act=addtocart",
                type: "POST",
                data: {
                    id: productId,
                    sl: sl,
                    danhmuc: danhmuc,
                    hinh_anh: hinh_anh,
                },
                // dataType: "dataType",
                success: function (responseHtml) {

                    // $('body').html(response);
                
                    location.assign('./index.php?act=viewcart');

                    console.log('res: ', responseHtml);
                    // $("#header").html(responseHtml);
                    $.get("./logic/topcart.php", function(responseHtml) {
                        $("#topHeaderCart").html(responseHtml);
                        // console.log('res: ', responseHtml);
                    });

                    console.log('cartmodal: ', $("#cartModal"));

                //    document.getElementById('cartMOdalBtn').click();

                   const cartModalBtn = document.getElementById("cartModalBtn");

                   console.log('cartModalBtn: ', cartModalBtn);

                   $("#cartModallabel").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng`);
                   $("#cartModal .modal-body").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng, Bạn có muốn vào xem giỏ hàng hay không ?`);

                   $("#cartModal input[name='deletecartbtn']").click(function(e) {
                    e.preventDefault();

                    console.log('clicked to view cart');

                    location.assign("./index.php?act=viewcart");
                   })
                   cartModalBtn.click();
                    // $("#cartModal")
                    // location.reload();
                    // $('#header').load("./view/layout/header.php", function(response, status, xhr) {
                    //         if(status == "error") {
                    //             console.log('message : '+ xhr.status +xhr.statusText);
                    //         }
                    // });


                    // $("#cartModal .modal-footer button").click(function(e) {
                    //     e.preventDefault();
                    //     console.log('clicked');
                    //     location.reload();
                    // })

                    // $("#cartModal .modal-header .btn-close").click(function(e) {
                    //     e.preventDefault();
                    //     console.log('clicked');
                    //     location.reload();
                    // })
                },
                error: function(error) {
                    console.log('error: ', error);

                    if(error.readyState == 4) {
                        location.assign("./auth/login.php");
                    }
                }
            });
}

function viewAllReviews() {

    const url = new URL(location.href);
    url.searchParams.set("view", "reviews");
    history.pushState({},'', url);
    scrollToReview();
}

function scrollToReview() {
    document.getElementById('reviews-tab-btn').click();
    $("html, body").animate({ scrollTop: 350 }, "slow");
}

(() => {
    const url = new URL(location.href);

    // console.log('url', url.searchParams.get('act'));
    // console.log('url', url.searchParams.get('view'));
    if(url.searchParams.get('act') == 'detailproduct') {
    
        switch (url.searchParams.get('view')) {
            case 'reviews':
                // console.log('Hello history order!!!');
                scrollToReview();
                break;
        
            default:

                break;
        }
    }


})()