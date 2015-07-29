<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MatchBet Entity.
 */
class MatchBet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'match_id' => true,
        'bet_id' => true,
        'sign' => true,
        'goals_local' => true,
        'goals_visitor' => true,
        'match' => true,
        'bet' => true,
    	'user_id'=> true,
    	'football_day_id' => true
    ];
}
