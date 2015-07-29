<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FootballDays Controller
 *
 * @property \App\Model\Table\FootballDaysTable $FootballDays
 */
class FootballDaysController extends AppController
{
	public $uses = array('Team');
	/**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('footballDays', $this->paginate($this->FootballDays));
        $this->set('_serialize', ['footballDays']);
    }

    /**
     * View method
     *
     * @param string|null $id Football Day id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $footballDay = $this->FootballDays->get($id, [
            'contain' => ['Matches', 'Matches.Locals', 'Matches.Visitors']
        ]);
        $this->__setTomorrow($id);
        $this->__setYesterday($id);
         
        $this->set('footballDay', $footballDay);
        $this->set('_serialize', ['footballDay']);
    }
    
    public function today($id = null)
    {
    	
    	$today = $this->FootballDays->find('all')
    		->order(['id' => 'DESC'])
    		->first();
    	
		$this->__setTomorrow($today->id);
		$this->__setYesterday($today->id);
    	
    	$footballDay = $this->FootballDays->get($today->id, [
    			'contain' => ['Matches', 'Matches.Locals', 'Matches.Visitors']
    	]);
    	
    	$this->set('footballDay', $footballDay);
    	$this->set('_serialize', ['footballDay']);
    	$this->view = "view";
    }
    
    function __setYesterday($id) {
    	$yesterday = $this->FootballDays->find('all')
    	->order(['id' => 'DESC'])
    	->where(['id <' => $id])
    	->first();
    	$this->set('yesterday', $yesterday);
    }
    
    function __setTomorrow($id) {
    	$tomorrow = $this->FootballDays->find('all')
    	->order(['id' => 'DESC'])
    	->where(['id >' => $id])
    	->first();
    	$this->set('tomorrow', $tomorrow);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $footballDay = $this->FootballDays->newEntity();
        if ($this->request->is('post')) {
            $footballDay = $this->FootballDays->patchEntity($footballDay, $this->request->data);
            $footballDay = $this->FootballDays->save($footballDay);
            if (isset($footballDay)) {
            	$matches = $this->request->data['footballDay']['matches'];
            	$count = 1;
            	foreach ($matches as $match) {
            		$match = $this->FootballDays->Matches->newEntity($match);
            		$match['football_day_id'] = $footballDay['id'];
            		$match['number'] = $count;
            		if (isset($match['local_id']) && isset($match['visitor_id'])){
            		$this->FootballDays->Matches->save($match);
            		}
            		$count++;
            	}
                $this->Flash->success(__('The football day has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The football day could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Teams');
        $teams = $this->Teams->find('list', ['limit' => 200]);
        $this->set('teams', $teams);
        $this->set(compact('footballDay'));
        $this->set('_serialize', ['footballDay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Football Day id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $footballDay = $this->FootballDays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $footballDay = $this->FootballDays->patchEntity($footballDay, $this->request->data);
            if ($this->FootballDays->save($footballDay)) {
                $this->Flash->success(__('The football day has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The football day could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('footballDay'));
        $this->set('_serialize', ['footballDay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Football Day id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $footballDay = $this->FootballDays->get($id);
        if ($this->FootballDays->delete($footballDay)) {
            $this->Flash->success(__('The football day has been deleted.'));
        } else {
            $this->Flash->error(__('The football day could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
