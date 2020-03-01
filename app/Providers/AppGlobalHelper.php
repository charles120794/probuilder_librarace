<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;

class AppGlobalHelper extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* SETTINGS */
        $this->app->singleton('SystemCompanyTrait', function () {
            return \App\Http\Traits\Settings\SystemCompanyTrait::class;
        }); 

        $this->app->singleton('SystemWindowTrait', function () {
            return \App\Http\Traits\Settings\SystemWindowTrait::class;
        });

        $this->app->singleton('SystemWindowMethodTrait', function () {
            return \App\Http\Traits\Settings\SystemWindowMethodTrait::class;
        });

        $this->app->singleton('SystemModuleTrait', function () {
            return \App\Http\Traits\Settings\SystemModuleTrait::class;
        });

        /* USERS TRAIT */
        $this->app->singleton('SystemCompanyModuleAccessTrait', function () {
            return \App\Http\Traits\Settings\SystemCompanyModuleAccessTrait::class;
        });
        
        $this->app->singleton('UsersCompanyAccessTrait', function () {
            return \App\Http\Traits\Settings\UsersCompanyAccessTrait::class;
        });
        
        $this->app->singleton('UsersWindowMethodAccessTrait', function () {
            return \App\Http\Traits\Settings\UsersWindowMethodAccessTrait::class;
        });

        $this->app->singleton('UsersWindowAccessTrait', function () {
            return \App\Http\Traits\Settings\UsersWindowAccessTrait::class;
        });

        $this->app->singleton('UsersModuleAccessTrait', function () {
            return \App\Http\Traits\Settings\UsersModuleAccessTrait::class;
        });

        $this->app->singleton('UsersInformationTrait', function () {
            return \App\Http\Traits\Settings\UsersInformationTrait::class;
        });

        $this->app->singleton('UserSettingTrait', function () {
            return \App\Http\Traits\Settings\UserSettingTrait::class;
        });

        $this->app->singleton('UserPageSetupTrait', function () {
            return \App\Http\Traits\Admin\UserPageSetupTrait::class;
        });
              
        /* WEBSITE */
        $this->app->singleton('CenterPanelTrait', function () {
            return \App\Http\Traits\Website\CenterPanelTrait::class;
        });
        $this->app->singleton('FooterTrait', function () {
            return \App\Http\Traits\Website\FooterTrait::class;
        });
        $this->app->singleton('FrontlineTrait', function () {
            return \App\Http\Traits\Website\FrontlineTrait::class;
        });
        $this->app->singleton('HeadCarouselTrait', function () {
            return \App\Http\Traits\Website\HeadCarouselTrait::class;
        });
        $this->app->singleton('LayoutTrait', function () {
            return \App\Http\Traits\Website\LayoutTrait::class;
        });
        $this->app->singleton('MasterHeadTrait', function () {
            return \App\Http\Traits\Website\MasterHeadTrait::class;
        });
        $this->app->singleton('NavMenuTrait', function () {
            return \App\Http\Traits\Website\NavMenuTrait::class;
        });
        $this->app->singleton('NavMenuMethodTrait', function () {
            return \App\Http\Traits\Website\NavMenuMethodTrait::class;
        });
        $this->app->singleton('SidePanelTrait', function () {
            return \App\Http\Traits\Website\SidePanelTrait::class;
        });
        $this->app->singleton('SpecialTrait', function () {
            return \App\Http\Traits\Website\SpecialTrait::class;
        });
    }
}
