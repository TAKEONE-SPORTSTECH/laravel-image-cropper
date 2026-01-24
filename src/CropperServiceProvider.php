<?php

namespace Takeone\Cropper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class CropperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Load Views from the package
        $this->loadViewsFrom(__DIR__.'/resources/views', 'takeone');

        // 2. Register Blade Component Alias
        Blade::component('takeone::components.widget', 'takeone-cropper');

        // 3. Register Routes Automatically
        $this->registerRoutes();

        // 4. Allow publishing views if user wants to customize
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/takeone'),
        ], 'takeone-cropper-views');
    }

    protected function registerRoutes()
    {
        Route::group([
            'middleware' => ['web'],
        ], function () {
            // We use the full absolute namespace here to avoid any "not found" errors
            Route::post('/image-upload', [\takeone\cropper\Http\Controllers\ImageController::class, 'upload'])->name('image.upload');
        });
    }

    public function register()
    {
        //
    }
}
