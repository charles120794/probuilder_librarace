<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GenderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////       TRAITS        ////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->app->singleton('GenderWebsiteTrait', function () {
            return \App\Http\Traits\Gender\GenderWebsiteTrait::class;
        });

        $this->app->singleton('GenderCarouselSetupTrait', function () {
            return \App\Http\Traits\Gender\GenderCarouselSetupTrait::class;
        });

        $this->app->singleton('GenderNavigationSetupTrait', function () {
            return \App\Http\Traits\Gender\GenderNavigationSetupTrait::class;
        });

        $this->app->singleton('GenderPageSetupTrait', function () {
            return \App\Http\Traits\Gender\GenderPageSetupTrait::class;
        });

        $this->app->singleton('GenderPanelTrait', function () {
            return \App\Http\Traits\Gender\GenderPanelTrait::class;
        });
        // ADDED 02-06-2020 THURSDAY 9:39 AM
        $this->app->singleton('GenderActivityTrait', function () {
            return \App\Http\Traits\Gender\GenderActivityTrait::class;
        });
        // ADDED 02-12-2020 WEDNESDAY 4:34 PM
        $this->app->singleton('GenderIssuanceTrait', function () {
            return \App\Http\Traits\Gender\GenderIssuanceTrait::class;
        });
        // ADDED 02-12-2020 WEDNESDAY 5:05 PM
        $this->app->singleton('GenderCommonTrait', function () {
            return \App\Http\Traits\Gender\GenderCommonTrait::class;
        });
        // ADDED 02-12-2020 WEDNESDAY 11:07 PM
        $this->app->singleton('GenderMemorandumTrait', function () {
            return \App\Http\Traits\Gender\GenderMemorandumTrait::class;
        });
        // ADDED 02-13-2020 THURSDAY 10:16 AM
        $this->app->singleton('GenderSpecialOrderTrait', function () {
            return \App\Http\Traits\Gender\GenderSpecialOrderTrait::class;
        });
        // ADDED 02-13-2020 THURSDAY 1:39 PM
        $this->app->singleton('GenderPhotoReleasesTrait', function () {
            return \App\Http\Traits\Gender\GenderPhotoReleasesTrait::class;
        });
        // ADDED 02-14-2020 FRIDAY 11:22 AM
        $this->app->singleton('GenderFeaturedVideosTrait', function () {
            return \App\Http\Traits\Gender\GenderFeaturedVideosTrait::class;
        });
        // ADDED 02-16-2020 SUNDAY 12:01 PM
        $this->app->singleton('GenderAnnouncementTrait', function () {
            return \App\Http\Traits\Gender\GenderAnnouncementTrait::class;
        });
        // ADDED 02-16-2020 SUNDAY 2:35 PM
        $this->app->singleton('GenderCalendarTrait', function () {
            return \App\Http\Traits\Gender\GenderCalendarTrait::class;
        });

        //////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////       MODELS        ////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->app->singleton('GenderCarouselGroup', function () {
            return new \App\Model\Gender\GenderCarouselGroup;
        });

        $this->app->singleton('GenderCarouselGrpDetails', function () {
            return new \App\Model\Gender\GenderCarouselGrpDetails;
        });

        $this->app->singleton('GenderFooter', function () {
            return new \App\Model\Gender\GenderFooter;
        });

        $this->app->singleton('GenderFooterDetails', function () {
            return new \App\Model\Gender\GenderFooterDetails;
        });

        $this->app->singleton('GenderHeader', function () {
            return new \App\Model\Gender\GenderHeader;
        });

        $this->app->singleton('GenderHeaderDetails', function () {
            return new \App\Model\Gender\GenderHeaderDetails;
        });

        $this->app->singleton('GenderNavBar', function () {
            return new \App\Model\Gender\GenderNavBar;
        });

        $this->app->singleton('GenderNavBarDetails', function () {
            return new \App\Model\Gender\GenderNavBarDetails;
        });

        $this->app->singleton('GenderNavBarMethods', function () {
            return new \App\Model\Gender\GenderNavBarMethods;
        });

        $this->app->singleton('GenderPanel', function () {
            return new \App\Model\Gender\GenderPanel;
        });

        $this->app->singleton('GenderPanelDetails', function () {
            return new \App\Model\Gender\GenderPanelDetails;
        });

        $this->app->singleton('GenderPanelDetailsFiles', function () {
            return new \App\Model\Gender\GenderPanelDetailsFiles;
        });

        $this->app->singleton('GenderPanelDetailsFrames', function () {
            return new \App\Model\Gender\GenderPanelDetailsFrames;
        });

        $this->app->singleton('GenderPanelDetailsLinks', function () {
            return new \App\Model\Gender\GenderPanelDetailsLinks;
        });

        $this->app->singleton('GenderPanelDetailsPosts', function () {
            return new \App\Model\Gender\GenderPanelDetailsPosts;
        });

        $this->app->singleton('GenderPanelDetailsType', function () {
            return new \App\Model\Gender\GenderPanelDetailsType;
        });

        $this->app->singleton('GenderPosts', function () {
            return new \App\Model\Gender\GenderPosts;
        });

        $this->app->singleton('GenderPostsDetails', function () {
            return new \App\Model\Gender\GenderPostsDetails;
        });

        $this->app->singleton('GenderPostsDetailsFiles', function () {
            return new \App\Model\Gender\GenderPostsDetailsFiles;
        });
    }

}   