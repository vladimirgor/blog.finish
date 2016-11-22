<h1>Login</h1>

<form method="post">
    <input type="text" autofocus required name="login" value ="<?=$login?>" />:Login<br>
    <input type="password"  required name="password" />:Password<br>
    <input type="checkbox" checked name="remember" /> Remember me<br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<span id = "message"><?=$message?></span>
