<?php


namespace App\Enum;

use App\Enum\Enum;

class HomeAppliancesTypes extends Enum
{
    const BRAND_ELETROLUX       = 'eletrolux';
    const BRAND_BRASTEMP        = 'brastemp';
    const BRAND_FISCHER         = 'fischer';
    const BRAND_SAMSUNG         = 'samsung';
    const BRAND_LG              = 'lg';

    public static function listAllToArrayDesc(){
        return [
            self::BRAND_ELETROLUX       => 'Eletrolux',
            self::BRAND_BRASTEMP        => 'Brastemp',
            self::BRAND_FISCHER         => 'Fischer',
            self::BRAND_SAMSUNG         => 'Samsung',
            self::BRAND_LG              => 'LG'
        ];
    }

    public static function getDescByKey(string $key){
        $listOptions = self::listAllToArrayDesc();
        $value = (isset($listOptions[$key]) ? $listOptions[$key] : $key);

        return $value;
    }
}
