// (() => {

//     const deleteCart = () => {
//         const shoppingCart = document.getElementById('shopping-cart');
//         if(!shoppingCart) return;

//         const deleteCartBtns = document.querySelectorAll('.product-remove > a');
//         console.log('btns: ', deleteCartBtns);
//         if(!deleteCartBtns) return;

//         const cartModal = document.getElementById('cartModal');
//         if(!cartModal) return;

//         [...deleteCartBtns].forEach((btn) => {
//             btn.addEventListener('click', (e) => {
//                 console.log('target: ', e.currentTarget);
//                 console.log('cart: ', cartModal);
//                 const idCart = e.currentTarget.dataset.index;
//                 const currentItemName = e.currentTarget.dataset.name;

//                 const cartTitleElement = cartModal.querySelector('.modal-title');
//                 const cartContentElement = cartModal.querySelector('.modal-body');
//                 const deleteBtnElement = cartModal.querySelector('.modal-footer input[name="deletecartbtn"]');
//                 const formElement = cartModal.querySelector('form');
//                 console.log('form: ', formElement);
//                 cartTitleElement.textContent = "Xóa Sản phẩm khỏi giỏ hàng";
//                 cartContentElement.innerHTML = "Bạn có chắc muốn Xóa Sản phẩm <span class='fw-bold'>"+currentItemName+"</span> khỏi giỏ hàng hay không ?";

//                 formElement.action="./index.php?act=deletecart&idcart=" + idCart;
//             })
//         })
//     }

//     deleteCart();
        
// })();