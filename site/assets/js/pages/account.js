
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