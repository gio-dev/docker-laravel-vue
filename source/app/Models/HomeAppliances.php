<?php

namespace App\Models;

use App\Enum\HomeAppliancesTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAppliances extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'name',
        'description',
        'voltage',
        'brand',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $hidden = [
    ];

    public function getBrandNameAttribute()
    {
        return HomeAppliancesTypes::getDescByKey($this->brand);
    }

}
