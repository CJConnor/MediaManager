<!-- Form Start -->

<div id="login-alert" class="my-4"></div>

<!-- Username -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" class="form-control shadow-sm" id="username" name="username" aria-describedby="usernameHelp" placeholder="Username">


<!-- Password -->
<div class="input-group my-4">
    <div class="input-group-prepend shadow-sm">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Password">
</div>

<!-- Login Button -->
<button type="button" class="btn btn-dark btn-block shadow" onclick="login();">Login</button>
<button type="button" class="btn btn-dark btn-block shadow" onclick="window.location = 'register';">Register</button></div>

<!-- Form End -->