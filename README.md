# Passwords
**by Marius Wieschollek, original app by Fallon Turner**
A simple password storage for Nextcloud 12

## Contents
*  [Summary](#summary)
*  [Requirements](#requirements)
*  [Installation](#installation)
*  [Security](#security)
*  [API and Third Party Apps](#api-and-third-party-apps)
*  [Credits](#credits)

## Summary
This is a safe Password Manager for creating, sharing, editing, and categorizing passwords in NextCloud 12 and later ([see 'img'-folder](/img/) for screenshots or [here for the gallery](https://github.com/marius-wieschollek/passwords-legacy/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots))). It has full LDAP support and features server side encryption using combined EtM [Encrypt-then-MAC].
You can insert or import your own passwords or randomly generate new ones.

## Security
All passwords are encrypted using a server side encryption. Every password is encrypted with it's own key.

## API and Third Party Apps
This app allows full remote control by using a RESTful API.

Browser plugins are available for [Firefox here](https://addons.mozilla.org/en-US/firefox/addon/firefox-owncloud-passwords) (thanks to [@eglia](https://github.com/eglia)) and for [Chrome here](https://github.com/thefirstofthe300/ownCloud-Passwords) (thanks to [@thefirstofthe300](https://github.com/thefirstofthe300)).

## Requirements
* Nextcloud 12 (works with 11, but not supported)
* PHP 5.6 (Upgrade to PHP 7.0 for future releases)
* mcrypt
* openssl

## Installation
### Updating from previous version
Login as admin on NextCloud and **go to the passwords section** on the **admin page**. It will notify you whether there's an update, or you're already up to date. When there's an update, buttons will appear to download the latest version and all command lines with adapted file owner names (`www-data` in below example) and right app location (`/var/www/owncloud_prod/apps/passwords` in below example) to run the update very fast on your CLI.

*Note: on versions lower than v19, these commands still work.*

![Updating the app](https://raw.githubusercontent.com/marius-wieschollek/passwords-legacy/stable/img/versionchecker.png)

### Initial installation
Use one of the following options, login as admin on NextCloud and enable the app. The database tables `oc_passwords`, `oc_passwords_categories` and `oc_passwords_share` will be created automatically (assuming `_oc` as prefix).
* **Git clone (fastest)** 
 * Use these commands (assuming `/var/www/nextcloud` as your ownCloud/NextCloud root location). The first one is optional to remove an existing folder with contents.
 ```
rm -rf /var/www/owncloud/apps/passwords
git clone --branch stable https://github.com/marius-wieschollek/passwords-legacy.git /var/www/nextcloud/apps/passwords
```
* **Manual download and installation** 
 * [Click here to view the latest official release](https://github.com/marius-wieschollek/passwords-legacy/releases/latest) or, for the very last master version, [click here to download the zip](https://github.com/marius-wieschollek/passwords-legacy/archive/stable.zip) or [here to download the tar.gz](https://github.com/marius-wieschollek/passwords-legacy/archive/stable.tar.gz).
 * Copy, unzip or untar the folder 'passwords' to /nextcloud/apps/ (**remember that the folder must be called 'passwords'**).

* Installation from NextCloud AppStore
 * Comes as soon as i manage to integrate it

## Credits
A big thanks to all participants in this project.
