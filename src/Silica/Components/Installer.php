<?php

namespace Silica\Components;

use Composer\Composer;
use Composer\Installer\LibraryInstaller;
use Composer\Script\Event;
use Composer\Package\PackageInterface;
use Composer\Util\Filesystem;

class Installer extends LibraryInstaller
{

    /**
     * The location where Components are to be installed.
     */
    protected $componentDir;

    /**
     * Initialize the Component directory, as well as the vendor directory.
     */
    protected function initializeVendorDir()
    {
        $this->componentDir = $this->getComponentDir();
        $this->filesystem->ensureDirectoryExists($this->componentDir);
        return parent::initializeVendorDir();
    }
    
    /**
     * Retrieves the Installer's provided component directory.
     */
    public function getComponentDir()
    {
        $config = $this->composer->getConfig();
        return $config->has('component-dir') ? $config->get('component-dir') : 'web/assets';
    }

     * Script callback; Acted on after the autoloader is dumped.
     */
    public static function postAutoloadDump(Event $event)
    {
        // Retrieve basic information about the environment and present a
        // message to the user.
        $composer = $event->getComposer();
        $io = $event->getIO();
        $io->write('<info>Compiling component files</info>');
        
    }
}