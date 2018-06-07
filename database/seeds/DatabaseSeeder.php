<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $quests = factory(\App\Models\Quest::class, 10)->create();

        $quests->each(function (\App\Models\Quest $quest) {
            $count = random_int(100, 500);
            factory(\App\Models\Booking::class, $count)->create([
                'quest_id' => $quest->id,
            ]);
        });
    }
}
