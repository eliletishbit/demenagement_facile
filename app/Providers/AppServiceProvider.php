<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //declaration de variables gflobaus du site
        $globalVariables = [
            'siteName' => 'deplacetoi',
            'siteSlogan1' => 'Démenager sans stress, c\'est notre métier.',
            'siteSlogan2' => 'Nous transportons vos rêves, pas seulement vos biens.',
            'siteDescription' => 'specailisés dans le démenagement de biens de tous tailles depuis des années, 
                            notre agence vous facilite la vie en assurant le transport de vos biens de votre ancienne
                            destination jusquà la nouvelle, et tout ceci sans accroc.',
        ];
    
        foreach ($globalVariables as $key => $value) {
            View::share($key, $value);
        }

        Paginator::useBootstrap();
    }
}
