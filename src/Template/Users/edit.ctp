<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Tots els usuaris'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('La Jornada'), ['controller' => 'FootballDays', 'action' => 'today'])?></li>    
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('password' , array('value'=>''));
            $type = 'hidden';
            if ($this->request->session()->read('Auth.User.id')==='admin') {
            	$type='text';
            }
            $options = array('type'=>$type);
            echo $this->Form->input('pagat', $options);
            echo $this->Form->input('rol', $options);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
