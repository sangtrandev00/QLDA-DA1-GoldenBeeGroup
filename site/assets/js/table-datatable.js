$(function() {

	"use strict";

    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: SITE_URL+ "/view/pages/account/table-order-database.php",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log('res: ', response);
                    const {order_list} = JSON.parse(response);

                    // console.log('list: ', order_list);

                    var table = $('#table-history-order').DataTable({
                        data: order_list,
                        retrieve: true,
                        lengthChange: false,
                        buttons: [ 'copy', 'excel', 'pdf', 'print'],
                        "ordering":true,
                    });

                    table.buttons().container()
                    .appendTo( '#table-history-order_wrapper .col-md-12' );
                    table.column('5:visible').order('desc').draw();
            }
        });

      } );

    //   $(document).ready(function() {
    //     var table = $('#example2').DataTable( {
    //         lengthChange: false,
    //         buttons: [ 'copy', 'excel', 'pdf', 'print']
    //     } );
     
    //     table.buttons().container()
    //         .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    // } );

});