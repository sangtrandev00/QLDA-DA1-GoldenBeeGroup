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

function alertModal(title, message) {
    $("#cartModalBtn").trigger("click");
    $("#cartModal #cartModalLabel").text(`${title}`);
    $("#cartModal .modal-body").text(`${message}`);
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
                success: function (response) {
                    const {status, content} = JSON.parse(response);
                    console.log('res', status, content);
                    // $('body').html(response);
                    const cartModalBtn = document.getElementById("cartModalBtn");
                    if(logicType == 'buynow') {
                        if(status == 1) {
                            location.assign("index.php?act=viewcart");
                        }else if(status == 0) {
                            cartModalBtn.click();
                            $("#cartModalLabel").text(`Vượt quá tồn kho`);
                            $("#cartModal .modal-body").text(`${content}, vào xem giỏ hàng`);  
                         
                            // $("#cartModal input[name='actionbtn']").addClass("d-none");
                        }
                        
                        
                        
                        // console.log('go here buy now
                    }else if(logicType == 'addwishlist') {
                            // location.assign('index.php?act=wishlist');

                            
                            $.get('./logic/topwishlist.php', function(response) {
                                console.log('res: ', response);

                                $("#topWishlist").html(response);
                            })


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
                       
                        
                        // console.log('cartModalBtn: ', cartModalBtn);
                        $("#cartModal input[name='actionbtn']").click(function(e) {
                            e.preventDefault();
        
                            location.assign("./index.php?act=viewcart");
                           })
                           cartModalBtn.click();
                       
                        if(status == 1) {
                            // Load Top Header Cart
                            $.get("./logic/topcart.php", function(content) {
                                $("#topHeaderCart").html(content);
                            });

                            $("#cartModalLabel").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng`);
                            $("#cartModal .modal-body").text(`Đã thêm sản phẩm ${tensp} vào giỏ hàng, Bạn có muốn vào xem giỏ hàng hay không ?`);
         
                        }else if(status == 0) {
                            // Show Error message
                            $("#cartModalLabel").text(`Vượt quá tồn kho`);
                            $("#cartModal .modal-body").text(`${content}, vào xem giỏ hàng`);     
                        }
               
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
            modalProductDescElement.innerHTML = mo_ta;
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

// Table data at my - account
$.ajax({
            type: "POST",
            url: SITE_URL+ "/view/pages/account/table-order-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    var table = $('#table-history-order').DataTable({
                        data: order_list,
                        retrieve: true,
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });

                    table.buttons().container()
                    .appendTo( '#table-history-order_wrapper .col-md-12' );

                    table.column('0:visible').order('desc').draw();
            }
        });


function showOrder() {
    $.ajax({
        type: "POST",
        url: SITE_URL+ "/view/pages/account/table-order-database.php",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            // console.log('res: ', response);
                const {order_list} = JSON.parse(response);
                console.log('list: ', order_list);
                var table = $('#table-history-order').DataTable({
                    data: order_list,
                    retrieve: true,
                    lengthChange: false,
                    buttons: [ 'copy', 'excel', 'pdf', 'print'],
                    "ordering":true,
                });

                table.buttons().container()
                .appendTo( '#table-history-order_wrapper .col-md-12' );

                table.column('0:visible').order('desc').draw();
        }
    });
}

// Call GHN API
// GET all Province

// [GET] all district
// [GET] all 


function renderStarRatings(number) {
    const html = `
    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
    <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
    <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
    `
    let result = "";
    switch(number) {
        case '1':
            result = `
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            `
            break;
        case '1.5':
            result = `
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            `
            break;
        case '2':
            result = `
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            `
            break;
        case '2.5':
            result = `
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
        `
            break;
        case '3':
            result = `
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
        `
            break;
        case '3.5':
            result = `
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
        `
            break;
        case '4':
              result = `
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
            `
            break;
        case '4.5':
            result = `
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
        `
            break;
        case '5':
            result = `
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
            <a href="#" tabindex="0"><i class="zmdi zmdi-star-"></i></a>
        `
            break;
        default:
    }
    return result;
}

(() => {
    zoomProductDetail();
    // handleAddCart('.add-to-cart', 'addtocart');
    // handleAddCart('.add-to-wishlist', 'addtowishlist');

    const url = new URL(location.href);
    console.log(url);
    // console.log('url', url.searchParams.get('act'));
    // console.log('url', url.searchParams.get('view'));
    if(url.searchParams.get('act') == 'settingaccount') {
    
        switch (url.searchParams.get('view')) {
            case 'history':
                // console.log('Hello history order!!!');
                  document.getElementById('historyOrderBtn').click();
                break;
            case 'changepass':
                    // console.log('Hello history order!!!');
                  document.getElementById('changePassBtn').click();
                break;
            case 'shippingaddress':
                    // console.log('Hello history order!!!');
                    document.getElementById('shippingAddressBtn').click();
                break;
            case 'paymentmethod':
                    // console.log('Hello history order!!!');
                    document.getElementById('paymentMethodBtn').click();
                break;
            // case 'history':
            //         console.log('Hello history order!!!');
            //     break;
            // case 'history':
            //         console.log('Hello history order!!!');
            //     break;
        
            default:

                break;
        }
    }

    if(!url.searchParams.get('act')) {

        switch (url.searchParams.get('view')) {
            case 'best-seller':
                // console.log("homepage best-seller");
                // $("#best-seller-tab-btn").trigger("click");
                document.getElementById("best-seller-tab-btn").click();
                // window.scrollY = 1800;
                $("html, body").animate({ scrollTop: 1800 }, "slow");
                break;
            case 'special-offer':
                document.getElementById("special-offer-tab-btn").click();
                $("html, body").animate({ scrollTop: 1800 }, "slow");
                break;
            case 'popular-product':
                document.getElementById("popular-product-tab-btn").click();
                $("html, body").animate({ scrollTop: 1800 }, "slow");
                break;
            case 'new-arrival':
                document.getElementById("new-arrival-tab-btn").click();
                $("html, body").animate({ scrollTop: 1800 }, "slow");
                break;
            default:
                break;
        }

        
    }
   
   
})();

function selectProvince(currentProvince) {
    console.log('change ',currentProvince.value);

    const provinceId = currentProvince.value;

    $.ajax({
        type: "GET",
        url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/district",
        data: {
            "province_id": provinceId
        },
        // dataType: "dataType",
        
        headers: {"Token": "66961f68-cc3c-11ed-943b-f6b926345ef9", "Content-Type": "application/json"},
        success: function (response) {
            console.log('res', response);
    
            const {code, message, data} = response;

                const districtHtmlList = data.map((district) => {
                    return (
                        `<option value="${district.DistrictID}">${district.DistrictName}</option>`
                    );
                } )

                $("#district-select").html(districtHtmlList);
    
        }
    });

    const checkoutForm = document.getElementById('checkout-form');

    const provinceName = checkoutForm.elements['province-select'].options[checkoutForm.elements[
        'province-select'].selectedIndex].text;
    checkoutForm.elements['province_name'].value = provinceName;

}

function selectDistrict(currentDistrict) {
    console.log('change ',currentDistrict.value);

    const districtId = currentDistrict.value;
    console.log('district Id: ', districtId);
    $.ajax({
        type: "GET",
        url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward",
        data: {
            "district_id": districtId
        },
        // dataType: "dataType",
        
        headers: {"Token": "66961f68-cc3c-11ed-943b-f6b926345ef9", "Content-Type": "application/json"},
        success: function (response) {
            // console.log('res', response);
    
            const {code, message, data} = response;

                const wardHtmlList = data.map((ward) => {
                    return (
                        `<option value="${ward.WardCode}">${ward.WardName}</option>`
                    );
                } )

                $("#ward-select").html(wardHtmlList);
                
                $("input[name='province_name']").val()
                // Calculate shipping fee here again when change
        }
    });

    const checkoutForm = document.getElementById('checkout-form');

    // const districtId = checkoutForm.elements['district_id'].value;
    const wardCode = checkoutForm.elements['ward_id'].value;
    const subTotal = checkoutForm.elements['tongphu'].value;
    calcShippingFee(districtId, 53320, 2, wardCode, 2, 10, 1000, 10, subTotal, null);


    const districtName = checkoutForm.elements['district-select'].options[checkoutForm.elements[
        'district-select'].selectedIndex].text;
    checkoutForm.elements['district_name'].value = districtName;
}

function selectWard(currentWard) {
    console.log('ward change ', currentWard.value);

    const checkoutForm = document.getElementById('checkout-form');

    const districtId = checkoutForm.elements['district_id'].value;
    const wardCode = currentWard.value;
    const subTotal = checkoutForm.elements['tongphu'].value;
    calcShippingFee(districtId, 53320, 2, wardCode, 2, 10, 1000, 10, subTotal, null);

    const wardName = checkoutForm.elements['ward-select'].options[checkoutForm.elements[
        'ward-select'].selectedIndex].text;
    checkoutForm.elements['ward_name'].value = wardName;
}

function calcShippingFee(districtId, serviceId = 53320, serviceTypeId = 2, wardCode, height = 2, length = 10, weight =
    1000, width = 10, insuranceValue, coupon = null) {


    $.ajax({
        type: "GET",
        url: "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee",
        data: {
            "from_district_id": districtId,
            "service_id": serviceId,
            "service_type_id": serviceTypeId,
            "to_district_id": districtId,
            "to_ward_code": wardCode,
            "height": height,
            "length": length,
            "weight": weight,
            "width": width,
            "insurance_value": insuranceValue,
            "coupon": null
        },
        // dataType: "dataType",
        headers: {
            "Token": "66961f68-cc3c-11ed-943b-f6b926345ef9",
            "ShopId": 123689,
            "Content-type": "application/json"
        },
        success: function(response) {
            console.log(response);
            const {
                data: {
                    total: shippingFee,
                    insurance_fee
                }
            } = response;

            console.log(shippingFee, insuranceValue);
            const totalFeeNoVat = shippingFee + +insuranceValue;
            const vatFee = totalFeeNoVat * 0.1;
            const totalFee = totalFeeNoVat + vatFee;
            console.log('shipping fee hidden', $("#shipping-fee-hidden"));
            document.getElementById("shipping-fee-hidden").value = shippingFee;
            $("#shipping-fee").html(`${shippingFee.toLocaleString("en-US")} VND`);
            $("#total-order-fee").html(`${totalFee.toLocaleString("en-US")} VND`);
            $("#vat-fee").html(`${vatFee.toLocaleString("en-US")} VND`);
            $("#vat-fee-hidden").val(vatFee);
            $("#total-order-hidden").val(totalFee);

        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    $.ajax({
        type: "POST",
        url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province",
        data: "data",
        // dataType: "dataType",
        // contentType: application/json
        headers: {"Token": "66961f68-cc3c-11ed-943b-f6b926345ef9"},
        success: function (response) {
            console.log('res', response);
    
            const {code, message, data} = response;

                const provinceHtmlList = data.map((province) => {
                    return (
                        `<option value="${province.ProvinceID}">${province.ProvinceName}</option>`
                    );
                } )

                $("#province-select").append(provinceHtmlList);
    
        }
    });

    // initAddress();
    // console.log('<?php var_dump($_SESSION)?>')
    
})



