<?php

namespace Database\Seeders;

use App\Helpers\Types;
use App\Models\Tools;
use Illuminate\Database\Seeder;

class ToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tools::truncate();

        $data = array(
            [
                "key" => "3dphoto",
                "type" => Types::getToolTypeTinyInt( "viewer" ),
                "icon" => "3dphoto.png",
                "collection" => Types::getToolCollectionText( 1 ), // Mozaweb
                "archive" => null,
                "width" => 690,
                "height" => 529
            ],
            [
                "key" => "chart",
                "type" => Types::getToolTypeTinyInt( "creator" ),
                "icon" => "chart.png",
                "collection" => Types::getToolCollectionText( 1 ), // Mozaweb
                "archive" => "1000",
                "width" => 705,
                "height" => 510
            ]
        );

        Tools::insert( $data );
    }
}
