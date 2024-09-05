// JavaScript to toggle the custom dropdown
const customDropdownButton2 = document.getElementById('custom-dropdown-button-2');
const customDropdownMenu2 = document.getElementById('custom-dropdown-menu-2');
const customSearchInput2 = document.getElementById('custom-search-input-2');
const selectedOption2 = document.getElementById('selected-option-2');
const customOptions2 = document.getElementById('custom-options-2');
let isCustomDropdownOpen2 = true; // Set to true to open the dropdown by default

// Function to toggle the custom dropdown state
function toggleCustomDropdown2() {
  isCustomDropdownOpen2 = !isCustomDropdownOpen2;
  customDropdownMenu2.classList.toggle('hidden', !isCustomDropdownOpen2);
}

// Set initial state
toggleCustomDropdown2();

customDropdownButton2.addEventListener('click', () => {
  toggleCustomDropdown2();
});

// Handle click on an option
customOptions2.addEventListener('click', (event) => {
  if (event.target && event.target.classList.contains('block')) {
    selectedOption2.textContent = event.target.textContent.trim();
    toggleCustomDropdown2();
  }
});

// Add event listener to filter items based on input
customSearchInput2.addEventListener('input', () => {
  const searchTerm = customSearchInput2.value.toLowerCase();
  const options = customOptions2.querySelectorAll('[role="option"]');

  options.forEach((option) => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchTerm)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});
