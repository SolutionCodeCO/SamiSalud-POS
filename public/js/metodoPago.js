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
