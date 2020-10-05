<?php


namespace inquid\vue\plugins;

/**
 *
 * Interface PluginProvider
 * @package inquid\vue\plugins
 */
interface PluginProviderContract
{
    /**
     * * Load all the plugins into the Vue app.
     *
     * @param array $config the default configuration
     * @return array
     */
    public function loadPlugins(array $config): array;
}
