<!--
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 28.11.2016
 * Time: 13:59
 */
 -->
<form method="POST">
    Login:
    <input type="text"  name="login" value="<?=$user['login']?>"/>
    <br>
    Id_role:
    <input type="text" name="id_role" value="<?=$user['id_role']?>"</>
    <br>
    First_name:
    <input type="text" name="first_name"  value="<?=$user['first_name']?>"</>
    <br>
    Last_name:
    <input type="text" name="last_name"  value="<?=$user['last_name']?>"</>
    <br>
    <input type="submit" class="btn btn-primary" value="Save" >
</form>