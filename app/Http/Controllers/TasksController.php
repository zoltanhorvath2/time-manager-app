<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function new(Request $request){

        $validator = Validator::make($request->all(), [

            'date' => 'required|date',
            'hours' => 'required|numeric|min:1|max:12',
            'description' => 'required|max:150'

        ]);

        if ($validator->passes()) {

            $task = new Task();

            $task->hours = $request->hours;
            $task->date = $request->date;
            $task->description = $request->description;
            $task->day = Carbon::parse($request->date)->format('l');
            $task->month = Carbon::parse($request->date)->format('m');
            $task->week_index = Carbon::parse($request->date)->weekOfYear;
            $task->user_id = Auth::id();
            $task->created_at = Carbon::now();
            $task->updated_at = Carbon::now();

            $newTask = $task->save();

            if($newTask){
                return response()->json([
                    'code' => 1,
                    'success_message'=>'Új rekord hozzáadva.',
                    'data' => $request->all()
                ]);
            }else{
                return response()->json(['code' => 0, 'error_messages'=> 'Mentés sikertelen!']);
            }
        }
    	return response()->json(['code' => 0, 'error_messages'=>$validator->errors()->all()]);
    }

    public function list(){
        $tasks = Task::where('user_id', Auth::id())
                ->orderBy('week_index')
                ->get()
                ->groupBy('week_index');

        return response()->json([
            'code' => 1,
            'weeks'=> $tasks
        ]);
    }
}
