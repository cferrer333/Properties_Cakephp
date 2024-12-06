<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');

        if ($key) {
            $query = $this->Properties->find('all')
                ->where(['Address LIKE' => "%".$key."%"]);
        }else{
            $query = $this->Properties;
        }
        $properties = $this->paginate($query);

        $this->set(compact('properties'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, contain: []);
        $this->set(compact('property'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());

             // Handle file upload
             if(!$property->getErrors) {
                $Photo = $this->request->getData('photo_file');

        $name = $Photo->getClientFilename();

        $targetPath = WWW_ROOT.'img'.DS.$name;
        if($name) {
            $Photo->moveTo($targetPath);

            $property->Photo = $name;
        }
             }
      
        

            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $property = $this->Properties->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
