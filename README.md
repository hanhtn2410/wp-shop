**Dev**
1. Create and import database
2. Open source/wp-config.php file and change settings config
3. Config virtual host (Xampp ~apache folder/conf/extra/httpd-vhosts.conf)<br>
Example: <br>
```
Listen *:8294
<VirtualHost *:8294>
    ServerName localhost
    DocumentRoot "F:/ME/WP SHOP/wp-shop/source"
    <Directory "F:/ME/WP SHOP/wp-shop/source">
        Options Indexes Includes FollowSymLinks
        DirectoryIndex index.html index.php
        AllowOverride All
		Require all granted
    </Directory>
</VirtualHost>
```
4. Start apache 
