<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Bet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="bets index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('football_day_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($bets as $bet): ?>
        <tr>
            <td><?= $this->Number->format($bet->id) ?></td>
            <td>
                <?= $bet->has('user') ? $this->Html->link($bet->user->name, ['controller' => 'Users', 'action' => 'view', $bet->user->id]) : '' ?>
            </td>
            <td><?= h($bet->date) ?></td>
            <td><?= h($bet->created) ?></td>
            <td><?= h($bet->modified) ?></td>
            <td>
                <?= $bet->has('football_day') ? $this->Html->link($bet->football_day->id, ['controller' => 'FootballDays', 'action' => 'view', $bet->football_day->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $bet->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bet->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bet->id)]) ?>
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
