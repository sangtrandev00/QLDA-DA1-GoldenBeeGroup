function deleteCate(cateId) {
    event.preventDefault();
    console.log('delete: ', cateId);
  
    alertModal("Bạn có muốn xóa danh mục này ?", "Chọn tiếp tục để xóa, chọn đóng để trở lại");
    $("#cartModal .action-btn").click(function(e) {
        e.preventDefault();
        location.assign("index.php?act=deletecate&id="+cateId);
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
            const image = rowElement.cells[3].innerText;
            const desc = rowElement.cells[4].innerText;
            console.log('document url', location);
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

editCate();