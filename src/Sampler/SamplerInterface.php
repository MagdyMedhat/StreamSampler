<?php
namespace App\Sampler;

/**
 * Interface SamplerInterface
 *
 * @package App\Sampler
 * @author Magdy Medhat <magdymedhat@gmail.com>
 */
interface SamplerInterface
{
    public function getSample($length);
}
