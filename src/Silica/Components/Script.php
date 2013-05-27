<?php

namespace Silica\Components;

use Composer\Composer;
use Composer\Installer\LibraryInstaller;
use Composer\Script\Event;
use Composer\Package\PackageInterface;
use Composer\Util\Filesystem;

class Script
{

    public static function Install(Event $event) {
        $composer = $event->getComposer();
        $config = $composer->getConfig();
        $dir    = $config->has('component-dir') ? $config->get('component-dir') : 'web/assets' ;
        $filesystem = new Filesystem();
        $filesystem->ensureDirectoryExists($dir);
        
        echo get_class($event->getIO()) , "\n" ;
        
        return true;
    }
    
    public static function postPackageInstall(Event $event) {
        $installedPackage = $event->getComposer()->getPackage();
    }
}