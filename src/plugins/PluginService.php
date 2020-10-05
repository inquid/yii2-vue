<?php


namespace inquid\vue\plugins;

/**
 * Class PluginService
 * @package inquid\vue\plugins
 */
class PluginService
{
    /** @var array Vue reserved props */
    protected $reserverdKeys = [
        'data',
        'methods',
        'computed',
        'watch',
        'filters',
        'components',
    ];

    /**
     * PluginService constructor.
     */
    public function __construct()
    {

    }

    /**
     * Reads all the properties from a plugin and merge them with the given array.
     *
     * @param array $defaultMethodProvider array to be merged from.
     * @param PluginContract $pluginMethod plugin with new properties and methods.
     *
     * @return array The result of the merge of both arrays.
     */
    public function loadPropertiesFromPlugin(array $defaultMethodProvider, PluginContract $pluginMethod): array
    {
        foreach ($this->reserverdKeys as $reserverdKey) {
            if(!isset($defaultMethodProvider[$reserverdKey])){
                continue;
            }

            $method = 'get'.ucfirst($reserverdKey);
            $defaultMethodProvider[$reserverdKey] = array_merge(
                $defaultMethodProvider[$reserverdKey],
                $pluginMethod->{$method}()
            );
        }

        return $defaultMethodProvider;
    }
}
