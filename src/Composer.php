<?php

namespace Silvanite\ComposerReader;

use Exception;

class Composer
{
    protected $reader;
    protected $section;

    public function __construct(string $path)
    {
        $reader = json_decode(file_get_contents($path), true);

        if (\json_last_error()) {
            throw new Exception("Unable to read config file {$path}.");
        }

        $this->reader = $reader;
    }

    /**
     * Read the composer file
     *
     * @param string $path
     * @return Composer
     */
    public static function read(string $path = 'composer.json'): Composer
    {
        return (new self($path))->require();
    }

    /**
     * Set the active section to require
     *
     * @return Composer
     */
    public function require(): Composer
    {
        $this->section = array_get($this->reader, 'require');

        return $this;
    }

    /**
     * Set the active section to revireDev
     *
     * @return Composer
     */
    public function requireDev(): Composer
    {
        $this->section = array_get($this->reader, 'requireDev');

        return $this;
    }

    /**
     * Determine if a specific package is installed
     *
     * @param string $package
     * @return boolean
     */
    public function has(string $package): boolean
    {
        return array_has($this->section, $package);
    }

    /**
     * Get the version specified for a given package
     *
     * @param string $package
     * @return string
     */
    public function version(string $package): string
    {
        return array_get($this->section, $package);
    }
}
