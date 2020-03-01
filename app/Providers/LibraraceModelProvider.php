<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LibraraceModelProvider extends ServiceProvider
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
        $this->app->singleton('LibraraceTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceTraits::class;
        });

        $this->app->singleton('LibraraceBooksTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceBooksTraits::class;
        });

        $this->app->singleton('LibraraceBooksCategoryTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceBooksCategoryTraits::class;
        });

        $this->app->singleton('LibraraceUsersTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceUsersTraits::class;
        });

        $this->app->singleton('LibraraceBooksLocationTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceBooksLocationTraits::class;
        });

        $this->app->singleton('LibraraceBooksIssuanceTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceBooksIssuanceTraits::class;
        });

        $this->app->singleton('LibraraceBooksRequestTraits', function () {
            return \App\Http\Traits\Librarace\LibraraceBooksRequestTraits::class;
        });


        //////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////       MODELS        ////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->app->singleton('LibraraceBanner', function () {
            return new \App\Model\Librarace\Banner;
        });

        $this->app->singleton('LibraraceBooks', function () {
            return new \App\Model\Librarace\Books;
        });

        $this->app->singleton('LibraraceBooksCategory', function () {
            return new \App\Model\Librarace\BooksCategory;
        });

        $this->app->singleton('LibraraceBooksLocation', function () {
            return new \App\Model\Librarace\BooksLocation;
        });

        $this->app->singleton('LibraraceBorrow', function () {
            return new \App\Model\Librarace\Borrow;
        });

        $this->app->singleton('LibraraceBorrowDetails', function () {
            return new \App\Model\Librarace\BorrowDetails;
        });

        $this->app->singleton('LibraraceUsersData', function () {
            return new \App\Model\Librarace\UsersData;
        });
    }
}
