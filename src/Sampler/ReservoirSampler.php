<?php
namespace App\Sampler;
use Traversable;

/**
 * Class ReservoirSampler
 *
 * @package App\Sampler
 * @author Magdy Medhat <magdymedhat@gmail.com>
 */
class ReservoirSampler implements SamplerInterface
{
    private $stream;

    public function __construct(Traversable $iterator)
    {
        $this->stream = $iterator;
    }

    public function getSample($length)
    {
        $choosenSample = array();
        $index = 0;

        foreach ($this->stream as $character) {
            if ($index < $length) {
                $choosenSample[$index] = $character;
            } else {
                $randomInteger = mt_rand(0, $index);
                if ($randomInteger < $length) {
                    $choosenSample[$randomInteger] = $character;
                }
            }

            $index++;
        }

        return $choosenSample;
    }
}
