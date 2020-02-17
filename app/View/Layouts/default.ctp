<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>


	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php

		 echo $this->Html->meta('icon');
		 echo $this->Html->css('jquery-datepicker.css');
		 echo $this->Html->script('jquery-3.2.1.min.js') ;


		 echo $this->Html->css('select2.css');
		 echo $this->Html->css('select2.min.css');
		 
         echo $this->Html->css('util.css');
         echo $this->Html->css('main.css');

		 echo $this->Html->css('plugins/fontawesome-free/css/all.min.css');
		 echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
		 echo $this->Html->css('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');
		 echo $this->Html->css('dist/css/adminlte.min.css');
		 echo $this->Html->css('plugins/overlayScrollbars/css/OverlayScrollbars.min.css');


		 echo $this->Html->script('plugins/chart.js/Chart.min.js') ;
		 echo $this->Html->script('plugins/sparklines/sparkline.js') ;
		 echo $this->Html->script('plugins/jqvmap/jquery.vmap.min.js');
		// // <!-- daterangepicker -->
         echo $this->Html->script('plugins/jqvmap/maps/jquery.vmap.usa.js') ;
		 echo $this->Html->script('plugins/jquery-knob/jquery.knob.min.js') ;
		//  // <!-- Tempusdominus Bootstrap 4 -->
		 echo $this->Html->script('plugins/moment/moment.min.js') ;

		//   // <!-- overlayScrollbars -->
		 echo $this->Html->script('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
		 echo $this->Html->script('plugins/summernote/summernote-bs4.min.js');
         echo $this->Html->script('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');
		


     
         echo $this->Html->script('jquery-3.0.0.js');
         echo $this->Html->script('select2.min.js');
         echo $this->Html->script('select2.js');

		 echo $this->fetch('meta');
	     echo $this->fetch('css');
		 echo $this->fetch('script');

	?>
</head>
<body>



    <!-- <?php echo $this->Flash->render(); ?> -->

	<?php echo $this->fetch('content'); ?>

</body>
</html>

<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-database.js"></script>

