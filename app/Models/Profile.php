<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function profileImage()
    {
        // folder inside the public path for default image
        $imagePath = ($this->image) ? $this->image : 'jAZHCrXvUSsoh3BtdypreKvz8tz0M4DEnDOfvvDt.png';
        return '/storage/profile/' . $imagePath;
    }
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function followers()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}
