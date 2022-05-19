<?php


$this->load->view("header/header.php");
$this->load->view("nav/nav.php");
if (!isset($alert) and isset($this->session->flashdata()["alert"])) {
    $alert = $this->session->flashdata("alert");
}
if (isset($alert)) {
    $alertObj = json_decode($alert);

    echo '<div class="container my-2">';
    echo '<div class="row">';
    echo '<div class="col-12">';
    echo '<div class="alert alert-' . $alertObj->type . '">' . $alertObj->message . '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

$this->load->view($filename);
$this->load->view("footer/footer.php");

//end page