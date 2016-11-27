<?php

class C_Article extends C_Base {

//
// Articles list show 
//    
    protected function Action_show_all()
    {
        $this->title .= "::Show_all";
        $add = false;
        $delete = false;
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
        if ( $user != null ) {
            $this->first_name_h = $user['first_name'];
            $this->last_name_h = $user['last_name'];
                //header('Location: /');
                //exit();
            }
// articles number
        $all = M_Data::articles_count_all();
// selecting  records from the data base
        $articles = M_Data::articles_all($this->params['start'],COUNT);
        //Заимствовано с ресурса http://php-zametki.ru/php-prodvinutym/104-extends-pagination.html
// pages number        
        $pages = ceil( $all / COUNT );
        $pagesArr = [];
//  pages offset array       
        for( $i = 0; $i < $pages; $i++ )
            {
              $pagesArr[$i+1] = $i * COUNT;
            }
//  pages offset array  split   according to LINK_LIMIT
        if ( !$all == 0 )
            $allPages = array_chunk($pagesArr, LINK_LIMIT, true);
        else $allPages = [];
// chunk to show on the page        
        $needChunk = M_Data::searchPage( $allPages, $this->params['start'] );
// allowed actions to show buttons on the page
        if ( $user != null  ) {
            $add = $mUsers->Can('ADD_ARTICLE', $user['id_role']);
            $delete = $mUsers->Can('DELETE_ARTICLE', $user['id_role']);
        }
// show page        
        $this->content = $this->Template('views/show_all.php',
            ['articles' => $articles,'login'=>$user['login'],
             'add' => $add, 'delete' => $delete,'start' => $this->params['start'],
             'allPages' => $allPages, 'needChunk' => $needChunk, 'all' => $all
             ]);
    }
//
// article look
//    
    protected  function Action_look (){
        $edit=false;
        $add_image=false;
        $delete_comment=false;
        $comments=false;
        $this->title .= "::Look";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get(); 
        if ( $user != null ) {
            $this->first_name_h = $user['first_name'];
            $this->last_name_h = $user['last_name'];
            }
        $id_article = $this->params['id'];
// selecting one record from the data base
        $article = M_Data::articles_get($id_article);
// views + 1        
        $article[0]['views']++;
//  change record in data base with views + 1        
        M_Data::articles_edit_views($article[0]['id_article'], $article[0]['views']);
// article content show
        if ( $user != null ) {
            $edit = $mUsers->Can('EDIT_ARTICLE', $user['id_role']);
            $add_image = $mUsers->Can('ADD_IMAGE', $user['id_role']);
            $delete_comment = $mUsers->Can('DELETE_COMMENT', $user['id_role']);
            $comments = M_Data::articles_comments_get($id_article);
        }
        $this->content = $this->Template('views/look.php',
          [
          'login'=> $user['login'],
          'id' => $id_article,
          'title'=> $article[0]['title'],
          'image' => $article[0]['image_path'],
          'content'=> $article[0]['content'],
          'date' => $article[0]['date'],
          'comments' => $comments,
          'start' => $this->params['start'],
          'edit' => $edit,
          'add_image' => $add_image,
          'delete_comment' => $delete_comment ]);
    }
//
// article Edit 
//    
    protected  function Action_edit (){
        $this->title .= "::Edit";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
        
// Is it allowed to user to edit articles?
        if ( $user == null || !$mUsers->Can('EDIT_ARTICLE',$user['id_role']))
            {
// Access to service isn't allowed!
                header('Location: /');
                exit();
            }
        $this->first_name_h = $user['first_name'];
        $this->last_name_h = $user['last_name'];
// Access to service is allowed!   
        $id_article = $this->params['id'];
// selecting one record from the data base for updating
        $article = M_Data::articles_get($id_article);

        if( $this->IsPOST() ) {
// data from POST array receiving
                $title = htmlspecialchars($_POST['title'],ENT_QUOTES);
                $content = htmlspecialchars($_POST['content'],ENT_QUOTES);
                $image_path = htmlspecialchars($_POST['image_path'],ENT_QUOTES);
// updating one record in the data base
                M_Data::articles_edit($id_article, $title, $content, $image_path);
                header('Location: /article/Look/'
                    . $id_article .'/'. $this->params['start']);
                exit();
            }
// form output to user
        $this->content = $this->Template('views/edit.php',
            ['title'=> $article[0]['title'],
            'content'=> $article[0]['content'],
            'image_path'=> $article[0]['image_path'],
            ]);
    }
//
// article Delete 
//    
    protected  function Action_delete (){
        $this->title .= "::Delete";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
// Is it allowed to user to delete articles?
        if ( $user == null || !$mUsers->Can('DELETE_ARTICLE',$user['id_role']) )
            {
// Access to service isn't allowed!
                header('Location: /');
                exit();
            }
// Access to service is allowed!           
        $id_article = $this->params['id'];
// deleting one record from the data base
        M_Data::articles_delete($id_article);
// deleting all article comments from the data base
        M_Data::articles_comments_delete($id_article);
        header('Location: /article/Show_all');
        exit();

    }
//
// article Add
//    
    protected  function Action_add (){
        $this->title .= "::Add";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
        // Может ли пользователь добавлять статьи?
        if ( $user == null || !$mUsers->Can('ADD_ARTICLE',$user['id_role']))
            {
// Access to service isn't allowed!
                header('Location: /');
                exit();
            }
        $this->first_name_h = $user['first_name'];
        $this->last_name_h = $user['last_name'];
// Access to service is allowed!
        if( $this->IsPOST() ) {
                $title = htmlspecialchars($_POST['title'],ENT_QUOTES);
                $content = htmlspecialchars($_POST['content'],ENT_QUOTES);
                $image_path = htmlspecialchars($_POST['image_path'],ENT_QUOTES);
// add one record to the data base
                M_Data::articles_new($title, $content, $image_path);
                header('Location: /article/Show_all');
                exit();
            }

        $this->content = $this->Template('views/edit.php',
            []);
    }
//
// article Comment
//    
    protected  function Action_comment (){
        $this->title .= "::Comment";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
        if ( $user == null ) {
                header('Location: /');
                exit();
            }
        $this->first_name_h = $user['first_name'];
        $this->last_name_h = $user['last_name'];
        $id_article = $this->params['id'];
        $article = M_Data::articles_get($id_article);
        $article[0]['comments']++;

        if( $this->IsPOST() ) {

                $comment = htmlspecialchars($_POST['comment'],ENT_QUOTES);                             
// add one comment to the record of the data base           
                M_Data::articles_comment($id_article,$user['id_user'], $comment);
                M_Data::articles_edit_comments($id_article, $article[0]['comments']);    
                header('Location: /article/Look/'. $id_article . '/'. $this->params['start']);
                exit();
            }

        $this->content = $this->Template('views/comment.php',
            ['login'=> $user['login']]);
    }
//
// article Image
//    
    protected function Action_image() {
        $this->title .= "::Image";
        $mUsers = M_Users::Instance();
        $user = $mUsers->Get();
// Может ли пользователь добавлять статьи?
        if ( $user == null || !$mUsers->Can('ADD_IMAGE',$user['id_role']) )
            {
// Access to service isn't allowed!
                header('Location: /');
                exit();
            }
        $this->first_name_h = $user['first_name'];
        $this->last_name_h = $user['last_name'];
// Access to service is allowed!
        if( $this->IsPOST() ) 
            {
                $id_article = $this->params['id'];
                $dir = $this->params['dir'];
                $newFileName = M_Data::Images_uploadFile('image',$dir);
                M_Data::articles_image_path($id_article,'/images/' . $newFileName);
                header('Location: /article/Look/'. $id_article. '/'. $this->params['start']);
                exit();
            }

        $this->content = $this->Template('views/image.php');
    }
}