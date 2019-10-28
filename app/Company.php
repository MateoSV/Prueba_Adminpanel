<?php

namespace App;

use App\Traits\CustomAttributesTrait;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use CustomAttributesTrait;

    protected $upper_fields = [
        'name','email','website'
    ];

    protected $table = 'companies';
    const perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','email','website','logo'
    ];

    protected $file_fields = [
        'logo',
    ];
}
