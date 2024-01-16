<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::Wwhere('user_id',Auth::user()->id)->get();

        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'numeric|nullable',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id'=> Auth::user()->id,
            'status' => 'UNPAID',
        ]);



        return response()->json(['task' => $task], 201);
    }

}
