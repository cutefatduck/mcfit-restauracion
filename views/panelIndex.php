<!DOCTYPE html>
<html>
<head>
    <title>Mcfi restaurante - indice</title>
    <?php include_once "views/meta.php"?>

</head>

<?php include_once "views/cabecera.php"?>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

<body>
<section>
    <div class="container-fluid banner d-flex">
      <img class="img-banner" src="assets/img/girl-eating.png" alt="girl eating">
      <div class="container-title-banner ">
        <h2 class="title-banner ">COMPRA POR CALORIAS</h2>
        <a class="fill-button button-banner" href="?controller=producto&action=carta">Carta</a>
      </div>
    </div>
  
</section>

<section>
  <div class="container-fluid">
    <div class="row invert-row">
      <div class="col-12 col-md-6 ">
        <div class="d-flex justify-content-center align-items-center padding-card">
          <div class="padding-content-cards">
            <h3 class="title-ltr">ALIMENTOS QUE NO DECEPCIONAN FISICA Y MENTALMENTE</h3>
            <p>LNuestros alimentos estan completamente pensados para distintas dietas para mejorar el rendimiento físico y conseguir los resultados esperados en el menor tiempo posible.</p>

                <p>Se pueden usar en dietas de perdida de peso, ganar masa muscular y bienestar.</p>
                
            <a href="" class="fill-button">Más Información</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
      <div class="col-custom-ltr-background-r d-flex">
      <div class="container-image">
          <img class="image-ltr" src="assets/img/salmon_con_esparragos_verdes.jpg" alt="">
      </div>
      </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="col-custom-ltr-background-l d-flex">
          <div class="container-image-2">
            <img class="image-ltr" src="assets/img/hombre-comiendo-ensalada.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="d-flex justify-content-center align-items-center padding-card">
          <div class="padding-content-cards">
            <h3 class="title-ltr">LA COMIDA APOYA TU RUTINA</h3>

                <p>Es recomendable seguir una rutina de ejercicios con estos alimentos ya que estan preparados para dietas estrictas y completas.</p>

                <p>Entrena con amigos/as no socios
                Entrena con entrenador de McFIT
                Vale para un/a amigo/a o familiar
                Descuentos para familia y amigos/as</p>
                <p>Descarga la App y activa McFIT+ gratis.</p>

            <a href="" class="fill-button">Más Información</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container-fluid">
    <div class="title-container">
      <h3 class="title-ltr text-center">HIGHLIGHTS</h3>
    </div>
  </div>
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-2 column">
      <img class="img-highlights"src="assets/img/productos/caseina.png" alt="caseina">
      <div class="card-item">
        <a href="" class="fill-button">Más Información</a>
      </div>
    </div>
    <div class="col-md-2 column">
    <img class="img-highlights"src="assets/img/productos/batido_de_arandanos.png" alt="caseina">
    <div class="card-item">
        <a href="" class="fill-button">Más Información</a>
      </div>
    </div>
    <div class="col-md-2 column">
    <img class="img-highlights"src="assets/img/productos/ensalada_pollo.png" alt="caseina">
    <div class="card-item">
        <a href="" class="fill-button">Más Información</a>
      </div>
    </div>
    <div class="col-md-2 column">
    <img class="img-highlights"src="assets/img/productos/pollo_arroz_verduras.png" alt="caseina">
    <div class="card-item">
        <a href="" class="fill-button">Más Información</a>
      </div>
    </div>
    <div class="col-md-2 column">
    <img class="img-highlights"src="assets/img/productos/complemento_alimenticio.png" alt="caseina">
    <div class="card-item">
        <a href="" class="fill-button">Más Información</a>
      </div>
    </div>
  </div>
  </section>

  <section>
    <div class="container-pagina">
      <div class="title-container">
        <h2 class="title-ltr text-center">COMENTARIOS</h2>
        <div class="row">
          <div class="col-4">
            <div class="comentario-container margin-lefta">
                <h3 class="comentario-nombre">Ordenar por</h3>
                <hr>
                <select id="orden">
                    <option value="1">Recientes</option>
                    <option value="2">Orden Ascendente</option>
                    <option value="3">Orden Descendiente </option>
                </select>
            </div>
            <div class="comentario-container margin-lefta">
              <h3 class="comentario-nombre">Valoraciones</h3>
              <hr>
              <p>
                <input type="checkbox" id="5-estrellas" name="estrellas" value="5">
                <label for="5-estrellas"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"></label>
              </p>
              <p>
                <input type="checkbox" id="4-estrellas" name="estrellas" value="4">
                <label for="4-estrellas"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"></label>
              </p>
              <p>
              <input type="checkbox" id="3-estrellas" name="estrellas" value="3">
              <label for="3-estrellas"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"></label>
              </p>
              <p>
              <input type="checkbox" id="2-estrellas" name="estrellas" value="2">
              <label for="2-estrellas"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"></label>
              </p>
              <p>
              <input type="checkbox" id="1-estrellas" name="estrellas" value="1">
              <label for="1-estrellas"><img src="assets/img/valoracion_llena.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"><img src="assets/img/valoracion_vacia.svg" class="comentario-valoracion"></label>
              </p>
            </div>
          </div>
          <div class="col-8">
            <form id="formulario-comentario">
              <textarea style="resize: none;"type="textarea" class="input-login" id="contenido" placeholder="Escribe tu opinion"></textarea>
              <div class="rating d-flex flex-row-reverse justify-content-end">
                <input type="radio" id="estrella5" name="puntuacion" value="5">
                <label for="estrella5"></label>
                <input type="radio" id="estrella4" name="puntuacion" value="4">
                <label for="estrella4"></label>
                <input type="radio" id="estrella3" name="puntuacion" value="3">
                <label for="estrella3"></label>
                <input type="radio" id="estrella2" name="puntuacion" value="2">
                <label for="estrella2"></label>
                <input type="radio" id="estrella1" name="puntuacion" value="1" >
                <label for="estrella1"></label>
              </div>
              <button type="submit" class="fill-button">Enviar</button>
            </form>
            <div id="comentarios">
            </div>
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
        <script src="https://unpkg.com/notie"></script>
        <script src="assets/js/comentario.js"></script>
      </div>
    </div>
  </section>
</body>

<?php include_once "views/footer.php"?>


</html>