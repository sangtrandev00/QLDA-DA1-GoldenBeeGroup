$(document).ready(function () {
    $("#table-content-wrapper .qtybutton").attr("onclick", "updateCart()");
    // $("#table-content-wrapper .inc.qtybutton").click(function() {
      

    // })
});

function updateCart() {
    console.log('clicked');

    console.log('Hello clicked!', event.currentTarget);

    const currentBtn = event.currentTarget;
    
    if(currentBtn.classList.contains('dec')) {
        console.log('tru');
    }else {
        console.log('cong');
    }
    const rowItem = getParent(event.currentTarget, "tr.product-item__row");
    const id = rowItem.dataset.id;
    const currQty = rowItem.querySelector("input[name='qtybutton']");
    console.log('curr qty',currQty);
    console.log('row: ', rowItem);
        $.ajax({
            type: "POST",
            url: "./logic/cart.php?act=updatecart",
            data: {
                id,
                sl: currQty.value,
                type: currentBtn.classList.contains('dec') ? "minus" : ""
            },
            // dataType: "dataType",
            success: function (response) {
                const cartList = response;
                
                const shoppingCartContentUrl = SITE_URL +"/logic/shopping-cart-content.php";
                console.log('root: ', shoppingCartContentUrl)
                $.get(shoppingCartContentUrl, function(responseHtml) {
                    $("#shopping-cart").html(responseHtml);
                })
            }
        });
}


