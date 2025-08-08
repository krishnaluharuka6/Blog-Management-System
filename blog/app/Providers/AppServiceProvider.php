<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

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
            $website = Website::first(); // or wherever you store your app name
            if ($website) {
                if ($website->website_title) {
                    Config::set('app.name', $website->website_title);
                }
    
                if ($website->logo) {
                    Config::set('app.logo', asset('storage/' . $website->logo));
                } else {
                    Config::set('app.logo', asset('favicon.ico')); // fallback default logo
                }
            }

            View::composer('*', function ($view) {
                $view->with('authUser', Auth::user());
            });

            $website = Website::first();
            View::share('website', $website);

            $about=About::first();
            View::share('about',$about);

            $unreadCount = Contact::where('is_read', false)->count();
            View::share('unreadCount', $unreadCount);

    }
}
