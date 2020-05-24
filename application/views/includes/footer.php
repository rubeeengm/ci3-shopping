	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqry/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bt4/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bt4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dt/datatables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dt/datatablesbootstrap4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Modal.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/SimpleAjax.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Eventos.js"></script>
	<script>
		$(document).ready(function () {
			$('#myTable').DataTable();
			Eventos.cargarModulo();
		});
	</script>
</body>
</html>
