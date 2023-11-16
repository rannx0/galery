<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGalleryModel extends Model
{
    protected $table = 'image_gallery';


    protected $fillable = ['title','image'];
}
