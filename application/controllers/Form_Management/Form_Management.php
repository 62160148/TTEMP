<?php
/*
* MainCcontroller
* @input  -
* @output -
* @author Pontakon 
* @Update Date 2565-01-25
*/

defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");
class Form_Management extends MainController
{

    function index()
    {
        $this->output('consent/v_form_management');
    }


    function form_management_prosition()
    {
        $this->output('consent/v_form_management_prosition');
    }


     function form_management_detail()
    {
        $this->output('consent/v_form_management_detail');
    }

}