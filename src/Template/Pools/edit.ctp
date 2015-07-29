<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pool->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pool->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pools'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pools form large-10 medium-9 columns">
    <?= $this->Form->create($pool) ?>
    <fieldset>
        <legend><?= __('Edit Pool') ?></legend>
        <?php
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
