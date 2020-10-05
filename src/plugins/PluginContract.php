<?php

namespace inquid\vue\plugins;


interface PluginContract
{
    /**
     * Returns the name of the plugin.
     *
     */
    public function getName(): string;

    /**
     * Get the data for the vue application.
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Get the methods for the vue application.
     *
     * @return array
     */
    public function getMethods(): array;

    /**
     * Get the mounted method for the vue application.
     *
     * @return array
     */
    public function getMounted(): array;

    /**
     * Get the computed method for the vue application.
     *
     * @return array
     */
    public function getComputed(): array;

    /**
     * Get the watch methods for the vue application.
     *
     * @return array
     */
    public function getWatch(): array;

    /**
     * Get the filters for the vue application.
     *
     * @return array
     */
    public function getFilters(): array;

    /**
     * Get the components for the vue application.
     *
     * @return array
     */
    public function getComponents(): array;

    /**
     * Code to be executed when the result is being sent to the server.
     *
     * @return bool
     */
    public function processServerSideCode(): bool;
}
