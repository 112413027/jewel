function addToCart(productName, price) {

    const button = event.target;

    // Change button appearance
    button.style.backgroundColor = "green";
    button.style.color = "white";
    button.classList.add("added");
    button.textContent = "✓ Added to Cart";
    button.disabled = true;

    // Get existing cart
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Add product
    cart.push({
        name: productName,
        price: price
    });

    // Save cart
    localStorage.setItem("cart", JSON.stringify(cart));

    // Message
    const message = document.getElementById("cart-message");
    message.textContent = productName + " added to cart!";

    setTimeout(function () {
        message.textContent = "";
    }, 2000);
}