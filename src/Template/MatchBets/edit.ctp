<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $matchBet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $matchBet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Match Bets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="matchBets form large-10 medium-9 columns">
    <?= $this->Form->create($matchBet) ?>
    <fieldset>
        <legend><?= __('Edit Match Bet') ?></legend>
        <?php
            echo $this->Form->input('match_id', ['options' => $matches, 'empty' => true]);
            echo $this->Form->input('bet_id', ['options' => $bets, 'empty' => true]);
            echo $this->Form->input('sign');
            echo $this->Form->input('goals_local');
            echo $this->Form->input('goals_visitor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
