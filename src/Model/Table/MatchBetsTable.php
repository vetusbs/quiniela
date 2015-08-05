<?php
namespace App\Model\Table;

use App\Model\Entity\MatchBet;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MatchBets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Matches
 * @property \Cake\ORM\Association\BelongsTo $Bets
 */
class MatchBetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('match_bets');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Matches', [
            'foreignKey' => 'match_id'
        ]);
        $this->belongsTo('Bets', [
            'foreignKey' => 'bet_id'
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
            ->allowEmpty('sign');
            
        $validator
            ->add('goals_local', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('goals_local');
            
        $validator
            ->add('goals_visitor', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('goals_visitor');

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
        $rules->add($rules->existsIn(['match_id'], 'Matches'));
        $rules->add($rules->existsIn(['bet_id'], 'Bets'));
        return $rules;
    }
    
    public function getAllBetsBy($footballDay) {
    	    	
    	$subQuery = $this->Bets->find('all', array(
    			'fields' => array('id' => 'MAX(Bets.id)'),
    			))
    		->where(['football_day_id' => $footballDay])
    		->group('user_id')
    		->toArray();
    	$ids = array();
    	foreach ($subQuery as $value) {
    		$ids[$value->id] = $value->id;
    	}
    	$fields = array('bet.user_id', 'user.id', 'm.id', 'sign', 'user.name', 'm.id', 'goals_local', 'goals_visitor');

    	
    	
    	$query = $this->find('all', ['fields' => $fields])
    	->join([
    			'bet' => [
    					'table' => 'bets',
    					'type' => 'LEFT',
    					'conditions' => 'bet.id = bet_id',
    			],
    			'user' => [
    					'table' => 'users',
    					'type' => 'LEFT',
    					'conditions' => 'user.id = bet.user_id',
    			],
    			'fd' => [
    					'table' => 'football_days',
    					'type' => 'LEFT',
    					'conditions' => 'fd.id = bet.football_day_id'
    			],
    			'm' => [
    					'table' => 'matches',
    					'type' => 'left',
    					'conditions' => 'm.id = match_id'
    			],
    			'local' => [
    					'table' => 'teams',
    					'type'  => 'left',
    					'conditions' => 'local.id = m.local_id'
    			],
    			'visitor' => [
    					'table' => 'teams',
    					'type'  => 'left',
    					'conditions' => 'visitor.id = m.visitor_id'
    			]
    			
    	])
    	->where(['fd.id' => $footballDay, 'bet.id in' => $ids])
    	->group('m.id, bet.user_id')
    	->order('user_id,bet.football_day_id, m.number');
    	 
    	return $query->toArray();
    }
}
