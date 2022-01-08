<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;


class Zoom extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function zoom(){
        return $this->belongsTo(Peminjaman::class);
    }

    use SoftDeletes;
    protected $table = "zooms";
   	protected $dates = ['deleted_at'];
}
