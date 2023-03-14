
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

const handeAddCart = (cartBtnSelector, formAction) => {
    const handleCartBtns = document.querySelectorAll(cartBtnSelector);
    // console.log('btns', addToCartBtns);
    [...handleCartBtns].forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            // console.log('event target: ', e.currentTarget);
            const submitBtn = e.currentTarget.nextElementSibling;
            // console.log('submit Btn: ', submitBtn);
            const formElement = getParent(e.currentTarget, 'form');
            formElement.action = "index.php?act=" + formAction;
            submitBtn.click();
        })
    })
}
