<?php
namespace Tests\Iterator;

use App\Iterator\StreamIterator;
use org\bovigo\vfs\vfsStream;

class StreamIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIterator()
    {
        $file = vfsStream::newFile('test')->withContent("ABC")->at(vfsStream::setup('root'));
        $iterator = new StreamIterator($file->url());
        $result = array();

        foreach ($iterator as $character) {
            $result[] = $character;
        }

        $this->assertEquals(["A", "B", "C"], $result);
    }
}
