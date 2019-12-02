<?php

namespace Src\Services;

class NumberFormatter

{
    private $string;
    /**
     * @param $float
     * @return string
     */
    public function format($float): string
    {
        if (abs($float) >= 999500) {
            $rounded = round($float, -4);
            $millions = $rounded / 1000000;
            $modified = number_format($millions, 2);
            $this->string = $modified."M";
        } elseif (abs($float) >= 99950) {
            $rounded = round($float, -3);
            $thousands = $rounded / 1000;
            $this->string = $thousands."K";
        } elseif ((abs($float) >= 1000) || (abs($float) == 999.9999)) {
            $thousands = $float / 1000;
            $modified = number_format($thousands, 3);
            $this->string = str_replace('.', ' ', $modified);
        } elseif (abs($float) == 999.99) {
            $this->string = $float;
        } else {
            $format = number_format($float, 2, '.','');

            if($format - floor($float) == 0){
               $this->string = round($format);
            } else {
                $this->string = $format;
            }
        }
        return $this->string;
    }
}