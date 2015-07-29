<div class="related row">
	<div class="columns large-12 medium-12">
		<h3><?= __('Actions') ?></h3>
			<?= $this->Html->link(__('Edit Football Day'), ['action' => 'edit', $footballDay->id])?>
			<?= $this->Form->postLink(__('Delete Football Day'), ['action' => 'delete', $footballDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footballDay->id)])?>
			<?= $this->Html->link(__('List Football Days'), ['action' => 'index']) ?> 
			<?= $this->Html->link(__('New Football Day'), ['action' => 'add']) ?> 
			<?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> 
			<?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> 
	</div>
</div>

<div class="footballDays row large-4 medium-3 columns">
	<h2><?= __('Jornada') ?>-<?= h($footballDay->number) ?><?= h($footballDay->date) ?></h2>
</div>
<div class="related row">
	<div class="column large-12">

		<h4 class="subheader"><?= __('Partits de la Jornada') ?></h4>
		<?= $this->Html->link(__('Apostar'), ['controller' => 'MatchBets', 'action' => 'add', $footballDay->id])?>
		
    <?php if (!empty($footballDay->matches)): ?>
    <table cellpadding="0" cellspacing="0" style="width:auto;">
			<tr>
				<th><?= __('Número') ?></th>
				<th><?= __('Local Id') ?></th>
				<th><?= __('Visitor Id') ?></th>
				<th><?= __('Date') ?></th>
				<th><?= __('Sign') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
        <?php foreach ($footballDay->matches as $matches): ?>
        <tr>
				<td><?= h($matches->number) ?></td>
				<td><?= h($matches->local->name) ?></td>
				<td><?= h($matches->visitor->name) ?></td>
				<td><?= h($matches->date) ?></td>				
				<td><?= h($matches->sign) ?></td>
				<td class="actions">
                <?= $this->Html->link(__('Edit'), ['controller' => 'Matches', 'action' => 'edit', $matches->id])?>
            </td>
			</tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
