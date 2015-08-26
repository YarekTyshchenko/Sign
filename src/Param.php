<?php
namespace Sign;

class Param {
    private $_value;
    private $_size;
    private $_bound = false;
    private $_pad = STR_PAD_RIGHT;

    public function setValue($value) {
        $this->_value = $value;
        $this->_bound = true;
    }

    public function align($type) {
        switch ($type) {
            case 'left': $this->_pad = STR_PAD_RIGHT;break;
            case 'center': $this->_pad = STR_PAD_BOTH;break;
            case 'right': $this->_pad = STR_PAD_LEFT;break;
        }
        $this->_align = $type;
    }

    public function value() {
        $value = str_pad($this->_value, $this->_size, ' ', $this->_pad);
        return $value;
    }

    public function bound() {
        return $this->_bound;
    }

    public function __construct($size) {
        $this->_size = $size;
    }
}
