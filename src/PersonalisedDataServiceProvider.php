<?php

namespace Creode\PersonalisedData;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PersonalisedDataServiceProvider extends ServiceProvider {
    /**
     * The package name.
     *
     * @var string
     */
    protected $packageName = 'creode-personalised-data';

    /**
     * {@inheritdoc}
     */
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path("vendor/$this->packageName"),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->packageName);

        Blade::directive('personalisedData', function () {
            return "<?php echo view('creode-personalised-data::personalised-data'); ?>";
        });
    }
}
