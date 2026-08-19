// Initialize cart array from localStorage, or empty if nothing exists
let cart = JSON.parse(localStorage.getItem('bakery_cart')) || [];

document.addEventListener('DOMContentLoaded', () => {
    updateCartUI();
    setupEventListeners();
});

function setupEventListeners() {
    // Handle 'Add to Cart' click events
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.product-card');
            const qtyInput = card.querySelector('.item-qty');
            const errorSpan = card.querySelector('.error-msg');
            
            // 1. Validate Input
            const quantity = parseInt(qtyInput.value);
            const isValid = validateQuantity(quantity, qtyInput, errorSpan);
            
            if (isValid) {
                // 2. Extract product details
                const product = {
                    id: card.dataset.id,
                    name: card.dataset.name,
                    price: parseFloat(card.dataset.price),
                    quantity: quantity
                };
                
                // 3. Add to Cart Array
                addToCartArray(product);
                
                // Visual success feedback
                button.textContent = "Added! ✓";
                button.style.backgroundColor = "#2e7d32";
                setTimeout(() => {
                    button.textContent = "Add to Cart";
                    button.style.backgroundColor = "#b5651d";
                }, 1200);
            }
        });
    });

    // Handle Clear Cart click
    document.getElementById('clear-cart').addEventListener('click', () => {
        cart = [];
        saveAndRefreshCart();
    });
}

// Validation logic helper
function validateQuantity(qty, inputEl, errorEl) {
    const maxLimit = parseInt(inputEl.max) || 10;
    const minLimit = parseInt(inputEl.min) || 1;

    if (isNaN(qty) || qty < minLimit) {
        errorEl.textContent = `Please order at least ${minLimit} item.`;
        return false;
    }
    if (qty > maxLimit) {
        errorEl.textContent = `Fresh daily! Maximum order is ${maxLimit} per customer.`;
        return false;
    }
    
    errorEl.textContent = ""; // Clear errors if valid
    return true;
}

// Core Cart State Manipulation
function addToCartArray(newProduct) {
    // Check if item already exists in the cart array
    const existingItemIndex = cart.findIndex(item => item.id === newProduct.id);
    
    if (existingItemIndex > -1) {
        // Update existing item quantity
        cart[existingItemIndex].quantity += newProduct.quantity;
    } else {
        // Push brand new product
        cart.push(newProduct);
    }
    
    saveAndRefreshCart();
}

// Sync UI changes with updated local state
function saveAndRefreshCart() {
    localStorage.setItem('bakery_cart', JSON.stringify(cart));
    updateCartUI();
}

// UI Rendering Engine
function updateCartUI() {
    const listElement = document.getElementById('cart-items-list');
    const countElement = document.getElementById('cart-count');
    
    listElement.innerHTML = '';
    let totalItems = 0;
    
    cart.forEach(item => {
        totalItems += item.quantity;
        const li = document.createElement('li');
        li.textContent = `${item.name} x${item.quantity} - ₹${(item.price * item.quantity).toFixed(2)}`;
        listElement.appendChild(li);
    });
    
    countElement.textContent = totalItems;
}
