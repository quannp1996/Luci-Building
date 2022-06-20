<?php

namespace App\Containers\EMagazine\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Class EmagazineDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class EmagazineDefaultSettingsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/emagazine.json");
        DB::table('emagazines')->truncate();
        DB::table('emagazines')->insert(json_decode($json, true));
    }
}
