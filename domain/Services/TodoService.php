<?php 

namespace domain\Services;

use App\Models\Todo;

    class TodoService {

        // creating constructor
        protected $task;

        public function __construct() {
            $this->task=new Todo();
        }

        // getting all data through task model
        public function get(){
            return $this->task->all();
        }

        // store data 
        public function store($data) {
            return $this->task->create($data);
        }

        public function delete($id) {
            return $this->task->find($id)->delete();
        }

        public function getTask($id){
            return $this->task->find($id);
        }

        public function update($data, $id){
            // going to model
           $this->task->updateUser($data, $id);
        }

        public function status($id) {
            $task=$this->task->find($id);
            $task->status= 1;
            $task->save();
        }
    }

