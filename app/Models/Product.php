<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
        protected $fillable = [
        'barcode_number',
        'product_name',
        'buy_price',
        'sell_price',
        'supplier_id',
    ];
    
    protected $table = 'products';

    public $timestamps = true;
    
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id', 'id');
    }

    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}
}
