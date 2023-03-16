
function logout(){
    console.log("Hello clicked");
    const continueLogout = document.getElementById("continueLogout");
    const cancelLogout = document.getElementById("cancelLogout");

    // const modalLogout = document.getElementById("modalLogout");
    // console.log(modalLogout);
    const buttonModalLogout = document.getElementById("buttonModalLogout");
    buttonModalLogout.click();

}

function getParent(element, selector) {
    while (element.parentElement) {
      if (element.parentElement.matches(selector)) {
        return element.parentElement;
      }
      element = element.parentElement;
    }
}

// const handleAddCart = (cartBtnSelector, formAction) => {
//     const handleCartBtns = document.querySelectorAll(cartBtnSelector);
//     [...handleCartBtns].forEach((btn) => {
//         btn.addEventListener('click', (e) => {
//             e.preventDefault();

//             // console.log('event target: ', e.currentTarget);
//             const submitBtn = e.currentTarget.nextElementSibling;
//             // console.log('submit Btn: ', submitBtn);
//             const formElement = getParent(e.currentTarget, 'form');
//             // console.log('form: ', formElement);
//             formElement.action = "index.php?act=" + formAction;
//             submitBtn.click();
//         })
//     })
// }

const handleAddCart = () => {
    event.preventDefault();
    // const handleCartBtns = document.querySelectorAll(cartBtnSelector);
    // console.log('btns', addToCartBtns);
    console.log('this: ', event.currentTarget);
    // [...handleCartBtns].forEach((btn) => {
        // btn.addEventListener('click', (e) => {

            // e.preventDefault();
            
            // console.log('event target: ', e.currentTarget);
            const submitBtn = event.currentTarget.nextElementSibling;
            // console.log('submit Btn: ', submitBtn);
            const formElement = getParent(event.currentTarget, 'form');
            console.log('form: ', formElement.elements);
            // formElement.action = "index.php?act=" + formAction;
            // submitBtn.click();

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

                    console.log('res: ', responseHtml);
                    $("#header").html(responseHtml);
                    console.log('cartmodal: ', $("#cartModal"));

                //    document.getElementById('cartMOdalBtn').click();

                   const cartModalBtn = document.getElementById("cartModalBtn");

                   console.log('cartModalBtn: ', cartModalBtn);

                   $("#cartModallabel").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng`);
                   $("#cartModal .modal-body").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng, Bạn có muốn vào xem giỏ hàng hay không ?`);

                   $("#cartModal input[name='deletecartbtn'").click(function(e) {
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
                //    $("#header").load("");
                        
                    
                    // location.reload();

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



const zoomProductDetail = () => {
    const zoomProductBtns = document.querySelectorAll(".zoom-detail-product");
    const productModal = document.getElementById("productModal");
    console.log('zoomProductBtns', zoomProductBtns);

    [...zoomProductBtns].forEach((btn) => {
        btn.addEventListener('click', (e) => {
            console.log('target: ', e.currentTarget);

            const currentFormElement = getParent(e.currentTarget, 'form');

            console.log('productModal', productModal);
            console.log('currentFormElement', currentFormElement.elements);

            const productId = currentFormElement.elements['id'].value;
            const hinh_anh = currentFormElement.elements['hinh_anh'].value;
            const danhmuc = currentFormElement.elements['danhmuc'].value;
            const don_gia = +currentFormElement.elements['don_gia'].value;
            const sl = +currentFormElement.elements['sl'].value;
            const tensp = currentFormElement.elements['tensp'].value;
            const mo_ta = currentFormElement.elements['mo_ta'].value;
            const giam_gia = +currentFormElement.elements['giam_gia'].value;
            const new_price = don_gia * (1 - giam_gia / 100);
            console.log(productId, hinh_anh, danhmuc, sl, tensp, mo_ta, giam_gia, don_gia, new_price);
            
            // console.log('productModal: ', productModal)
            const modalImgElement = productModal.querySelector('.main-image.images > img');
            const modalProductnameElement = productModal.querySelector('.product-info > h1');
            const modalProductpriceElement = productModal.querySelector('.new-price');
            const modalProductoldpriceElement = productModal.querySelector('.old-price');
            const modalProductQtyElement = productModal.querySelector('#french-hens');
            const modalProductDescElement = productModal.querySelector('.quick-desc');
            const modalProductSeeAllElement = productModal.querySelector('.see-all');


            modalImgElement.setAttribute('src', hinh_anh);
            modalProductnameElement.textContent = tensp;
            modalProductpriceElement.textContent = new_price.toLocaleString("vi-VN", {style:"currency", currency:"VND"});
            modalProductQtyElement.value = sl;
            modalProductDescElement.textContent = mo_ta;
            modalProductoldpriceElement.textContent = don_gia.toLocaleString("vi-VN", {style:"currency", currency:"VND"});
            modalProductSeeAllElement.setAttribute('href', "./index.php?act=detailproduct&id="+productId);
            // modalProductDescElement.textContent = 

            const formAddToCart = productModal.querySelector('.quick-add-to-cart > form');
            // console.log('formAddToCart', formAddToCart);
            const formCartElements = formAddToCart.elements;
            
            // Add value to input hidden
            formCartElements['id'].value = productId;
            formCartElements['tensp'].value = tensp;
            formCartElements['hinh_anh'].value = hinh_anh;
            formCartElements['danhmuc'].value = danhmuc;
            formCartElements['don_gia'].value = don_gia;
            formCartElements['giam_gia'].value = giam_gia;
            formCartElements['mo_ta'].value = mo_ta;

            
            // console.log(modalImgElement, modalProductnameElement, modalProductpriceElement, modalProductoldpriceElement, modalProductQtyElement, modalProductDescElement)
        })
    })
}

// jquery ajax here

// $('.del-icon a').click(function(event) {
//     event.preventDefault();

//     console.log('clicked here!!!');

//     // $.ajax({
//     //     url: "./index.php?act=deletecart",
//     //     type: 'GET',
//     //     success: function(response) {
//     //         console.log('res: ', response);
//     //     }h
//     // });

//     $.get('./logic/cart.php?idcart=0', function(res) {
//         console.log('res: ', res);
//     })
// })





(() => {
    zoomProductDetail();
    // handleAddCart('.add-to-cart', 'addtocart');
    // handleAddCart('.add-to-wishlist', 'addtowishlist');
})();