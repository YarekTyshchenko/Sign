<?php
namespace Sign;

use Sign\Param;
use Sign\ColourMap;

class Line {
    private $_length = 21;
    private $_text;
    private $_background = 'black';
    private $_parent;
    private $_colours = array();
    private $_params = array();

    public function __construct($text, $parent) {
        // tokenise text
        preg_match_all('/\?+/', $text, $matches, PREG_OFFSET_CAPTURE);
        foreach ($matches[0] as $key => $match) {
            $this->_params[$key] = array('param' => new Param(strlen($match[0])), 'offset' => $match[1]);
        }

        $this->_text = $text;
        $this->_parent = $parent;
    }
    public function color($start, $end, $name) {
        return $this->colour($start, $end, $name);
    }

    public function colour($start, $end, $name) {
        $this->_colours[] = array($start, $end, $name);
        return $this;
    }

    public function end() {
        return $this->_parent;
    }

    public function bind($position, $value) {
        $this->_params[$position]['param']->setValue($value);
        return $this;
    }

    public function align($position, $type) {
        $this->_params[$position]['param']->align($type);
        return $this;
    }

    private function _getColour($key) {
        foreach ($this->_colours as $colour) {
            if ($key >= $colour[0] && $key <= $colour[1]) {
                return $colour[2];
            }
        }
        return 'red';
    }

    public function render() {
        $output = '';
        $length = 0;

        foreach ($this->_params as $key => $param) {
            $p = $param['param'];
            if (!$p->bound()) continue;
            $this->_text = substr_replace($this->_text, $p->value(), $param['offset'], strlen($p->value()));
        }
        // apply colours
        foreach (str_split($this->_text) as $key => $char) {
            if ($length++ > $this->_length) break;
            $fore = $this->_getColour($key);
            $output .= $this->_char($char, $fore);
        }
        // add padding
        if ($length < $this->_length) {
            for ($i=$length; $i < $this->_length; $i++) {
                $output .= $this->_char(' ', null, $this->_background);
            }
        }
        return $output;
    }

    private function _char($char, $fore = 'red', $back = 'black') {
        return ColourMap::get($fore, $back).dechex(ord($char));
    }
}
