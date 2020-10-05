<?php


namespace inquid\vue\plugins;


class BasePluginProvider implements PluginProviderContract
{
    /** @var PluginService */
    protected $pluginService;

    /** @var BasePlugin */
    protected $defaultPlugin;

    public function __construct()
    {
        $this->pluginService = new PluginService();
        $this->defaultPlugin = new BasePlugin();
    }

    /**
     * {@inheritDoc}
     */
    public function loadPlugins(array $config): array
    {
        $this->pluginService->loadPropertiesFromPlugin($config, $this->defaultPlugin);

        return $config;
    }
}
