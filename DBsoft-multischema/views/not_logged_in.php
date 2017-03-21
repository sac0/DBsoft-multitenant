<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>
        <form class="form" action='index.php' method='post'>
            <label for="comp_name">Organization</label>
            <input type="text" name="org_name" required />
            <label for="user_name">Username</label>
            <input type="text" name="user_name" required />


            <label for="user_password">Password</label>
            <input type="password" name="user_password" autocomplete="off" required />

            <button type="submit" id="login-button" >Login</button> <a href="register.php"><button type="button" id="login-button">register</button></a>
            
        </form>
        <?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo "<div>".$error."</div>";
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo "<div>".$message."</div>";
        }
    }
}
?>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </div>
    <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>