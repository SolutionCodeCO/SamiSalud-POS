document.getElementById("searchInput").addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll("tbody tr");

    rows.forEach(row => {
        const codigoBarras = row.cells[0].textContent.toLowerCase();
        const nombreProducto = row.cells[1].textContent.toLowerCase();
        const precioProducto = row.cells[4].textContent.toLowerCase();

        if (codigoBarras.includes(searchValue) || nombreProducto.includes(searchValue) || precioProducto.includes(searchValue)) {
            row.style.display = ""; // Mostrar la fila
        } else {
            row.style.display = "none"; // Ocultar la fila
        }
    });
});