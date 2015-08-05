<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
 	<ul class="side-nav">
    	<li><?= $this->Html->link(__('Apostar'), ['controller' => 'MatchBets', 'action' => 'add', $footballDayId])?></li>    
        <li><?= $this->Html->link(__('Apostes usuaris'), ['controller' => 'MatchBets', 'action' => 'weeklyBets', $footballDayId]) ?></li>
    </ul>
</div>
<div class="matchBets form large-10 medium-9 columns">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Afegir combinació') ?></legend>	
        <table>
         <tr>
		    <th><?php echo __('Partit'); ?></th>
		    <th><?php echo __('Signe'); ?></th>
		  </tr>
        <?php
        $counter = 0;
        foreach ($matches as $match) {
        	echo '<tr>';
        	echo '<td>';
        	echo $counter + 1;
        	echo ' - ';
        	echo $match->local['name'];
        	echo " - ";
        	echo $match->visitor['name'];
            echo $this->Form->input($counter.'.match_id', array('type'=>'hidden', 'value'=>$match->id));
            echo $this->Form->input($counter.'.user_id', array('type'=>'hidden', 'value'=>$userId));
            echo '</td>';
            echo '<td>';
            if ($counter < 14) {
            	echo $this->Form->checkbox($counter.'.1', array('hiddenField' => false, 'class'=>'check-1'));
            	echo $this->Form->checkbox($counter.'.x', array('hiddenField' => false, 'class'=>'check-x'));
            	echo $this->Form->checkbox($counter.'.2', array('hiddenField' => false, 'class'=>'check-2'));
            } else {
            	echo '<div class="inline_labels">'; 
				echo $this->Form->radio(
				    $counter.'.goals_local',
				    [
				        ['value' => '0', 'text' => '', 'class' => 'check-0'],
				        ['value' => '1', 'text' => '', 'class' => 'check-1'],
				        ['value' => '2', 'text' => '', 'class' => 'check-2'],
				    	['value' => '3', 'text' => '', 'class' => 'check-m'],	
				    ]
				); 
				echo '</div>';
				
				echo '<div class="inline_labels">';
				echo $this->Form->radio(
				    $counter.'.goals_visitor',
				    [
				        ['value' => '0', 'text' => '', 'class' => 'check-0'],
				         ['value' => '1', 'text' => '', 'class' => 'check-1'],
				        ['value' => '2', 'text' => '', 'class' => 'check-2'],
				    	['value' => '3', 'text' => '', 'class' => 'check-m'],	
				    ]
				); 
				echo '</div>';
            }
            echo '</td>';
            echo '</tr>';
            $counter++;
            //echo $this->Form->input('goals_local');
            //echo $this->Form->input('goals_visitor');
        }
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
