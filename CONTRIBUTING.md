## Set up the local environment
#### Requirements
* [Docker](https://store.docker.com/search?type=edition&offering=community)
* [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

#### Project Setup
* Open a shell on your computer and navigate to the projects directory
* Run `docker-compose up -d`
* Run `docker exec passwords-php chown www-data:www-data /var/www/html/custom_apps`
* Open your browser and type [http://localhost/](http://localhost/)
* Create your Nextcloud administrator account
* Click "Storage & Database"
* Select "MySQL/MariaDB" as database
* Enter "nextcloud" for username, password and database
* Enter "db" for host (usually filled already with "localhost")
* Finish the installation
* Run `docker exec -u www-data passwords-php /var/www/html/occ app:enable passwords`
* You can now access the [app](http://localhost/index.php/apps/passwords)
* You may have to ignore the HTTPS warning