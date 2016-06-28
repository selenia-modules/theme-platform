<?php
namespace Selenia\Plugins\Gentelella\Config;

use Electro\Core\Assembly\Services\ModuleServices;
use Electro\Interfaces\ModuleInterface;

class GentelellaModule implements ModuleInterface
{
  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs ('modules/selenia-modules/theme-gentelella')
      ->provideViews ()
      ->provideMacros ();
  }

}
