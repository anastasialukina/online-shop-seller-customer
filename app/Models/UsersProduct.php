<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProduct extends Model
{
    use HasFactory;

    protected $table = 'users_products';

    protected $fillable = [
        'user_id',
        'product_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
