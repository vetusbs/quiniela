<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Match Bets'), ['controller' => 'MatchBets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match Bet'), ['controller' => 'MatchBets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="matches form large-10 medium-9 columns">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Add Match') ?></legend>
        <?php
        echo $this->Form->input('football_day_id', ['options' => $footballDays, 'empty' => true]);
        
            echo $this->Form->input('local_id', ['options' => $teams, 'empty' => true]);
        	echo $this->Form->input('visitor_id', ['options' => $teams, 'empty' => true]);
            echo $this->Form->input('date');
            echo $this->Form->input('goals_local');
            echo $this->Form->input('goals_visitor');
            echo $this->Form->input('sign');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
