// JavaScript to toggle the custom dropdown
const customDropdownButton = document.getElementById('custom-dropdown-button');
const customDropdownMenu = document.getElementById('custom-dropdown-menu');
const customSearchInput = document.getElementById('custom-search-input');
const selectedOption = document.getElementById('selected-option');
const customOptions = document.getElementById('custom-options');
let isCustomDropdownOpen = true; // Set to true to open the dropdown by default

// Function to toggle the custom dropdown state
function toggleCustomDropdown() {
  isCustomDropdownOpen = !isCustomDropdownOpen;
  customDropdownMenu.classList.toggle('hidden', !isCustomDropdownOpen);
}

// Set initial state
toggleCustomDropdown();

customDropdownButton.addEventListener('click', () => {
  toggleCustomDropdown();
});

// Handle click on an option
customOptions.addEventListener('click', (event) => {
  if (event.target && event.target.classList.contains('block')) {
    selectedOption.textContent = event.target.textContent.trim();
    toggleCustomDropdown();
  }
});

// Add event listener to filter items based on input
customSearchInput.addEventListener('input', () => {
  const searchTerm = customSearchInput.value.toLowerCase();
  const options = customOptions.querySelectorAll('[role="option"]');

  options.forEach((option) => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchTerm)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});



function buscarProducto() {
  const barcode = document.getElementById("barcodeInput").value;
  if (barcode) {
      fetch(`facturador/buscador?barcode=${barcode}`)
          .then(response => response.json())
          .then(data => {
              if (data) {
                  agregarProductoATabla(data);
                  actualizarStock(data.id, data.cantidad);
              } else {
                  alert("Producto no encontrado.");
              }
          })
          .catch(error => console.error("Error:", error));
  }
}

function agregarProductoATabla(producto) {
  const tableBody = document.querySelector("tbody");

  // Buscar si el producto ya está en la tabla
  let existingRow = null;
  for (let row of tableBody.rows) {
      if (row.cells[0].textContent === producto.codigo_barras) {
          existingRow = row;
          break;
      }
  }

  if (existingRow) {
      // Si el producto ya existe, actualiza la cantidad y el precio total
      const cantidadCell = existingRow.cells[2];
      const precioCell = existingRow.cells[3];

      let cantidadActual = parseInt(cantidadCell.textContent);
      let nuevaCantidad = cantidadActual + producto.cantidad;
      cantidadCell.textContent = nuevaCantidad;

      // Calcular el nuevo precio total
      let precioUnitario = producto.precio;
      let nuevoPrecioTotal = precioUnitario * nuevaCantidad;
      precioCell.textContent = `$${nuevoPrecioTotal}`;
  } else {
      // Si el producto no existe, agrega una nueva fila
      const row = document.createElement("tr");

      row.innerHTML = `
  <td class="p-2 font-medium">${producto.codigo_barras}</td>
  <td class="p-2 font-medium">${producto.nombre}</td>
  <td class="p-2 font-medium">${producto.cantidad}</td>
  <td class="p-2 font-medium">$${producto.precio_total}</td>
  <td>
      <div class="flex gap-4 justify-center items-center">
          <a href="#" class="eliminar-producto hover:text-rojo hover:text-lg text-azul_oscuro">
              <i class="fa-solid fa-trash-can"></i>
          </a>
      </div>
  </td>
`;
      // Añadir el evento de eliminación
      row.querySelector(".eliminar-producto").addEventListener("click", function (event) {
          event.preventDefault();
          eliminarProducto(row);
      });

      tableBody.appendChild(row);
  }
  // Limpiar el input después de agregar el producto
document.getElementById("barcodeInput").value = "";

}
// Función para eliminar un producto (fila) de la tabla
function eliminarProducto(row) {
  row.remove();
}

