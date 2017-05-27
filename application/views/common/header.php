<?php
$this->load->library('session');
?>
<!DOCTYPE html>
		<html lang="portugues">
			<head>
				  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="">
				<meta name="author" content="">
				<title><?php echo $this->lang->line('system_system_name'); ?></title>	
				<?php
				
				if(isset($_SESSION['userData'])){
				?>
				<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>"	rel="stylesheet">
				<?php	
				}
				?>

				<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"	rel="stylesheet">
				<script src="http://code.jquery.com/jquery-latest.js"></script>
				<link href="<?php echo base_url ( 'assets/font-awesome/css/font-awesome.min.css' );?>"	rel="stylesheet">
				<link href="<?php echo base_url ( 'assets/css/style.css' );?>"	rel="stylesheet">
				<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>   


				<script src="<?php echo base_url('assets/js/tether.min.js');?>"></script>   
				<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/chart.js/Chart.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/sb-admin.min.js');?>"></script> 
				<script src="<?php echo base_url('assets/js/jquery.mask.min.js');?>"></script>	
                <!--<script src="<?php #echo base_url('assets/js/mascaras_forms.js');?>"></script>-->
</head>

			<!-- END header.php -->
