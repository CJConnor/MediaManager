/**
 * Sends login request
 */
function login() {

    // Build login data
    const formData = new FormData();
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch("act/login/login.php", {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {
            // If password matches
            if(html.includes('success')) {
                document.getElementById('login-alert').innerHTML = `<div class="alert alert-success" role="alert">Success</div>`;
                window.location.href = 'home';

                // If password doesn't match
            } else {
                document.getElementById('login-alert').innerHTML = `<div class="alert alert-danger" role="alert">Incorrect login details</div>`;
            }
        }
    );

}