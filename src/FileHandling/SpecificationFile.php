<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge\FileHandling;

use cebe\openapi\SpecObjectInterface;

final class SpecificationFile
{
    public function __construct(
        private File $file,
        private SpecObjectInterface $openApiSpecificationObject,
    ) {}

    public function getFile(): File
    {
        return $this->file;
    }

    public function getOpenApiSpecificationObject(): SpecObjectInterface
    {
        return $this->openApiSpecificationObject;
    }
}
