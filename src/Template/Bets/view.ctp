<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Bet'), ['action' => 'edit', $bet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bet'), ['action' => 'delete', $bet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bets view large-10 medium-9 columns">
    <h2><?= h($bet->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $bet->has('user') ? $this->Html->link($bet->user->name, ['controller' => 'Users', 'action' => 'view', $bet->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Football Day') ?></h6>
            <p><?= $bet->has('football_day') ? $this->Html->link($bet->football_day->id, ['controller' => 'FootballDays', 'action' => 'view', $bet->football_day->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($bet->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($bet->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($bet->modified) ?></p>
        </div>
    </div>
</div>
