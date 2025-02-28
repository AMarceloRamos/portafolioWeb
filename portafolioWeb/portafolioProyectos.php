<?php

require 'include/config/database.php';

$db = conectarDB(); // Llama a la función que devuelve un objeto PDO

if (!$db) {
    die("Error de conexión a la base de datos.");
}

$sql = "SELECT id, titulo, intro, categoria, imgportda FROM proyectos";

// Usa query() en lugar de pg_query()
$resultado = $db->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL.");
}

    // Obtener los resultados como un array asociativo
$proyectos = $resultado->fetchAll(PDO::FETCH_ASSOC);



?>

<section id="portfolio">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Portafolio</h2>
            </div>
            <div class="col-xs-12 col-md-12 portfolio-submenu text-center">
                <ul class="filter">
                    <li><a class="active" href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".webdesign">Diseño Web</a></li>
                    <li><a href="#" data-filter=".web">Web</a></li>
                    <li><a href="#" data-filter=".webservices">Servicios Web</a></li>
                    <li><a href="#" data-filter=".androidstudio">Android Studio</a></li>
                    <li><a href="#" data-filter=".netbeans">Netbeans</a></li>
                </ul>
            </div>
        </div>
</div>
<div class="portfolio-wrapper portfolio-container-fluid">
<div class="portfolio-items">
            <?php while ($proyecto = $resultado->fetch((PDO::FETCH_ASSOC)){ ?>
                <?php 
                    $categoria = strtolower(str_replace(' ', '', htmlspecialchars($proyecto['categoria']))); 
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid <?=$categoria?>">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal<?= $proyecto['id'];?>" class="portfolio-link" data-toggle="modal" data-id="<?= $proyecto['id']; ?>">
                                <div class="hover-text">
                                    <h4><?= htmlspecialchars($proyecto['titulo']); ?></h4>
                                    <h5><?= htmlspecialchars($proyecto['intro']); ?></h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?= htmlspecialchars($proyecto['imgportda']); ?>" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="portfolio-modal modal fade" id="portfolioModal<?= $proyecto['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2 id="modal-titulo"></h2>
                        <p id="modal-intro" class="item-intro text-muted"></p>
                        <img id="modal-imagen" class="img-responsive img-centered" src="" alt="Imagen del proyecto">
                        <p id="modal-descripcion"></p>
                        <p><strong>Más información:</strong> <a id="modal-url" href="" target="_blank">Ver proyecto</a></p>
                        <ul class="list-inline">
                            <li><strong>Fecha:</strong> <span id="modal-fecha"></span></li>
                            <li><strong>Cliente:</strong> <span id="modal-cliente"></span></li>
                            <li><strong>Categoría:</strong> <span id="modal-categoria"></span></li>
                        </ul>
                        <button type="button" class="btn btn-xl" data-dismiss="modal">
                            <i class="fa fa-times"></i> Cerrar Proyecto
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(".portfolio-link").click(function () {
        var idProyecto = $(this).data("id");

        $.ajax({
            url: "obtener_proyecto.php",
            type: "GET",
            data: { id: idProyecto },
            success: function (data) {
                var proyecto = JSON.parse(data);
                
                if (proyecto.Error) {
                    alert(proyecto.Error);
                } else {
                    $("#modal-titulo").text(proyecto.titulo);
                    $("#modal-intro").text(proyecto.intro);
                    $("#modal-imagen").attr("src", proyecto.imgPortda);
                    $("#modal-descripcion").html(proyecto.descripcion);
                    $("#modal-url").attr("href", proyecto.url);
                    $("#modal-fecha").text(proyecto.fecha);
                    $("#modal-cliente").text(proyecto.cliente);
                    $("#modal-categoria").text(proyecto.categoria);

                    $("#portfolioModal").modal("show");
                }
            },
            error: function() {
                alert("Error al cargar los datos del proyecto.");
            }
        });
    });
});
</script>


