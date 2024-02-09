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
}
