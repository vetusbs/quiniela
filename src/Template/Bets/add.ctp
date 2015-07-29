<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Bets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="bets form large-10 medium-9 columns">
    <?= $this->Form->create($bet) ?>
    <fieldset>
        <legend><?= __('Add Bet') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('date');
            echo $this->Form->input('football_day_id', ['options' => $footballDays, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
