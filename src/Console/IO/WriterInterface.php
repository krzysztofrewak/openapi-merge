<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge\Console\IO;

interface WriterInterface
{
    public function write(string $message): void;
}
