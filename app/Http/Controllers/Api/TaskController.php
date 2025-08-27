<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    //standard Api response
    Private function apiResponse($success,$status,$message,$data= null)
    {
        return response()->json(
            [
                'success'=>$success,
                'status'=>$status,
                'message'=>$message,
                'data'=>$data
            ],$status);
        
    }




    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    try {
        $tasks = Task::where('user_id', $request->user()->id)->get();//select * from Task where user_id = logged in user id; // generally this is done by sanctum

        if ($tasks->isEmpty()) {
            return $this->apiResponse(false, 404, 'No tasks found');
        }

        return $this->apiResponse(true, 200, 'Tasks retrieved successfully', $tasks);

    } catch (\Exception $e) {
        return $this->apiResponse(false, 500, 'Server error: ' . $e->getMessage());
    }
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
        if ($validator->fails()) {
            return $this->apiResponse(false, 422, 'Validation error', $validator->errors());
    }
     $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id
        ]);

        return $this->apiResponse(true, 201, 'Task created successfully', $task);


}
    /**
     * Display the specified resource.
     */
   public function show(Task $task, Request $request)
    {
        if ($task->user_id !== $request->user()->id) {
            return $this->apiResponse(false, 403, 'Forbidden');
        }
        return $this->apiResponse(true, 200, 'Task retrieved successfully', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return $this->apiResponse(false, 403, 'Forbidden');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'sometimes|boolean'
        ]);
    if ($validator->fails()) {
            return $this->apiResponse(false, 422, 'Validation error', $validator->errors());
        }

        $task->update($request->only(['title', 'description', 'completed']));
        return $this->apiResponse(true, 200, 'Task updated successfully', $task);
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, Request $request)
    {
        if ($task->user_id !== $request->user()->id) {
            return $this->apiResponse(false, 403, 'Forbidden');
        }

        $task->delete();
        return $this->apiResponse(true, 200, 'Task deleted successfully');
    }
}
