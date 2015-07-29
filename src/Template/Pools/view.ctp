<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Pool'), ['action' => 'edit', $pool->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pool'), ['action' => 'delete', $pool->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pool->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pools'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pool'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pools view large-10 medium-9 columns">
    <h2><?= h($pool->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($pool->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($pool->date) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($pool->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($pool->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Matches') ?></h4>
    <?php if (!empty($pool->matches)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Local Id') ?></th>
            <th><?= __('Visitor Id') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Goals Local') ?></th>
            <th><?= __('Goals Visitor') ?></th>
            <th><?= __('Sign') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Pool Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($pool->matches as $matches): ?>
        <tr>
            <td><?= h($matches->id) ?></td>
            <td><?= h($matches->local_id) ?></td>
            <td><?= h($matches->visitor_id) ?></td>
            <td><?= h($matches->date) ?></td>
            <td><?= h($matches->goals_local) ?></td>
            <td><?= h($matches->goals_visitor) ?></td>
            <td><?= h($matches->sign) ?></td>
            <td><?= h($matches->created) ?></td>
            <td><?= h($matches->modified) ?></td>
            <td><?= h($matches->pool_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Matches', 'action' => 'view', $matches->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Matches', 'action' => 'edit', $matches->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Matches', 'action' => 'delete', $matches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matches->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
