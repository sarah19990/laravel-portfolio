<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::select('id', 'project_id', 'title', 'status', 'due_date', 'created_at', 'updated_at')->get();
        return $task;
    }

    public function store(Request $request)
    {

        $title = $request->title;
        $status = $request->status;
        $due_date = $request->due_date;


        if (empty($title)) {
            return "The title field is required";
        }

        if (in_array($status, ["Pending", "In Progress", "Completed"])) {
            return "status is valid";
        } else {
            return "Invalid status";
        }

        if (strtotime($due_date)) {
            return "Date is valid";
        } else {
            return "The due date must be a valid date";
        }

        $task = new Task([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'due_date'  => $request->get('due_date')
        ]);
        $task->save();

        return "Task Created Sucessfully";
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->get('title');
        $task->status = $request->get('status');
        $task->due_date = $request->get('due_date');
        $task->save();

        return "Task updated sucessfully";
    }

    public function destroy($id)
    {

        $task = Task::find($id);
        $task->delete();

        return "Task deleted successfully";
    }
}
