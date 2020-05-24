<div class="container" style="margin-top: 3rem;">
	<div class="card">
		<div class="card-header">
				<b>Videojuegos</b>
				<button id="agregar-videojuego" type="button" class="btn btn-primary" style="float: right;">Agregar</button>
				<button id="actualizarlistado-videojuegos" type="button" class="btn btn-success" style="float: right; margin-right: 1rem;">Actualizar</button>
		</div>
		<div class="card-body">
			<table id="myTable" class="table table-bordered table-striped"
				   style="width:100%">
				<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Estado</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($data as $row) {
					$estado = $row->estado === '1' ? "Disponible" : "No disponible";

					echo "<tr>";
					echo "<td>" . str_pad($row->id, 4, "0", STR_PAD_LEFT) . "</td>";
					echo "<td>" . $row->nombre . "</td>";
					echo "<td>" . $row->precio . "</td>";
					echo "<td>" . $estado . "</td>";
					echo "</tr>";
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
