<?php

class C_Auth extends C_Base
{

    public function Action_Login()
    {
        $str = 'sid  # ' . $_SESSION['sid']
            . ' login * ' . $_COOKIE['login'].' # - Action_Login;';
        M_Data::prot_write($str);

        $this->title .= '::Login';
        $mUsers = M_Users::Instance();
        $mUsers->ClearSessions();
        $mUsers->Logout();
        $message = '';
        $login = '';

// Обработка отправки формы.
        if (!empty($_POST)) {
            $result = $mUsers->Login(htmlspecialchars($_POST['login'],ENT_QUOTES),
                htmlspecialchars($_POST['password'],ENT_QUOTES),
                isset($_POST['remember']));
            switch ( $result ){
                case 'ok': {
                    header('Location: /article/Show_all');
                    exit();
                    break;
                }
                case 'no login':{
                    $message = 'Entered login is absent.';
                    break;
                }
                default :{
                    $message = 'Entered login and password do not match.';
                    break;
                }
            }
            $login = $_POST['login'];
        }

        $this->content = $this->Template('views/login.php',
            ['message'=>$message, 'login'=> $login ]);
    }
    public function Action_Signing()
    {
        $str = 'sid  # ' . $_SESSION['sid']
            . ' login * ' . $_COOKIE['login'].' # - Action_Signing;';
        M_Data::prot_write($str);

        $this->title .= '::Signing';
        $mUsers = M_Users::Instance();
        $mUsers->ClearSessions();
        $mUsers->Logout();
        $message = '';
        $first_name = '';
        $last_name = '';
        $login = '';
// Обработка отправки формы.
        if (!empty($_POST)) {

            if ($mUsers->Signing(
                htmlspecialchars($_POST['first_name'],ENT_QUOTES),
                htmlspecialchars($_POST['last_name'],ENT_QUOTES),
                htmlspecialchars($_POST['login'],ENT_QUOTES),
                htmlspecialchars($_POST['password'],ENT_QUOTES),
                isset($_POST['remember']))
            ) {
                header('Location: /article/Show_all');
                exit();
            }
            $message = 'Entered login already exists.';
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $login = $_POST['login'];
        }

        $this->content = $this->Template('views/signing.php',
            [ 'message'=>$message , 'first_name'=> $first_name,
            'last_name' => $last_name, 'login' => $login]);
    }

    public function Action_Logout()
    {
        $str = 'sid  # ' . $_SESSION['sid']
            . ' login * ' . $_COOKIE['login'] . ' # - Action_Login;';
        M_Data::prot_write($str);

        $this->title .= '::Logout';
        $mUsers = M_Users::Instance();
        $mUsers->ClearSessions();
        $mUsers->Logout();
        header('Location: /article/Show_all');
    }
}





