<?php
namespace App\Iterator;

use IteratorAggregate;
use Exception;
/**
 * Class StreamIterator
 *
 * @package App\Iterator
 * @author Magdy Medhat <magdymedhat@gmail.com>
 */
class StreamIterator implements IteratorAggregate
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getIterator()
    {
        try
        {
            $stream = fopen($this->path, 'r');
            if (!$stream) {
                throw new Exception();
            }

            while(!feof($stream)) {
                $character = fgetc($stream);
                yield $character;
            }

            fclose($stream);
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
