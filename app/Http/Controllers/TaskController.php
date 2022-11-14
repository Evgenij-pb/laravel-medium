<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $user = Auth::user();
        return view('tasks.index', [
            'tasks'=> $user ->tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255'
        ]);

        $user = Auth::user();
        $user->tasks()->create([
            'name'=>$request->name,
        ]);
        return redirect(route('task.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('owner',$task);
        return view('tasks.edit',[
            'task'=>$task,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request,[
            'name'=>'required|max:15'
        ]);

        $this->authorize('owner',$task);
        $task ->name=$request -> name;
        $task->save();
        return redirect(route('task.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)

    {

        $this->authorize('owner',$task);
        
        $task->delete();
        return redirect(route('task.index'));
    }
}
