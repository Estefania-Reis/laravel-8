<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Aldeia' => 'App\Policies\AldeiaPolicy',
        'App\Models\Bee' => 'App\Policies\BeePolicy',
        'App\Models\Distribuisaun' => 'App\Policies\DistribuisaunPolicy',
        'App\Models\Employee' => 'App\Policies\EmployeePolicy',
        'App\Models\Hahanikan' => 'App\Policies\HahanikanPolicy',
        'App\Models\Ikanoan' => 'App\Policies\IkanoanPolicy',
        'App\Models\Ikan' => 'App\Policies\IkanPolicy',
        'App\Models\Ikansrt' => 'App\Policies\IkansrtPolicy',
        'App\Models\Ikantolun' => 'App\Policies\IkantolunPolicy',
        'App\Models\Incubator' => 'App\Policies\IncubatorPolicy',
        'App\Models\Kliente' => 'App\Policies\KlientePolicy',
        'App\Models\Klientegrupo' => 'App\Policies\KlientegrupoPolicy',
        'App\Models\Kolam' => 'App\Policies\KolamPolicy',
        'App\Models\Lelaun' => 'App\Policies\LelaunPolicy',
        'App\Models\Municipio' => 'App\Policies\MunicipioPolicy',
        'App\Models\Niveleducasaun' => 'App\Policies\NiveleducasaunPolicy',
        'App\Models\Orijemikan' => 'App\Policies\OrijemikanPolicy',
        'App\Models\Posto' => 'App\Policies\PostoPolicy',
        'App\Models\Religion' => 'App\Policies\ReligionPolicy',
        'App\Models\Suco' => 'App\Policies\SucoPolicy',
        'App\Models\Tbkolam' => 'App\Policies\TbkolamPolicy',
        'App\Models\Tipuikan' => 'App\Policies\TipuikanPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
