# Passwords
**by Marius Wieschollek, original app by Fallon Turner**
A simple password storage for Nextcloud 12

> This app is no longer supported.
> If you are looking for a safe and simple password manager, please use the [new app](https://github.com/marius-wieschollek/passwords).

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
Passwords uses mcrypt to encrypt your passwords and will therefore no longer work on PHP 7.2.
All passwords are encrypted using a server side encryption.
Every password is encrypted with it's own key.

## API and Third Party Apps
This app allows full remote control by using a RESTful API.

Browser plugins are available for [Firefox](https://addons.mozilla.org/de/firefox/addon/nextcloud-passwords/) and for [Chromium](https://github.com/marius-wieschollek/passwords-webextension/wiki/chromium-builds).
An [Android App](https://play.google.com/store/apps/details?id=com.intirix.cloudpasswordmanager) is available as well.

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

## Credits
A big thanks to all participants in this project.
