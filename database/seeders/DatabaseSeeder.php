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
            'name' => 'Teresa Stefanie Sheryl',
            'TraineeCode' => 'T049',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Dave Andrew Nathaniel',
            'TraineeCode' => 'T052',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Jovita Waisakhi',
            'TraineeCode' => 'T055',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Reynaldi Adidarma',
            'TraineeCode' => 'T065',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Fery Fernandi',
            'TraineeCode' => 'T069',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Jessica Ryan',
            'TraineeCode' => 'T071',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Felix Gunawan Hendi',
            'TraineeCode' => 'T076',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Nobel Shan Setiono',
            'TraineeCode' => 'T079',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Axel Kurniawan',
            'TraineeCode' => 'T083',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Nicholas Irvin Suhendi',
            'TraineeCode' => 'T085',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Robert William',
            'TraineeCode' => 'T094',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Andrew Nicholas',
            'TraineeCode' => 'T106',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Michael Alvin Setiono',
            'TraineeCode' => 'T109',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Alexander Ivan Gumilang',
            'TraineeCode' => 'T118',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Nicholas Axel Tanujaya',
            'TraineeCode' => 'T125',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Dave Christian Thio',
            'TraineeCode' => 'T126',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Dionisius Hendi',
            'TraineeCode' => 'T129',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Vincent Tanjaya',
            'TraineeCode' => 'T130',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Terrance Dave Phoebus',
            'TraineeCode' => 'T134',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Rico Aurelio Gunadi Sastra',
            'TraineeCode' => 'T136',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Charlie Lufian',
            'TraineeCode' => 'T139',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Efran Nathanael',
            'TraineeCode' => 'T142',
            'password' => bcrypt('ric123')
        ]);
        DB::table('users')->insert([
            'name' => 'Anthonio Obert Lais',
            'TraineeCode' => 'T333',
            'password' => bcrypt('ric123')
        ]);

    }
}
