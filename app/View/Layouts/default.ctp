<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	?>
		<link rel="stylesheet/less" href="<?php echo $this->Html->url("/css/bootstrap.less")?>">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<?php echo $this->Html->script(array('jquery-1.10.1.min', 'modernizr.custom', 'less-1.6.3.min', 'modal', 'transition', 'collapse', 'dropdown', 'scripts')); ?>
	<?php

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<header class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
		<div class="container">
		<div class="navbar-header">
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a href="#" class="navbar-brand">App Name</a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		  <ul class="nav navbar-nav">		    
		    <?php echo $this->element("main_menu"); ?>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <?php echo $this->element("logstatus"); ?>
		  </ul>
		</nav>
		</div>
	</header>

	<div class="container">
    	<?php echo $this->Session->flash(); ?>
    	<?php echo $this->Session->flash('auth', array('element' => 'notif')); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element("sql_dump"); ?>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<hr/>
    			<div class="col-md-8 firstFooter">
    				<span><?php echo 'Copyright ©'.date('Y').' App Name'; ?></span>
		        	<span>&nbsp;&nbsp;</span>
		        	<span><?php echo 'Powered by'; ?></span>
		        	<span>&nbsp;</span>
		        	<span><?php echo $this->Html->link(__('Play Smart'), '#', array('class' => 'footerlink', 'target' => '_blank')); ?></span>
		        	<span>&nbsp;&nbsp;</span>
		        	<span><?php echo $this->Html->link(__('Termes et conditions'), array('controller' => '', 'action' => ''), array('class' => 'footerlink')); ?></span>
    			</div>
    			<div class="col-md-4 secondFooter">
	        	</div>
    		</div>
    	</div>
    </div>
    <?php 
    	echo $this->fetch('script');
    ?>
</body>
</html>