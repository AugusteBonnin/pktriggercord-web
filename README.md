# pktriggercord-web
A rapberry pi web interface for pkTriggerCord :
A tethering web interface for Pentax cameras.

-Set up a web server with php support
-Download and install pktriggercord-cli
-Install reposiory content at the document root of the server (for example /var/www/html/)
-Create 2 directories named photos and compressed in the document root (e.g. /var/www/html/photos and /var/www/html/compressed)
-Give document root and subfolders correct access rights (e.g. chown -R www-data:pi /var/www/html ; chmod -R 770 /var/www/html)
-Connect a pentax camera via usb to the raspberry pi.
-Connect to the raspberry pi with a web browser and enjoy!
