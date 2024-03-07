# Project Manager

## Installation

### Clone

```bash
git clone git@github.com:BatMaxou/licence-project-manager.git
cd licence-project-manager
```

### Devops

```bash
git submodule update --init
```

### Env

```
APP_SECRET=somethingusefull
DATABASE_URL="mysql://root:root@db/project_manager?serverVersion=16&charset=utf8"
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
```

### Ports

Don't forget to chose a port for the web and the phpmyadmin images

```yaml
# docker-compose.override.yaml
version: "3"

services:
  db:
    environment:
      MYSQL_ROOT_PASSWORD: root

  pma:
    environment:
      MYSQL_ROOT_PASSWORD: root
    ports:
      - "82:80"
  web:
    ports:
      - "8000:80"
```

### Rights

You must create the `public/uploads` directory for the storage of the images and give the right to the web server to write in it.

```bash
mkdir -p public/uploads
sudo chmod -R 777 public/uploads
```

Same for the `var` directory

```bash
sudo chmod -R 777 var/
```

### Set up

```bash
docker-compose up
docker-compose exec php composer install
docker-compose exec php php bin/console doctrine:database:create
docker-compose exec php php bin/console doctrine:schema:update --force --complete
```

### Fixtures

```bash
docker-compose exec php php bin/console doctrine:fixtures:load -n
```

### Access

You can now access the project with the user `admin` and the password `admin`
