<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'album_id', 'image', 'caption',
    ];

    public static $_thumbdir = [
        '700x525',
        '400x300',
        '100x80',
        '300x300',
    ];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function image($size = null)
    {
        if($size){
            $_image = asset('images/default/' . $size . '.jpg');
            $original = public_path('uploads/photo/'. $this->image);

            if($this->image && file_exists($original)){
                $_image = asset('uploads/photo/' . $size . '/' . $this->image);
                $_image_path = public_path('uploads/photo/' . $size . '/' . $this->image);
                if(!file_exists($_image_path)){
                    $this->imageCompress($original);
                    $_image = new  _image('photo', $size, $this->image);
                }
            }
        }else{
            $original = public_path('uploads/photo/'. $this->image);
            if($this->image && file_exists($original)){
                $_image = asset('uploads/photo/'. $this->image);
            }else{
                $_image = null;
            }
        }
        return $_image;
    }

    protected function imageCompress($image)
    {
        if($image){
            $imagesize = getimagesize($image);
            $filesize = filesize($image);
            if($filesize > $this->maxFileSize){
                $newimage = $this->resize_image($image);
                if($imagesize['mime'] == "image/gif"){
                    imagegif($newimage, $image);
                }elseif($imagesize['mime'] == "image/jpeg"){
                    imagejpeg($newimage, $image);
                }elseif($imagesize['mime'] == "image/bmp"){
                    imagebmp($newimage, $image);
                }elseif($imagesize['mime'] == "image/png"){
                    imagepng($newimage, $image);
                }
            }
        }
    }

    function resize_image($file, $w=1000, $h=1000) {
        $imagesize = getimagesize($file);
        if($imagesize){

            $width = $imagesize[0];
            $height = $imagesize[1];
            $r = $width / $height;
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
            if($imagesize['mime'] == "image/gif"){
                $src = imagecreatefromgif($file);
            }elseif($imagesize['mime'] == "image/jpeg"){
                $src = imagecreatefromjpeg($file);
            }elseif($imagesize['mime'] == "image/bmp"){
                $src = imagecreatefrombmp($file);
            }elseif($imagesize['mime'] == "image/png"){
                $src = imagecreatefrompng($file);
            }elseif($imagesize['mime'] == "image/webp"){
                $src = \imagecreatefromwebp($file);
            }
            $dst = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            return $dst;

        }else{
            return false;

        }

    }
}
