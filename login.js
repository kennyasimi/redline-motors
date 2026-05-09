const form = document.getElementById("loginForm");
const message = document.getElementById("message");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    
    
    const response = await fetch(
        "http://localhost/redlinemotors/api-project/api/index.php/api/v1/login",
        {
            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({
                email: email,
                password: password
            })
        }
    );

    const data = await response.json();
    
    
    if (data.status === "success") {

        window.location.href = "index.php";

    } else {

        message.textContent = data.message;

    }

});

