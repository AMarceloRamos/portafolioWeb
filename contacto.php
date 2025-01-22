<section id="contact">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2 class="section-heading">Contáctame </h2>
                <h3 class="section-subheading">llenar el formulario con todos los campos requeridos.</h3>
            </div>
            <div class="col-md-6">
                <div class="company-address col-sm-6 col-md-6">
                    <address>
                        xBe - Creative Agency
                        <br>
                        <span id="map-input">

                            José Miguel Carrera 679,<br>
                            La Florida,Santiago</span>
                        <br>
                    </address>
                </div>
                <div class="company-contact col-sm-6 col-md-6">
                    <address>correos
                        <br>
                        <a href="mailto:#">adrianramosv@gmail.com</a>
                        <br>
                        <a href="mailto:#">support@example.com</a>
                    </address>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="" method="POST" novalidate>
                    <div class="row">
                        <div class="col-md-6 contact-form-box">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nombre" placeholder="Tú nombre*" id="name"
                                    required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Tú Email *"
                                    id="email" required
                                    data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="telefono" placeholder="Tú Teléfono *"
                                    id="phone" required
                                    data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" placeholder="Tú Mensaje *" id="message"
                                    required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>


                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Enviar Mensaje</button>

                        </div>
                        <div class="col-md-6">
                            <!-- <div id="map-canvas"> -->
                              
                                <div class="clearfix">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5592.021959230152!2d-70.59071221930043!3d-33.55243705803135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1735004277962!5m2!1ses-419!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            <!-- </div> -->
                </form>
            </div>
        </div>
    </div>
</section>