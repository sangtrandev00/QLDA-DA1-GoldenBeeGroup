$(function() {
	"use strict";

    $(document).ready(function() {
        const url = new URL(location.href);
        // product list --  database
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
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });

                    table.buttons().container()
                        .appendTo( '#table-product_wrapper .col-md-6:eq(0)' );
            }
        });


        // product inventory less than - 10 --- database
        
      
        // Quick view database -- dashboard - number of orders success, failed, confirmed, unconfimed, destroy, shipping
        

        // Table order database -- dashboard.
        
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
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });

                    tableOrder.buttons().container()
                    .appendTo( '#table-order_wrapper .col-md-6:eq(0)' );

                    tableOrder.column('5:visible').order('desc').draw();

            }
        });

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/orders/table-recent-order-database.php",
            // data: {
            //     iduser: id
            // },
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    var tableRecentOrder  = $('#table-recent-order').DataTable({
                        data: order_list,
                        retrieve: true,
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });
                    tableRecentOrder.buttons().container()
                    .appendTo( '#table-recent-order_wrapper .col-md-6:eq(0)' );
                    tableRecentOrder.column('5:visible').order('desc').draw();
            }
        });
        let iduser = "";
        if(url.searchParams.get('userorders') && url.searchParams.get('id')) {
            iduser = url.searchParams.get('id');
        }

        console.log('id', url.searchParams.get('id'));

        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/orders/table-order-by-iduser-database.php",
            data: {
                iduser: url.searchParams.get('id') || ""
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);
                    // console.log('list: ', order_list);
                    var tableRecentOrder  = $('#table-user-orders').DataTable({
                        data: order_list,
                        retrieve: true,
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });
                    tableRecentOrder.buttons().container()
                    .appendTo( '#table-user-orders_wrapper .col-md-6:eq(0)' );
                    tableRecentOrder.column('5:visible').order('desc').draw();
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