<?php

use App\GameBesar;
use App\TabelGamebes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlayerSeeder::class, false);
        $this->call(PosSeeder::class, false);
        $this->call(ArtifactSeeder::class, false);
        $this->call(ItemSeeder::class, false);
        $this->call(GameBesarSeeder::class, false);
        $this->call(TabelGamebesSeeder::class, false);
    }
}
