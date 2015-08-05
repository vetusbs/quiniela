<?php  $this->assign('title', 'Jornada - '.$footballDay->number);?>

<div class="related row">
	<div class="columns large-12 medium-12"></div>
</div>
<div class="row">
	<div class="large-4 medium-3 columns">
		<div class="row">
		<?php
		echo $this->Html->link ( '<i class="fa fa-pencil-square-o"></i>&nbsp;', [ 
				'controller' => 'FootballDays',
				'action' => 'edit',
				$footballDay->id 
		], [ 
				'escape' => false,
				'class' => 'column-6' 
		] );
		?>
		</div>
	</div>
</div>
<div class="related row">

<div class="actions columns large-2 medium-3">
    <h3><?= __('MENU') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('Apostar'), ['controller' => 'MatchBets', 'action' => 'add', $footballDay->id])?></li>
    	    	<li><?= $this->Html->link(__('Totes les jornades'), ['controller' => 'FootballDays', 'action' => 'index', $footballDay->id])?></li>    
    	    
        <li><?= $this->Html->link(__('Apostes usuaris'), ['controller' => 'MatchBets', 'action' => 'weeklyBets', $footballDay->id ]) ?></li>
        <li><?= $this->Html->link(__('Tots els usuaris'), ['controller'=>'Users', 'action' => 'index']) ?> </li>
             	<li><?php echo $this->Html->link(__('El meu perfil'), ['controller' => 'Users','action' => 'view', $this->request->session()->read('Auth.User.id')]) ?></li>        
        
    </ul>
</div>

	<div class="column large-10 medium-9">
			<h5>
			<?php 
				echo 'Jornada '.$footballDay->number.' - ';  
				$originalDate =  $footballDay->date;
				$newDate = date("d/m/Y", strtotime($originalDate));
				echo  $newDate; 
			?>
			</h5>
			<?php
				if (isset($yesterday)) {
					echo $this->Html->link(__('Anterior'), ['controller' => 'FootballDays', 'action' => 'view', $yesterday->id]);
				}
			?>
			<?php
				if (isset($tomorrow)) {
					$this->Html->link(__('Seguent'), ['controller' => 'FootballDays', 'action' => 'view', $tomorrow->id]);
				}
			?>

    <?php if (!empty($footballDay->matches)): ?>
    <table cellpadding="0" cellspacing="0" class="large-6">
        <?php foreach ($footballDay->matches as $matches): ?>
        <tr>
				<td class="text-center">
					<?=$this->Html->link ( '<i class="fa fa-pencil-square-o"></i>&nbsp;', [ 'controller' => 'Matches','action' => 'edit',$matches->id ], [ 'escape' => false ] )?>
					<?= h($matches->number)?>
				</td>
				<td class="text-right"><?= h($matches->local->name) ?></td>
				<td class="text-center">-</td>
				<td class="left"><?= h($matches->visitor->name) ?></td>
				<td class="text-center"><?= h($matches->goals_local."-".$matches->goals_visitor) ?></td>
				<td class="text-center"><?= h($matches->sign) ?></td>

			</tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
