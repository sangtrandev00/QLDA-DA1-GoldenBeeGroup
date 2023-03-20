function editProduct(productId) {
    console.log('clicked', productId);

    $.get("./logic/product.php?act=getproduct&id="+productId, function(response) {
        $.get("./view/pages/products/product-form.php", function(reponseHtml) {
            // console.log('res: ',JSON.parse(response));

            const productItem = JSON.parse(response)['content'];
            // console.log('reponseHtml', reponseHtml);

            // $("#cartModalBtn")

            $("#cartModalBtn").trigger("click");
            $("#cartModal .modal-body").html(reponseHtml);
            $("#cartModal #cartModalLabel").text(`Chỉnh sửa sản phẩm #${productId}`);
            const productForm = document.getElementById("product-form");
            console.log(productForm.elements);

            // console.log('tensp', productItem)
            productForm.action = "./index.php?act=editproduct&id="+productId;
            productForm.elements['tensp'].value = productItem['tensp'];
            productForm.elements['mo_ta'].value = productItem['mo_ta'];
            productForm.elements['thong_tin'].value = productItem['information'];
            productForm.elements['don_gia'].value = productItem['don_gia'];
            productForm.elements['giam_gia'].value = productItem['giam_gia'];
            productForm.elements['so_luong'].value = productItem['ton_kho'];
            productForm.elements['ma_danhmuc'].value = productItem['ma_danhmuc'];
            productForm.elements['id_dmphu'].value = productItem['id_dmphu'];
            productForm.elements['dac_biet'].value = productItem['dac_biet'];
            productForm.elements['addproductbtn'].value = "Sửa sản phẩm";
            productForm.elements['addproductbtn'].setAttribute("name", "editproductbtn");

            $("#cartModal #product-action-btn").click(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: "./logic/product.php?act=editproduct",
                    data: {
                        id: productId,
                    },
                    // dataType: "dataType",
                    success: function (response) {

                    }
                });
            })
        })
    });
    
}

function viewDetail(productId) {
    $.get("./logic/product.php?act=getproduct&id="+productId, function(response) {
        $.get("./view/pages/products/product-form.php", function(reponseHtml) {
            console.log('res: ',JSON.parse(response));

            const productItem = JSON.parse(response)['content'];
            console.log('reponseHtml', reponseHtml);

            // $("#cartModalBtn")

            $("#cartModalBtn").trigger("click");
            $("#cartModal .modal-body").html(reponseHtml);
            $("#cartModal #cartModalLabel").text(`Xem chi tiết sản phẩm #${productId}`);
            const productForm = document.getElementById("product-form");
            console.log(productForm.elements);

            // console.log('tensp', productItem)
            productForm.elements['tensp'].value = productItem['tensp'];
            productForm.elements['mo_ta'].value = productItem['mo_ta'];
            productForm.elements['thong_tin'].value = productItem['information'];
            productForm.elements['don_gia'].value = productItem['don_gia'];
            productForm.elements['giam_gia'].value = productItem['giam_gia'];
            productForm.elements['so_luong'].value = productItem['ton_kho'];
            productForm.elements['ma_danhmuc'].value = productItem['ma_danhmuc'];
            productForm.elements['id_dmphu'].value = productItem['id_dmphu'];
            productForm.elements['dac_biet'].value = productItem['dac_biet'];
            productForm.elements['addproductbtn'].value = "";
            productForm.elements['addproductbtn'].classList = "d-none";
            productForm.elements['resetbtn'].classList = "d-none";
            productForm.elements['addproductbtn'].setAttribute("name", "editproductbtn");

            for(const input of productForm) {
                console.log("input: ", input);
                input.readOnly = true;
            }
        })
    });
}


function deleteProduct(btnElement,productId) {
    // event.preventDefault();
    // const rowElement = getParent(btnElement, "tr");
    // console.log('delete: ', btnElement);
    
    alertModal(`Bạn có muốn xóa sản phẩm #${productId}  này ?`, "Chọn tiếp tục để xóa, chọn đóng để trở lại");

    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
     
        $.ajax({
            type: "POST",
            url: "./logic/product.php?act=deleteproduct",
            data: {
                id: productId
            },
            // dataType: "dataType",
            success: function (response) {
                $("#cartModalBtn").trigger("click");
                // const ROOT_URL = location.origin +"/PRO1014_DA1/main-project";
                // location.assign("index.php?act=deleteproduct&id="+productId);
                const productTableContentUrl = `${ADMIN_URL}/view/pages/products/table-product-content.php`;
                    console.log('url: ', productTableContentUrl);
                    $.get(productTableContentUrl, function(responseHtml) {
                        $("#table-product-content").html(responseHtml);
                    })
                    $("#liveToastBtn").trigger("click");
                    $("#toast-content").html(`<strong id="toast-content" class="me-auto">Sản phẩm #${productId}</strong>`);
                    $("#liveToast .toast-body").text(`Bạn đã sản phẩm #${productId} khỏi danh sách ` );
              
            }
        });


        
    })
}

function alertModal(title, message) {
    $("#cartModalBtn").trigger("click");
    $("#cartModal #cartModalLabel").text(`${title}`);
    $("#cartModal .modal-body").text(`${message}`);
}

$(document).ready(function(){
    $('.image-list').slick({
        speed: 700,
        arrows: true,
        margin: 30,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="arrow-prev"><i class="zmdi zmdi-long-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="arrow-next"><i class="zmdi zmdi-long-arrow-right"></i></button>',
        responsive: [
            { breakpoint: 991, settings: { slidesToShow: 3 }  },
            { breakpoint: 767, settings: { slidesToShow: 1 }  },
            { breakpoint: 479, settings: { slidesToShow: 1 }  }
        ]
    
    });
  });