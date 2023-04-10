

function deleteOrder(orderId) {
    console.log('clicked', orderId);

    $('#cartModalBtn').trigger('click');
    $('#cartModal .action-btn').removeClass("d-none");
    $("#cartModalLabel").text(`Bạn có muốn xóa đơn hàng ${orderId} này`);
    $("#cartModal .modal-body").text("Xóa chọn tiếp tục, không chọn đóng");
    

    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("./index.php?act=deleteorder&iddh="+orderId);
    })
}

function deleteDashboardOrder(orderId) {
    console.log('clicked', orderId);

    $('#cartModalBtn').trigger('click');
    $('#cartModal .action-btn').removeClass("d-none");
    $("#cartModalLabel").text(`Bạn có muốn xóa đơn hàng ${orderId} này`);
    $("#cartModal .modal-body").text("Xóa chọn tiếp tục, không chọn đóng");
    

    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("./index.php?act=deletedashboardorder&iddh="+orderId);
    })
}


function changeStatus(orderId) {
    
    console.log('changed clicked', orderId);
    const currentStatus = document.getElementById('select-status').value;

    console.log('currentStatus', currentStatus);
    if(currentStatus < 1) {
        
        return;
    }

    $.ajax({
        type: "POST",
        url: "./logic/order.php?act=updatestatus",
        data: {
            orderid: orderId,
            status: currentStatus
        },
        // dataType: "dataType",
        success: function (response) {
            const {status, message} = JSON.parse(response);

            showToast("Cập nhật trạng thái", "Chúc mừng " + message);

            setTimeout(() => {
                location.reload();
            }, 2000)
        }
    });
    
}