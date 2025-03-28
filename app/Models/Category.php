<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    // mặc định sử dụng eloquent luôn có 2 trường crated_at và
    // updated_at nên sử dụng hàm timestamps để tắt nó đi
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status',
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
}
