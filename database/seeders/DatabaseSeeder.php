<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'Riccardo',
            'TraineeCode' => 'T013',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Michael Bryan Chandra',
            'TraineeCode' => 'T024',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Jeremy Saputra Tatuil',
            'TraineeCode' => 'T027',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T049',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T052',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T055',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T065',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T069',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T071',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T076',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T079',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T083',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T085',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T094',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T106',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T109',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T118',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T125',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T129',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T130',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T134',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T136',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T142',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Ric',
            'TraineeCode' => 'T333',
            'password' => bcrypt('ric123')
        ]);

    }
}
