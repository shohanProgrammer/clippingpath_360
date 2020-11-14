<?php
if (isset($_GET['name']) ){
    $errormsg = $_GET['name'];
}
else $errormsg = null;
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">

    <title>Login-Clipping Path 360</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel = "stylesheet" type = "text/css"
            href = "<?php echo base_url(); ?>css/log-style.css">
  </head>

  <body>
  <div class="login">"
      <h1>Login</h1>
      <form method="post" action="login/index">
          <input type="email" name="email" placeholder="Email" required="required" />
          <input type="password" name="password" placeholder="Password" required="required" />
          <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
      </form>
  </div>
  </body>
</html>
