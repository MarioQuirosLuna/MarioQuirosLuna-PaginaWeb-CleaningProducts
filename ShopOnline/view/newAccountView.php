<?php
    include_once 'public/php/header.php';
?>

    <div class="container containerHeightLogin">
        <div class="row justify-content-around text-center" style="margin-top: 20vh;">
            <div class="cont col-md-4 align-self-center">
                <div class="col">
                    <h1>Your Product Online</h1>
                    <h2>New Account</h2>
                </div>
            </div>
            <div class="cont col-md-6 mt-5">
                <form class="p-3">
                    <div class="row justify-content-center mt-3">
                        <div class="col mt-1">
                            <input type="text" name="userNameSignUp" id="userNameSignUp" placeholder="UserName" required>
                        </div>
                        <div class="col mt-1">
                            <input type="text" name="lastNameSignUp" id="lastNameSignUp" placeholder="LastName" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col mt-1">
                            <input type="password" name="userPassword1SignUp" id="userPassword1SignUp" placeholder="Password" required>
                        </div>
                        <div class="col mt-1">
                            <input type="password" name="userPassword2SignUp" id="userPassword2SignUp" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col mt-1">
                            <select name="userGenderSignUp" id="userGenderSignUp">
                                <option value="M">M</option>
                                <option value="F">F</option>
                                <option value="O">Other</option>
                            </select>
                        </div>
                        <div class="col mt-1">
                            <input type="number" name="userAgeSignUp" id="userAgeSignUp" placeholder="Age" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col mt-1">
                            <textarea name="userAddressSignUp" id="userAddressSignUp" class="form-control" placeholder="Address" required></textarea>
                        </div>    
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            <button id="SignUp" class="btn btnPurple" type="button">Sign Up</button>
                        </div>
                        <div id="informationSingUp"></div>
                    </div>
                </form> 
            </div>
        </div>
    </div>

<?php
    include_once 'public/php/footer.php';
    include_once 'public/php/endFooter.php';
?>