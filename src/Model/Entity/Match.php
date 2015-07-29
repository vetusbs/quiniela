<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity.
 */
class Match extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'local_id' => true,
        'visitor_id' => true,
        'date' => true,
        'goals_local' => true,
        'goals_visitor' => true,
        'sign' => true,
        'football_day_id' => true,
        'team' => true,
        'football_day' => true,
        'match_bets' => true,
    	'number' => true
    		
    ];
}
