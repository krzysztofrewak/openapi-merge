<?php

declare(strict_types=1);

namespace KrzysztofRewak\OpenApiMerge\Tests;

use function assert;
use cebe\openapi\spec\OpenApi;
use KrzysztofRewak\OpenApiMerge\FileHandling\File;
use KrzysztofRewak\OpenApiMerge\OpenApiMerge;
use KrzysztofRewak\OpenApiMerge\Reader\FileReader;

use PHPUnit\Framework\TestCase;

/**
 * @covers \OpenApiMerge\OpenApiMerge
 */
class OpenApiMergeTest extends TestCase
{
    public function testMergePaths(): void
    {
        $sut = new OpenApiMerge(
            new FileReader(),
        );

        $result = $sut->mergeFiles(
            new File(__DIR__ . "/Fixtures/base.yml"),
            new File(__DIR__ . "/Fixtures/routes.yml"),
            new File(__DIR__ . "/Fixtures/errors.yml"),
        )->getOpenApiSpecificationObject();
        assert($result instanceof OpenApi);

        self::assertCount(1, $result->paths->getPaths());
    }
}
