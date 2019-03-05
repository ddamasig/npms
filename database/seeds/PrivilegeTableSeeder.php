<?php

use Illuminate\Database\Seeder;
use App\PrivilegeItem;
use App\User;

class PrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::where('last_name', 'Damasig')->first();
        $privilegeItems = PrivilegeItem::all();
        foreach ($privilegeItems as $key => $pi) {
            DB::table('privileges')->insert([
                'privilege_item_id' => $pi->id,
                'user_id' => $user->id
            ]);
        }
    }
}
