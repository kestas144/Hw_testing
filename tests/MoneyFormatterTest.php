<?php

namespace Src\Tests;

use PHPUnit\Framework\TestCase;
use Src\Services\MoneyFormatter;
use Src\Services\NumberFormatter;


class MoneyFormatterTest extends TestCase
{

    protected $mockNumberFormatter;
    protected $moneyFormatter;

    protected function setUp(): void
    {
        $this->mockNumberFormatter = $this->getMockBuilder(NumberFormatter::class)
            ->setMethods(['format'])
            ->getMock();
        $this->moneyFormatter = new MoneyFormatter($this->mockNumberFormatter);
    }

    /**
     * @param int $number
     * @param string $returnedString
     * @param array $formattedString
     * @dataProvider provide
     */
    public function testFormatEur(float $number, string $returnedString, array $formattedString)
    {

        $this->mockNumberFormatter
            ->method('format')
            ->with($number)
            ->willReturn($returnedString);

        $eur = $this->moneyFormatter->formatEur($number);
        $this->assertSame($formattedString['eur'], $eur);
    }

    /**
     * @param float $number
     * @param string $returnedString
     * @param array $formattedString
     * @dataProvider provide
     */
    public function testFormatUsd(float $number, string $returnedString, array $formattedString)
    {

        $this->mockNumberFormatter
            ->method('format')
            ->with($number)
            ->willReturn($returnedString);

        $eur = $this->moneyFormatter->formatUsd($number);
        $this->assertSame($formattedString['usd'], $eur);
    }

    public function provide()
    {

        return [
            [-2835779, '-2.84M', ['usd' => '$ -2.84M', 'eur' => '-2.84M €']],
            [2835779, '2.84M', ['usd' => '$ 2.84M', 'eur' => '2.84M €']],
            [211.99, '211.99', ['usd' => '$ 211.99', 'eur' => '211.99 €']],
            [-211.99, '-211.99', ['usd' => '$ -211.99', 'eur' => '-211.99 €']]
        ];

    }
}
