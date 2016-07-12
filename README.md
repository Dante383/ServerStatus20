# ServerStatus20
Server Status 2.0. Forked and rewrited https://github.com/mojeda/ServerStatus

Now using PDO and Twig. 

Installation
============

1. Create a database with a user.
2. Import the servers.sql file in in the /sql/ folder, to populate the database.
3. Configure /includes/config.php with the database and user information.
4. Copy uptime.php or uptime_windows.php to any server you want to monitor. This needs to be publicly accessible. Warning! If you choose uptime_windows.php rename it to uptime.php
5. Insert an entry into the database.
  * name - The name of your server.
  * url - The URL path to the uptime.php file (minus uptime.php and http://) e.g. dns.domain.tld/path/
  * location - Where is your server physically located?
  * host - The name of the host of which your server is hosted by.
  * type - What type of server is this? DNS, SQL, Apache/nginx, etc.
