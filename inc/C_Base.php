<?php

abstract class C_Base extends C_Controller{

    protected $title;
    protected $content;
    protected $params;
    protected $first_name_h;
    protected $last_name_h;

    
    public function Before(){
        $this->title = 'Blog';
        $this->content = 'MyContent';
        $this->first_name_h =NULL;
        $this->last_name_h =NULL;
       // Открытие сессии.
        session_start();    
    }

    public function Render(){
        $page = $this->Template('views/layout.php',
            ['title' => $this->title,'first_name_h'=> $this->first_name_h,
                'last_name_h'=>$this->last_name_h,
                'content' => $this->content]);
        echo $page;
    }
}
?>