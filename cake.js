function shopNow() {
    window.location.href = "products.php";
}


function addToCart(productName) {

    alert(productName + " has been added to your cart!");
}


function showOffer() {

    alert("🎉 Get 20% OFF on orders above ₹1000!");
}


function searchProduct() {

    let search =
        document.getElementById("searchBox").value.toLowerCase();

    let products =
        document.querySelectorAll(".product-card");

    products.forEach(function(product) {

        let name =
            product.querySelector("h3").innerText.toLowerCase();

        if (name.includes(search)) {

            product.style.display = "block";

        } else {

            product.style.display = "none";

        }

    });
}
