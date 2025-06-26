<!-- Modal -->
<div class="portfolio-modal modal fade" id="#portfolioModal<?= $proyecto['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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

