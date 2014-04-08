<div class="row">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo __d('users', 'Utilisateurs professionnels'); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><?php echo $this->Html->link(__d('users', '+ Ajouter un utilisateur'), array('action'=>'add'), array('class' => 'button')); ?></p>
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
						<th><?php echo $this->Paginator->sort('email_verified', 'Email validé'); ?></th>
						<th><?php echo __d('users', 'Crédits'); ?></th>
						<th><?php echo __d('users', 'Pack'); ?></th>
						<th><?php echo __d('users', 'Pack actif'); ?></th>
						<th><?php echo $this->Paginator->sort('active', 'Actif'); ?></th>
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
							<?php echo $user[$model]['email_verified'] == 1 ? __d('users', 'Oui') : __d('users', 'Non'); ?>
						</td>
						<td>
							<span class="badge"><?php echo $user[$model]['credit']['PackUser']['units']; ?></span>
						</td>
						<td>
							<span class="badge"><?php echo $user[$model]['credit']['Pack']['name']; ?></span>
						</td>
						<td>
							<?php echo $user[$model]['credit']['PackUser']['active'] == 1 ? __d('users', 'Oui') : __d('users', 'Non'); ?>
						</td>
						<td>
							<?php echo $user[$model]['active'] == 1 ? __d('users', 'Oui') : __d('users', 'Non'); ?>
						</td>
						<td>
							<?php echo $this->Date->aff_date($user[$model]['created'], 'fr'); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__d('users', 'Voir'), array('action'=>'view', $user[$model]['id'])); ?>

							<a href="#" data-toggle="modal" data-target="#add-pack-<?php echo $user[$model]['id']; ?>">
								<?php echo __d('users', 'Ajouter du crédit'); ?>
							</a>

							<?php echo $this->Html->link(__d('users', 'Modifier'), array('action'=>'edit', $user[$model]['id'])); ?>
							<?php echo $this->Html->link(__d('users', 'Supprimer'), array('action'=>'delete', $user[$model]['id']), null, sprintf(__d('users', 'Etes vous sûr de vouloir supprimer %s?'), $user[$model]['username'])); ?>

							<div id="add-pack-<?php echo $user[$model]['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Ajout de crédit</h4>
										</div>
										<div class="modal-body">
											<?php 
												echo $this->Form->create($model, array(
													'class' => 'form-horizontal'
												));
												/*echo $this->Form->input('PackUser.user_id', array(
													'type' => 'hidden',
													'value' => $user[$model]['id'],
												));*/
												if (!empty($packs)) {
													//debug($packs);
													foreach ($packs as $pack) {
														//debug($pack);
														echo $this->Form->input('PackUser.pack_id', array(
															'type' => 'radio',
															'value' => $pack['Pack']['id'],
															'div' => array(
														        'class' => 'form-group',
														    ),
														    'label' => array(
														    	'text' => $pack['Pack']['name'],
														    	'class' => 'checkbox-inline',
															),
														    'before' => '<div class="col-sm-10">',
														    'after' => '</div>',
														    'error' => array(
														        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
														    )
														));
													}
												}
											?>											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>

						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>