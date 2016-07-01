#!/usr/bin/env bash

which sass > /dev/null
if [ $? -ne 0 ] ; then
  echo -e "\nInstalling SASS..."
  sudo gem install sass || exit $?
fi

if [ "$1" == "--watch" ]; then
  echo
  sass --watch resources/assets/scss/theme.scss:public/dist --style compressed -E "UTF-8" && echo -e "\nDone.\n"
else
echo -e "Note: when developing, you can compile automatically using the --watch flag.\n\nBuilding..."
sass resources/assets/scss/theme.scss public/dist/theme.css --style compressed -E "UTF-8" && echo -e "Done.\n"
fi
