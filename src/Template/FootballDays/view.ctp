<div class="related row">
	<div class="columns large-12 medium-12">
		
	</div>
</div>

<div class="footballDays row large-4 medium-3 columns">
	<h2><?= __('Jornada') ?>-<?= h($footballDay->number) ?></h2><h5><?= h($footballDay->date) ?></h5>
</div>
<div class="related row">
	<div class="column large-12">
		
    <?php if (!empty($footballDay->matches)): ?>
    <table cellpadding="0" cellspacing="0" class="large-6">
        <?php foreach ($footballDay->matches as $matches): ?>
        <tr>
				<td>
					<?= $this->Html->link(
							'<i class="fa fa-pencil-square-o"></i>&nbsp;', 
							['controller' => 'Matches', 'action' => 'edit', $matches->id], [ 'escape'=>false ])?>
					<?= h($matches->number) ?>
				</td>
				<td><?= h($matches->local->name) ?></td>
				<td><?= h($matches->visitor->name) ?></td>
				<td><?= h($matches->goals_local."-".$matches->goals_visitor) ?></td>
				<td><?= h($matches->sign) ?></td>

		</tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
