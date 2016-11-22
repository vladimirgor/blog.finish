<?php
function __autoload($name)
{
    include_once("inc/$name.php");
}
include_once ('/config.php');

$action = 'Action_';
$controller = '';
$params = M_Data::extract_params($_GET['q']);
$params['dir'] = __DIR__;
$action .= isset($params['a']) ? $params['a'] : 'Entrance';
if (isset($params['c']))
    $controller = $params['c'];

switch ($controller)
{
    case 'article':{
        $c = new C_Article();
        break;
    }
    case 'comment':{
        $c = new C_Comment();
        break;
    }
    case 'auth':{
        $c = new C_Auth();
        break;
    }
    default: {
        $c = new C_Entrance();
        break;
    }
}
// $action possible meanings : Action_Login; Action_Show_all; Action_Add;
//    Action_Look; Action_Edit; Action_Delete; Action_Comment.
 
$c->Request($action, $params);