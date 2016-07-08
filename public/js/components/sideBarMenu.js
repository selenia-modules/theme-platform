!function () {
  var CURRENT_URL   = window.location.href.split ('?')[0],
      $BODY         = $ ('body'),
      $MENU_TOGGLE  = $ ('#menu_toggle'),
      $SIDEBAR_MENU = $ ('#sidebar-menu');

  $SIDEBAR_MENU.find ('a').on ('click', function (ev) {
    var $li = $ (this).parent ();

    if ($li.is ('.active')) {
      $li.removeClass ('active active-sm');
      $ ('ul:first', $li).slideUp ();
    } else {
      // prevent closing menu if we are on child menu
      if (!$li.parent ().is ('.child_menu')) {
        $SIDEBAR_MENU.find ('li').removeClass ('active active-sm');
        $SIDEBAR_MENU.find ('li ul').slideUp ();
      }

      $li.addClass ('active');

      $ ('ul:first', $li).slideDown ();
    }
  });

  // toggle small or large menu
  $MENU_TOGGLE.on ('click', function () {
    if ($BODY.hasClass ('nav-md')) {
      $SIDEBAR_MENU.find ('li.active ul').hide ();
      $SIDEBAR_MENU.find ('li.active').addClass ('active-sm').removeClass ('active');
    } else {
      $SIDEBAR_MENU.find ('li.active-sm ul').show ();
      $SIDEBAR_MENU.find ('li.active-sm').addClass ('active').removeClass ('active-sm');
    }

    $BODY.toggleClass ('nav-md nav-sm');
  });

  // check active menu
  $SIDEBAR_MENU.find ('a[href="' + CURRENT_URL + '"]').parent ('li').addClass ('current-page');

  $SIDEBAR_MENU.find ('a').filter (function () {
    return this.href == CURRENT_URL;
  }).parent ('li').addClass ('current-page').parents ('ul').slideDown ().parent ().addClass ('active');

  // fixed sidebar
  if ($.fn.mCustomScrollbar) {
    $ ('.menu_fixed').mCustomScrollbar ({
      autoHideScrollbar: true,
      theme:             'minimal',
      mouseWheel:        { preventDefault: true }
    });
  }
} ();
