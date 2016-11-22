<?php
class C_Comment extends C_Base {
//
// comment delete
//    
    protected function Action_delete()
    {
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
// Is it allowed for user to delete comment?
        if ( $user == null || !$mUsers->Can('DELETE_COMMENT',$user['id_role']))
            {
// Access to service isn't allowed!
                header('Location: /');
                exit();
            }
// Access to service is allowed!   
        $id_comment = $this->params['id_comment']; 
        M_Data::comment_delete($id_comment);
        $id_article = $this->params['id'];
        $article = M_Data::articles_get($id_article);
        $article[0]['comments']--;
        M_Data::articles_edit_comments($id_article, $article[0]['comments']);    
        header('Location: /article/Look/'. $id_article .'/'. $this->params['start'] );   
    }

}