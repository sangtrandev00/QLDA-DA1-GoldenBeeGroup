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
            productForm.elements['id'].value = productId;

            CKEDITOR.replace( 'descriptionProductEditor' );
            CKEDITOR.replace( 'infoProductEditor' );
            
            $.ajax({

                type: "POST",
                url: ADMIN_URL+"/view/pages/products/product-images.php",
                data: {id: productId},
                // dataType: "dataType",
                success: function (response) {
                    $("#imageList").html(response);
                }
            });

            $("#cartModal #product-action-btn").click(function(e) {
                e.preventDefault();
                // console.log('clicked ');
               
                // console.log(CKEDITOR.instances.descriptionProductEditor.getData());
                
                // return;
                const formData = new FormData($('#cartModal #product-form')[0]);
                // console.log('form: ', formData);
                formData.append("mo_ta",CKEDITOR.instances.descriptionProductEditor.getData());
                formData.append("thong_tin",CKEDITOR.instances.infoProductEditor.getData())
                // return;
                $.ajax({
                    type: "POST",
                    url: "./logic/product.php?act=editproduct",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        
                        // const productTableContentUrl = `${ADMIN_URL}/view/pages/products/table-product-content.php`;
                        // console.log('url: ', productTableContentUrl);
                        // $.get(productTableContentUrl, function(responseHtml) {
                        //     $("#table-product-content").html(responseHtml);
                        // })

                        // console.log('res: ', JSON.parse(response));
                        const {status, content, error} = JSON.parse(response);
                        if(status== 1) {
                            $("#liveToastBtn").trigger("click");
                            $("#cartModal .close-modal-btn").trigger("click");
                            $("#toast-content-header").text(content);
                            $("#liveToast .toast-body").text("Chúc mừng bạn đã " + content);

                            setTimeout(() => {
                                location.reload();
                            }, 2000)
                        }else if(status == 0) {
                            showToast("Cập nhật sản phẩm", content);
                            
                            // Fill error here!!!
                            $(".product-name-error").text(error['product-name'] || "");
                            $(".desc-error").text(error['desc'] || "");
                            $(".info-error").text(error['info'] || "");
                            $(".images-error").text(error['images'] || "");
                            $(".price-error").text(error['price'] || "");
                            $(".discount-error").text(error['discount'] || "");
                            $(".quantity-error").text(error['quantity'] || "");
                            $(".cate-error").text(error['cate'] || "");
                            $(".subcate-error").text(error['subcate'] || "");

                        }
                    }
                });
            })
    });
    
    }
)
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
            productForm.elements['ma_danhmuc'].disabled = true;
            productForm.elements['id_dmphu'].value = productItem['id_dmphu'];
            productForm.elements['id_dmphu'].disabled = true;
            productForm.elements['dac_biet'].value = productItem['dac_biet'];
            productForm.elements['dac_biet'].disabled = true;
            productForm.elements['addproductbtn'].value = "";
            productForm.elements['addproductbtn'].classList = "d-none";
            productForm.elements['resetbtn'].classList = "d-none";
            productForm.elements['addproductbtn'].setAttribute("name", "editproductbtn");
            
            CKEDITOR.replace( 'descriptionProductEditor' );
            CKEDITOR.replace( 'infoProductEditor' );
            $("#image-input-group").addClass("d-none");
            for(const input of productForm) {
                console.log("input: ", input);
                input.readOnly = true;
            }

            $.ajax({
                type: "POST",
                url: ADMIN_URL+"/view/pages/products/product-images.php",
                data: {id: productId},
                // dataType: "dataType",
                success: function (response) {
                    $("#imageList").html(response);
                }
            });
        })
    });
}

function deleteProduct(btnElement,productId) {
    // event.preventDefault();
    // const rowElement = getParent(btnElement, "tr");
    // console.log('delete: ', btnElement);
    $('#cartModal .action-btn').removeClass('d-none');
    alertModal(`Bạn có muốn xóa sản phẩm #${productId}  này ?`, "Chọn tiếp tục để xóa, chọn đóng để trở lại");

    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        
        location.assign("./index.php?act=deleteproduct&id="+productId);
        // $.ajax({
        //     type: "POST",
        //     url: "./logic/product.php?act=deleteproduct",
        //     data: {
        //         id: productId
        //     },
        //     // dataType: "dataType",
        //     success: function (response) {
        //         $("#cartModalBtn").trigger("click");
        //         // const ROOT_URL = location.origin +"/PRO1014_DA1/main-project";
        //         // location.assign("index.php?act=deleteproduct&id="+productId);
        //         location.href="index.php?act=productlist";
        //         const productTableContentUrl = `${ADMIN_URL}/view/pages/products/table-product-content.php`;
        //             console.log('url: ', productTableContentUrl);
        //             $.get(productTableContentUrl, function(responseHtml) {
        //                 $("#table-product-content").html(responseHtml);
        //             })
        //             $("#liveToastBtn").trigger("click");
        //             $("#toast-content").html(`<strong id="toast-content" class="me-auto">Sản phẩm #${productId}</strong>`);
        //             $("#liveToast .toast-body").text(`Bạn đã xóa sản phẩm #${productId} khỏi danh sách ` );
                    
              
        //     }
        // });


        
    })
}

function alertModal(title, message) {
    $("#cartModalBtn").trigger("click");
    $("#cartModal #cartModalLabel").text(`${title}`);
    $("#cartModal .modal-body").text(`${message}`);
}

// $(document).ready(function(){
//     $('.image-list').slick({
//         speed: 700,
//         arrows: true,
//         margin: 30,
//         slidesToShow: 4,
//         slidesToScroll: 1,
//         prevArrow: '<button type="button" class="arrow-prev"><i class="zmdi zmdi-long-arrow-left"></i></button>',
//         nextArrow: '<button type="button" class="arrow-next"><i class="zmdi zmdi-long-arrow-right"></i></button>',
//         responsive: [
//             { breakpoint: 991, settings: { slidesToShow: 3 }  },
//             { breakpoint: 767, settings: { slidesToShow: 1 }  },
//             { breakpoint: 479, settings: { slidesToShow: 1 }  }
//         ]
    
//     });
//   });


  function filterByCate(cateItem) {
    console.log('changed', cateItem.value);

    $.ajax({
        type: "POST",
        url: ADMIN_URL+"/view/pages/products/table-product-content.php",
        data: {
            cateid: cateItem.value
        },
        // dataType: "dataType",
        success: function (responseHtml) {
                $("#table-product-content").html(responseHtml);
        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/products/table-product-database.php",
            data: {
                cateid: cateItem.value
            },
            // dataType: "dataType",
            success: function (response) {
                console.log('res: ', response);
                    const {product_list} = JSON.parse(response);
                    
                    $('#table-product').DataTable({
                        data: product_list,
                        retrieve: true,
                    });
            }
        });
        }
    });
  }

  function filterByDate(dateElement) {
    console.log('changed', dateElement.value);

    // SELECT *, CAST(ngay_nhap AS DATE) AS CURRENT_DATE_GFG from tbl_sanpham where CAST(ngay_nhap AS DATE) = "2023-03-11";
    const date = new Date(dateElement.value);
    console.log(`${date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate()}`)
    $.ajax({
        type: "POST",
        url: ADMIN_URL+"/view/pages/products/table-product-content.php",
        data: {
            datevalue: dateElement.value
        },
        // dataType: "dataType",
        success: function (responseHtml) {
                $("#table-product-content").html(responseHtml);
        $.ajax({
            type: "POST",
            url: ADMIN_URL+ "/view/pages/products/table-product-database.php",
            data: {
                datevalue: dateElement.value
            },
            // dataType: "dataType",
            success: function (response) {
                console.log('res: ', response);
                    const {product_list} = JSON.parse(response);
                    
                    $('#table-product').DataTable({
                        data: product_list,
                        retrieve: true,
                    });
            }
        });
        }
    });
  }

  
function onSelectCate(currentSelect) {

    $.ajax({
        type: "POST",
        url: "./logic/category.php?act=selectsubcate",
        data: {
            cateId: currentSelect.value
        },
        // dataType: "dataType",
        success: function (response) {
            const {subcates} = JSON.parse(response);
            console.log(subcates);
            let optionsHtml = ""; 
            [...subcates].forEach((subcate) => {
                optionsHtml+= `<option value='${subcate['id']}'>${subcate['ten_danhmucphu']}</option>`;
            })
            console.log(optionsHtml);
            $("#add-product-content select[name='id_dmphu']").html(optionsHtml);
            
        }
    });
}


function replyReview(idReview, idUser) {
    event.preventDefault();
    console.log('id', idReview, idUser);
    console.log(event.currentTarget);
    const currentRow = getParent(event.currentTarget, "tr");
    const reviewContent = currentRow.cells[3].textContent;
    $("#cartModalBtn").trigger("click");
    $("#cartModalLabel").text(`Trả lời Review #${idReview}`);
    $("#cartModal .modal-body").html(`<form id="reply-review-form" onsubmit="addReplyReview()" action=""><div className="form-group"><label htmlFor="">Nội dung bình luận</label><textarea  class="form-control" readonly>${reviewContent}</textarea></div> <div class="form-group mt-5"><label htmlFor="">Trả lời bình luận</label><textarea class="form-control" id="replyContent" placeholder="Bình luận ở đây!"></textarea></div></form>`);
    $("#cartModal .action-btn").removeClass('d-none');
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        console.log('submited');
        $.ajax({
            type: "POST",
            url: "./logic/product.php?act=addreplyreviews",
            data: {
                idUser,
                idReview,
                content: $("#replyContent").val()
            },
            // dataType: "dataType",
            success: function (response) {
                const {status, content} = JSON.parse(response);

                if(status == 1) {
                    showToast("Trả lời reviews", content);
                    setTimeout(() => {
                        location.reload();
                    }, 2000)
                }
            }
        });
    })

}

function updateReplyReview(idReview, idUser, idReply) {
    event.preventDefault();
    const currentRow = getParent(event.currentTarget, "tr");
    const reviewContent = currentRow.cells[3].textContent;

    $.ajax({
        type: "GET",
        url: "./logic/product.php?act=getreplyreview",
        data: {
            idReply
        },
        // dataType: "dataType",
        success: function (response) {
            const {status, content: {
                content,
                date_modified,
                id_reply,
                id_review,
                id_user
            }} = JSON.parse(response);
            
        $("#cartModalBtn").trigger("click");
        $("#cartModalLabel").text(`Trả lời Review #${idReview}`);
        $("#cartModal .modal-body").html(`<form id="reply-review-form" onsubmit="updateReplyReview()" action=""><div className="form-group"><label htmlFor="">Nội dung bình luận</label><textarea  class="form-control" readonly>${reviewContent}</textarea></div> <div class="form-group mt-5"><label htmlFor="">Trả lời bình luận</label><textarea class="form-control" id="replyContent" placeholder="Bình luận ở đây!">${content}</textarea></div></form>`);
        $("#cartModal .action-btn").removeClass('d-none');

        $("#cartModal .action-btn").click(function(e) {
            e.preventDefault();
            console.log('submited');
            $.ajax({
                type: "POST",
                url: "./logic/product.php?act=updateReplyReviews",
                data: {
                    idUser,
                    idReview,
                    content: $("#replyContent").val(),
                    idReply
                },
                // dataType: "dataType",
                success: function (response) {

                    const {status, content} = JSON.parse(response);

                    if(status == 1) {
                        showToast("Cập nhật reviews", content);
                        setTimeout(() => {
                            location.reload();
                        }, 2000)
                    }
                }
            });
        })
        }
    });

}
