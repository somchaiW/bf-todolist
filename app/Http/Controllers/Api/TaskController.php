<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function get_list_task()
    {
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
