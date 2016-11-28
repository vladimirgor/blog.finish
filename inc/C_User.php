<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 28.11.2016
 * Time: 11:23
 */

class C_User extends C_Base {
    protected function Action_show_all(){
        $this->title .= "::User_show_all";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();

// Is it allowed to user to see users?
        if ( $user == null || !$mUsers->Can('SEE_USERS',$user['id_role']))
        {
// Access to service isn't allowed!
            header('Location: /');
            exit();
        }
        // selecting  records from the data base
        $users = M_Data::users_all();
        $edit = $mUsers->Can('EDIT_USER', $user['id_role']);
        $delete = $mUsers->Can('DELETE_USER', $user['id_role']);
// show page
        $this->content = $this->Template('views/user/show_all.php',
            ['users' => $users,
                'edit' => $edit, 'delete' => $delete
            ]);


    }

}