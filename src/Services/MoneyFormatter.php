<?php


namespace Src\Services;

class MoneyFormatter
{

    private $numberFormatter;

    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur(float $number)
    {

        $formatted = $this->numberFormatter->format($number);

        return $formatted . " €";
    }

    public function formatUsd(float $number)
    {
        $formatted = $this->numberFormatter->format($number);
        return "$ " . $formatted;
    }
}
