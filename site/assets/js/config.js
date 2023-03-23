const ROOT_URL = location.origin +"/PRO1014_DA1/main-project";
const ADMIN_URL = `${ROOT_URL}/admin`;
const SITE_URL = `${ROOT_URL}/site`;
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

function showToast(toastTitle, toastMessage) {
    const toastBtn = document.getElementById("liveToastBtn");
    if(!toastBtn) return;
    toastBtn.click();

    const toastElement = document.getElementById("liveToast");
    toastElement.querySelector("#toast-content-header").textContent = toastTitle;
    toastElement.querySelector(".toast-body").textContent = toastMessage;
}

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
toastTrigger.addEventListener('click', () => {
  const toast = new bootstrap.Toast(toastLiveExample)
  toast.show()
})
}

// const toast = new bootstrap.Toast(toastLiveExample)
//   toast.show()

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

function handleAddCart (actionForm, logicType){
    event.preventDefault();

    console.log('this: ', event.currentTarget);
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


            console.log(productId, sl, tensp, danhmuc, hinh_anh);
            // return;
            console.log('action: ', actionForm);
            console.log('logic type: ', logicType);

            $.ajax({
                url: "./logic/cart.php?act="+actionForm,
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

                    if(logicType == 'buynow') {
                        location.assign("index.php?act=viewcart");
                        // console.log('go here buy now!');
                        return;
                    }else if(logicType == 'addwishlist') {
                            // location.assign('index.php?act=wishlist');
                            $.get('./logic/topwishlist.php', function(responseHtml) {
                                console.log('res: ', responseHtml);

                                $("#topWishlist").html(responseHtml);
                            })
                            const cartModalBtn = document.getElementById("cartModalBtn");

                            console.log('cartModalBtn: ', cartModalBtn);
         
                            $("#cartModalLabel").text(`Đã thêm sản phẩm ${tensp} vào danh sách yêu thích`);
                            $("#cartModal .modal-body").text(`Đã thêm sản phẩm ${tensp} vào danh sách yêu thích, Bạn có muốn vào xem danh sách yêu thích hay không ?`);
         
                            $("#cartModal input[name='actionbtn']").click(function(e) {
                             e.preventDefault();
                            


                            //  console.log('clicked to view cart');
         
                             location.assign("./index.php?act=wishlist");
                            })
                            cartModalBtn.click();

                            return;
                    }else if(logicType == 'addcart') {
                        console.log('res: ', responseHtml);
                        // $("#header").html(responseHtml);
                        $.get("./logic/topcart.php", function(responseHtml) {
                            $("#topHeaderCart").html(responseHtml);
                            // console.log('res: ', responseHtml);
                        });
    
    
                       const cartModalBtn = document.getElementById("cartModalBtn");
    
                       console.log('cartModalBtn: ', cartModalBtn);
                        
                    //    console.log('modalHeader: ', $("#cartModalLabel"))
                       $("#cartModalLabel").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng`);
                       $("#cartModal .modal-body").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng, Bạn có muốn vào xem giỏ hàng hay không ?`);
    
                       $("#cartModal input[name='actionbtn']").click(function(e) {
                        e.preventDefault();
    
                        location.assign("./index.php?act=viewcart");
                       })
                       cartModalBtn.click();
               
                    }

                   
                },
                error: function(error) {
                    console.log('error: ', error);

                    if(error.readyState == 4) {
                        location.assign("./auth/login.php");
                    }
                }
            });
}

function handleDeleteCart(idcart) {
    event.preventDefault();
    console.log('this: ', event.currentTarget);
    console.log('id: ', idcart);
    console.log('tensp: ', event.currentTarget.firstElementChild.getAttribute('data-name'));
    const tensp = event.currentTarget.firstElementChild.getAttribute('data-name');
    
    $("#cartModalBtn").trigger("click");

    $("#cartModalLabel").text(`Xóa sản phẩm ${tensp} khỏi giỏ hàng`);
    $("#cartModal .modal-body").text(`Bạn có muốn xóa sản phẩm ${tensp} giỏ hàng hay không ? Có chọn tiếp tục không chọn đóng`);


    $("#cartModal .continue-btn").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./logic/cart.php?act=deletecart",
            data: {id: idcart},
            // dataType: 'json',
            success: function (response, statusText) {
                    console.log('res: ', response);
                    // $("#cartModalBtn").trigger("click");
                    // $("#cartModal .modal-header").text(`Bạn đã xóa sản phẩm thành công`)
                    // $("#table-content-wrapper").html(response);

                    // alert(JSON.parse(response));

                    $("#cartModalBtn").trigger("click");

                    // $.get("./logic/header.php", function(reponseHtml) {
                    //     console.log('html: ', reponseHtml);
                    //     $("#header").html(reponseHtml);
                    // })

                    $.get("./logic/topcart.php", function(responseHtml) {
                        $("#topHeaderCart").html(responseHtml);
                        // console.log('res: ', responseHtml);
                    });

                    $.get('./logic/shopping-cart-content.php', function(reponseHtml) {
                        console.log('html: ', reponseHtml);
                        $("#shopping-cart").html(reponseHtml);

                        if($("#notify-update-cart").hasClass("d-none")) {
                            $("#notify-update-cart").removeClass("d-none");
                        } 
                        $("#notify-update-cart").text(`Sản phẩm ${tensp} đã được xóa khỏi giỏ hàng!`);
                    })

                  
                    // console.log('removed cart', $("#notify-update-cart"));

            },
            error: function(error) {
                console.log(error);
            }
        });
    })

}

function handleDeleteWishlist(idWishlist) {
    event.preventDefault();
    console.log('this: ', event.currentTarget);
    console.log('id: ', idWishlist);
    console.log('tensp: ', event.currentTarget.getAttribute('data-name'));
    const tensp = event.currentTarget.getAttribute('data-name');
    
    $("#cartModalBtn").trigger("click");

    $("#cartModalLabel").text(`Xóa sản phẩm ${tensp} khỏi danh sách yêu thích`);
    $("#cartModal .modal-body").text(`Bạn có muốn xóa sản phẩm ${tensp} danh sách yêu thích hay không ? Có chọn tiếp tục không chọn đóng`);


    $("#cartModal .continue-btn").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./logic/cart.php?act=deletewishlist",
            data: {id: idWishlist},
            // dataType: 'json',
            success: function (response, statusText) {
                    console.log('res: ', response);
                    // $("#cartModalBtn").trigger("click");
                    // $("#cartModal .modal-header").text(`Bạn đã xóa sản phẩm thành công`)
                    // $("#table-content-wrapper").html(response);

                    // alert(JSON.parse(response));

                    $("#cartModalBtn").trigger("click");

                    // $.get("./logic/header.php", function(reponseHtml) {
                    //     console.log('html: ', reponseHtml);
                    //     $("#header").html(reponseHtml);
                    // })

                    $.get("./logic/topwishlist.php", function(responseHtml) {
                        $("#topWishlist").html(responseHtml);
                        // console.log('res: ', responseHtml);
                    });

                    $.get('./logic/wishlist-table-content.php', function(reponseHtml) {
                        console.log('html: ', reponseHtml);
                        $("#wishlist").html(reponseHtml);

                        // if($("#notify-update-cart").hasClass("d-none")) {
                        //     $("#notify-update-cart").removeClass("d-none");
                        // } 
                        // $("#notify-update-cart").text(`Sản phẩm ${tensp} đã được xóa khỏi giỏ hàng!`);
                    })

                  
                    // console.log('removed cart', $("#notify-update-cart"));

            },
            error: function(error) {
                console.log(error);
            }
        });
    })

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
            formCartElements['addtocartbtn'].setAttribute('onclick', "handleAddCart('addtocart', 'addcart')");
            
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