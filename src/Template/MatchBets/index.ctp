<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Match Bet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="matchBets index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('match_id') ?></th>
            <th><?= $this->Paginator->sort('bet_id') ?></th>
            <th><?= $this->Paginator->sort('sign') ?></th>
            <th><?= $this->Paginator->sort('goals_local') ?></th>
            <th><?= $this->Paginator->sort('goals_visitor') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($matchBets as $matchBet): ?>
        <tr>
            <td><?= $this->Number->format($matchBet->id) ?></td>
            <td>
                <?= $matchBet->has('match') ? $this->Html->link($matchBet->match->id, ['controller' => 'Matches', 'action' => 'view', $matchBet->match->id]) : '' ?>
            </td>
            <td>
                <?= $matchBet->has('bet') ? $this->Html->link($matchBet->bet->id, ['controller' => 'Bets', 'action' => 'view', $matchBet->bet->id]) : '' ?>
            </td>
            <td><?= h($matchBet->sign) ?></td>
            <td><?= $this->Number->format($matchBet->goals_local) ?></td>
            <td><?= $this->Number->format($matchBet->goals_visitor) ?></td>
            <td><?= h($matchBet->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $matchBet->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $matchBet->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $matchBet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchBet->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
