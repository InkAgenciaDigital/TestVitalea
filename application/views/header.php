<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Vitălea Test </title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/themify-icons/themify-icons.css">

  <!-- Main Stylesheet -->
  <link href="<?= base_url()?>assets/template/css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?= base_url()?>assets/template/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?= base_url()?>assets/template/images/favicon.ico" type="image/x-icon">

  <script src="<?= base_url();?>datatable/jQuery-3.3.1/jquery-3.3.1.js"></script>

  <script type="text/javascript" src="<?= base_url();?>notify/pnotify.core.js"></script>
  <script type="text/javascript" src="<?= base_url();?>notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="<?= base_url();?>notify/pnotify.nonblock.js"></script>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <link rel=stylesheet href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<link href="<?= base_url()?>datatable/Responsive-2.2.2/css/responsive.bootstrap.min.css" rel="stylesheet"/>
<link rel=stylesheet type=text/css href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-flash-1.5.1/datatables.min.css" />
<script type=text/javascript src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-flash-1.5.1/datatables.min.js"></script>
<script src="<?= base_url()?>datatable/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>datatable/Responsive-2.2.2/js/responsive.bootstrap.min.js"></script>
  <script type=text/javascript src="<?= base_url()?>parsleyjs/parsley.min.js"></script>
  <script type=text/javascript src="<?= base_url()?>parsleyjs/i18n/es.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7/dist/sweetalert2.all.min.js"></script>

  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>

</head>
<body>
<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand font-tertiary h3" href=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <?php if(!$this->session->userdata('Login')) : ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>loginController">Ingresa</a>
          </li>
        <?php endif ?>
        <?php if($this->session->userdata('Login')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>preguntaController/listar">Preguntas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>respuestaController/listar">Respuestas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>informeController">Informe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>loginController/logout">Cerrar Sesión</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </nav>
</header>