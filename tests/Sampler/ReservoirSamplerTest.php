<?php
namespace Tests\Sampler;

use App\Sampler\ReservoirSampler;
use ArrayIterator;

class ReservoirSamplerTest extends \PHPUnit_Framework_TestCase
{
    public function testReservoirSampler()
    {
        $sampler = new ReservoirSampler(new ArrayIterator([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]));
        $this->assertCount(1, $sampler->getSample(1));
        $this->assertCount(10, $sampler->getSample(10));
        $this->assertCount(15, $sampler->getSample(15));
    }
}
