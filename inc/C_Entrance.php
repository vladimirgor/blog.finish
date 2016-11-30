<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 12.09.2016
 * Time: 11:26
 */
class C_Entrance extends C_Base {
    protected function Action_entrance()
    {
        $this->title .= "::Entrance";
        $this->content = '';
    }
}