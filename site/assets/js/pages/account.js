
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

    // const shippingaddress = event.currentTarget.elements['shippingaddress'].value;
    const currentForm = event.currentTarget;
    console.log('submited: ', $(currentForm).serializeArray() );
    $(currentForm).serializeArray()
    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=updateshippingaddress",
        data: $(currentForm).serializeArray(),
        // dataType: "dataType",
        success: function (response) {
            const {status, content} = JSON.parse(response);
            console.log('res', response);

            
            // if(response == 1) {
                $("#cartModalBtn").trigger("click");
                $('#cartModal #cartModalLabel').text("Cập nhật địa chỉ");
                $('#cartModal .modal-body').text(content);
            // }
            // else {
                
            // }
        }
    });

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
                const {status, content} = JSON.parse(response);
                showToast("Cập nhật mật khẩu", content);
                if(status == 1) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000)
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
                location.reload();
                
        }
    });
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



