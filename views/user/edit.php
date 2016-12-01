<!--
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 28.11.2016
 * Time: 13:59
 */
-->
<h1>User edit</h1>
<form class="form-horizontal" method="POST">
    <div class="form-group div_f">
        <label for="login" class="col-sm-2 control-label">Login:</label>
        <div class="col-sm-10 div_f">
            <input type="text" name= "login" class="form-control" id="login" value="<?=$user['login']?>"\>
        </div>
    </div>
    <div class="form-group div_f">
        <label for="id_role" class="col-sm-2 control-label">Id_role:</label>
        <div class="col-sm-10 div_f">
            <input type="number" name= "id_role" class="form-control" id="id_role" value="<?=$user['id_role']?>"\>
        </div>
    </div>
    <div class="form-group div_f">
        <label for="first_name" class="col-sm-2 control-label">First_name</label>
        <div class="col-sm-10 div_f">
            <input type="text" name= "first_name" class="form-control" id="first_name" value="<?=$user['first_name']?>"\>
        </div>
    </div>
    <div class="form-group div_f">
        <label for="last_name" class="col-sm-2 control-label">Last_name</label>
        <div class="col-sm-10 div_f">
            <input type="text" name="last_name" class="form-control" id="last_name" value="<?=$user['last_name']?>"\>
        </div>
    </div>
    <div class="form-group div_f">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>