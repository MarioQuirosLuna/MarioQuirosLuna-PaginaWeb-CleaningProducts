<?php
    include_once 'public/php/header.php';
?>

    <div class="container containerHeightLogin">
        <div class="row justify-content-around text-center" style="margin-top: 20vh;">
            <div class="cont col-md-4 align-self-center text-white">
                <h1>Your Product Online</h1>
            </div>
            <div class="cont col-md-6 p-4 text-white">
                <form>
                    <div class="m-3">
                        <h2>Login</h2>
                    </div>
                    <div class="m-3">
                        <input type="text" name="nameLogIn" id="nameLogIn" placeholder="UserName" required>
                    </div>
                    <div class="m-3">
                        <input type="password" name="passwordLogIn" id="passwordLogIn" placeholder="Password" required>
                    </div>
                    <div class="m-3">
                        <button id="LogInBtn" class="btn btnPurple" type="button">Log In</button>
                    </div>
                    <div id="information"></div>
                </form>
                <a href="?controller=Login&action=showNewAccount">Create New Account</a>
            </div>
        </div>

    </div>


<?php
    include_once 'public/php/footer.php';
    include_once 'public/php/endFooter.php';
?>