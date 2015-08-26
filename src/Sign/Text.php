<?php
namespace Sign;

class Text {
    private $_text;
    private $_colour;
    private $_background;
    private $_map = array(
    );

    public function __construct($text, $colour = 'red', $background = 'black') {
        $this->_text = $text;
        $this->_colour = $colour;
        $this->_background = $background;
    }

    private function _colour() {
        return ColourMap::get($this->_colour, $this->_background);
    }

    public function render() {
        $output = '';
        foreach (str_split($this->_text) as $char) {
            $output .= $this->_colour().dechex(ord($char));
        }
        return $output;
    }

    public function length() {
        return strlen($this->_text);
    }
}
