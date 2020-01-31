# pktriggercord-web
A raspberry pi web interface for pkTriggerCord :
a tethering web interface for Pentax cameras.

-Set up a web server with php support<br>
-Download and install pktriggercord-cli<br>
-Install reposiory content at the document root of the server (for example /var/www/html/)<br>
-Create 2 directories named photos and compressed in the document root (e.g. /var/www/html/photos and /var/www/html/compressed)<br>
-Give document root and subfolders correct access rights (e.g. chown -R www-data:pi /var/www/html ; chmod -R 770 /var/www/html)<br>
-Connect a pentax camera via usb to the raspberry pi<br>
-Connect to the raspberry pi with a web browser and enjoy!<br>
