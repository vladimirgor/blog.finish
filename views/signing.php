
<h1>Signing</h1>

<form method="post" onsubmit="return password_match();">
    <input type="text" autofocus required name="first_name" value="<?=$first_name?>" />:First name<br>
    <input type="text"  required name="last_name" value="<?=$last_name?>" />:Last name<br>
    <input type="text" id = "login" required name="login" value ="<?=$login?>" />:Login<br>
    <input type="password" id = "psw" required name="password" />:Password<br>
    <input type="password"  id = "psw_rep" required name="repeat_password" />:Repeat password<br>
    <input type="checkbox" checked name="remember" /> Remember me<br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<span id = "message"><?=$message?></span>
