<?php


namespace inquid\vue\plugins;


class BasePlugin implements PluginContract
{
    /**
     * Returns the name of the plugin.
     *
     */
    public function getName(): string
    {
        return 'Base Plugin';
    }

    /**
     * {@inheritDoc}
     */
    public function getData(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function processServerSideCode(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethods(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getMounted(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getComputed(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getWatch(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getComponents(): array
    {
        return [];
    }
}
