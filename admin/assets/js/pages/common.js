const ROOT_URL = location.origin +"/PRO1014_DA1/main-project";
const ADMIN_URL = `${ROOT_URL}/admin`;
const SITE_URL = `${ROOT_URL}/site`;
// location.assign("index.php?act=deleteproduct&id="+productId);
// const productTableContentUrl = `${ROOT_URL}/admin/view/pages/products/table-product-content.php`;
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

function deleteCoupon(couponId) {
  event.preventDefault();

  const alertModal = new bootstrap.Modal('#alertModal');
  alertModal.show();


  $("#alertModal .continue-btn").removeClass("d-none");
  $("#alertModal .modal-body").text("Bạn có muốn xóa coupon này không ?");
  $("#alertModal .continue-btn").click(function(e){
    e.preventDefault();

    location.assign("./index.php?act=deletecoupon&id="+couponId);

  })

}

function callAjaxOrders(status) {
  $.ajax({
      type: "POST",
      url: ADMIN_URL+ "/logic/order.php?act=list-orders-by-status",
      data: {
        status
      },
      // dataType: "dataType",
      success: function (response) {
          // console.log('res: ', response);
              const {order_list} = JSON.parse(response);

              var quickViewTable = new bootstrap.Modal('#quickViewTable');
              quickViewTable.show();
              // console.log('list: ', order_list);
          // const quickViewTable = new 
              $("#quickViewTable .modal-body").html(`
                <table id="quick-orders-table" class="table align-middle">
                  <thead class="table-light">
                      <tr>
                          <th>ID</th>
                          <th>Tên khách hàng</th>
                          <th>Tổng tiền</th>
                          <th>Trạng thái đơn hàng</th>
                          <th>PTTT</th>
                          <th>Ngày đặt</th>
                          <th>SL</th>
                          <th>Hành động</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
              `);

              var tableOrder = $('#quick-orders-table').DataTable({
                  data: order_list,
                  retrieve: true,
                  lengthChange: true,
                  buttons: [ 'copy', 'excel', 'pdf', 'print'],
                  "ordering":true,
                  "pageLength": 8
              });

              tableOrder.buttons().container()
              .appendTo( '#quick-orders-table_wrapper .col-md-6:eq(0)' );

              tableOrder.column('5:visible').order('desc').draw();

      }
  });
}

function callAjaxProducts() {
  $.ajax({
    type: "POST",
    url: ADMIN_URL+ "/logic/product.php?act=warning-inventory-productlist",
    // data: "data",
    // dataType: "dataType",
    success: function (response) {
        // console.log('res: ', response);
            const {product_list} = JSON.parse(response);
            var quickViewTable = new bootstrap.Modal('#quickViewTable');
            quickViewTable.show();
            // console.log('list: ', product_list);
            $("#quickViewTable .modal-body").html(`
            <table id="table-warning-inventory-product" class="table align-middle table-striped">
                <thead>
                    <th>Id</th>
                    <th>Hình ảnh/ Tên sản phẩm </th>
                    <th>SL bán </th>
                    <th>Giá tiền </th>
                    <th>Tồn kho </th>
                    <th>Ngày nhập </th>
                    <th>Hành động </th>
                </thead>
                <tbody>

                </tbody>
            </table>
            `);
            var table = $('#table-warning-inventory-product').DataTable({
                data: product_list,
                retrieve: true,
                // lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print'],
                "ordering":true,
            });

            table.buttons().container()
                .appendTo( '#table-warning-inventory-product_wrapper .col-md-6:eq(0)' );
    }
});
}

function showOrders(status) {
  console.log('status: ', status);

  callAjaxOrders(status);
}

$(document).ready(function () {
    CKEDITOR.replace( 'descriptionProductEditor' );
    CKEDITOR.replace( 'infoProductEditor' );
});

