<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>index</title>
</head>
<body>
        <nav class="navbar navbar-expand-sm bg-light">
        <ul class="navbar-nav">
            <?php
                if (isset($SESSION["userid"])) {
             ?>     
                    <li class="nav-item">
                    <a class="nav-link" href=""> <?php echo $_SESSION["userid"]; ?></a>
                    </li>  
                    <li class="nav-item">
                    <a class="nav-link" href="includes/logout.inc.php">LOGUOT</a>
                    </li>        
            <?php
                }
                else {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">LOG IN</a>
                    </li>
                    <?php
                }
                ?>
        </ul>
        </nav>
        <br>

    <section>
    <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
    <div class="container">
        <h2>Log-in</h2>
        <form action="includes/login.inc.php" method = "post">
            <div class="form-group">
            <label for="username-login">Username:</label>
            <input type="text" class="form-control" id="username-login" placeholder="Enter username" name="username-login">
            </div>
            <div class="form-group">
            <label for="pwd-login">Password:</label>
            <input type="password" class="form-control" id="pwd-login" placeholder="Enter password" name="pwd-login">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
    <div class="container">
        <h2>Sign-up</h2>
        <form action="includes/signup.inc.php" method = "post">
            <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>

            <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="form-group">
            <label for="pwdrepeat">Repeat password:</label>
            <input type="password" class="form-control" id="pwdrepeat" placeholder="Repeat password" name="pwdrepeat">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
  </div>

    </section>
</body>
</html>