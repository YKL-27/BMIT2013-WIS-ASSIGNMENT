<?php
require '../../_base.php';
include "../../config/db.php";
// ----------------------------------------------------------------------------

// TODO: Check if username taken
// TODO: Validate password strength
if (is_post()) {    // Detect if data is sent by POST method
    
    $username   = req('username');
    $password   = req('password');
    $password2  = req('password2');
    $email      = req('email');

    $_err = [];

    // Validate username
    if ($username == '') {
        $_err['username'] = 'Required';
    }
    else if ((strlen($username) < 6) || (strlen($username) > 50)){
        $_err['username'] = 'Username must be in between 6 to 50 characters long';
    }
    else if (!preg_match('/^[A-Za-z0-9]+$/', $username)) {
        $_err['username'] = 'Username can only be consisted of alphabets and letter';
    }

    // Validate password
    if ($password == '') {
        $_err['password'] = 'Required';
    }
    else if ((strlen($password) < 6) || (strlen($password) > 50)){
        $_err['password'] = 'Password must be in between 6 to 50 characters long';
    }
    
    // Validate second password
    if ($password2 == '') {
        $_err['password2'] = 'Required';
    }
    else if ((strlen($password) < 6) || (strlen($password) > 50)){
        $_err['password2'] = 'Password does not match';
    }

    // Validate email
    if ($email == '') {
        $_err['email'] = 'Required';
    }
    else if ((strlen($email) > 50)){
        $_err['email'] = 'Email too long';
    }
    else if (!preg_match('/^[a-zA-Z0-9_.±]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/', $email)) {
        $_err['email'] = 'Email format invalid';
    }
    
    // Output
    if (!$_err) { 
        $stm = $_db->prepare('INSERT INTO member(username, password, email) VALUES(?, ?, ?)');
        $stm->execute([$username, $password, $email]);
        temp('info', "Registered  $username"); 
        redirect('login.php');
    }
    
}

// ----------------------------------------------------------------------------
$_title = 'REGISTER';
include '../../_head.php';
?>

<form method="post" class="form">
    <label for="username">Username</label>
    <?= html_reqtext('username', 'maxlength="20"') ?>
    <?= err('username') ?>
    <br>
    

    <label>Password</label>
    <?= html_password('password') ?>
    <?= err('password') ?>
    <br>

    <label>Password Again</label>
    <?= html_password('password2') ?>
    <?= err('password2') ?>
    <br>

    <label>Email</label>
    <?= html_reqtext('email') ?>
    <?= err('email') ?>
    <br>

    <section>
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </section>
</form>

<a href="login.php">Return to login</a>


<?php
include '../../_foot.php';