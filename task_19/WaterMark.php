<?php

class WaterMark
{
    private $photo;
    private $stamp;

    function __construct($photo, $stamp)
    {
        $this->photo = $photo;
        $this->stamp = $stamp;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * copy stamp on photo with moving
     * @param string $img_name
     * @return boolean
     */
    public function setWaterMark($img_name)
    {
        $photo = imagecreatefromjpeg($this->photo);
        $stamp = imagecreatefrompng($this->stamp);

        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        imagecopy($photo, $stamp, imagesx($photo) - $sx - $marge_right,
            imagesy($photo) - $sy - $marge_bottom, 0, 0,
            imagesx($stamp), imagesy($stamp)
         );

        imagepng($photo, $img_name . '.png');
        imagedestroy($photo);

        if (file_exists($img_name . '.png')) {
            return true;
        } else {
            return false;
        }
    }
}

$water_mark = new WaterMark('photo.jpeg', 'stamp.png');
$water_mark->setWaterMark('newimg');
