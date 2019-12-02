<?php

namespace Src\Tests;

use PHPUnit\Framework\TestCase;
use Src\Services\NumberFormatter;


class NumberFormatterTest extends TestCase
{
    /**
     * @param $actual
     * @param $expected
     * @dataProvider formattedNumberProvider
     */
    public function testFormat(float $actual, string $expected)
    {

        $returned = new NumberFormatter();
        $this->assertSame($expected, $returned->format($actual));
    }

    public function formattedNumberProvider()
    {
        return [
            [-2835779, '-2.84M'],
            [2835779, '2.84M'],
            [999500, '1.00M'],
            [-999500, '-1.00M'],
            [535216, '535K'],
            [-535216, '-535K'],
            [99950, '100K'],
            [-99950, '-100K'],
            [27533.78, '27 534'],
            [-27533.78, '-27 534'],
            [211.99, '211.99'],
            [-211.99, '-211.99'],
            [999.99, '999.99'],
            [-999.99, '-999.99'],
            [999.9999, '1 000'],
            [-999.9999, '-1 000'],
            [533.1, '533.10'],
            [-533.1, '-533.10'],
            [66.6666, '66.67'],
            [-66.6666, '-66.67'],
            [12.00, '12'],
            [-12.00, '-12'],
        ];

    }
}
