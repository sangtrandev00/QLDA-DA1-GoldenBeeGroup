

function searchProducts() {

    const searchForm = $("#searchForm");

    
    
    // setTimeout(() => {
    //     console.log('keyup!!');
    // }, 1000);
}

$(document).ready(function () {
    $("#searchForm").submit(function(e) {
        e.preventDefault();
        console.log('submited');

        console.log('this',this.elements['searchvalue'].value);
        const searchValue = this.elements['searchvalue'].value;
        const shopGridContentUrl = SITE_URL+"/view/pages/shop/shop-grid-content.php";
        const shopListContentUrl = SITE_URL+"/view/pages/shop/shop-list-content.php";
        const shopPaginationUrl = SITE_URL+"/view/pages/shop/shop-pagination.php";
        $.ajax({
            type: "POST",
            url: shopGridContentUrl,
            data: {
                searchValue
            },
            // dataType: "dataType",
            success: function (responseHtml) {
                $("#grid-view").html(responseHtml);
                $.ajax({
                    type: "POST",
                    url: shopPaginationUrl,
                    data: {
                        searchValue
                    },
                    // dataType: "dataType",
                    success: function (responseHtml) {
                        $("#shop-pagination").html(responseHtml);
                    }
                });
            }
        });
        
        $.ajax({
            type: "POST",
            url: shopListContentUrl,
            data: {
                searchValue
            },
            // dataType: "dataType",
            success: function (responseHtml) {
                $("#list-view").html(responseHtml);
                $.ajax({
                    type: "POST",
                    url: shopPaginationUrl,
                    data: {
                        searchValue
                    },
                    // dataType: "dataType",
                    success: function (responseHtml) {
                        $("#shop-pagination").html(responseHtml);
                    }
                });
            }
        });
        
})
// Search by price

$("#amount").change(function () {
    console.log('changed');
})



});