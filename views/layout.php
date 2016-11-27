<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title><?=$title?></title>
         <!-- jquery -->
        <script language="javascript" src="/js/jquery-1.11.3.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script language="javascript" src="/js/bootstrap.min.js"></script>
        <!-- My js  -->
        <script language="javascript" src="/js/password_match.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

        <!-- My css -->
        <link rel="stylesheet" type="text/css" media="screen" 
        href="/css/style.css" />
    </head>

    <body>
        <div class="container">
            <div class = "row">
                <div class="col-md-3 empty">
                     <p class ="header">Galina & Vladimir Goryainov's Blog</p>
                </div>
                <div class="col-md-5 empty"></div>
                <div class="col-md-2 empty user_h">
                    <span><?=$first_name_h?></span>
                    <span><?=$last_name_h?></span>
                </div>
                <div class="col-md-1 empty signing">
                    <a class="btn btn-warning" href="/auth/Signing" role="button">Register</a>
                </div>
                <div class="col-md-1 empty login">
                    <a class="btn btn-warning" href="/auth/Login" role="button">Login</a>
                </div>
            </div>
            <? if ( !$content == '' ) :?>
                <div class="list">
                    <?=$content?>
                    <br>
                </div>
            <? endif ?>
            <div class="footer">
                <small>Vladimir Goryainov &copy;</small>
            </div>
        </div>
    </body>
</html>