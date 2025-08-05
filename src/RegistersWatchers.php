<?php

namespace Laravel\Telescope;

trait RegistersWatchers
{
    /**
     * The class names of the registered watchers.
     *
     * @var array
     */
    protected static $watchers = [];

    /**
     * Determine if a given watcher has been registered.
     *
     * @param  string  $class
     * @return bool
     */
    public static function hasWatcher($class)
    {
        return in_array($class, static::$watchers);
    }

    /**
     * Register the configured Telescope watchers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected static function registerWatchers($app)
    {
        foreach (config('telescope.watchers') as $key => $watcher) {
            if (is_string($key) && $watcher === false) {
                continue;
            }

            $settings = is_array($watcher) ? $watcher : ['enabled' => true];

            if (! ($settings['enabled'] ?? true)) {
                continue;
            }

            $enabledOnProd = $settings['enabled_on_production'] ?? false;
            $isProd = app()->environment('production');

            if ($isProd && ! $enabledOnProd) {
                continue;
            }

            $watcherInstance = $app->make(is_string($key) ? $key : $settings, [
                'options' => $settings,
            ]);

            static::$watchers[] = get_class($watcherInstance);

            $watcherInstance->register($app);
        }
    }
}
