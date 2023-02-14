#!/bin/bash

GREEN='\033[1;32m'
YELLOW='\033[1;33m'
RED='\033[1;31m'
NC='\033[0m'

check_if_root(){
  if [ "$EUID" -ne 0 ]
    then
      printf "${RED}Erhöhte Nutzerrechte erforderlich!${NC}\n" && exit 1
  else
    printf "${GREEN}Benutzer ist root, Skript kann gestartet werden!${NC}\n"
  fi
}

#dpkg -s lsb-release
install_essentials(){
  if apt update && apt upgrade -y>/dev/null 2>&1
    then
      if ! lsb_release
        then
          printf "${YELLOW}Installieren von lsb-release${NC}\n"
          if apt install -y lsb-release>/dev/null 2>&1
            then
              printf "${GREEN}Installation von lsb-release erfolgreich.${NC}\n"
          fi
      fi
  fi
}

check_if_debian(){
  if ! [ "$(lsb_release -i | awk '{print $3}')" = "Debian" ]
    then
      printf "${RED}Betriebssystem entspricht nicht Debian, Skript wird abgebrochen!${NC}\n" && exit 1
  else
    printf "${GREEN}Betriebssystem entspricht Debian!${NC}\n"
  fi
}

check_all_files(){
  if [[ -f "storj-new" ]] && [[ -f "storj-new-webserver" ]] && [[ -f "webserver" ]] && [[ -f "cleanup" ]] && [[ -f "./web/new-default" ]] && [[ -f "./web/index.php" ]] && [[ -f "./web/storj_variables.php" ]] && [[ -f "./web/finished.php" ]]
    then
      printf "${GREEN}Alle benötigten Dateien sind vorhanden!${NC}\n"
  else
    printf "${RED}Es sind nicht alle benötigten Dateien vorhanden, beende Skript!${NC}\n" && exit 1
  fi
}

make_scripts_executable(){
  if chmod 774 ./*
    then
      printf "${GREEN}Die Skripte sind ausführbar!${NC}\n"
  else
    printf "${RED}Die Skripte konnten nicht ausführbar gemacht werden, beende Skript!${NC}\n" && exit 1
  fi
}

copy_scripts_to_local_bin(){
  if cp ./storj-new ./storj-new-webserver ./webserver ./cleanup /usr/local/bin/
    then
      printf "${GREEN}Die Skripte wurden erfolgreich zur sessionübergreifenden Verwendung nach /usr/local/bin kopiert!${NC}\n"
  else
    printf "${RED}Die Skripte konnten nicht nach /usr/local/bin kopiert werden, beende Skript!${NC}\n" && exit 1
  fi
}

choose_mode(){
  choose=""

  printf "Möchtest Du das Skript in der Shell ausführen oder einen Webserver mit Eingabemaske starten?\n"
  printf "Wähle aus (s) Shell oder (w) Webserver: "
    read choose

  if [[ "$choose" =~ ^[sS]+$ ]]
    then
      bash storj-new
  elif [[ "$choose" =~ ^[wW]+$ ]]
    then
      bash webserver
  fi
}

main(){
  check_if_root && install_essentials && check_if_debian && check_all_files && make_scripts_executable && copy_scripts_to_local_bin && choose_mode
}

main