document.addEventListener("DOMContentLoaded", () => {
    const tableRow = document.querySelectorAll(".tbl-row");
    const addEmployeeButton = document.querySelector("#btn-add-employee");
    const cancelAddButton = document.querySelector("#btn-cancel-add");
    const addModal = document.querySelector("#add-modal").parentElement;
    const editButton = document.querySelectorAll(".btn-edit");
    const cancelEditButton = document.querySelector("#btn-cancel-edit");
    const editModal = document.querySelector("#edit-modal").parentElement;
    const deleteButton = document.querySelectorAll(".btn-delete");
    const cancelDeleteButton = document.querySelector("#btn-cancel-delete");
    const closeDeleteMOdal = document.querySelector(".btn-close");
    const deleteModal = document.querySelector("#delete-modal").parentElement;
    const editId = document.querySelector("#editId");
    const delId = document.querySelector("#delId");
    let currentFirstName = "";
    let currentLastName = "";
    let currentUsername = "";
    let currentEmail = "";
    const editFirstName = document.querySelector("#editFirstName");
    const editLastName = document.querySelector("#editLastName");
    const editEmail = document.querySelector("#editEmail");
    const editUsername = document.querySelector("#editUsername");
    const editPassword = document.querySelector("#editPassword");
    const saveEditButton = document.querySelector("#btn-save-changes");

    addEmployeeButton.addEventListener("click", () => {
        addModal.style.display = "grid";
    });

    cancelAddButton.addEventListener("click", () => {
        addModal.style.display = "none";
    });

    addModal.addEventListener("submit", () => {
        this.style.display = "none";
    });

    editButton.forEach(element => {
        element.addEventListener("click", (event) => {
            editId.value = event.target.parentElement.parentElement.parentElement.firstElementChild.id.substring(4);
            currentFirstName = event.target.parentElement.parentElement.parentElement.children[0].innerText;
            currentLastName = event.target.parentElement.parentElement.parentElement.children[1].innerText;
            currentUsername = event.target.parentElement.parentElement.parentElement.children[2].innerText;
            currentEmail = event.target.parentElement.parentElement.parentElement.children[3].innerText;

            editFirstName.value = currentFirstName;
            editLastName.value = currentLastName;
            editUsername.value = currentUsername;
            editEmail.value = currentEmail;

            editModal.style.display = "grid";
            saveEditButton.disabled = true;
            saveEditButton.style.cursor = "not-allowed";
            saveEditButton.style.backgroundColor = "#63607e";

            console.log(`${editId.value} -- ${currentFirstName} -- ${currentLastName} -- ${currentUsername} -- ${currentEmail}`);
        });
    });

    cancelEditButton.addEventListener("click", () => {
        editModal.style.display = "none";
    });

    editModal.addEventListener("input", () => {
        if (editFirstName.value !== currentFirstName || editLastName.value !== currentLastName ||  editUsername.value !== currentUsername || editEmail.value !== currentEmail || editPassword.value !== "") {
            saveEditButton.disabled = false;
            saveEditButton.style.cursor = "pointer";
            saveEditButton.style.backgroundColor = "#433d8b";
        }
        else {
            saveEditButton.disabled = true;
            saveEditButton.style.cursor = "not-allowed";
            saveEditButton.style.backgroundColor = "#63607e";
        }
    });

    editModal.addEventListener("submit", () => {
        this.style.display = "none";
    });

    deleteButton.forEach(element => {
        element.addEventListener("click", (event) => {
            delId.value = event.target.parentElement.parentElement.parentElement.firstElementChild.innerText;
            deleteModal.style.display = "grid";
        });
    });

    closeDeleteMOdal.addEventListener("click", () => {
        deleteModal.style.display = "none";
    });

    cancelDeleteButton.addEventListener("click", () => {
        deleteModal.style.display = "none";
    });

    deleteModal.addEventListener("submit", () => {
        this.style.display = "none";
    });

    tableRow.forEach(element => {
        element.firstElementChild.style.paddingLeft = "20px";
        element.lastElementChild.style.paddingRight = "20px";
    });
});