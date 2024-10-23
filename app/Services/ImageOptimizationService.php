<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ImageOptimizationService{

    public $manager;
    public $image;

    public function __construct($image)
    {
        $this->manager = new ImageManager(new Driver());
        $this->image = $this->manager->read($image);
    }

    public function generateOptimizedWebp(): \Intervention\Image\Interfaces\EncodedImageInterface
    {
       return $this->image->encode(new WebpEncoder(quality: 65));
    }

    public function getBlurVersionWebp(){
        $b_img=clone $this->image;
        $b_img->blur(15);
//        $b_img->stream();
        $pointer= $b_img->toWebp()->toFilePointer();
        return $pointer;
    }

}




