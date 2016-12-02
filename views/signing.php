<h1>Register</h1>

<form class="form-horizontal" method="post" onsubmit="return password_match();">
    <div class="form-group">
        <label for="first_name" class="col-sm-2 control-label">First name</label>
        <div class="col-sm-10">
            <input type="text" autofocus required name="first_name" class="form-control"
                   id="login" value ="<?=$first_name?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="last_name" class="col-sm-2 control-label">Last name</label>
        <div class="col-sm-10">
            <input type="text"  required name="last_name" class="form-control"
                   id="login" value ="<?=$last_name?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10">
            <input type="text"  required name="login" class="form-control"
                   id="login" value ="<?=$login?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="psw" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" required class="form-control" id="psw" />
        </div>
    </div>
    <div class="form-group">
        <label for="psw_rep" class="col-sm-2 control-label">Repeat password</label>
        <div class="col-sm-10">
            <input type="password" name="password" required class="form-control" id="psw_rep" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked name="remember"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</form>
<span id = "message"><?=$message?></span>