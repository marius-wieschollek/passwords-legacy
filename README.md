# Passwords Legacy App
**Originally by Fallon Turner, ported to Nextcloud 12 by Marius Wieschollek**

> **This app is insecure and no longer supported.
> If you are looking for a safe, simple and modern password manager, check out our [new app](https://apps.nextcloud.com/apps/passwords) and the [migration guide](https://git.mdns.eu/nextcloud/passwords/wikis/Administrators/Legacy-Migration).**

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

Please be aware that this app only supports the legacy api and the programs listed below will stop working with this app in the future. 
Browser extensions are available for [Firefox](https://addons.mozilla.org/de/firefox/addon/nextcloud-passwords/) and for [Chrome](https://chrome.google.com/webstore/detail/nextcloud-passwords/mhajlicjhgoofheldnmollgbgjheenbi). 
An [Android App](https://play.google.com/store/apps/details?id=com.intirix.cloudpasswordmanager) is available as well.

## Requirements
* Nextcloud 12 (works with 11, but not supported)
* PHP 5.6 (Upgrade to PHP 7.1 for future releases)
* mcrypt
* openssl

## Installation
### Updating
You can upgrade to the new app using the [Nextcloud App store](https://apps.nextcloud.com/apps/passwords). Read the [migration guide](https://git.mdns.eu/nextcloud/passwords/wikis/Administrators/Legacy-Migration) to keep your passwords.

## Credits
A big thanks to all who made this app happen and hopefully we meet again in the [new app](https://apps.nextcloud.com/apps/passwords).
