<div class="actions columns large-2 medium-3">
    <h3><?= __('MENU') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('La Jornada'), ['controller' => 'FootballDays', 'action' => 'today'])?></li>    
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" style="width:auto;">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Identificador') ?></th>
            <th><?= $this->Paginator->sort('Nom') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('pagat') ?></th>
            <th class="actions"><?= __('Accions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= $this->Number->format($user->pagat) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Veure'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
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
