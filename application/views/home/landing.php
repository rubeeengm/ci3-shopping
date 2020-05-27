<header class="app-header">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">DMStore</a>
        
        <div class="collapse navbar-collapse" id="">
            <ul class="navbar-nav mr-auto">

            </ul>
            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal"
                    data-target="#loginModal">Login</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="loginForm">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="30">
                                    <span for="email" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password" required maxlength="15">
                                    <span for="password" class="text-danger"></span>
                                </div>

								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button id="btnLogin" type="button" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="app-seccion1">
        <p class="app-descripcion">
            Las mejores ofertas del mercado
        </p>
    </section>
</header>
