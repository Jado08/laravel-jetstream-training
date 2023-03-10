<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class DefaultTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Task:: truncate();
        $tasks = [
            [
                'description' => 'Task 1',
                'status' => 1,
                'assignee' => 'Dev 1'
            ],
            [
                'description' => 'Task 2',
                'status' => 0,
                'assignee' => 'Dev 2'
            ],
            [
                'description' => 'Task 3',
                'status' => 1,
                'assignee' => 'Dev 3'
            ],
        ];
        Task::insert($tasks);
    }
}
