<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Football Days'), ['controller' => 'FootballDays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Football Day'), ['controller' => 'FootballDays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Match Bets'), ['controller' => 'MatchBets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match Bet'), ['controller' => 'MatchBets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="matches view large-10 medium-9 columns">
    <h2><?= h($match->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Team') ?></h6>
            <p><?= $match->has('team') ? $this->Html->link($match->team->name, ['controller' => 'Teams', 'action' => 'view', $match->team->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Sign') ?></h6>
            <p><?= h($match->sign) ?></p>
            <h6 class="subheader"><?= __('Football Day') ?></h6>
            <p><?= $match->has('football_day') ? $this->Html->link($match->football_day->id, ['controller' => 'FootballDays', 'action' => 'view', $match->football_day->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($match->id) ?></p>
            <h6 class="subheader"><?= __('Local Id') ?></h6>
            <p><?= $this->Number->format($match->local_id) ?></p>
            <h6 class="subheader"><?= __('Goals Local') ?></h6>
            <p><?= $this->Number->format($match->goals_local) ?></p>
            <h6 class="subheader"><?= __('Goals Visitor') ?></h6>
            <p><?= $this->Number->format($match->goals_visitor) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($match->date) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($match->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($match->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Match Bets') ?></h4>
    <?php if (!empty($match->match_bets)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Match Id') ?></th>
            <th><?= __('Bet Id') ?></th>
            <th><?= __('Sign') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($match->match_bets as $matchBets): ?>
        <tr>
            <td><?= h($matchBets->id) ?></td>
            <td><?= h($matchBets->match_id) ?></td>
            <td><?= h($matchBets->bet_id) ?></td>
            <td><?= h($matchBets->sign) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'MatchBets', 'action' => 'view', $matchBets->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'MatchBets', 'action' => 'edit', $matchBets->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MatchBets', 'action' => 'delete', $matchBets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchBets->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
