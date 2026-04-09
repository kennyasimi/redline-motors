let cart = [];

const savedCart = localStorage.getItem("cart")

if (savedCart) {
    cart = JSON.parse(savedCart);
}

const buttons = document.querySelectorAll(".add-to-cart");
const cartDiv = document.querySelector("#cart");
const totaltext = document.querySelector("#total");
const payBtn = document.querySelector("#pay");
const clearBtn = document.querySelector("#clear");
const filter = document.querySelector("#filter");
const products = document.querySelectorAll(".car");


buttons.forEach(button =>{
    button.addEventListener("click", function() {
        const product = this.parentElement;
        const price = Number(product.dataset.price); //number transforms the price to a digit type
        const name = product.querySelector("h2").textContent;

        cart.push({name: name, price: price});
        saveCart();
        renderCart();
    });
});


const renderCart = () =>{
    cartDiv.innerHTML = "";

    cart.forEach((item, index) =>{

        const p = document.createElement("p");
        p.textContent = item.name + " - " + item.price

        const btn = document.createElement("button");
        btn.textContent = "Удалить";

        btn.addEventListener("click",() =>{
            cart.splice(index, 1);
            saveCart();
            renderCart();
        });
        cartDiv.appendChild(p);
        cartDiv.appendChild(btn);
    });
    calculateTotal();
};


const calculateTotal = () => {
    let total = 0;
    cart.forEach(item => total += item.price);
    totaltext.textContent = "Итого: " + total;
};


payBtn.addEventListener("click", () => {
    if(cart.length === 0){
        alert("Корзина пуста");
        return;
    }
    alert("Покупка прошла успешно!");

    cart = [];
    saveCart();
    renderCart();
});


clearBtn.addEventListener("click", () => {
    cart = [];
    saveCart();
    renderCart();
});



filter.addEventListener("change", () => {
    const value = filter.value;
    products.forEach(product => {
        if(value === "all" || product.dataset.category === value){
            product.style.display = "block";
        }else{
            product.style.display = "none";
        }
    });
});

const saveCart = () => {
    localStorage.setItem("cart", JSON.stringify(cart));
};

renderCart();