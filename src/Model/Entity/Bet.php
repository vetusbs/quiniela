<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bet Entity.
 */
class Bet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'football_day_id' => true,
        'user' => true,
        'football_day' => true,
    ];
}
