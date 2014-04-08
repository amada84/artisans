<div class="row">
	<div class="col-md-3">		
		<?php echo $this->element("admin_sidebar"); ?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo __d('packs', 'Packs'); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3><?php echo __d('packs', 'Recherche'); ?></h3>
				<?php 
					echo $this->Form->create($modelName, array(
						'action' => 'index',
						'class' => 'form-inline',
						'role' => 'form'
					));

					echo $this->Form->input('name', array(
						'type' => 'text',
						'div' => array(
					        'class' => 'form-group',
					    ),
						'label' => false,
						'PlaceHolder' => __d('packs', 'Nom'),
						'class' => 'form-control',
					));

					echo $this->Form->end(array(
						'label' => __d('packs', 'Rechercher'),
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
							<th><?php echo $this->Paginator->sort('id', '#'); ?></th>
							<th><?php echo $this->Paginator->sort('name', 'Intitulé'); ?></th>
							<th><?php echo $this->Paginator->sort('defaut_units', 'Unités'); ?></th>
							<th><?php echo $this->Paginator->sort('created', 'Date de création'); ?></th>
							<th class="actions"><?php echo __d('packs', 'Actions'); ?></th>
						</tr>	
					</thead>
					<tbody>
						<?php foreach ($packs as $pack): ?>
						<tr>
							<td>
								<?php echo $pack[$modelName]['id']; ?>
							</td>
							<td>
								<?php echo $pack[$modelName]['name']; ?>
							</td>
							<td>
								<?php echo $pack[$modelName]['defaut_units']; ?>
							</td>
							<td>
								<?php echo $pack[$modelName]['created']; ?>
							</td>
							<td class="actions">
								<?php echo $this->Html->link(__d('packs', 'Modifier'), array('action'=>'edit', $pack[$modelName]['id'])); ?>
								<?php echo $this->Html->link(__d('packs', 'Supprimer'), array('action'=>'delete', $pack[$modelName]['id']), null, sprintf(__d('packs', 'Etes vous sûr de vouloir supprimer le pack "%s"?'), $pack[$modelName]['name'])); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>