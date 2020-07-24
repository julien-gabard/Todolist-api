<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Task;

class TaskController extends Controller
{
    /**
     * Liste des tâches
     * 
     * @return void
     */
    public function list()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Créer une tâche
     * 
     * @return
     */
    public function create(Request $request)
    {
        $validateData = $this->validate($request, [
            'title' => 'required|string',
            'category_id' => 'required|int'
        ]);
        $task = new Task();
        $task->title = $validateData['title'];
        $task->category_id = $validateData['category_id'];
        if ($task->save()) {
            return response()->json($task, 201);
        } else {
            return abort(500);
        };
    }

    /**
     * Une tâche selon l'id
     * 
     * @return
     */
    public function task($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    /**
     * Mettre à jours une tâche
     * 
     * @return
     */
    public function update($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $data = $this->validate($request, [
            'title' => 'string',
            'completion' => 'integer|between:0,100',
            'status' => 'integer|in:1,2'
        ]);
        $task->title = $data['title'] ?? $task->title;
        $task->completion = $data['completion'] ?? $task->completion;
        $task->status = $data['status'] ?? $task->status;
        if ($task->save()) {
            return response()->json($task, 200);
        } else {
            return abort(500);
        }
    }

    /**
     * Supprimer une tâche
     * 
     * @return
     */
    public function delete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return abort(404);
        } else {
            $ok = $task->delete();
            if ($ok) {
                return response()->json($task, 204);
            } else {
                return abort(500);
            }
        }
    }
}