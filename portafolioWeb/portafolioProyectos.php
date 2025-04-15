<?php 

require 'include/config/databaseProyectos.php'; 

$dbpr = conectarProyectos();

if (!$dbpr) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT id, titulo, intro, categoria, imgPortda FROM proyectos";
$resultado = mysqli_query($dbpr, $sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $dbpr->error);
}

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

<div class="portfolio-items">
            <?php while ($proyecto = $resultado->fetch_assoc()): ?>
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
                                <img src="<?= htmlspecialchars($proyecto['imgPortda']); ?>" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
