<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pool Entity.
 */
class Pool extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'matches' => true,
    ];
}
