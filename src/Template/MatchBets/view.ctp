<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Match Bet'), ['action' => 'edit', $matchBet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match Bet'), ['action' => 'delete', $matchBet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchBet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Match Bets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match Bet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="matchBets view large-10 medium-9 columns">
    <h2><?= h($matchBet->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Match') ?></h6>
            <p><?= $matchBet->has('match') ? $this->Html->link($matchBet->match->id, ['controller' => 'Matches', 'action' => 'view', $matchBet->match->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Bet') ?></h6>
            <p><?= $matchBet->has('bet') ? $this->Html->link($matchBet->bet->id, ['controller' => 'Bets', 'action' => 'view', $matchBet->bet->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Sign') ?></h6>
            <p><?= h($matchBet->sign) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($matchBet->id) ?></p>
            <h6 class="subheader"><?= __('Goals Local') ?></h6>
            <p><?= $this->Number->format($matchBet->goals_local) ?></p>
            <h6 class="subheader"><?= __('Goals Visitor') ?></h6>
            <p><?= $this->Number->format($matchBet->goals_visitor) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($matchBet->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($matchBet->modified) ?></p>
        </div>
    </div>
</div>
