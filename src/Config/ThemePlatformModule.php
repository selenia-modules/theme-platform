<?php
namespace Selenia\Themes\Platform\Config;

use Electro\Interfaces\KernelInterface;
use Electro\Interfaces\ModuleInterface;
use Electro\Kernel\Lib\ModuleInfo;
use Electro\Plugins\Matisse\Config\MatisseSettings;
use Electro\Profiles\WebProfile;
use Electro\ViewEngine\Config\ViewEngineSettings;
use Selenia\Themes\Platform\Components\SideBarMenu;

class ThemePlatformModule implements ModuleInterface
{
  static function getCompatibleProfiles ()
  {
    return [WebProfile::class];
  }

  static function startUp (KernelInterface $kernel, ModuleInfo $moduleInfo)
  {
    $kernel->onConfigure (
      function (MatisseSettings $matisseSettings, ViewEngineSettings $viewEngineSettings)
      use ($moduleInfo) {
        $matisseSettings
//          ->registerMacros ($moduleInfo)
          ->registerComponents ([
            'SideBarMenu' => SideBarMenu::class,
          ])
          // DO NOT IMPORT THE FOLLOWING NAMESPACE!
          ->registerControllersNamespace ($moduleInfo, \Selenia\Platform\Components::class, 'platform');
        $viewEngineSettings->registerViews ($moduleInfo);
      });
  }

}
