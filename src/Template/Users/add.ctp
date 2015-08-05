<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('name',array('label'=>__('Nom')));
            echo $this->Form->input('email',array('label'=>__('email')));
            echo $this->Form->input('password',array('label'=>__('password')));
            //echo $this->Form->input('pagat');
            echo $this->Form->input('role', array('type'=>'hidden', 'value'=>'user'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
