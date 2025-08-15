{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  buildInputs = [
    # PHP 8.4 & extensions
    pkgs.php84
    pkgs.php84Extensions.mbstring
    pkgs.php84Extensions.pdo_mysql
    pkgs.php84Extensions.curl
    pkgs.php84Extensions.intl
    pkgs.php84Extensions.fileinfo
    pkgs.php84Packages.composer

    # Node.js (LTS) + pnpm
    pkgs.nodejs_22
    pkgs.nodePackages.pnpm

    # MySQL
    pkgs.mysql84
  ];

  shellHook = ''
    if [ ! -f ./.env ]; then
      cp .env.example .env
    fi
    source .env

    export SERVER_PORT=$BACKEND_PORT
    export PORT=$WEB_PORT
    export WORK_DIR=$(pwd)

    echo "PHP: $(php -v)"
    echo "Node: $(node -v)"
    echo "MySQL: $(mysql --version)"
    
    alias mysql-init="mysqld --initialize-insecure --datadir=$WORK_DIR/mysql-data"
    alias mysql-start="mysqld --datadir=$WORK_DIR/mysql-data --port=$MYSQL_PORT --socket=$WORK_DIR/mysql-data/mysql.sock --mysqlx=OFF & echo 'OK'"
    alias mysql-connect="mysql -u root --socket=$WORK_DIR/mysql-data/mysql.sock"
    alias mysql-stop="mysqladmin -u root --socket=$WORK_DIR/mysql-data/mysql.sock shutdown"
    alias mysql-reset="rm -rf $WORK_DIR/mysql-data"


    if [ ! -d $WORK_DIR/mysql-data ]; then
      mysql-init
    fi

    if [ ! -f $WORK_DIR/apps/backend/.env ]; then
      cp $WORK_DIR/apps/backend/.env.example $WORK_DIR/apps/backend/.env
    fi

    if [ ! -f $WORK_DIR/apps/web/.env ]; then
      cp $WORK_DIR/apps/web/.env.example ./apps/web/.env
    fi



    if [ ! -e $WORK_DIR/mysql-data/mysql.sock ]; then
      read -p "Start MySQL? [y/N] " answer
      if [[ "$answer" =~ ^[yY]$ ]]; then
        mysql-start
      fi
    fi


    pnpm i

    cd apps/backend && composer install && php artisan migrate && cd $WORK_DIR

    cleanup() {
      if [ -e $WORK_DIR/mysql-data/mysql.sock ]; then
        read -p "Stop MySQL? [y/N] " answer
        if [[ "$answer" =~ ^[yY]$ ]]; then
          mysql-stop
        fi
      fi
    }

    trap cleanup EXIT
  '';
}