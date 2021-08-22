$(function() {

    $('#addAdminBtn').on('click', () => {
        addAdmin(
            $('#nameAdmin').val(),
            encryptData($('#password1').val()),
        );
    });

    $('#SignUp').on('click', () => {
        addUser(
            $('#userNameSignUp').val(),
            $('#lastNameSignUp').val(),
            encryptData($('#userPassword1SignUp').val()), 
            $('#userAgeSignUp').val(), 
            $('#userGenderSignUp').val(), 
            $('#userAddressSignUp').val()
        );
    });

    $('#LogInBtn').on('click', () => {
        getUser($('#nameLogIn').val(),encryptData($('#passwordLogIn').val()));
    });
    
    $('#LogOutBtn').on('click', () => {
        closeSessionUser();
    });
});

function startSessionUser(_user,_role){
    var data = {"nameUserActive": _user, "role": _role};
    $.ajax(
        {
            data: data,
            url: 'public/php/openSession.php',
            type: 'POST',
            beforeSend: function () {
                
            },
            success: function () {
                $(location).attr('href',url+'?controller=Home&action=showHome');
            }
        }
    );
}

function startSessionAdmin(_user,_role){
    var data = {"nameUserActive": _user,"role":_role};
    $.ajax(
        {
            data: data,
            url: 'public/php/openSession.php',
            type: 'POST',
            beforeSend: function () {
                
            },
            success: function () {
                $(location).attr('href',url+'?controller=AdminHome&action=showAdminHome');
            }
        }
    );
}

function closeSessionUser(){
    var data = {"closeSession":true};
    $.ajax(
        {
            data: data,
            url: 'public/php/closeSession.php',
            type: 'GET',
            beforeSend: function () {
                
            },
            success: function () {
                $(location).attr('href',url);
            }
        }
    );
}