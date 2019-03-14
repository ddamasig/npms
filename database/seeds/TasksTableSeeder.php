<?php

use Illuminate\Database\Seeder;
use App\Module;
use App\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all modules
        $modules = Module::all();
        // Get the first and last User
        $firstUser = User::orderBy('id', 'asc')->first();
        $lastUser = User::orderBy('id', 'desc')->first();

        foreach ($modules as $key => $module) {
            for ($i=0; $i < 3; $i++) { 
                DB::table('tasks')->insert([
                    'name' => 'Task #' . $i,
                    'module_id' => $module->id,
                    'developer_id' => rand($firstUser->id, $lastUser->id)
                ]);
            }
        }
    }
}
