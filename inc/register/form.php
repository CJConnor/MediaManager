<!-- Form Start -->

<div id="register-alert" class="my-4 alert-danger"></div>

<!-- Forename -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" class="form-control shadow-sm" id="forename" name="forename" aria-describedby="fornameHelp" placeholder="Forename">
</div>

<!-- Surname -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" class="form-control shadow-sm" id="surname" name="surname" aria-describedby="surnameHelp" placeholder="Surname">
</div>

<!-- Email -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
    </div>
    <input type="text" class="form-control shadow-sm" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
</div>

<!-- Username -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" class="form-control shadow-sm" id="username" name="username" aria-describedby="usernameHelp" placeholder="Username">
</div>

<!-- Password -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Password">
</div>

<!-- Confirm Password -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" class="form-control shadow-sm" id="confPassword" name="confPassword" placeholder="Confirm Password">
</div>

<!-- Login Button -->
<button type="button" class="btn btn-dark btn-block shadow" onclick="register();">Register</button>

<!-- Form End -->