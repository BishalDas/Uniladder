<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\_image;

class Base extends Model
{
	protected $file_path = null;

	public function getUrlAttribute()
	{
		return url($this->slug == 'home' ? '/' : $this->slug);
	}

	public static $_thumbdir = [
        '700x525',
        '400x300',
        '100x80',
        '300x300',
    ];

	public function getFDateAttribute()
	{
		return $this->created_at->format('d M, Y');
	}

	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}

	public function getMTitleAttribute()
	{
		return $this->meta_title ? $this->meta_title : $this->title . ' - ' . config('app.name');
	}

	public function getMDescriptionAttribute()
	{
		return $this->meta_description ? $this->meta_description : $this->title;
	}

	public function getMKeywordAttribute()
	{
		return $this->meta_keyword ? $this->meta_keyword : $this->title;
	}


	// public function image($size = '400x300')
	// {
	// 	$image = 'uploads/'. $this->file_path .'/' . $this->image;

	// 	if($this->image && file_exists(public_path($image))){
	// 		return url('upload/'. $this->file_path .'/' . $size . '/' . $this->image);			
	// 	}else{			
	// 		return asset('images/default/' . $size . '.jpg');
	// 	}
	// }

	public function image($size = null)
    {
		if($size){
            $_image = asset('images/default/' . $size . '.jpg');
            $original = public_path('uploads/'.$this->file_path.'/'. $this->image);

            if($this->image && file_exists($original)){
                $_image = asset('uploads/'.$this->file_path.'/' . $size . '/' . $this->image);
                $_image_path = public_path('uploads/'.$this->file_path.'/' . $size . '/' . $this->image);
                if(!file_exists($_image_path)){
                    $this->imageCompress($original);
                    $_image = new  _image($this->file_path, $size, $this->image);
                }
            }
        }else{
			$original = public_path('uploads/'.$this->file_path.'/'. $this->image);
			if($this->image && file_exists($original)){
                $_image = asset('uploads/'.$this->file_path.'/'. $this->image);                
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
