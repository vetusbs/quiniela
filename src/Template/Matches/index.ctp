<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Match Bets'), ['controller' => 'MatchBets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match Bet'), ['controller' => 'MatchBets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="matches index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('local_id') ?></th>
            <th><?= $this->Paginator->sort('visitor_id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('goals_local') ?></th>
            <th><?= $this->Paginator->sort('goals_visitor') ?></th>
            <th><?= $this->Paginator->sort('sign') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($matches as $match): ?>
        <tr>
            <td><?= $this->Number->format($match->id) ?></td>
			<td>
                <?= $match->has('local') ? $this->Html->link($match->local->name, ['controller' => 'Teams', 'action' => 'view', $match->local->id]) : '' ?>
            </td>
            <td>
                <?= $match->has('visitor') ? $this->Html->link($match->visitor->name, ['controller' => 'Teams', 'action' => 'view', $match->visitor->id]) : '' ?>
            </td>
            <td><?= h($match->date) ?></td>
            <td><?= $this->Number->format($match->goals_local) ?></td>
            <td><?= $this->Number->format($match->goals_visitor) ?></td>
            <td><?= h($match->sign) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $match->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $match->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?>
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
