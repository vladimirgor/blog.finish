<?php if ( $users != NULL ):?>
    <h3>Users list</h3>
<table class="table table-bordered table-hover table-condensed">
    <tr>
        <td><b>id_user</b></td>
        <td><b>login</b></td>
        <td><b>id_role</b></td>
        <td><b>first_name</b></td>
        <td><b>last_name</b></td>
        <td><b>action</b></td>
        </tr>
    <?php foreach ($users as $user ):?>
        <tr>
            <td><?=$user['id_user']?></td>
            <td><?=$user['login']?></td>
            <td><?=$user['id_role']?></td>
            <td><?=$user['first_name']?></td>
            <td><?=$user['last_name']?></td>
            <td>edit delete</td>
        </tr>
        <?php endforeach; ?>
</table>
<?php endif;?>