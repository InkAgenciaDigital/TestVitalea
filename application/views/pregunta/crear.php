<section class="page-title bg-primary position-relative">
<div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Crear Pregunta</h1>
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
        <div class="col-lg-12 mx-auto">
            <div class="bg-white rounded text-center p-5 shadow-down">
            <div class="row">
                <a href="<?= base_url() ?>preguntaController/listar">Volver al listado</a>
                <div class="col-12 text-center">
                    <h2 class="card-title">Crear Pregunta</h2>
                </div>
                <div class="col-lg-10 mx-auto">
                    <div class="bg-white rounded text-center p-5 shadow-down">
                        <form action="<?php echo base_url(); ?>preguntaController/guardar" class="row" method="POST">
                            <div class="col-md-12">
                                <input type="text" id="PRG_Nombre_Pregunta" name="PRG_Nombre_Pregunta" placeholder="Digite la Pregunta" required class="form-control px-0 mb-4">
                            </div>
                            <div class="col-md-4">
                                <select required name="PRG_Respuesta_A_Id" class="form-control px-0 mb-4">
                                    <option value="">-- Seleccione una Respuesta A --</option>
                                    <?php foreach ($respuestas->result() as $key => $rta) : ?>
                                        <option value="<?php echo $rta->RTA_Id_Respuesta ?>"><?php echo $rta->RTA_Nombre_Respuesta ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                            <select required name="PRG_Respuesta_B_Id" class="form-control px-0 mb-4">
                                <option value="">-- Seleccione una Respuesta B --</option>
                                <?php foreach ($respuestas->result() as $key => $rta) : ?>
                                    <option value="<?php echo $rta->RTA_Id_Respuesta ?>"><?php echo $rta->RTA_Nombre_Respuesta ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                            <div class="col-md-4">
                            <select required name="PRG_Respuesta_No_Favorable_Id" class="form-control px-0 mb-4">
                                <option value="">-- Seleccione una Respuesta Negativa Para la Pregunta --</option>
                                <?php foreach ($respuestas->result() as $key => $rta) : ?>
                                    <option value="<?php echo $rta->RTA_Id_Respuesta ?>"><?php echo $rta->RTA_Nombre_Respuesta ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                            <div class="col-lg-6 col-10 mx-auto">
                                <button class="btn btn-primary w-100">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
