function deleteCate(cateId) {
    event.preventDefault();
    console.log('delete: ', cateId);
  
    $("#cartModal .action-btn").removeClass("d-none");
    alertModal("Bạn có muốn xóa danh mục này ?", "Chọn tiếp tục để xóa, chọn đóng để trở lại");
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("index.php?act=deletecate&id="+cateId);

     
    })

}

function deleteSubcate(subCateId, cateId) {
    // event.preventDefault();
    console.log('delete: ', subCateId);
    $("#cartModal .action-btn").removeClass("d-none");
    alertModal("Bạn có muốn xóa danh mục này ?", "Chọn tiếp tục để xóa, chọn đóng để trở lại");
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("index.php?act=deletesubcate&subid="+subCateId +"&cateid="+cateId);

        // $.ajax({
        //     type: "POST",
        //     url: "./logic/category.php?act=deletesubcate",
        //     data: {
        //         subid: subCateId,
        //         cateid: cateId
        //     },
        //     dataType: "dataType",
        //     success: function (response) {
        //         console.log('res', response);
        //         const {status, message } = JSON.parse(response);
        //         if(status == 1) {
        //             showToast(message, `Danh mục phụ #${subCateId} ,${message}`);
        //         }
        //     }
        // });
    })

}

function editSubcate(subCateId, cateId) {
    const subcateContentFormUrl = ADMIN_URL + '/view/pages/categories/subcate-form.php';
    $.ajax({
        type: "POST",
        url: subcateContentFormUrl,
        data: {
            subid: subCateId,
            cateid: cateId
        },
        // dataType: "dataType",
        success: function (responseHtml) {
            $("#cartModalLabel").text(`chỉnh sửa danh mục phụ #${subCateId}`);
            
            // $("#cartModalLabel").text(`chỉnh sửa danh mục phụ #${subCateId}`);
            $("#cartModal .modal-body").html(responseHtml);
            
            $("#cartModalBtn").trigger("click");
            $("#cartModal .submit-action-btn").val("Sửa danh mục phụ");
            // console.log();
            $("#cartModal #subcate-form").submit(function(e) {
                e.preventDefault();

                // console.log('submited');
                const formData = new FormData($("#cartModal #subcate-form")[0]);
                formData.append("subid", subCateId);
                $.ajax({
                    type: "POST",
                    url: "./logic/category.php?act=editsubcate",
                    contentType: false,
                    data: formData,
                    // dataType: "dataType",
                    processData: false,
                    success: function (response) {
                        showToast("Cập nhật danh mục phụ", "Chúc mừng cập nhật danh mục phụ thành công!");
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                });
            })
            // console.log('res:' , responseHtml);

        }
    });
}


function alertModal(title, message) {
    $("#cartModalBtn").trigger("click");
    $("#cartModal #cartModalLabel").text(`${title}`);
    $("#cartModal .modal-body").text(`${message}`);
}

const editCate = (cateId) => {
    // const editCateBtns = document.querySelectorAll('.cate-edit-link');

    // for (const editCateBtn of editCateBtns) {
    //     console.log('edit', editCateBtn);

    //     editCateBtn.addEventListener('click', (event) => {

            console.log('this', event.currentTarget);
            const rowElement = event.currentTarget.parentElement.parentElement.parentElement;
            console.log('rowElement: ', rowElement);

            $("#cartModalBtn").trigger("click");


            const name = rowElement.cells[2].innerText;
            const image = rowElement.cells[3].querySelector("img").src;
            const desc = rowElement.cells[4].innerText;
            console.log('image', image);
            $.get("./view/pages/categories/cate-form.php", function(responseHtml) {
                // console.log('res: ', responseHtml);
                
                $("#cartModal #cartModalLabel").text(`Điều chỉnh danh mục #${cateId}`)
                $("#cartModal .modal-body").html(responseHtml);
                $("#cartModal .submit-action-btn").val("Sửa danh mục ");
                $("#cartModal .submit-action-btn").attr("name", "editcatebtn");
                const currentForm = document.querySelector("#cartModal #cate-form");
                console.log('form: ', currentForm);
                currentForm.elements['catename'].value= name;
                currentForm.elements['catedesc'].textContent= desc;
                currentForm.elements['id'].value = cateId;
                currentForm.querySelector(".cate-img").src = image ;
                $("#cartModal #cate-form").attr("action", "./index.php?act=updatecate&id="+cateId);
                // alertModal(`Điều chỉnh danh mục ${cateId}`, responseHtml);

                $("#cartModal .submit-action-btn").click(function(e) {
                    e.preventDefault();
                    const formData = new FormData($('#cartModal #cate-form')[0]);
        
                    $.ajax({
                        type: "POST",
                        url: "./logic/category.php?act=editcate",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            const cateTableContent = `${ADMIN_URL}/view/pages/categories/table-cate-content.php`;
                            console.log('url: ', cateTableContent);
                            $.get(cateTableContent, function(responseHtml) {
                                $("#table-cate-content").html(responseHtml);
                            })
            
                            console.log('res: ', JSON.parse(response));
                            const {status, message} = JSON.parse(response);
                            if(status== 1) {
                                $("#liveToastBtn").trigger("click");
                                $("#cartModal .close-modal-btn").trigger("click");
                                $("#toast-content-header").text(message);
                                $("#liveToast .toast-body").text("Chúc mừng bạn đã " + message);
                            }else {
                                $("#liveToastBtn").trigger("click");
                                // $("#cartModal .close-modal-btn").trigger("click");
                                $("#toast-content-header").text(message);
                                $("#liveToast .toast-body").text("Mời nhập lại do " + message);

                            }
                        }
                    });
                })
            });

            
            // formElement.elements[0].value = name;
            // formElement.elements[3].value = desc;
            // formElement.elements[4].value = "Sửa danh mục";

            // console.log('inputCate: ', formElement.elements);

        // })
    // }

}

function addCate() {

}

// editCate();