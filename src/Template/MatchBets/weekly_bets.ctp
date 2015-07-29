<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Match Bets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="matchBets form large-10 medium-9 columns">
        <table>
         <tr>
		    <th>Firstname</th>
		    <?php 
		    
		    foreach ($users as $user) {
		    	echo '<th>'.$user['name'].'</th>';
		    }
		    ?>
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
            echo $this->Form->input($counter.'.bet_id', array('type'=>'hidden', 'value'=>1));
            echo '</td>';
            foreach ($users as $user) {
            	echo '<td>';
            	 
            	foreach ($bets as $bet) {
            		
		    		if ($bet['user_id']==$user['id'] && $bet['m']['id']==$match->id) {
		    			echo $bet['sign'];
		    		}
		    	}
		    	echo '</td>';
		    	 
            }
            echo '</tr>';
            $counter++;
            //echo $this->Form->input('goals_local');
            //echo $this->Form->input('goals_visitor');
        }
        ?>
        </table>
</div>
