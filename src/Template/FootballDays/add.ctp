<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Football Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="footballDays form large-10 medium-9 columns">
    <?= $this->Form->create($footballDay) ?>
    <fieldset>
        <legend><?= __('Add Football Day') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('number');
            echo $this->Form->input('season');
        ?>
        <?php
            echo '<table>';
            for ($i = 0; $i < 15; $i++) {
            	echo '<tr>';
            	echo '<td style="width:20px;">';
            	echo $i + 1;
            	echo '</td>';
            	 
            	echo '<td>';
            	echo $this->Form->input('footballDay.matches.'.$i.'.local_id', ['options' => $teams, 'empty' => false]);
            	echo '</td>';
            	echo '<td>';
            	echo $this->Form->input('footballDay.matches.'.$i.'.visitor_id', ['options' => $teams, 'empty' => false]);
            	echo '</td>';
            	echo '</tr>';
            }
            echo '</table>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
