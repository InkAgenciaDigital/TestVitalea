<section class="page-title bg-primary position-relative">
<div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Cuentanos de Tu Nutrición y Estilo de Vida</h1>
      </div>
    </div>
  </div>


  <!-- background shapes -->
  <img src="<?= base_url()?>assets/template/images/illustrations/page-title.png" alt="illustrations" class="bg-shape-1 w-100">
  <img src="<?= base_url()?>assets/template/images/illustrations/leaf-pink-round.png" alt="illustrations" class="bg-shape-2">
  <img src="<?= base_url()?>assets/template/images/illustrations/dots-cyan.png" alt="illustrations" class="bg-shape-3">
  <img src="<?= base_url()?>assets/template/images/illustrations/leaf-orange.png" alt="illustrations" class="bg-shape-4">
  <img src="<?= base_url()?>assets/template/images/illustrations/leaf-yellow.png" alt="illustrations" class="bg-shape-5">
  <img src="<?= base_url()?>assets/template/images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-6">
  <img src="<?= base_url()?>assets/template/images/illustrations/leaf-cyan-lg.png" alt="illustrations" class="bg-shape-7">
</section>

<!-- skills -->
<section class="section section-on-footer" data-background="<?= base_url()?>template/images/backgrounds/bg-dots.png">
  <div class="container">
  
  <form action="<?= base_url()?>preguntaController/responder" method="post" class="row">
      <div class="col-lg-12 mx-auto">
        <div class="bg-white rounded text-center p-5 shadow-down">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="USR_Nombres_Usuario" name="USR_Nombres_Usuario" placeholder="Nombres y Apellidos" required class="form-control px-0 mb-4">
            </div>
            <div class="col-md-6">
              <input type="email" id="USR_Correo_Usuario" name="USR_Correo_Usuario" placeholder="Correo Electrónico" required class="form-control px-0 mb-4">
            </div>
            <div class="col-md-6">
              <input type="text" id="USR_Telefono_Usuario" name="USR_Telefono_Usuario" placeholder="Número de Teléfono" required class="form-control px-0 mb-4">
            </div>
            <div class="col-md-12">
              <center><h3>Inicia El Test</h3></center><br>
            </div>
            <?php
              foreach($pregunta->result() as $key => $preg){?>
                <div class="col-md-6">
                  <?php echo form_hidden('h'.$preg->PRG_Id_Pregunta, $preg->PRG_Id_Pregunta); ?>
                  <?php echo form_label(++$key.' '.$preg->PRG_Nombre_Pregunta, $preg->PRG_Id_Pregunta); ?><br>
                  <input type="radio" name="r<?php echo $preg->PRG_Id_Pregunta ?>" value="<?php echo $preg->idrtaa ?>"> <?php echo $preg->nrtaa ?><br>
                  <input type="radio" name="r<?php echo $preg->PRG_Id_Pregunta ?>" value="<?php echo $preg->idrtab ?>"> <?php echo $preg->nrtab ?><br>
                  <?php echo form_error($preg->PRG_Id_Pregunta); ?>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-10 mx-auto">
        <br><button class="btn btn-primary w-100 ">Guardar</button>
        <br>
      </div>
    </div>
    
  </form>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>

<!-- testimonial -->
<section class="section bg-primary position-relative testimonial-bg-shapes">

  <!-- bg shapes -->
</section>
<!-- /testimonial -->
