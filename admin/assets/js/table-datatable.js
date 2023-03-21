$(function() {
	"use strict";

    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/products/table-product-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                console.log('res: ', response);
                    const {product_list} = JSON.parse(response);
                    // console.log('list: ', product_list);
                    $('#table-product').DataTable({
                        data: product_list,
                        retrieve: true,
                        buttons: [ 'copy', 'excel', 'pdf', 'print']
                    });
            }
        });

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/orders/table-order-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    $('#table-order').DataTable({
                        data: order_list,
                        retrieve: true,
                    });
            }
        });


      } );


      $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );


});