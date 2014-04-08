<div class="row">
	<div class="col-md-3">		
		<?php echo $this->element("admin_sidebar"); ?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo __d('packs', 'Ajouter un pack'); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="info-box">
					<h1 class="small"><?php echo __('Suivez l\'actualité de vos contacts'); ?></h1>
					<p><?php echo __d('packs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); ?></p>
					<?php echo $this->Html->link(__('En savoir plus'), array('controller' => '', 'action' => ''), array('id' => 'button')); ?>
				</div>
			</div>
			<div class="col-md-6">
				<?php
					echo $this->Form->create($modelName, array(
						'class' => 'form-horizontal',
						'type' => 'file',
					));

					echo $this->Form->input('name', array(
					    'div' => array(
					        'class' => 'form-group',
					    ),
					    'label' => false,
						'PlaceHolder' => __d('packs', 'Nom du pack'),
						'class' => 'form-control',
						'between' => '<div class="col-sm-10">',
						'after' => '</div>',
						'error' => array(
					        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
					    )
					));

					echo $this->Form->input('defaut_units', array(
					    'div' => array(
					        'class' => 'form-group',
					    ),
					    'label' => false,
						'PlaceHolder' => __d('packs', 'Nombre d`\unité du pack'),
						'class' => 'form-control',
						'between' => '<div class="col-sm-10">',
						'after' => '</div>',
						'error' => array(
					        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
					    )
					));

					echo $this->Form->end(array(
						'label' => __d('packs', 'Ajouter'),
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
	</div>
</div>