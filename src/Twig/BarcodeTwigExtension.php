<?php

namespace Survos\BarcodeBundle\Twig;

use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorSVG;
use Survos\BarcodeBundle\Service\BarcodeService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class BarcodeTwigExtension extends AbstractExtension
{
    public function __construct(
        private BarcodeService $barcodeService,
        private int $widthFactor,
        private int $height,
        private string $foregroundColor
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('barcode', [$this, 'barcode'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('barcode', [$this, 'barcode'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function barcode(string $value, ?int $widthFactor = null, ?int $height = null, ?string $foregroundColor = null, string $type = BarcodeGenerator::TYPE_CODE_128, string $generatorClass = BarcodeGeneratorSVG::class ): string
    {
        $generator = new $generatorClass();
        $barcodeData = $generator->getBarcode(
            $value,
            $type,
            $widthFactor ?? $this->widthFactor,
            $height ?? $this->height,
//            $foregroundColor ?? $this->foregroundColor
        );
        if ($this->barcodeService->getImageFormat($generatorClass)) {
            $barcodeData = base64_encode($barcodeData);
        }
        return $barcodeData;
    }
}
