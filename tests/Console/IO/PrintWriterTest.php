<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge\Tests\Console\IO;

use KrzysztofRewak\OpenApiMerge\Console\IO\PrintWriter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \OpenApiMerge\Console\IO\PrintWriter
 */
class PrintWriterTest extends TestCase
{
    public function testWrite(): void
    {
        $sut = new PrintWriter();
        $this->expectOutputString("Dummy");
        $sut->write("Dummy");
    }
}
