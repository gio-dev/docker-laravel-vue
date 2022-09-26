<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class MacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Builder::macro('dynamicPaginate', function () {

            if (request()->pagination === 'none') {
                return $this->get();
            }

            $page = Paginator::resolveCurrentPage();

//            $perPage = request()->per_page ? request()->per_page : config('app.default_pagination_number');
            $perPage = 9999999999;

            $results = ($total = $this->toBase()->getCountForPagination())
                ? $this->forPage($page, $perPage)->get(['*'])
                : $this->model->newCollection();

            return $this->paginator($results, $total, $perPage, $page, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]);
        });
    }
}
