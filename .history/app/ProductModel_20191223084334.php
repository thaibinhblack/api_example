<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "product";
    protected $fille_ables = ["id", "ten_sp", "gia_sp", "mo_ta"];
}
