<?php
namespace Sign;

class Sign {
    private $_lines = array();
    private function _hex2bin($hexstr)
    {
        $n = strlen($hexstr);
        $sbin="";
        $i=0;
        while($i<$n)
        {
            $a =substr($hexstr,$i,2);
            $c = pack("H*",$a);
            if ($i==0){$sbin=$c;}
            else {$sbin.=$c;}
            $i+=2;
        }
        return $sbin;
    }

    public function upload() {
        $output = '99010102AB00010501';
        foreach ($this->_lines as $line) {
            $output .= $line->render();
        }
        $output .= '329900';
        //return $output;
        return $this->_hex2bin($output);
    }

    public function addLine($text) {
        $line = new Line($text, $this);
        $this->_lines[] = $line;
        return $line;
    }
}
