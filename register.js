const form = document.getElementById("registerForm");
const message = document.getElementById("message");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const response = await fetch(
        "http://localhost/redlinemotors/api-project/api/index.php/api/v1/register",
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

        alert("Регистрация успешна!");

        window.location.href = "login.php";

    } else {

        message.textContent = data.message;

    }

});