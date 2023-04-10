$(document).ready(function () {
    $("#table-content-wrapper .qtybutton").attr("onclick", "updateCart('onclick')");
    // $("#table-content-wrapper .inc.qtybutton").click(function() {

    // })
});

function updateCart(typeEvent) {

    if(typeEvent == "onkeyup") {
        console.log('key up update cart');
        return;
      
    }else if(typeEvent == "onclick") {
        console.log('clicked');
        console.log('Hello clicked!', event.currentTarget);
    }
    const currentElement = event.currentTarget;
    let typeAction = "";

    if(typeEvent == "onclick") {
        if(currentElement.classList.contains('dec')) {
            console.log('tru');
        }else {
            console.log('cong');
        }
        typeAction =currentElement.classList.contains('dec') ? "minus" : "add"
    }else if(typeEvent == "onkeyup") {
        typeAction = "keyup" 
    }
    
   
    const rowItem = getParent(currentElement, "tr.product-item__row");
    const id = rowItem.dataset.id;
    const currQty = rowItem.querySelector("input[name='qtybutton']");

    console.log('curr qty',currQty.value);
    console.log('row: ', rowItem);
    // if(currQty.value == "") return;
    if(typeEvent == "onkeyup") {
        setTimeout(() => {
            callAjax();
        }, 800);
    }else {
        callAjax();
    }
    
    function callAjax() {
        $.ajax({
            type: "POST",
            url: "./logic/cart.php?act=updatecart",
            data: {
                id,
                sl: currQty.value,
                type: typeAction
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
                        $("#cartModal .continue-btn").val("Load lại giỏ hàng");  
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

        
}

function handleCheckInventory(actionLocation) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "./logic/cart.php?act=checkinventory",
        data: "data",
        // dataType: "dataType",
        success: function (response) {
                const {status, content} = JSON.parse(response);
                if(status == 0) {
                     // Add some message for customer
                     $("#cartModalBtn").trigger("click");
                     $("#cartModalLabel").text(`Vượt quá tồn kho`);
                     $("#cartModal .modal-body").text(`${content}, load lại trang để xem số lượng`);   
                     $("#cartModal .continue-btn").val("Load lại giỏ hàng");  
                     $("#cartModal .continue-btn").addClass("main-bg-color main-border-color");  
                     $("#cartModal .close-modal-btn").addClass("d-none");  
                }else if(status == 1) {
                    location.assign("./index.php?act=checkout");
                }
        }
    });

}