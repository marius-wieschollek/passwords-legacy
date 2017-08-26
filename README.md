# Passwords
**by Marius Wieschollek, original app by Fallon Turner**
A simple password storage for Nextcloud 12

## Contents
*  [Summary](https://github.com/marius-wieschollek/passwords#summary)
*  [Requirements](https://github.com/marius-wieschollek/passwords#requirements)
*  [Installation](https://github.com/marius-wieschollek/passwords#installation)
*  [Security](https://github.com/marius-wieschollek/passwords#security)
*  [API and Third Party Apps](https://github.com/marius-wieschollek/passwords#api-and-third-party-apps)
*  [Credits](https://github.com/marius-wieschollek/passwords#credits)

## Summary
This is the safest Password Manager for generating, sharing, editing, and categorizing passwords in ownCloud 8 and later and NextCloud 9 and later ([see 'img'-folder](/img/) for screenshots or [here for the gallery](https://github.com/marius-wieschollek/passwords/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots))). It has full LDAP support and features **both client side and server side encryption** (using combined EtM [Encrypt-then-MAC] and MCRYPT_BLOWFISH encryption with user-specific, ownCloud/NextCloud-specific, and database entry-specific data), where only the user who creates the password is able to decrypt and view it. So passwords are stored heavily encrypted into the ownCloud/NextCloud database (read [Security part](https://github.com/marius-wieschollek/passwords#security) for details). You can insert or import your own passwords or randomly generate new ones. Some characters are excluded upon password generation for readability purposes (1, I, l and B, 8 and o, O, 0).

This app is primarily intended as a password MANAGER, e.g. for a local ownCloud/NextCloud instance on your own WPA2 protected LAN. If you trust yourself enough as security expert, you can use this app behind an SSL secured server for a neat cloud solution. The app will be blocked (with message) if not accessed thru https, which will result in your passwords not being loaded (decrypted) and shown. To prevent this, use ownCloud/NextClouds own 'Force SSL'-function on the admin page, or use HSTS (HTTP Strict Transport Security) on your server. Also, make sure your server hasn't any kind of vulnerabilities (POODLE, CSRF, XSS, SQL Injection, Privilege Escalation, Remote Code Execution, to name a few).

The script for creating passwords can be found in [these lines of `/js/passwords.js`](/js/passwords.js#L1898-L1950).

## Security
Currently the app only supports server side encryption with mcrypt. A more up-to-date client side encryption will be added soon.

## API and Third Party Apps
This app allows full remote control by using a RESTful API. Read here about how to use it: https://github.com/marius-wieschollek/passwords/wiki.

Browser plugins are available for [Firefox here](https://addons.mozilla.org/en-US/firefox/addon/firefox-owncloud-passwords) (thanks to [@eglia](https://github.com/eglia)) and for [Chrome here](https://github.com/thefirstofthe300/ownCloud-Passwords) (thanks to [@thefirstofthe300](https://github.com/thefirstofthe300)).

## Requirements
* Nextcloud 12
* PHP 7.1
* mcrypt
* openssl

## Installation
### Updating from previous version
Login as admin on NextCloud and **go to the passwords section** on the **admin page**. It will notify you whether there's an update, or you're already up to date. When there's an update, buttons will appear to download the latest version and all command lines with adapted file owner names (`www-data` in below example) and right app location (`/var/www/owncloud_prod/apps/passwords` in below example) to run the update very fast on your CLI.

*Note: on versions lower than v19, these commands still work.*

![Updating the app](https://raw.githubusercontent.com/marius-wieschollek/passwords/stable/img/versionchecker.png)

### Initial installation
Use one of the following options, login as admin on NextCloud and enable the app. The database tables `oc_passwords`, `oc_passwords_categories` and `oc_passwords_share` will be created automatically (assuming `_oc` as prefix).
* **Git clone (fastest)** 
 * Use these commands (assuming `/var/www/nextcloud` as your ownCloud/NextCloud root location). The first one is optional to remove an existing folder with contents.
 ```
rm -rf /var/www/owncloud/apps/passwords
git clone --branch stable https://github.com/marius-wieschollek/passwords.git /var/www/nextcloud/apps/passwords
```
* **Manual download and installation** 
 * [Click here to view the latest official release](https://github.com/marius-wieschollek/passwords/releases/latest) or, for the very last master version, [click here to download the zip](https://github.com/marius-wieschollek/passwords/archive/stable.zip) or [here to download the tar.gz](https://github.com/marius-wieschollek/passwords/archive/stable.tar.gz).
 * Copy, unzip or untar the folder 'passwords' to /nextcloud/apps/ (**remember that the folder must be called 'passwords'**).

* Installation from NextCloud AppStore
 * Comes as soon as i manage to integrate it

## Credits
A big thanks to all participants in this project.
