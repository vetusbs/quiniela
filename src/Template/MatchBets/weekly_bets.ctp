<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
 	<ul class="side-nav">
    	<li><?= $this->Html->link(__('Apostar'), ['controller' => 'MatchBets', 'action' => 'add', $footballDayId]) ?></li>    
        <li><?= $this->Html->link(__('Apostes usuaris'), ['controller' => 'MatchBets', 'action' => 'weeklyBets', $footballDayId]) ?></li>
    </ul>
</div>
<div class="matchBets form large-10 medium-9 columns">
        <table>
         <tr>
		    <th></th>
		    <?php 
		    foreach ($users as $user) {
		    	//echo '<th>'.$user['name'].'</th>';
		    	echo '<th class="rotate"><div><span>'.$user['name'].'</span></div></th>';		    	 
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
            		
		    		if ($bet['bet']['user_id']==$user['id'] && $bet['m']['id']==$match->id) {
		    			if ($counter < 14) {
		    				echo $bet['sign'];
		    				break;
		    			} else {
		    				echo $bet['goals_local'];
		    				echo $bet['goals_visitor'];
		    				
		    				break;
		    			}
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
