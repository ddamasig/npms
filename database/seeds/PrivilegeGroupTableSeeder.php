<?php

use Illuminate\Database\Seeder;

class PrivilegeGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = array(
            'user management',
            'project management',
        );
        foreach ($groups as $key => $group) {
            DB::table('privilege_groups')->insert([
                'name' => $group,
            ]);
        }
    }
}
