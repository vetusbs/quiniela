<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $footballDay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $footballDay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Football Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="footballDays form large-10 medium-9 columns">
    <?= $this->Form->create($footballDay) ?>
    <fieldset>
        <legend><?= __('Edit Football Day') ?></legend>
        <?php
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
