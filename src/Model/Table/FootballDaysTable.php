<?php
namespace App\Model\Table;

use App\Model\Entity\FootballDay;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FootballDays Model
 *
 * @property \Cake\ORM\Association\HasMany $Matches
 */
class FootballDaysTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('football_days');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Matches', [
            'foreignKey' => 'football_day_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('date');
        
        $validator
        ->add('season', 'valid', ['rule' => 'numeric']);
        
        $validator
        ->add('number', 'valid', ['rule' => 'numeric']);
        
        return $validator;
    }
}
