<?php

declare(strict_types=1);

namespace Survos\BarcodeBundle\Service;

use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorDynamicHTML;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorJPG;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;

class BarcodeService
{
    public function __construct()
    {
    }

    public function getGeneratorTypes(): array
    {
        return (new \ReflectionClass(BarcodeGenerator::class))->getConstants();
    }
    public function getGeneratorClasses(): array
    {
        // we _could_ use classfinder to get all the classes that implement BarcodeGenerator
        return array_reduce([
            BarcodeGeneratorSVG::class,
            BarcodeGeneratorHTML::class,
//            BarcodeGeneratorDynamicHTML::class,
            BarcodeGeneratorPNG::class,
            BarcodeGeneratorJPG::class
        ], function($carry, $className) {
            $carry[(new \ReflectionClass($className))->getShortName()] = $className;
            return $carry;
        }, []);
    }

    public function getGenerators(): array
    {
        // we _could_ use classfinder to get all the classes that implement BarcodeGenerator
        return array_reduce(array_values($this->getGeneratorClasses()), function($carry, $className) {
            $carry[(new \ReflectionClass($className))->getShortName()] = [
                'class' => $className,
                'imageFormat' => $this->getImageFormat($className)
                ];
            return $carry;
        }, []);
    }

    public function getGeneratorClass(string $shortClassname): string
    {
        return $this->getGeneratorClasses()[$shortClassname];
    }

    public function getImageFormat(string $generatorClass): ?string {
        return match($generatorClass) {
            BarcodeGeneratorJPG::class => 'image/jpeg',
            BarcodeGeneratorPNG::class => 'image/png',
            default => null
        };
    }



}

