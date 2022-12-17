<?php

namespace App\Helpers;

class Types {
    const GENDER = "male,female";

    /**
     * @param male|female $gender
     * @return boolean
     */
    public static function getGenderBool( $gender ) {
        if ( $gender === "male" ) return MALE;
        return FEMALE;
    }

    /**
     * @param MALE|FEMALE $gender
     * @return string
     */
    public static function getGenderText( $gender ) {
        if ( $gender === MALE ) return "male";
        return "female";
    }

    const ToolsType = "1,2,3"; // 1: creator, 2: viewer, 3: games

    /**
     * @param int $type `1`|`2`|`3`
     * @return string
     */
    public static function getToolTypeText( int $type ) {
        return explode( ",", self::ToolsType )[ $type - 1 ];
    }
    
    /**
     * @param string $type `creator`|`viewer`|`game`
     * @return int
     */
    public static function getToolTypeTinyInt( $type ) {
        return array_search( $type, ( array_keys( explode( ",", self::ToolsType ) ) + 1 ) );
    }

    const ToolsCollection = "Mozaweb,Vascak,Phet,Toytheater,didax,flash";

    /**
     * @param int $type 1 through 7
     * @return string
     */
    public static function getToolCollectionText( int $type ) {
        return explode( ",", self::ToolsCollection )[ $type - 1 ];
    }

    
    /**
     * @param string $type `Mozaweb`|`Vascak`|`Phet`|`Toytheater`|`didax`|`flash`
     * @return int
     */
    public static function getToolCollectionTinyInt( $type ) {
        return array_search( $type, ( array_keys( explode( ",", self::ToolsCollection ) ) + 1 ) );
    }
}