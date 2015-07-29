<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pools Controller
 *
 * @property \App\Model\Table\PoolsTable $Pools
 */
class PoolsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('pools', $this->paginate($this->Pools));
        $this->set('_serialize', ['pools']);
    }

    /**
     * View method
     *
     * @param string|null $id Pool id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pool = $this->Pools->get($id, [
            'contain' => ['Matches']
        ]);
        $this->set('pool', $pool);
        $this->set('_serialize', ['pool']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pool = $this->Pools->newEntity();
        if ($this->request->is('post')) {
            $pool = $this->Pools->patchEntity($pool, $this->request->data);
            if ($this->Pools->save($pool)) {
                $this->Flash->success(__('The pool has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pool could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pool'));
        $this->set('_serialize', ['pool']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pool id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pool = $this->Pools->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pool = $this->Pools->patchEntity($pool, $this->request->data);
            if ($this->Pools->save($pool)) {
                $this->Flash->success(__('The pool has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pool could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pool'));
        $this->set('_serialize', ['pool']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pool id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pool = $this->Pools->get($id);
        if ($this->Pools->delete($pool)) {
            $this->Flash->success(__('The pool has been deleted.'));
        } else {
            $this->Flash->error(__('The pool could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
