
function viewOrderdetail(orderId) {

        // event.preventDefault();     

        // console.log('clicked, ', orderId);

        $.ajax({
            type: "POST",
            url: "./logic/order-detail.php",
            data: {
                id: orderId
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);

                // $.get("./logic/order-detail.php", function(responseHtml) {
                //     console.log('res: ', responseHtml);
                // })
                $("#orderDetailModalLabel").html(`<h3>Thống tin chi tiết đơn hàng theo #${orderId}</h3>`)
                $("#orderDetailModal .modal-body").html(response);
                $("#orderDetailModalBtn").trigger("click");
                $("#orderDetailModal .orderDetailModalLabel").text("Đơn hàng chi tiết")
            }
        });
}

function updateShippingAddress(iduser) {
    event.preventDefault();
    const currentForm = event.currentTarget;
    console.log('submited: ', $(currentForm).serializeArray() );
    $(currentForm).serializeArray();

    let actionType = "";

    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=checkexistshippingaddress",
        data: {
            iduser
        },
        // dataType: "dataType",
        success: function (response) {
            const {status, content} = JSON.parse(response);
            if(status == 1) {
                actionType = "updateshippingaddress";
                
            }else if(status == 0) {
                actionType = "insertshippingaddress"

            }

            
    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act="+actionType,
        data: $(currentForm).serializeArray(),
        // dataType: "dataType",
        success: function (response) {
            const {status, content} = JSON.parse(response);
            console.log('res', response);

            
            // if(response == 1) {
                $("#cartModalBtn").trigger("click");
                $('#cartModal #cartModalLabel').text("Cập nhật địa chỉ");
                $("#cartModal .continue-btn").addClass("d-none");
                $('#cartModal .modal-body').text(content);
            // }
            // else {
                
            // }
        }
    });
        }
    });

    // const shippingaddress = event.currentTarget.elements['shippingaddress'].value;




}

function changePassword(iduser) {
    event.preventDefault();

    const currentForm = event.currentTarget;
    console.log('submited: ', currentForm);

    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=changepass",
        data: {
            iduser: iduser,
            oldpass: currentForm.elements['oldpass'].value,
            newpass: currentForm.elements['newpass'].value,
            renewpass: currentForm.elements['renewpass'].value
            // arrayForm
        },
        // dataType: "dataType",
        success: function (response) {
            // if(response['status'] == 1) {
                console.log('res: ', response);
                console.log('res: ', JSON.parse(response));
                const {status, content, error} = JSON.parse(response);
                showToast("Cập nhật mật khẩu", content);
                if(status == 1) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000)
                }else if(status == 0) {
                    $(".oldpass-error").text(error['oldpass'] || "");
                    $(".newpass-error").text(error['newpass'] || "");
                    $(".renewpass-error").text(error['renewpass'] || "");
                }

                
                // $("#cartModalBtn").trigger("click");
                // $("#cartModal #cartModalLabel").text("Thay đổi mật khẩu");
                // $("#cartModal .modal-body").text(res['content']);
            // }else {
            //     $("#cartModalBtn").trigger("click");
            //     $("#cartModal #cartModalLabel").text(response['content']);
            // }
        }
    });
    
}

function searchOrder(currentForm, iduser) {
    // setTimeout(() => {
    //     console.log("current: ", currInput, iduser);
    // }, 2000)
    event.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=search-order",
        data: {
            iduser,
            searchValue: currentForm.elements['searchhistory'].value
        },
        // dataType: "dataType",
        success: function (response) {
            // console.log('location: ', location.href + "#table-order-content");
            // $("#table-order-content").load("./view/pages/account/table-order-content.php");

            $.get("./view/pages/account/table-order-content.php", function(responseHtml) {
                console.log('res: ', responseHtml);
                // ("#table-order-content").html(responseHtml);
            })
        }
    });
}

// function updateInfo() {
//     event.preventDefault();
//     console.log('this', event.currentTarget);
//     console.log('click submit!');
//     console.log($(event.currentTarget).serializeArray());
    
//     const fileElement = event.currentTarget.elements['hinh_anh'];
//     console.log('file: ', fileElement);
//     console.log('file: ', fileElement.files);

//     const formData = new FormData();
//     formData.append('file',fileElement.files);

//     console.log('form: ', formData);
//     $.ajax({
//         type: "POST",
//         url: "./logic/account-action.php",
//         data: $(event.currentTarget).serializeArray(),
//         // dataType: "dataType",
//         success: function (response) {
            
//         }
//     });
//     return ;
   
// }


function viewOrder() {
    console.log('clicked');
    location.assign("./index.php?act=settingaccount");
    $("#collapseFour").trigger("click");
    console.log('click');
}

function viewGeneralSetting() {
    location.assign("./index.php?act=settingaccount");
}

function destroyOrder(orderId) {
    event.preventDefault();
    console.log("submitted: ", orderId);

    $("#cartModalBtn").trigger("click");
    $("#cartModalLabel").text("Lý do hủy đơn hàng");
    $("#cartModal .modal-body").html(`
        <form action="" method="post">
           <div className="form-group">
                <label htmlFor="" className="form-label">
                    Nội dung
                </label>
                <textarea class="" name="" id="reason-destroy-content" cols="30" rows="5">
                </textarea>
           </div>
        </form>
    `);
    $("#cartModal .continue-btn").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./logic/account-action.php?act=reason-destroy",
            data: {
                reason: $("#reason-destroy-content").val(),
                id: orderId
            },
            // dataType: "dataType",
            success: function (response) {
                $.ajax({
                    type: "POST",
                    url: "./logic/account-action.php?act=destroyorder",
                    data: {
                        orderid: orderId
                    },
                    // dataType: "dataType",
                    success: function (response) {
                        const {status, message} = JSON.parse(response);
                            showToast("Hủy đơn hàng #"+orderId , message)
                            $("#orderDetailModalBtn").trigger("click");
                            setTimeout(() => {
                                location.assign("index.php?act=settingaccount&view=history");
                            }, 2000);
                            
                    }
                });
            }
        });
    })
  
   
}

function confirmOrder(orderId) {
 event.preventDefault();

 console.log("submitted: ", orderId);

 $.ajax({
    type: "POST",
    url: "./logic/account-action.php?act=confirmorder",
    data: {
        orderid: orderId
    },
    // dataType: "dataType",
    success: function (response) {
        const {status, message} = JSON.parse(response);
        showToast("Xác nhận đơn hàng #"+orderId , message);
        $("#orderDetailModalBtn").trigger("click");
        location.reload();
    }
});
}

function reOrder(orderId) {
    event.preventDefault();

    console.log('re-order: ',orderId);

    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=reorder",
        data: {
            orderid: orderId
        },
        // dataType: "dataType",
        success: function (response) {
            location.assign("./index.php?act=viewcart");
        }
    });

}

function updatePaymentMethod(iduser) {
        event.preventDefault();
        const paymentMethod = event.currentTarget.elements['payment-method'].value;

        $.ajax({
            type: "POST",
            url: "./logic/account-action.php?act=updatepaymentmethod",
            data: {
                iduser,
                paymentMethod
            },
            // dataType: "dataType",
            success: function (response) {
                const {status, message} = JSON.parse(response);
                showToast("Cập nhật phương thức thanh toán" , message);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        });
}

function reviewProduct(currentForm) {
    event.preventDefault();

    $("#reviewModalBtn").trigger("click");
    console.log(currentForm);
    const productName = currentForm.elements['tensp'].value;
    const thumbnail = currentForm.elements['hinhanh'].value;
    const price = currentForm.elements['dongia'].value;
    const productId = currentForm.elements['idproduct'].value;
    const iddh = currentForm.elements['iddh'].value;
    const iduser = currentForm.elements['iduser'].value;
   
    // const reviewImage = currentForm.elements['review_img'].value;
    $("#reviewModal .review-product__name").text(productName);
    $("#reviewModal .review-product__name").attr("href", "./index.php?act=detailproduct&id="+productId);
    $("#reviewModal .review-product__price").text((+price).toLocaleString("en-us"));
    $("#reviewModal .review-product__img").attr("src", "../uploads/"+thumbnail);

    $("#reviewModal .save-review-btn").click(function(e){
        const reviewForm = document.querySelector("#reviewModal .review-product__form");
        console.log(reviewForm.elements);
       
        const reviewContent = reviewForm.elements['review_content'].value;
        const reviewStarRating = reviewForm.elements['review_star_rating'].value;

        // console.log(reviewContent, reviewStarRating);
        const formData = new FormData($(reviewForm)[0]);
        console.log(formData);
        formData.append("idsanpham", productId),
        formData.append("iduser", iduser),
        formData.append("iddh", iddh);
            $.ajax({
                type: "POST",
                url: "./logic/account-action.php?act=reviewproduct",
                data: formData,
                contentType: false,
                processData: false,
                // dataType: "dataType",
                success: function (response) {
                    const {status, content } = JSON.parse(response);

                    // showToast("Đánh giá sản phẩm", content);
                    alertModal(content +", Xem bình luận", "Bạn có muốn xem bình luận ?");
                    // $("#cartModal form").action="./index.php?act=detailproduct&id="+productId+"view=reviews";

                    $("#cartModal .continue-btn").click(function(e) {
                        e.preventDefault();

                        location.assign("./index.php?act=detailproduct&id="+productId+"&view=reviews");
                    })
                }
            });
        })

}

