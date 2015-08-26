<?php
namespace Sign;

class ColourMap {
    private static $_map = array(
        'black' => array(
            'black' => '00',
            'red' => '08',
            'green' => '10',
            'yellow' => '18'
        ),
        'red' => array(
            'black' => '08',//
            'red' => '08',//
            'green' => '08',//
            'yellow' => '19',
        ),
        'green' => array(
            'black' => '02',
            'red' => '08', //
            'green' => '08',//
            'yellow' => '08'//
        ),
        'yellow' => array(
            'black' => '08',//
            'red' => '0B',
            'green' => '08',//
            'yellow' => '08'//
        )
    );

    public static function get($fore, $back) {
        if (!isset(self::$_map[$back][$fore])) return '08';
        return self::$_map[$back][$fore];
    }
}