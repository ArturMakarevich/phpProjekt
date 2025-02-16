Symfony Docker Project na Ubuntu

Wymagania

Docker

Docker Compose

Git

Instalacja i uruchomienie

1. Aktualizacja systemu i instalacja wymaganych pakietów

sudo apt update && sudo apt upgrade -y
sudo apt install git -y

2. Instalacja Dockera i Docker Compose

sudo apt update && sudo apt install -y docker-ce docker-ce-cli containerd.io
docker --version

sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version

3. Sklonowanie repozytorium

git clone https://github.com/ArturMakarevich/phpProjekt
cd phpProjekt

4. Uruchomienie kontenerów Docker

docker-compose up -d

5. Instalacja zależności Symfony

docker-compose exec php_8_2 bash
cd php-symfony
composer require symfony/runtime
composer install

6. Tworzenie bazy danych

php bin/console doctrine:database:create

7. Uruchomienie projektu w przeglądarce

Po zakończeniu procesu instalacji, projekt będzie dostępny pod poniższymi adresami:

http://localhost:8095/en/games

http://localhost:8099/en/games