document.addEventListener("DOMContentLoaded", () => {
    const tableRow = document.querySelectorAll(".tbl-row");
    const addEmployeeButton = document.querySelector("#btn-add-employee");
    const cancelAddButton = document.querySelector("#btn-cancel-add");
    const addModal = document.querySelector("#add-modal").parentElement;
    const editButton = document.querySelectorAll(".btn-edit");
    const cancelEditButton = document.querySelector("#btn-cancel-edit");
    const editModal = document.querySelector("#edit-modal").parentElement;
    const deleteButton = document.querySelector(".btn-delete");
    const cancelDeleteButton = document.querySelector("#btn-cancel-delete");
    const closeDeleteMOdal = document.querySelector(".btn-close");
    const deleteModal = document.querySelector("#delete-modal").parentElement;

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
        element.addEventListener("click", () => {
            editModal.style.display = "grid";
        });
    });

    cancelEditButton.addEventListener("click", () => {
        editModal.style.display = "none";
    });

    editModal.addEventListener("submit", () => {
        this.style.display = "none";
    })

    deleteButton.addEventListener("click", () => {
        deleteModal.style.display = "grid";
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