<!-- hero area -->
<section class="hero-area bg-primary" id="parallax">
  <div class="container">
    <div class="row">
      <div class="col-lg-11 mx-auto">
        <h1 class="text-white font-tertiary">Bienvenido, en Vitălea<br></h1>
      </div>
    </div>
  </div>
  <div class="layer-bg w-100">
    <img class="img-fluid w-100" src="<?=base_url()?>assets/template/images/illustrations/leaf-bg.png" alt="bg-shape">
  </div>
  <div class="col-lg-9 mx-auto">
        <h2 class="text-white font-tertiary">Tu salud es lo primero</h2>
    </div>
  <div class="layer" id="l2">
    <img src="<?=base_url()?>assets/template/images/illustrations/dots-cyan.png" alt="bg-shape">
  </div>
  <div class="layer" id="l3">
    <img src="<?=base_url()?>assets/template/images/illustrations/leaf-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l4">
    <img src="<?=base_url()?>assets/template/images/illustrations/dots-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l5">
    <img src="<?=base_url()?>assets/template/images/illustrations/leaf-yellow.png" alt="bg-shape">
  </div>
  <div class="layer" id="l6">
    <img src="<?=base_url()?>assets/template/images/illustrations/leaf-cyan.png" alt="bg-shape">
  </div>
  <div class="layer" id="l7">
    <img src="<?=base_url()?>assets/template/images/illustrations/dots-group-orange.png" alt="bg-shape">
  </div>
  <div class="layer" id="l8">
    <img src="<?=base_url()?>assets/template/images/illustrations/leaf-pink-round.png" alt="bg-shape">
  </div>
  <div class="layer" id="l9">
    <img src="<?=base_url()?>assets/template/images/illustrations/leaf-cyan-2.png" alt="bg-shape">
  </div>
  <!-- social icon -->
  <ul class="list-unstyled ml-5 mt-3 position-relative zindex-1">
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-facebook"></i></a></li>
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-instagram"></i></a></li>
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-dribbble"></i></a></li>
  </ul>
  <!-- /social icon -->
</section>
<!-- /hero area -->



<!-- skills -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h3 class="section-title">Informe</h3>
      </div>
      <table id="resultado_table" class="table table-striped table-bordered table-responsive" role="grid" aria-describedby="datatable-responsive_info" style="width:100%" width="100%" cellspacing="0">
        <thead>
          <tr class="tr">
            <th>Id total</th>
            <th>Usuario </th>
            <th>Pregunta</th>
            <th>Resultado</th>
          </tr>
			  </thead>
			</table>
    </div>
    <div class="col-lg-8 mx-auto">

</div>
  </div>
</section>
<!-- /skills -->

<!-- testimonial -->
<section class="section bg-primary position-relative testimonial-bg-shapes">
  <br>
  <br>
  <br>
  <!-- bg shapes -->
</section>
<!-- /testimonial -->

<script type="text/javascript">

  $(document).ready(function(){
    var c;
    var b=$("#resultado_table").DataTable({
      bProcessing:true,
      bServerSide:false,
      bStateSave: true,
      dom:"Bfrtip",
      columns:c,
      buttons:["excel","pdf","csv"],
      ajax:{
        url:"<?= base_url() ?>informeController/dataRespuesta",
        type:"GET"
      },
      columns:[
        {result:"TTL_Id_Total",visible:false},
        {result:"USR_Nombres_Usuario"},
        {result:"PRG_Nombre_Pregunta"},
        {result:"RST_Nombre_Resultado"},
      ],
      language:{
        lengthMenu:"Mostrar MENU registros por página.",
        zeroRecords:"Lo sentimos. No se encontraron registros.",
        sInfo:"Mostrando: START de END - Total registros: TOTAL ",
        infoEmpty:"No hay registros aún.",
        infoFiltered:"(filtrados de un total de MAX registros)",
        search:"Buscar:",
        LoadingRecords:"Cargando ...",
        Processing:"Procesando...",
        SearchPlaceholder:"Comience a teclear...",
        paginate:{
          previous:"Anterior",
          next:"Siguiente",
        }
      }
    });

    $(document).on("click",".edit",function(){
      var d=$(this).parents("tr");
      if(d.hasClass("child")){
        d=d.prev()
      }
      var f=b.row(d).data();
      var e="<?=base_url();?>index.php/utilidades/edit/"+f[0];
      window.location.href=e
    });

    $(document).on("click",".remove",function(){
      var e=$(this).parents("tr");
      if(e.hasClass("child")){
        e=e.prev()
      }
      var g=b.row(e).data();
      var f="<?=base_url();?>index.php/utilidades/delete/"+g[0];

      dataType: "JSON",a(g[0], f);
      console.log(g[0]);

    });

    function a(d,e){
      swal({
        title:"Esta seguro?",
        text:"La utilidad será eliminada permanentemente!",
        type:"warning",
        showCancelButton:true,
        confirmButtonColor:"#3085d6",
        cancelButtonColor:"#d33",
        confirmButtonText:"Si, eliminar!",
        showLoaderOnConfirm:true,
        cancelButtonText:"Cancelar",
        preConfirm:function(){
          return new Promise(function(f){
            $.ajax({
              type:'DELETE',
              url:e,
              data:{
                '_token': $('meta[name="_token"]').attr('content'),
              },
              success:function(g,i,h){
                b.ajax.reload();
                console.log("entra");
                swal("Eliminado exitosamente!",g.message,g.status)
              }
            })
            .done(function(g){
              swal("Eliminado exitosamente!",g.message,g.status)
            })
            .fail(function(){
              swal("Lo sentimos.","Un error ha ocurrido !","error")
            })
          })
        },
        allowOutsideClick:false
      })
    }
  });
</script>
 <!-- testimonial -->
<section class="section bg-primary position-relative testimonial-bg-shapes">

