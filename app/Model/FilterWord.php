<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilterWord extends Model
{
    use softDeletes;

    //protected $fillable = ['business_category_name'];
    protected $table = 'filter_words';




}
