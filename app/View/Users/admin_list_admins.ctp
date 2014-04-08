<div class="row">
	<div class="col-md-12 page-header">
		<h2><?php echo __d('users', 'Administrateurs'); ?></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p><?php echo $this->Html->link(__d('users', '+ Ajouter un administrateur'), array('action'=>'add'), array('class' => 'button')); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3><?php echo __d('users', 'Recherche'); ?></h3>
		<?php 
			echo $this->Form->create($model, array(
				'action' => 'index',
				'class' => 'form-inline',
				'role' => 'form'
			));

			echo $this->Form->input('username', array(
				'type' => 'text',
				'div' => array(
			        'class' => 'form-group',
			    ),
				'label' => false,
				'PlaceHolder' => __d('users', 'Pseudo'),
				'class' => 'form-control',
			));

			echo $this->Form->input('email', array(
				'type' => 'text',
				'div' => array(
			        'class' => 'form-group',
			    ),
				'label' => false,
				'PlaceHolder' => __d('users', 'xyz@exemple.com'),
				'class' => 'form-control',
			));

			echo $this->Form->end(array(
				'label' => __d('users', 'Rechercher'),
				'class' => 'btn btn-default',
			    'div' => array(
			        'class' => 'form-group',
			    ),
			    'before' => '<div class="col-sm-10">',
			    'after' => '</div>'
			));
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('username', 'Pseudo'); ?></th>
					<th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
					<th><?php echo $this->Paginator->sort('last_login', 'Dernière connexion'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Inscript le'); ?></th>
					<th class="actions"><?php echo __d('users', 'Actions'); ?></th>
				</tr>	
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
				<tr>
					<td>
						<?php echo $user[$model]['username']; ?>
					</td>
					<td>
						<?php echo $user[$model]['email']; ?>
					</td>
					<td>
						<?php echo $this->Date->aff_date($user[$model]['last_login'], 'fr'); ?>
					</td>
					<td>
						<?php echo $this->Date->aff_date($user[$model]['created'], 'fr'); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__d('users', 'Voir'), array('action'=>'view', $user[$model]['id'])); ?>
						<?php echo $this->Html->link(__d('users', 'Modifier'), array('action'=>'edit_admin', $user[$model]['id'])); ?>
						<?php echo $this->Html->link(__d('users', 'Supprimer'), array('action'=>'delete', $user[$model]['id']), null, sprintf(__d('users', 'Etes vous sûr de vouloir supprimer %s?'), $user[$model]['username'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>