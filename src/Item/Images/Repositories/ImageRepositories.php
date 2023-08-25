<?php

namespace Src\Item\Images\Repositories;

use Exception;
use Illuminate\Support\Facades\Storage;
use Src\Item\Object\Repositories\ObjectRepositoriesInterfaces;

class ImageRepositories implements ImageRepositoriesInterfaces
{
    public static function storeImages($imagePaths)
    {
        $storedImages = [];
        if (!is_array($imagePaths) && !is_object($imagePaths)) {
            return $storedImages;
        }

        foreach ($imagePaths as $imagePath) {
            $storedImage = Storage::disk('Item')->put('images', $imagePath);
            $storedImages[] = $storedImage;
        }

        return $storedImages;
    }

    public static function uploadImage($imageData)
    {

        if (is_array($imageData)) {
            return self::storeImages($imageData);
        } else {
            return self::storeImages([$imageData]);
        }
    }

    public static function Save($imagePaths)
    {
        try {
            $storedImages = self::uploadImage($imagePaths);

            $imagesData = [];
            foreach ($storedImages as $storedImage) {
                $imagesData[] = [
                    'image_path' => $storedImage,
                ];
            }
            return $imagesData;
        }catch (
            \Exception $e) {
            throw new Exception('Error in saving data: ' . $e->getMessage());
        }

        //$item->itemImages()->createMany($imagesData);
    }
    }


