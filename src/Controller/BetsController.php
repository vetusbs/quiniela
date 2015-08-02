<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bets Controller
 *
 * @property \App\Model\Table\BetsTable $Bets
 */
class BetsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'FootballDays']
        ];
        $this->set('bets', $this->paginate($this->Bets));
        $this->set('_serialize', ['bets']);
    }

    /**
     * View method
     *
     * @param string|null $id Bet id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bet = $this->Bets->get($id, [
            'contain' => ['Users', 'FootballDays']
        ]);
        $this->set('bet', $bet);
        $this->set('_serialize', ['bet']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bet = $this->Bets->newEntity();
        if ($this->request->is('post')) {
            $bet = $this->Bets->patchEntity($bet, $this->request->data);
            if ($this->Bets->save($bet)) {
                $this->Flash->success(__('The bet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bet could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bets->Users->find('list', ['limit' => 200]);
        $footballDays = $this->Bets->FootballDays->find('list', ['limit' => 200]);
        $this->set(compact('bet', 'users', 'footballDays'));
        $this->set('_serialize', ['bet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bet id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bet = $this->Bets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bet = $this->Bets->patchEntity($bet, $this->request->data);
            if ($this->Bets->save($bet)) {
                $this->Flash->success(__('The bet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bet could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bets->Users->find('list', ['limit' => 200]);
        $footballDays = $this->Bets->FootballDays->find('list', ['limit' => 200]);
        $this->set(compact('bet', 'users', 'footballDays'));
        $this->set('_serialize', ['bet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bet id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bet = $this->Bets->get($id);
        if ($this->Bets->delete($bet)) {
            $this->Flash->success(__('The bet has been deleted.'));
        } else {
            $this->Flash->error(__('The bet could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
