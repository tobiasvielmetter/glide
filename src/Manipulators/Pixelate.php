<?php

namespace League\Glide\Manipulators;

use Intervention\Image\Image;

class Pixelate extends BaseManipulator
{
    /**
     * Perform pixelate image manipulation.
     * @param  Image $image The source image.
     * @return Image The manipulated image.
     */
    public function run(Image $image)
    {
        $pixelate = $this->getPixelate();

        if ($pixelate) {
            $image->pixelate($pixelate);
        }

        return $image;
    }

    /**
     * Resolve pixelate amount.
     * @return string The resolved pixelate amount.
     */
    public function getPixelate()
    {
        if (!is_numeric($this->pixel)) {
            return;
        }

        if ($this->pixel < 0 or $this->pixel > 1000) {
            return;
        }

        return (int) $this->pixel;
    }
}