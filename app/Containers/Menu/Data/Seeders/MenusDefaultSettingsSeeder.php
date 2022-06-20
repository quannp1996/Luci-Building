<?php

namespace App\Containers\Menu\Data\Seeders;

use App\Containers\Menu\Models\Menu;
use App\Containers\Menu\Models\MenuDesc;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Class MenusDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class MenusDefaultSettingsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = json_decode(File::get("database/seeds/menu.json"), true);
        $jsonDESC = json_decode(File::get("database/seeds/menudesc.json"), true);
        DB::table('menu')->truncate();
        DB::table('menu_description')->truncate();
        foreach($json AS $key => $value){
            $menu = new Menu($value);
            $menu->save();
            $menuDesc = new MenuDesc(array_merge(
                $jsonDESC[$key],
                [
                    'menu_id' => $menu->id
                ]
            ));
            $menuDesc->save();
        }
    }
}
