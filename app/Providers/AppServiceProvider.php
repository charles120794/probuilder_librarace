<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        
        $this->app->singleton('Users', function () {
            return new \App\User;
        });

        $this->app->singleton('SystemCompany', function () {
            return new \App\Model\Settings\systemCompany;
        });

        $this->app->singleton('SystemModule', function () {
            return new \App\Model\Settings\systemModule;
        });

        $this->app->singleton('SystemWindow', function () {
            return new \App\Model\Settings\systemWindow;
        });

        $this->app->singleton('SystemWindowMethod', function () {
            return new \App\Model\Settings\systemWindowMethod;
        });

        $this->app->singleton('SystemFileExtension', function () {
            return new \App\Model\Settings\systemFileExtension;
        });

        ////////////////////////////////////////////////////
        /////// ACCESSING THE SYSTEM BY USERS
        ////////////////////////////////////////////////////
        $this->app->singleton('CompanyModuleAccess', function () {
            return new \App\Model\Relation\systemCompanyModule;
        });

        $this->app->singleton('UsersCompanyAccess', function () {
            return new \App\Model\Relation\usersCompanyAccess;
        });

        $this->app->singleton('UsersModuleAccess', function () {
            return new \App\Model\Relation\usersModuleAccess;
        });

        $this->app->singleton('UsersWindowAccess', function () {
            return new \App\Model\Relation\usersWindowAccess;
        });

        $this->app->singleton('UsersWindowMethodAccess', function () {
            return new \App\Model\Relation\usersWindowMethodAccess;
        });


        ////////////////////////////////////////////////////
        /////// ACCESSING THE WEBSITE MODELS
        ////////////////////////////////////////////////////
        $this->app->singleton('NavHeader', function () {
            return new \App\Model\Website\navHeader;
        });

        $this->app->singleton('NavHeaderDetails', function () {
            return new \App\Model\Website\navHeaderDetails;
        });

        $this->app->singleton('NavHeaderMethod', function () {
            return new \App\Model\Website\navHeaderMethod;
        });

        $this->app->singleton('MasterHead', function () {
            return new \App\Model\Website\masterHead;
        });

        $this->app->singleton('CarouselGroup', function () {
            return new \App\Model\Website\carouselGroup;
        });

        $this->app->singleton('CarouselGroupDetails', function () {
            return new \App\Model\Website\carouselGroupDetails;
        });

        $this->app->singleton('Frontline', function () {
            return new \App\Model\Website\frontLine;
        });

        $this->app->singleton('SideBar', function () {
            return new \App\Model\Website\sideBar;
        });

        $this->app->singleton('SideBarDetails', function () {
            return new \App\Model\Website\sideBarDetails;
        });

        $this->app->singleton('CenterBar', function () {
            return new \App\Model\Website\centerBar;
        });

        $this->app->singleton('CenterBarDetails', function () {
            return new \App\Model\Website\centerBarDetails;
        });

        $this->app->singleton('CenterBarVidImg', function () {
            return new \App\Model\Website\centerBarVidImg;
        });

        $this->app->singleton('Footer', function () {
            return new \App\Model\Website\footer;
        });

        $this->app->singleton('FooterDetails', function () {
            return new \App\Model\Website\footerDetails;
        });

        /* LAYOUTS */
        $this->app->singleton('Panel', function () {
            return new \App\Model\Layouts\panel;
        });

        $this->app->singleton('PanelDetails', function () {
            return new \App\Model\Layouts\panelDetails;
        });

        $this->app->singleton('PanelDetailsFrameset', function () {
            return new \App\Model\Layouts\panelDetailsFrameset;
        });

        $this->app->singleton('PanelDetailsInputText', function () {
            return new \App\Model\Layouts\panelDetailsInputText;
        });

        $this->app->singleton('PanelDetailsLongText', function () {
            return new \App\Model\Layouts\panelDetailsLongText;
        });

        $this->app->singleton('PanelDetailsStorage', function () {
            return new \App\Model\Layouts\panelDetailsStorage;
        });

        $this->app->singleton('PanelDetailsType', function () {
            return new \App\Model\Layouts\panelDetailsType;
        });

    }
}
