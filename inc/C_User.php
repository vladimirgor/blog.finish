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
        $this->first_name_h = $user['first_name'];
        $this->last_name_h = $user['last_name'];
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

    //
// users Edit
//
    protected  function Action_edit (){
        $this->title .= "::Edit_user";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();

// Is it allowed to user to edit users?
        if ( $user == null || !$mUsers->Can('EDIT_USER',$user['id_role']))
        {
// Access to service isn't allowed!
            header('Location: /');
            exit();
        }

// Access to service is allowed!
        $id_user_record = htmlspecialchars($this->params['id'],ENT_QUOTES);

// selecting one record from the data base for updating
        $user_record = M_Data::users_get($id_user_record);

        if( $this->IsPOST() ) {
// data from POST array receiving
            $login = htmlspecialchars($_POST['login'],ENT_QUOTES);
            $id_role = htmlspecialchars($_POST['id_role'],ENT_QUOTES);
            $first_name = htmlspecialchars($_POST['first_name'],ENT_QUOTES);
            $last_name = htmlspecialchars($_POST['last_name'],ENT_QUOTES);
// updating one record in the data base
            M_Data::users_edit($id_user_record,$login, $id_role, $first_name, $last_name);
            header('Location: /user/Show_all');
            exit();
        }
// form output to user
        $this->content = $this->Template('views/user/edit.php',
            ['user'=> $user_record[0]
            ]);
    }
//
//
// users Delete
//
    protected  function Action_delete (){
        $this->title .= "::Delete";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
// Is it allowed to user to delete users?
        if ( $user == null || !$mUsers->Can('DELETE_USER',$user['id_role']) )
        {
// Access to service isn't allowed!
            header('Location: /');
            exit();
        }
// Access to service is allowed!
        $id_user_record = $this->params['id'];
// deleting one record from the data base
        M_Data::users_delete($id_user_record);
// changing comments quantity in all articles with deleted user comments in the data base
        $comments = M_Data::users_comments_get($id_user_record);
        foreach ( $comments as $comment ){
            $article = M_Data::articles_get($comment['id_article']);
            $article[0]['comments']--;
            M_Data::articles_edit_comments($comment['id_article'], $article[0]['comments']);
        }
// deleting all user comments from the data base
        M_Data::users_comments_delete($id_user_record);
        header('Location: /user/Show_all');
        exit();

    }
}