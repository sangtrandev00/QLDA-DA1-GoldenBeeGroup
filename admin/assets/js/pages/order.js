

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