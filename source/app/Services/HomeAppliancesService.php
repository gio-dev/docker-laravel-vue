<?php

namespace App\Services;

use App\Enum\HomeAppliancesTypes;
use App\Repository\Contracts\HomeAppliancesRepositoryInterface;
use App\Traits\BaseService;
/**
 * Class ClientsService
 * @package Modules\Clients\Apps\Services
 */
class HomeAppliancesService
{
    use BaseService;
    /**
     * @var HomeAppliancesRepositoryInterface
     */
    protected $homeAppliancesRepository;

    /**
     * HomeAppliancesService constructor.
     * @param HomeAppliancesRepositoryInterface $homeAppliancesRepository
     */
    public function __construct(HomeAppliancesRepositoryInterface $homeAppliancesRepository)
    {
        $this->homeAppliancesRepository = $homeAppliancesRepository;
        $this->setBaseServiceClass($homeAppliancesRepository);
    }

    public function getBrandsList()
    {
        $listBrands = HomeAppliancesTypes::listAllToArrayDesc();
        $itens = [];
        foreach ($listBrands as $id => $brand) {
            $itens[] = [
                'id' => $id,
                'name' => $brand
            ];
        }
        return $itens;
    }

}
