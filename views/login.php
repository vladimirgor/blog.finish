<h1>Log in</h1>

<form class="form-horizontal" method="post">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10 div_f">
            <input type="text" autofocus required name="login" class="form-control"
                   id="login" value ="<?=$login?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10 div_f">
            <input type="password" name="password" required class="form-control" id="password" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <div class="checkbox div_f">
                <label>
                    <input type="checkbox" checked name="remember"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>
    </div>
</form>
<span id = "message"><?=$message?></span>
