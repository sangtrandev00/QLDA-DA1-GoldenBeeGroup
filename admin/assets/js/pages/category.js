function deleteCate(cateId) {
    event.preventDefault();
    console.log('delete: ', cateId);
  
    $("#cartModal .action-btn").removeClass("d-none");
    alertModal("Bạn có muốn xóa danh mục này ?", "Chọn tiếp tục để xóa, chọn đóng để trở lại");
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("index.php?act=deletecate&id="+cateId);

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
                }
            }
        });
    })

}

function deleteSubcate(subCateId, cateId) {
    // event.preventDefault();
    console.log('delete: ', subCateId);
  
    alertModal("Bạn có muốn xóa danh mục này ?", "Chọn tiếp tục để xóa, chọn đóng để trở lại");
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("index.php?act=deletesubcate&subid="+subCateId +"&cateid="+cateId);
    })

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
                currentForm.querySelector(".cate-img").src = image ;
                $("#cartModal #cate-form").attr("action", "./index.php?act=updatecate&id="+cateId);
                // alertModal(`Điều chỉnh danh mục ${cateId}`, responseHtml);
            });

            // formElement.elements[0].value = name;
            // formElement.elements[3].value = desc;
            // formElement.elements[4].value = "Sửa danh mục";

            // console.log('inputCate: ', formElement.elements);

        // })
    // }

}

// editCate();