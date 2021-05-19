<?php


class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function add() {
        if ($this->request->is('post')) {
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Flash->success(__('Su comentario ha sido guardado.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('No se ha podido guardar su comentario.'));
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Comment->delete($id)) {
            $this->Flash->success(
                __('El comentario ha sido eliminado.')
            );
        } else {
            $this->Flash->error(
                __('El comentario no se pudo eliminar.')
            );
        }
    
        return $this->redirect($this->referer());
    }
    
}