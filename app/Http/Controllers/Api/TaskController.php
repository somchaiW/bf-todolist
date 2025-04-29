<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function add_task(Request $request)
    {
        // $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
        // $time = str_replace('.', ':', $request->time) . ':00'; 
        
        // $task = Task::create
        // ([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'date' => $date,
        //     'time' => $time,
        //     'priority' => $request->priority,
        //     'category' => $request->category,
        //     'status' => false, 
        // ]);
        $task = [
            'id' => 1,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'priority' => $request->priority,
            'category' => $request->category,
            'status' => false, 
        ];

        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'task' => $task,
            ]
        ], 200);
    }
    public function get_priority(){
        $priority = [
            [
                'id'=>1,
                'name'=>'1'
            ],
            [
                'id'=>2,
                'name'=>'2'
            ],
            [
                'id'=>3,
                'name'=>'3'
            ]
        ];return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'priority' => $priority,
            ]
        ], 200);
    }

    public function get_category(){
        $category = [
            [
                'id'=>1,
                'name'=>'Grocery',
                'image'=>'Grocery',
                'color'=>'0xFFccff80'
           
            ],
            [
                'id'=>2,
                'name'=>'Work',
                'image'=>'Work',
                'color'=>'0xFFccff9680'
            ],
            [
                'id'=>3,
                'name'=>'Sport',
                'image'=>'Sport',
                'color'=>'0xFF8ffff'
            ],
            [
                'id'=>4,
                'name'=>'Design',
                'image'=>'Design',
                'color'=>'0xFF80ffd9'
            ],
            [
                'id'=>5,
                'name'=>'University',
                'image'=>'University',
                'color'=>'0xFF809cff'
            ],
            [
                'id'=>6,
                'name'=>'Social',
                'image'=>'Social',
                'color'=>'0xFFff80eb'
            ],
            [
                'id'=>7,
                'name'=>'Music',
                'image'=>'Music',
                'color'=>'0xFFfc80ff'
            ],
            [
                'id'=>8,
                'name'=>'Health',
                'image'=>'Health',
                'color'=>'0xFF80ffa3'
            ],
            [
                'id'=>9,
                'name'=>'Movie',
                'image'=>'Movie',
                'color'=>'0xFF80d1ff'
            ],
            [
                'id'=>10,
                'name'=>'Home',
                'image'=>'Home',
                'color'=>'0xFFffcc80'
            ],
            [
                'id'=>11,
                'name'=>'None',
                'image'=>'None',
                'color'=>'0xFF8875ff'
            ],

        ]; return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'category' => $category,
            ]
        ], 200);
    }


    public function get_list_task()
    {
    //    $tasks = Task::all();
        
    $tasks = [
        [
            'id' => 1,
            'name' => 'Buy groceries',
            'description' => 'Milk, Bread, Eggs',
            'date' => '2025-04-23',
            'time' => ['hour' => '10', 'minute' => '30'],
            'priority' => 2,
            'category' => 'Work',
            'status' => false
        ],
        [
            'id' => 2,
            'name' => 'Team Meeting',
            'description' => 'Project kickoff meeting with the dev team.',
            'date' => '2025-04-24',
            'time' => ['hour' => '14', 'minute' => '00'],
            'priority' => 1,
            'category' => 'None',
            'status' => true
        ],
        [
            'id' => 3,
            'name' => 'Workout',
            'description' => 'Leg day at the gym.',
            'date' => '2025-04-22',
            'time' => ['hour' => '18', 'minute' => '00'],
            'priority' => 3,
            'category' => 'Health',
            'status' => false
        ],
    ];

        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'task' => $tasks
            ]
        ], 200);
    }

    public function update_task(Request $request, $id)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'text' => 'update success'
            ]
        ], 200);
    }
    public function change_name(Request $request, $id)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'text' => 'edit name success'
            ]
        ], 200);
    }
    public function change_pass(Request $request, $id)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'text' => 'edit pass success'
            ]
        ], 200);
    }
    public function change_image(Request $request, $id)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'text' => 'edit profile success'
            ]
        ], 200);
    }
    
    
}
