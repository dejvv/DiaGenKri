<!DOCTYPE html>
<html lang="sl">
<head>
    <title>LogIn Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<header class="col-12">
    <h1>Log in</h1>
</header>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DiaGenKri</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../../../DiaGenKri/public/home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="../../../DiaGenKri/public/register"><span class="glyphicon glyphicon-log-in"></span> Registration</a></li>
            </ul>
        </div>
    </div>
</nav>

<div>
    <article>
        <div align = "center">
            <div style = "width:300px; border: solid 1px #333333; " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Registracija v sistem</b></div>

                <div style = "margin:30px">
                    <form action = "<?= "logIn/loginUser/" ?>" method = "post" content="">
                        <label>E-mail  :</label><br><input type = "email" name = "email" class = "box"/><br /><br />
                        <label>Password  :</label><br><input type = "password" name="password" class = "box" /><br/><br />
                        <input type = "submit" value = " Oddaj "/><br />
                    </form>

                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

                </div>

            </div>

        </div>
    </article>
</div>

