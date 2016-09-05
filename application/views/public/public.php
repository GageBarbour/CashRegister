<?php
/**
 * Created by PhpStorm.
 * User: Gage Barbour
 * Date: 9/4/2016
 * Time: 01:11
 */


/*
 * Default view $view gets set by controller for the actual view page
 *
 */


$this->load->view('templates/header.php');
$this->load->view($view);
$this->load->view('templates/footer.php');
