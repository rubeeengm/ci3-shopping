<div class="container" style="margin-top: 3rem;" id="listadoVideojuegos">
    <div class="card">
        <div class="card-header">
            <b>Videojuegos</b>
            <button id="agregar-videojuego" type="button" class="btn btn-primary" style="float: right;"
				data-toggle="modal" data-target="#videogameModal"
			>
				Agregar
			</button>
            <a href="<?php echo base_url(); ?>" class="btn btn-success"
                style="float: right; margin-right: 1rem;  color: white;">Actualizar</a>

			<!-- Modal -->
            <div class="modal fade" id="videogameModal" tabindex="-1" role="dialog" aria-labelledby="videogameModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Videojuego</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="videogameForm">
                                <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="nombre" class="form-control" id="nombre" name="nombre" required maxlength="50">
                                    <span for="nombre" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="precio" class="col-form-label">Precio:</label>
                                    <input type="precio" class="form-control" id="precio" name="precio" required maxlength="9">
                                    <span for="precio" class="text-danger"></span>
                                </div>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button id="btnAgregar" type="button" class="btn btn-primary">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th style="text-align:right">Precio</th>
                        <th style="text-align:right">Estado</th>
                        <th style="text-align:center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						foreach ($data as $row) {
                            $estado = $row->estado === '1' ? "Disponible" : "No disponible";
                            $accion = $row->estado === '1' 
                            ? '<a class="btn btn-danger" href="'. base_url(). 'index.php/VideogameController/disable?id='.$row->id.'" type="button">Desactivar</a>'
                            : '<a class="btn btn-primary" href="'. base_url(). 'index.php/VideogameController/enable?id='.$row->id.'" type="button">Activar</a>';

							echo '<tr data-id="'.$row->id.'">';
							echo "<td>" . str_pad($row->id, 4, "0", STR_PAD_LEFT) . "</td>";
							echo "<td>" . $row->nombre . "</td>";
                            echo '<td align="right">$' .number_format($row->precio, 2, '.', ',') . "</td>";
                            echo '<td align="right">' . $estado . "</td>";
                            echo '<td align="center">' . $accion . "</td>";
							echo "</tr>";
						}
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>