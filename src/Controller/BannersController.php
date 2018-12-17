<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class BannersController extends AppController {

    public function initialize() {

        parent::initialize();

        $this->loadComponent('UploadImage');
    }

    public function isAuthorized($user = null) {

        if($user['role'] == 'admin') {
            
            return true;
        }

        return false;
    }

    public function beforeRender(Event $event) {

        $actions = [
            'index',
            'add',
            'edit',
            'delete'
        ];

        if(in_array($this->request->action, $actions)) {

            $this->viewBuilder()->theme('AdminLTE');
            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }
    }

    public function index() {
        
        $banners = $this->paginate($this->Banners);
        $this->set(compact('banners'));
    }

    public function add() {

        $banner = $this->Banners->newEntity();
        
        if($this->request->is('post')) {

            $config = [
                'dir'   => 'banners',
                'type'  => 'slide'
            ];
            
            $data = $this->UploadImage->Banners($this->request->getData(), $config);

            if(!($data)) {

                $this->Flash->error(__('Verifique o formato e tamanho da imagem!'));
                return $this->redirect(['action' => 'edit']); 
            }
            
            $banner = $this->Banners->patchEntity($banner, $data);        
            $banner->status = 1;
            
            if($this->Banners->save($banner)) {
                
                $this->Flash->success(__('The banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }

        $this->set(compact('banner'));
    }

    public function edit($id = null) 
    {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);

        if($this->request->is(['patch', 'post', 'put'])) {
            
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            
            if($this->Banners->save($banner)) {
                
                $this->Flash->success(__('The banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }

        $this->set(compact('banner'));
    }

    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        
        if($this->Banners->delete($banner)) {
            
            $this->Flash->success(__('The banner has been deleted.'));
        } 
        else {
            
            $this->Flash->error(__('The banner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
