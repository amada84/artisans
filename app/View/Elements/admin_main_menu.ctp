<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('users', 'Utilisateurs'); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('Liste des utilisateurs'), array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Professionnels'), array('controller' => 'users', 'action' => 'list_pro', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Particuliers'), array('controller' => 'users', 'action' => 'list_par', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Utilisateurs inactifs'), array('controller' => 'users', 'action' => 'inactive_users', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Ajouter un utilisateur'), array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
	</ul>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('users', 'Administrateurs'); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('Liste des adminitrateurs'), array('controller' => 'users', 'action' => 'list_admins', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Ajouter un adminisrateur'), array('controller' => 'users', 'action' => 'add_admin', 'admin' => true)); ?></li>
	</ul>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('categories', 'Catégories'); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('Liste des catégories'), array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Ajouter une catégorie'), array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?></li>
	</ul>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('ads', 'Annonces'); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('Liste des annonces'), array('controller' => 'ads', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Liste des nouvelles annonces'), array('controller' => 'ads', 'action' => 'news', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Liste des annonces valides'), array('controller' => 'ads', 'action' => 'available', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Liste des annonces valides'), array('controller' => 'ads', 'action' => 'available', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Liste des annonces clôturées'), array('controller' => 'ads', 'action' => 'closed', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Liste des annonces archivées'), array('controller' => 'ads', 'action' => 'archived', 'admin' => true)); ?></li>
	</ul>
</li>