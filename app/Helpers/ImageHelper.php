<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Save image
     * @param  string $tmpPath
     * @param  string $format
     *
     * @return string  image path
     */
    public function store($tmpPath, $format)
    {
        $imageName = date('YmdHis') . substr(uniqid(''), 8, 13) . '.' . $format;
        $imgPath = "images/{$imageName}";

        file_put_contents(public_path($imgPath), file_get_contents($tmpPath));

        return $imgPath;
    }
}