# OpenAPI Merge (alternative development)

[![Test Status](https://github.com/krzysztofrewak/openapi-merge/workflows/Tests/badge.svg)](https://github.com/krzysztofrewak/openapi-merge/actions)
[![Docker Build Status](https://github.com/krzysztofrewak/openapi-merge/workflows/Docker-Build/badge.svg)](https://github.com/krzysztofrewak/openapi-merge/actions)
[![codecov](https://codecov.io/gh/krzysztofrewak/openapi-merge/branch/main/graph/badge.svg?token=dffVbhqxvg)](https://codecov.io/gh/krzysztofrewak/openapi-merge)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fkrzysztofrewak%2Fopenapi-merge%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/krzysztofrewak/openapi-merge/main)
[![Latest Stable Version](https://poser.pugx.org/krzysztofrewak/openapi-merge/v)](//packagist.org/packages/krzysztofrewak/openapi-merge)
[![License](https://poser.pugx.org/krzysztofrewak/openapi-merge/license)](//packagist.org/packages/krzysztofrewak/openapi-merge)


Read multiple OpenAPI 3.0.x YAML and JSON files and merge them into one large file.  
This application is build on [cebe/php-openapi](https://github.com/cebe/php-openapi) 

# Installation
```
composer require krzysztofrewak/openapi-merge --dev
```

# Usage
## CLI
```
$ vendor/bin/openapi-merge --help

Usage:
    openapi-merge basefile.yml additionalFileA.yml additionalFileB.yml [...]  > combined.yml

```

### Arguments
| Argument | Meaning |
| --- | ---  |
| --match[=MATCH] | Use a RegEx pattern to determine the additionalFiles. If this option is set the additionalFiles could be omitted (multiple values allowed) |
| --resolve-references[=RESOLVE-REFERENCES] | Resolve the "$refs" in the given files [default: true] |
| -o, --outputfile[=OUTPUTFILE] | Defines the output file for the result. Defaults the result will printed to stdout |

## Outputformat
The output format is determined by the basefile extension.
