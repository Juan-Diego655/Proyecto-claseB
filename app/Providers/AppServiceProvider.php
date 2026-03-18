<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
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
        $featuredProducts = Product::latest()->take(3)->get();
        View::share('featuredProducts', $featuredProducts);

        View::composer('*', function ($view) {
            $userId = Auth::id();

            if (!$userId) {
                $firstUser = User::first();
                $userId = $firstUser ? $firstUser->id : null;
            }

            $cartCount = 0;

            if ($userId) {
                $cartCount = CartItem::where('user_id', $userId)->sum('quantity');
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
