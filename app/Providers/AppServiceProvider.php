<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		Schema::defaultStringLength(191);

		view()->composer('frontend.master.layout', function ($view) {

			$view->with('categories', \App\Category::all());

		});

		//view()->composer('backend.master.layout', function ($view) {

		//	$view->with('currentUser', Auth::user()->first_name);

		//});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
