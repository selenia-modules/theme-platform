<?php
namespace Selenia\Themes\Gentelella\Config;

use Electro\Core\Assembly\Services\ModuleServices;
use Electro\Interfaces\ModuleInterface;
use Selenia\Themes\Gentelella\Components\SideBarMenu;

class ThemeGentelellaModule implements ModuleInterface
{
  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs ('modules/selenia-modules/theme-gentelella')
      ->provideViews ()
      ->provideMacros ()
      ->registerComponents ([
        'SideBarMenu' => SideBarMenu::class,
      ]);
  }

}
