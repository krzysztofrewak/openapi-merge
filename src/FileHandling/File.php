<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge\FileHandling;

use const DIRECTORY_SEPARATOR;

use function getcwd;
use KrzysztofRewak\OpenApiMerge\FileHandling\Exception\IOException;
use function pathinfo;
use const PATHINFO_EXTENSION;

use function realpath;
use function strpos;

final class File
{
    public function __construct(
        private string $filename,
    ) {}

    public function getFileExtension(): string
    {
        return pathinfo($this->filename, PATHINFO_EXTENSION);
    }

    public function getAbsolutePath(): string
    {
        $fullFilename = realpath($this->filename);
        if ($fullFilename === false) {
            throw IOException::createWithNonExistingFile(
                $this->createAbsoluteFilePath($this->filename),
            );
        }

        return $fullFilename;
    }

    private function createAbsoluteFilePath(string $filename): string
    {
        if (strpos($filename, "/") === 0) {
            return $filename;
        }

        return getcwd() . DIRECTORY_SEPARATOR . $filename;
    }
}
