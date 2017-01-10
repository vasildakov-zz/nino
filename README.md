# UK National Insurance Number (NINO)

## Synopsis
Value Object that represents an UK National Insurance Number (NINO)

## Installation

Here is a minimal example of a `composer.json` file that just defines a dependency on Nino:

    {
        "require": {
            "vasildakov/nino": "^0.1"
        }
    }

## Code Example

```php
<?php
use VasilDakov\Nino\Nino;

$nino = new NationalInsuranceNumber('QQ 12 34 56 C');

$tn = new TemporaryNumber('TN 31 12 58 F');

$cbn = new ChildBenefitNumber('CHB12345678 AB');

```


https://en.wikipedia.org/wiki/National_Insurance_number