<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\WeakPasswordHasher;
use Cake\Auth\AbstractPasswordHasher;
use Auth\LegacyPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'pagat' => true,
        'rol' => true,
        'bets' => true,
    ];
    
    protected function _setPassword($password)
    {	
    	return (new WeakPasswordHasher())->hash($password);
    }
}
