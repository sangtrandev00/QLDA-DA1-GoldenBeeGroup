

function searchProducts(currentForm) {

    event.preventDefault();
    console.log('current form: ', currentForm);
    const searchValue =currentForm.elements['searchvalue'].value;

    const url = new URL(window.location);

    url.searchParams.set('query', searchValue);
    url.searchParams.set('filter', "");
    url.searchParams.set('minprice', "");
    url.searchParams.set('maxprice', "");
    url.searchParams.set('subcateid', "");
    url.searchParams.set('cateid', "");
    url.searchParams.set('minprice', "");
    url.searchParams.set('maxprice', "");
    url.searchParams.set('page', 1);
    history.pushState({},'', url);
    location.reload();
    // setTimeout(() => {
    //     console.log('keyup!!');
    // }, 1000);
}

function updatePagination() {
    const paginationBtns = document.querySelectorAll("#shop-pagination .page-item");

    [...paginationBtns].forEach((pageBtn) => {
        pageBtn.addEventListener('click', (e) => {
            e.preventDefault();

            console.log('pagination: ', e.currentTarget.innerText);
            const url = new URL(window.location);
            let currentPage = e.currentTarget.innerText;
            const currentPageNum = url.searchParams.get('page');
            if(currentPage == 'Trước') {
                // currentPage -= 1;
                // console.log('currentPage: ', currentPageNum);
                url.searchParams.set('page', +currentPageNum -1);
            }else if(currentPage == 'Sau') {
                // currentPage += 1;
                // console.log('currentPage: ', currentPageNum);
                url.searchParams.set('page', +currentPageNum +1);
            }else {
                url.searchParams.set('page', currentPage);
            }
            
            history.pushState({}, '', url);
            location.reload();
            
        })
    })
    
}

function filterProducts(filterElement) {
    const shopGridContentUrl = SITE_URL+"/view/pages/shop/shop-grid-content.php";
    const filter = filterElement.value;
    const url = new URL(window.location);
    url.searchParams.set('filter', filter);
    url.searchParams.set('minprice', "");
    url.searchParams.set('maxprice', "");
    history.pushState({},'', url);
    
    location.reload();
    return;
    // let params = new URLSearchParams(url.search);
    // params.append("filter", filter);
    
}

// $(document).ready(function () {
//     $("#searchForm").submit(function(e) {
//         e.preventDefault();
//         console.log('submited');

//         console.log('this',this.elements['searchvalue'].value);
//         const searchValue = this.elements['searchvalue'].value;
//         const shopGridContentUrl = SITE_URL+"/view/pages/shop/shop-grid-content.php";
//         const shopListContentUrl = SITE_URL+"/view/pages/shop/shop-list-content.php";
//         const shopPaginationUrl = SITE_URL+"/view/pages/shop/shop-pagination.php";
//         $.ajax({
//             type: "POST",
//             url: shopGridContentUrl,
//             data: {
//                 searchValue
//             },
//             // dataType: "dataType",
//             success: function (responseHtml) {
//                 $("#grid-view").html(responseHtml);
//                 $.ajax({
//                     type: "POST",
//                     url: shopPaginationUrl,
//                     data: {
//                         searchValue
//                     },
//                     // dataType: "dataType",
//                     success: function (responseHtml) {
//                         $("#shop-pagination").html(responseHtml);
//                     }
//                 });
//             }
//         });
        
//         $.ajax({
//             type: "POST",
//             url: shopListContentUrl,
//             data: {
//                 searchValue
//             },
//             // dataType: "dataType",
//             success: function (responseHtml) {
//                 $("#list-view").html(responseHtml);
//                 $.ajax({
//                     type: "POST",
//                     url: shopPaginationUrl,
//                     data: {
//                         searchValue
//                     },
//                     // dataType: "dataType",
//                     success: function (responseHtml) {
//                         $("#shop-pagination").html(responseHtml);
//                     }
//                 });
//             }
//         });
        
// })
// Search by price
function filterByPrice() {

    event.preventDefault();
    const priceArray = $("#amount").val().split(" - ");
    console.log('price', priceArray);

    const minPrice = priceArray[0].substring(0, priceArray[0].length - 3);
    const maxPrice = priceArray[1].substring(0, priceArray[1].length - 3);

    console.log('price', minPrice, maxPrice);

    const url = new URL(window.location);

    url.searchParams.set('minprice', minPrice);
    url.searchParams.set('maxprice', maxPrice);
    history.pushState({}, '', url);
    location.reload();
   
}

// $(document).ready(function () {
//     console.log($("#amount").val());

   
// });

// Initial 
(() => {

    const url = new URL(window.location);
    console.log('url', url);
    // if (!url.searchParams.get('query')) url.searchParams.set('query', '');
    // if (!url.searchParams.get('minprice')) url.searchParams.set('minprice', '');
    // if (!url.searchParams.get('maxprice')) url.searchParams.set('maxprice', '');
    // if (!url.searchParams.get('filter')) url.searchParams.set('filter', '');
    if (!url.searchParams.get('page')) url.searchParams.set('page', 1);
    if (!url.searchParams.get('limit')) url.searchParams.set('limit', 12);
    history.pushState({}, '', url);
    // const queryParams = url.searchParams

    const paginationBtn = document.querySelectorAll("#shop-pagination .page-item");
    
    console.log('pagination: ', paginationBtn);

})()

updatePagination();