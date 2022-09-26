<?php
namespace App\Repository;

use App\Models\HomeAppliances;
use App\Repository\Contracts\HomeAppliancesRepositoryInterface;
use App\Traits\BaseRepository;

class HomeAppliancesRepository implements HomeAppliancesRepositoryInterface
{
    use BaseRepository;
    /**
     * HomeAppliances constructor.
     * @param HomeAppliances $homeAppliances
     */
    public function __construct(HomeAppliances $homeAppliances)
    {
        $this->setEntityClass($homeAppliances);
    }
}
