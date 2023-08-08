<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();
        return ['success' => true];
    }

    public function index(Request $request)
    {
    }

    public function create(Request $request)
    {

        $categories = Category::all();
        $data = [];
        $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function create_action(Request $request)
    {
        $task = $request->only('title', 'category_id', 'description', 'due_date');
        $task['user_id'] = 1;
        $dbTask = Task::create($task);

        return redirect(route('tasks.create'));
    }


    public function edit(Request $request)
    {
        $id = $request->id;


        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }
        $data['task'] = $task;

        $categories = Category::all();
        $data['categories'] = $categories;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        $request_data = $request->only(['id', 'title', 'due_date', 'category_id', 'description']);
        $request_data['is_done'] = $request->is_done ? true : false ;

        $task = Task::find($request->id);

        if (!$task) {
            return 'Task Inexistente';
        }

        $task->update($request_data);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }
}
