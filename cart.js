let cart = JSON.parse(localStorage.getItem("cart")) || [];

const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");

let total = 0;

if (cart.length === 0) {

    cartItems.innerHTML = "<h2>Your cart is empty 🛒</h2>";

} else {

    cart.forEach(function(item, index) {

        total += item.price;

        const div = document.createElement("div");

        div.className = "cart-item";

        div.innerHTML = `
            <h3>${item.name}</h3>
            <p>₹${item.price}</p>
            <button onclick="removeItem(${index})">
                Remove
            </button>
        `;

        cartItems.appendChild(div);
    });
}

cartTotal.textContent = total;


function removeItem(index) {

    cart.splice(index, 1);

    localStorage.setItem("cart", JSON.stringify(cart));

    location.reload();
}