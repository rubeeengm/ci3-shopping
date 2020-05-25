	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqry/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bt4/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bt4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dt/datatables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dt/datatablesbootstrap4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Modal.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/SimpleAjax.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/sweetalert/jquery.sweet-alert.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Home.js"></script>
	<script>
		$(document).ready(function () {
			$('#myTable').DataTable();
			Home.cargarModulo();
		});
	</script>
</body>
</html>
