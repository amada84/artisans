<div class="row">
	<div class="col-md-12 page-header">
		<h2><?php echo __d('users', 'Détails utilisateur'); ?></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<dl class="dl-horizontal">
			<dt><span class="badge"><?php echo __d('users', 'Pseudo:'); ?></span></dt>
			<dd><?php echo $user[$model]['username']; ?></dd>
			<dt><span class="badge"><?php echo __d('users', 'Type:'); ?></span></dt>
			<dd><?php echo $types[$user[$model]['type']]; ?></dd>
			<dt><span class="badge"><?php echo __d('users', 'Adresse email:'); ?></span></dt>
			<dd><?php echo $user[$model]['email']; ?></dd>
			<dt><span class="badge"><?php echo __d('users', 'Numéro de téléphone:'); ?></span></dt>
			<dd><?php echo $user[$model]['phone']; ?></dd>
			<dt><span class="badge"><?php echo __d('users', 'Adresse:'); ?></span></dt>
			<dd><?php echo $user[$model]['adress']; ?></dd>
		</dl>
	</div>
</div>




