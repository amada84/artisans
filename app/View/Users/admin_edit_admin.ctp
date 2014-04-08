<div class="row">
	<div class="col-md-12 page-header">
		<h2><?php echo __d('users', 'Modifier un utilisateur'); ?></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="info-box">
			<h1 class="small"><?php echo __('Suivez l\'actualité de vos contacts'); ?></h1>
			<p><?php echo __d('users', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); ?></p>
			<?php echo $this->Html->link(__('En savoir plus'), array('controller' => '', 'action' => ''), array('id' => 'button')); ?>
		</div>
	</div>
	<div class="col-md-4">
		<?php 
			echo $this->Form->create($model, array(
				'class' => 'form-horizontal'
			));

			echo $this->Form->input('id');

			echo $this->Form->input('username', array(
			    'div' => array(
			        'class' => 'form-group',
			    ),
			    'label' => false,
				'PlaceHolder' => __d('users', 'Pseudo'),
				'class' => 'form-control',
				'between' => '<div class="col-sm-10">',
				'after' => '</div>',
				'error' => array(
			        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
			    )
			));

			echo $this->Form->input('phone', array(
				'div' => array(
			        'class' => 'form-group',
			    ),
			    'label' => false,
			    'type' => 'text',
				'PlaceHolder' => __d('users', '77xxxxxxx'),
				'class' => 'form-control',
				'between' => '<div class="col-sm-10">',
				'after' => '</div>',
				'error' => array(
			        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
			    )
			));

			echo $this->Form->input('adress', array(
				'div' => array(
			        'class' => 'form-group',
			    ),
			    'label' => false,
			    'type' => 'textarea',
				'PlaceHolder' => __d('users', 'Adresse'),
				'class' => 'form-control',
				'between' => '<div class="col-sm-10">',
				'after' => '</div>',
				'error' => array(
			        'attributes' => array('wrap' => 'div', 'class' => 'error-message col-sm-10')
			    )
			));

			echo $this->Form->input('is_admin', array(
				'type' => 'checkbox',
				'div' => array(
			        'class' => 'form-group',
			    ),
				'label' => array(
					'text' => __d('users', 'Administrateur'),
					'class' => 'checkbox-inline'
				),
				'before' => '<div class="col-sm-10">',
			    'after' => '</div>',
			));

			echo $this->Form->input('active', array(
				'type' => 'checkbox',
				'div' => array(
			        'class' => 'form-group',
			    ),
				'label' => array(
					'text' => __d('users', 'Active'),
					'class' => 'checkbox-inline'
				),
				'before' => '<div class="col-sm-10">',
			    'after' => '</div>',
			));

			echo $this->Form->end(array(
				'label' => __d('users', 'Modifier'),
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