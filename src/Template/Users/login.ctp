<div class="users form large-4 large-push-4 medium-push-2 medium-8 small-12">
<?php  $this->assign('title', 'Entra');?>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Entra el teu correu i la teva contrasenya') ?></legend>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login'),array( 'class' => 'button')); ?>
<?php
echo $this->Html->link(__("Registrar-se"), array('controller' => 'Users','action'=> 'add'), array( 'class' => 'button'))
?>

<?= $this->Form->end() ?>
</div>