# ServerStatus20
Server Status 2.0. Forked and rewrited https://github.com/mojeda/ServerStatus

Now uses PDO and Twig. 

Installation
============

1. Create a database with a user.
2. Import the servers.sql file in in the /sql/ folder, to populate the database.
3. Configure /includes/config.php with the database and user information.
4. Copy uptime.php or uptime_windows.php to any server you want to monitor. This needs to be publicly accessible.
5. Insert an entry into the database.
6. name - The name of your server.
7. url - The URL path to the uptime.php file (minus uptime.php and http://) e.g. dns.domain.tld/path/
8. location - Where is your server physically located?
9. host - The name of the host of which your server is hosted by.
10. type - What type of server is this? DNS, SQL, Apache/nginx, etc.
