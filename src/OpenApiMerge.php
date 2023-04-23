<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge;

use function array_merge;
use function assert;
use cebe\openapi\spec\OpenApi;
use cebe\openapi\spec\Paths;
use KrzysztofRewak\OpenApiMerge\FileHandling\File;

use KrzysztofRewak\OpenApiMerge\FileHandling\SpecificationFile;
use KrzysztofRewak\OpenApiMerge\Reader\FileReader;

class OpenApiMerge
{
    public function __construct(
        private FileReader $openApiReader,
    ) {}

    public function mergeFiles(File $baseFile, File ...$additionalFiles): SpecificationFile
    {
        $mergedOpenApiDefinition = $this->openApiReader->readFile($baseFile)->getOpenApiSpecificationObject();
        assert($mergedOpenApiDefinition instanceof OpenApi);

        foreach ($additionalFiles as $additionalFile) {
            $additionalDefinition = $this->openApiReader->readFile($additionalFile)->getOpenApiSpecificationObject();
            assert($additionalDefinition instanceof OpenApi);

            $mergedOpenApiDefinition->paths = new Paths(
                array_merge(
                    $mergedOpenApiDefinition->paths?->getPaths() ?? [],
                    $additionalDefinition->paths?->getPaths() ?? [],
                ),
            );
        }

        if ($mergedOpenApiDefinition->components !== null) {
            $mergedOpenApiDefinition->components->schemas = [];
        }

        return new SpecificationFile(
            $baseFile,
            $mergedOpenApiDefinition,
        );
    }
}
