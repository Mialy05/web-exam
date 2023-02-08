<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style/style.css">
    <?php foreach($styleSheets as $style) { ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/style/<?= $style ?>">
    <?php } ?>
    <title><?= $title ?></title>
</head>
<body>
    <?php  
        if($site == 'user') {
            $this->load->view('frontoffice/navbar');
            
        }
        else if($site == 'admin') {
            $this->load->view('backoffice/navbar');
        }
    ?>
    <div id="body">

   