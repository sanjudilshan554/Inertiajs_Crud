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
    }

