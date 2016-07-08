<?php
namespace Selenia\Themes\Platform\Config;

use Electro\Core\Assembly\Services\ModuleServices;
use Electro\Interfaces\ModuleInterface;
use Selenia\Themes\Gentelella\Components\SideBarMenu;

class ThemePlatformModule implements ModuleInterface
{
  const PUBLIC_DIR = 'modules/selenia-modules/theme-platform';

  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs (PUBLIC_DIR)
      ->provideViews ()
//      ->provideMacros ()
      ->registerComponents ([
        'SideBarMenu' => SideBarMenu::class,
      ])
      // DO NOT IMPORT THE FOLLOWING NAMESPACE!
      ->registerControllersNamespace (\Selenia\Platform\Components::class, 'platform')
    ;
  }

}
