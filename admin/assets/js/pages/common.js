const ROOT_URL = location.origin +"/PRO1014_DA1/main-project";
const ADMIN_URL = `${ROOT_URL}/admin`;
const SITE_URL = `${ROOT_URL}/site`;
// location.assign("index.php?act=deleteproduct&id="+productId);
// const productTableContentUrl = `${ROOT_URL}/admin/view/pages/products/table-product-content.php`;
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

function showToast(toastTitle, toastMessage) {
      const toastBtn = document.getElementById("liveToastBtn");
      if(!toastBtn) return;
      toastBtn.click();

      const toastElement = document.getElementById("liveToast");
      toastElement.querySelector("#toast-content-header").textContent = toastTitle;
      toastElement.querySelector(".toast-body").textContent = toastMessage;
}

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
  })
}