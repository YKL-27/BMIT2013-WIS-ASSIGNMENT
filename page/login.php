<?php
require '../_base.php';
//-----------------------------------------------------------------------------
if (is_post()) {
    $username    = req('username');
    $password = req('password');

    // Validate: username
    if ($username == '') {
        $_err['username'] = 'Required';
    }

    // Validate: password
    if ($password == '') {
        $_err['password'] = 'Required';
    }

    // Login user
    if (!$_err) {
        $stm = $_db->prepare('
            SELECT * FROM user
            WHERE username = ? AND password = ?
        ');
        $stm->execute([$username, $password]);
        $u = $stm->fetch();

        if ($u) {
            temp('info', 'Login successfully');
            login($u, "admin/dashboard.php");
        }
        else {
            $_err['password'] = 'Not matched';
        }
    }
}

// ----------------------------------------------------------------------------
$_title = 'LOGIN PAGE';
include '../_head.php';
?>

<form method="post" class="form">
    <label for="username">Username</label>
    <?= html_text('username', 'maxlength="100"') ?>
    <?= err('username') ?>
    <br>

    <label for="password">Password</label>
    <?= html_password('password', 'maxlength="100"') ?>
    <?= err('password') ?>
    <br>

    <section>
        <button>Login</button>
        <button type="reset">Reset</button>
    </section>
</form>

<?php
include '../_foot.php';