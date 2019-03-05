<?php

use Illuminate\Database\Seeder;

class PrivilegeItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userManagement = array(
            'create user',
            'edit user',
            'index user',
            'show user',
        );
        foreach ($userManagement as $key => $item) {
            DB::table('privilege_items')->insert([
                'name' => $item,
                'privilege_group_id' => 1,
            ]);
        }

        $projectManagement = array(
            'create project',
            'edit project',
            'index project',
            'show project',
        );
        foreach ($projectManagement as $key => $item) {
            DB::table('privilege_items')->insert([
                'name' => $item,
                'privilege_group_id' => 2,
            ]);
        }
    }
}
