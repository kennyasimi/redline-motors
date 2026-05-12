const form = document.getElementById("passwordchangeForm");
const message = document.getElementById("message");

const userId = document.getElementById("user_id").value;

const deleteBtn = document.getElementById("deleteAccountBtn");


// CHANGE PASSWORD

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const oldPassword =
        document.getElementById("old_password").value;

    const newPassword =
        document.getElementById("new_password").value;

    const confirmPassword =
        document.getElementById("confirm_password").value;


    // check passwords match

    if (newPassword !== confirmPassword) {

        message.textContent =
            "New passwords do not match";

        return;
    }


    // send request to API

    const response = await fetch(

        `http://localhost/redlinemotors/api-project/api/index.php/api/v1/users/${userId}`,

        {
            method: "PATCH",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({
                old_password: oldPassword,
                password: newPassword
            })
        }
    );


    const data = await response.json();

    message.textContent = data.message;

});



// DELETE ACCOUNT

deleteBtn.addEventListener("click", async () => {

    console.log("DELETE BUTTON CLICKED");

    const confirmDelete = confirm(
        "Вы уверены, что хотите удалить аккаунт?"
    );

    if (!confirmDelete) {
        return;
    }
    

    const response = await fetch(

        `http://localhost/redlinemotors/api-project/api/index.php/api/v1/users/${userId}`,

        {
            method: "DELETE"
        }
    );


    const data = await response.json();

    alert(data.message);

    window.location.href = "logout.php";

});