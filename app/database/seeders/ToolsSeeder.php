<?php

namespace Database\Seeders;

use App\Helpers\Types;
use App\Models\Tools;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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

        $toolsData = $this->_readJsonFile();

        $dataToDB = array();
        $dataToLangFile = array();

        foreach( $toolsData as $toolData ) {
            $dataToLangFile[$toolData->key] = $this->_getDataToLangFile( $toolData );

            $dataToDB[] = $this->_getDataToDB( $toolData );
        }

        $this->_writeIntoLangFile( $dataToLangFile );

        $this->_insertIntoDB( $dataToDB );
    }

    private function _readJsonFile() {
        $toolsJsonDataDIR = storage_path( "data/tools.json" );
        $toolsJsonData = File::get( $toolsJsonDataDIR );
        $toolsData = json_decode( $toolsJsonData );

        return $toolsData;
    }

    private function _getDataToLangFile( $toolData ) {
        return [
            "title" => $toolData->title,
            "description" => $toolData->description
        ];
    }

    private function _getDataToDB( $toolData ) {
        return [
            "key" => $toolData->key,
            "type" => Types::getToolTypeTinyInt( $toolData->type ),
            "icon" => $toolData->icon,
            "collection" => Types::getToolCollectionText( $toolData->collection ),
            "archive" => $toolData->archive,
            "width" => $toolData->width,
            "height" => $toolData->height,
        ];
    }

    private function _writeIntoLangFile( $dataToLangFile ) {
        $toolsLangDIR = resource_path( "lang/fa/tools.php" );
        $dataToLangFile = $this->_handleDataToLangFile( $dataToLangFile );

        File::replace( $toolsLangDIR, $dataToLangFile );
    }

    private function _handleDataToLangFile( $dataToLangFile ) {
        $dataJson = collect( $dataToLangFile )->toJson( JSON_UNESCAPED_UNICODE );

        /**
         * These replaces are
         * for convert json to php array, because the lang file is php
         * Also these \n or \t for prettier view of php file
         * \n for next line and \t for tab space

         * you could use these 3 below replace instead of those lines, but your php file create in 1 line!

            $dataJson = str_replace( "}", "]", $dataJson );
            $dataJson = str_replace( "{", "[", $dataJson );
            $dataJson = str_replace( ":", " => ", $dataJson );
        */
        
        $dataJson = str_replace( ":{\"", " => [\n\t\t\"", $dataJson );
        $dataJson = str_replace( "{\"", "[\n\n\t\"", $dataJson );

        $dataJson = str_replace( "},\"", "\n\t],\n\n\t\"", $dataJson );
        $dataJson = str_replace( ",\"", ",\n\t\t\"", $dataJson );

        $dataJson = str_replace( "\"}", "\"\n\t]\n", $dataJson );
        $dataJson = str_replace( "}", "]", $dataJson );

        $dataJson = str_replace( ":", " => ", $dataJson );

        $dataToWrite = "<?php\n\nreturn $dataJson;\n";

        return $dataToWrite;
    }

    private function _insertIntoDB( $dataToDB ) {
        Tools::insert( $dataToDB );
    }
}
