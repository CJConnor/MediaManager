/**
 * Registers a user
 * @return {boolean}
 */
function register() {

    // Grabs input elements
    let formElements = document.getElementsByTagName('input');

    // Loops through input elements
    for (let i = 0, formElement; formElement = formElements[i++];) {

        let elementId   = formElement.id;
        let elementVal  = formElement.value;
        let elementName = formElement.name;

        // If any are empty then return false and alert the user
        if (elementVal === "" && elementName != "confPassword") {
            document.getElementById('register-alert').innerHTML = `Please enter your ${elementName}.`;
            return false;
        }

        if (!confirmPassword()) {
            return false;
        }

    }

    // Build form data
    const formData = new FormData();
    formData.append("forename", $('#forename').val());
    formData.append("surname", $('#surname').val());
    formData.append("username", $('#username').val());
    formData.append("email", $('#email').val());
    formData.append("password", $('#password').val());

    // Send data in a request
    fetch("act/register/register.php", {method: "post", body: formData})
        .then((response) => response.text())
        .then((data) => {
            if (data.includes("success")) {
                setTimeout(window.location = 'home', 1500);
            } else {
                document.getElementById('register-alert').innerHTML = `Oops there appears to have been an error`;
            }
        }
    );

}

/**
 * Confirms the users password
 * @return {boolean}
 */
function confirmPassword() {
    let password     = document.getElementById('password').value;
    let confPassword = document.getElementById('confPassword').value;

    if (password === "") {
        document.getElementById('register-alert').innerHTML = `Your password cannot be empty.`;
        return false;
    } else if (password != confPassword) {
        document.getElementById('register-alert').innerHTML = `Your passwords must match.`;
        return false;
    }

    return true;
}