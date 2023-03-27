$(function() {
	"use strict";

    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/products/table-product-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {product_list} = JSON.parse(response);
                    // console.log('list: ', product_list);
                    var table = $('#table-product').DataTable({
                        data: product_list,
                        retrieve: true,
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print']
                    });

                    table.buttons().container()
                        .appendTo( '#table-product_wrapper .col-md-6:eq(0)' );
            }
        });

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/orders/table-order-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    var tableOrder = $('#table-order').DataTable({
                        data: order_list,
                        retrieve: true,
                        buttons: [ 'copy', 'excel', 'pdf', 'print']
                    });

                    tableOrder.buttons().container()
                    .appendTo( '#table-order_wrapper .col-md-6:eq(0)' );

                    tableOrder.column('0:visible').order('desc').draw();

            }
        });

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/orders/table-recent-order-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    var tableRecentOrder  = $('#table-recent-order').DataTable({
                        data: order_list,
                        retrieve: true,
                        "pageLength": 10,
                        buttons: [ 'copy', 'excel', 'pdf', 'print']
                    });
                    tableRecentOrder.buttons().container()
                    .appendTo( '#table-recent-order_wrapper .col-md-6:eq(0)' );
                    tableRecentOrder.column('0:visible').order('desc').draw();
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