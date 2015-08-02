<?php
namespace App\Model\Table;

use App\Model\Entity\Match;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locals
 * @property \Cake\ORM\Association\BelongsTo $Visitors
 * @property \Cake\ORM\Association\BelongsTo $FootballDays
 * @property \Cake\ORM\Association\HasMany $MatchBets
 */
class MatchesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('matches');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Visitors', [
            'foreignKey' => 'local_id',
        	'className' => 'Teams'
        ]);
        $this->belongsTo('Locals', [
            'foreignKey' => 'visitor_id',
        	'className' => 'Teams'
        ]);
        $this->belongsTo('FootballDays', [
            'foreignKey' => 'football_day_id'
        ]);
        $this->hasMany('MatchBets', [
            'foreignKey' => 'match_id'
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
            ->add('goals_local', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('goals_local');
            
        $validator
            ->add('goals_visitor', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('goals_visitor');
            
        $validator
            ->allowEmpty('sign');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['local_id'], 'Locals'));
        $rules->add($rules->existsIn(['visitor_id'], 'Visitors'));
        $rules->add($rules->existsIn(['football_day_id'], 'FootballDays'));
        return $rules;
    }
    
    public function getMatchesByFootballDay($footballDay) {
    	$query = $this->find('all', ['fields' => ['local_id', 'visitor_id', 'local.name', 'visitor.name', 'id']])
    	->join([
    			'local' => [
    					'table' => 'teams',
    					'type' => 'LEFT',
    					'conditions' => 'local.id = Matches.local_id',
    			],
    			'visitor' => [
    					'table' => 'teams',
    					'type' => 'LEFT',
    					'conditions' => 'visitor.id = Matches.visitor_id',
    			]
    	])
    	->where(['football_day_id' => $footballDay])
    	->limit(15);
    	
    	return $query->toArray();
    }
}
