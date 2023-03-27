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
                // const cartList = response;

                const {status, content} = JSON.parse(response);
                if(status == 0) {
                    const cartModalBtn = document.getElementById("cartModalBtn");
                        // Show cartModal to notify
                        $("#cartModal input[name='actionbtn']").click(function(e) {
                            e.preventDefault();
        
                            location.assign("./index.php?act=viewcart");
                           })
                        cartModalBtn.click();

                        // Add some message for customer
                        $("#cartModalLabel").text(`Vượt quá tồn kho`);
                        $("#cartModal .modal-body").text(`${content}, load lại trang để xem số lượng`);   
                        $("#cartModal .continue-btn").text("Load lại giỏ hàng");  
                        $("#cartModal .continue-btn").addClass("main-bg-color main-border-color");  
                        $("#cartModal .close-modal-btn").addClass("d-none");  
                }else if(status == 1) {
                    
                    const shoppingCartContentUrl = SITE_URL +"/logic/shopping-cart-content.php";
                    console.log('root: ', shoppingCartContentUrl)
                    $.get(shoppingCartContentUrl, function(responseHtml) {
                        $("#shopping-cart").html(responseHtml);
                    })
                }
                
                
            }
        });
}


