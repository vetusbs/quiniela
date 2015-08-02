<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * MatchBets Controller
 *
 * @property \App\Model\Table\MatchBetsTable $MatchBets
 */
class MatchBetsController extends AppController
{

	public function isAuthorized($user) {
		if (in_array ( $this->request->action, [
				'weeklyBets', 'add'
		] )) {
			return true;
		}
		return parent::isAuthorized ( $user );
	}
	
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Matches']
        ];
        $this->set('matchBets', $this->paginate($this->MatchBets));
        $this->set('_serialize', ['matchBets']);
    }

    /**
     * View method
     *
     * @param string|null $id Match Bet id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matchBet = $this->MatchBets->get($id, [
            'contain' => ['Matches', 'Bets']
        ]);
        $this->set('matchBet', $matchBet);
        $this->set('_serialize', ['matchBet']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($footballDayId)
    {
        if ($this->request->is('post')) {
        	
        	$bet = $this->MatchBets->Bets->newEntity();
        	$bet->user_id = $this->Auth->user('id');
        	$bet->football_day_id = $footballDayId;
        	$bet = $this->MatchBets->Bets->save($bet);
        	
        	for ($i = 0; $i < count(($this->request->data)); $i++) {        		
        		$record = $this->request->data[$i];
        		$sign = '';
        		if (isset($record['1'])) {
        			$sign .= '1';
        		}
        		if (isset($record['x'])) {
        			$sign .= 'x';
        		}
        		if (isset($record['2'])) {
        			$sign .= '2';
        		}
        		$this->request->data[$i]['user_id'] = $this->Auth->user('id');
        		$this->request->data[$i]['sign'] = $sign;
        		$this->request->data[$i]['bet_id'] = $bet->id;
        	}
        	

        	$matchBets = $this->MatchBets->newEntities($this->request->data);
        	$database = $this->MatchBets;
        	$result = $this->MatchBets->connection()->transactional(function () use ($database, $matchBets) {
        		foreach ($matchBets as $entity) {
        			$database->save($entity, ['atomic' => false]);
        		}
        		return true;
        	});
            if ($result) {
                $this->Flash->success(__('The match bet has been saved.'));
                return $this->redirect(['action' => 'weeklyBets', $footballDayId]);
            } else {
                $this->Flash->error(__('The match bet could not be saved. Please, try again.'));
            }
        }
        $matches = TableRegistry::get('Matches');
		$data = $matches->getMatchesByFootballDay($footballDayId);

		$this->set('footballDayId',$footballDayId);
		$this->set('userId', $this->Auth->user('id'));
        $this->set('matches', $data);
        $this->set(compact('matchBet'));
        $this->set('_serialize', ['matchBet']);
    }

    
    
    /**
     * Edit method
     *
     * @param string|null $id Match Bet id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matchBet = $this->MatchBets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $matchBet = $this->MatchBets->patchEntity($matchBet, $this->request->data);
            if ($this->MatchBets->save($matchBet)) {
                $this->Flash->success(__('The match bet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The match bet could not be saved. Please, try again.'));
            }
        }
        $matches = $this->MatchBets->Matches->find('list', ['limit' => 200]);
        $bets = $this->MatchBets->Bets->find('list', ['limit' => 200]);
        $this->set(compact('matchBet', 'matches', 'bets'));
        $this->set('_serialize', ['matchBet']);
    }
    
    public function weeklyBets($footballDayId = null) {
    	
    	if ($footballDayId == null) {
    		$today = $this->MatchBets->FootballDays->find('all')
    		->order(['id' => 'DESC'])
    		->first();
    		$footballDayId = $today->id;
    	}
    	
    	$matchesTable = TableRegistry::get('MatchBets');
    	$bets = $matchesTable->getAllBetsBy($footballDayId);
    	
    	
    	
    	$matches = TableRegistry::get('Matches');
    	$matches = $matches->getMatchesByFootballDay($footballDayId);
    	
    	$users = array();
    	$user = array();
    	$user_id = null;
    	foreach ($bets as $bet) {
    		$user_id = $bet['bet']['user_id'];
    		if (!isset($user[$user_id])) {
    			$user[$user_id] = array();
    		}
    		$users[$user_id] = array('id' => $user_id, 'name' => $bet['user']['name']);
    	}
    	
    	$this->set('footballDayId',$footballDayId);
    	 
    	$this->set("users", $users);
    	$this->set("bets", $bets);
    	$this->set("matches", $matches);
    	 
    }

    /**
     * Delete method
     *
     * @param string|null $id Match Bet id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $matchBet = $this->MatchBets->get($id);
        if ($this->MatchBets->delete($matchBet)) {
            $this->Flash->success(__('The match bet has been deleted.'));
        } else {
            $this->Flash->error(__('The match bet could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
