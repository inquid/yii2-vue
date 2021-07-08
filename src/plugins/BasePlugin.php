<?php


namespace inquid\vue\plugins;


class BasePlugin implements PluginContract
{
    /**
     * {@inheritDoc}
     */
    public function getId(): string
    {
        return 'base_plugin';
    }

    /**
     * {@inheritDoc}
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
    public function htmlCode(): string
    {
        return '<div>code</div>';
    }

    /**
     * {@inheritDoc}
     */
    public function processServerSideCode(array $config): bool
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
    public function getMounted(): string
    {
        return '';
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
