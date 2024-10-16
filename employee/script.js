document.addEventListener("DOMContentLoaded", () => {
    const tableRow = document.querySelectorAll(".tbl-row");
    tableRow.forEach(element => {
        element.firstElementChild.style.paddingLeft = "20px";
        element.lastElementChild.style.paddingRight = "20px";
    });
});