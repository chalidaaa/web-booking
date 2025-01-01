// Select elements for Login Modal
const openLoginModalBtn = document.getElementById('login'); // Button ID for opening Login Modal
const closeLoginModalBtn = document.getElementById('closeLoginModalBtn'); // Close button in Login Modal
const loginModal = document.getElementById('loginModal'); // Login Modal

// Select elements for Register Modal
const openRegisterModalBtn = document.getElementById('regist'); // Button ID for opening Register Modal
const closeRegisterModalBtn = document.getElementById('closeRegisterModalBtn'); // Close button in Register Modal
const registerModal = document.getElementById('registerModal'); // Register Modal

// Select elements for Booking Popup
const openPopupBtn = document.getElementById('reservasi'); // Button ID for opening Booking Popup
const popupForm = document.getElementById('popupForm'); // Booking Popup
const closePopupBtn = document.getElementById('closePopup'); // Close button in Booking Popup

// Ensure the elements exist before adding event listeners to prevent errors

// Open Login Modal
if (openLoginModalBtn && loginModal) {
    openLoginModalBtn.addEventListener('click', () => {
        loginModal.style.display = 'flex'; // Open login modal
    });
}

// Close Login Modal
if (closeLoginModalBtn && loginModal) {
    closeLoginModalBtn.addEventListener('click', () => {
        loginModal.style.display = 'none'; // Close login modal
    });
}

// Open Register Modal
if (openRegisterModalBtn && registerModal) {
    openRegisterModalBtn.addEventListener('click', () => {
        registerModal.style.display = 'flex'; // Open register modal
    });
}

// Close Register Modal
if (closeRegisterModalBtn && registerModal) {
    closeRegisterModalBtn.addEventListener('click', () => {
        registerModal.style.display = 'none'; // Close register modal
    });
}

// Open Booking Popup
if (openPopupBtn && popupForm) {
    openPopupBtn.addEventListener('click', () => {
        popupForm.style.display = 'flex'; // Open booking popup
    });
}

// Close Booking Popup
if (closePopupBtn && popupForm) {
    closePopupBtn.addEventListener('click', () => {
        popupForm.style.display = 'none'; // Close booking popup
    });
}

// Close modals when clicking outside the content
window.addEventListener('click', (e) => {
    if (e.target === loginModal) {
        loginModal.style.display = 'none';
    }
    if (e.target === registerModal) {
        registerModal.style.display = 'none';
    }
    if (e.target === popupForm) {
        popupForm.style.display = 'none';
    }
});
