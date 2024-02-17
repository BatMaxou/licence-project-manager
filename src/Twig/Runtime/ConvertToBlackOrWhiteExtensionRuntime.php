<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class ConvertToBlackOrWhiteExtensionRuntime implements RuntimeExtensionInterface
{
    private const BLACK = '#000';
    private const WHITE = '#fff';

    public function convertBOW($hex)
    {
        $split = str_split($hex);

        $red = $split[1] . $split[2];
        $green = $split[3] . $split[4];
        $blue = $split[5] . $split[6];

        $ratio = (hexdec($red) * 0.299 + hexdec($green) * 0.587 + hexdec($blue) * 0.114);

        if ($ratio >= 150) {
            return self::BLACK;
        } else {
            return self::WHITE;
        }
    }
}
