<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class 商品 extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '商品';

    protected $fillable = ['名前', '価格'];
}
