
function viewOrderdetail(orderId) {
        // event.preventDefault();

        

        console.log('clicked, ', orderId);


        $.ajax({
            type: "POST",
            url: "./logic/order-detail.php",
            data: {
                id: orderId
            },
            // dataType: "dataType",
            success: function (response) {
                console.log('res: ', response);

                // $.get("./logic/order-detail.php", function(responseHtml) {
                //     console.log('res: ', responseHtml);
                // })

                $("#orderDetailModal .modal-body").html(response);
                $("#orderDetailModalBtn").trigger("click");
                $("#orderDetailModal .orderDetailModalLabel").text("Đơn hàng chi tiết")
            }
        });
}

function updateShippingAddress(iduser) {
    event.preventDefault();

    console.log('submited: ', iduser );
    const shippingaddress = event.currentTarget.elements['shippingaddress'].value;
    $.ajax({
        type: "POST",
        url: "./logic/account-action.php?act=updateshippingaddress",
        data: {
            iduser: iduser,
            shippingaddress
        },
        // dataType: "dataType",
        success: function (response) {

            console.log('res', response);
            // if(response == 1) {
                $("#cartModalBtn").trigger("click");
                $('#cartModal #cartModalLabel').text("Chúc mừng bạn đã cập nhật địa chỉ thành công!");
                $('#cartModal .modal-body').text("Đã cập nhật địa chỉ");
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
                const res = JSON.parse(response);
                $("#cartModalBtn").trigger("click");
                $("#cartModal #cartModalLabel").text("Thay đổi mật khẩu");
                $("#cartModal .modal-body").text(res['content']);
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