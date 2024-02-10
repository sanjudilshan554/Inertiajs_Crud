<?php

namespace App\Http\Controllers;

use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;
// use TodoFacade;



class TodoController extends Controller
{
    public function index(){
        return Inertia::render("Todo/index");
    }

    public function store(Request $request){
        TodoFacade::store($request->all());
    }

    public function data(){
        $tasks=TodoFacade::get();
        return response()->json($tasks);
    }

    public function delete($task_id){
        return TodoFacade::delete($task_id);
    }

    public function edit($task_id){
        return TodoFacade::getTask($task_id);
    }

    public function update(Request $request, $task_id){
        TodoFacade::update($request->all(), $task_id);
    }

    public function status($id){
        TodoFacade::status($id);
    }
}
