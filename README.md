# Passwords
#### For NextCloud 12
#### This is a fork of the Passwords App from Fallon Turner. If focuses on the compatibility with NextCloud as well as with the API of the original APP
##### 2015-2017, Fallon Turner <fcturner@users.noreply.github.com>
##### 2017, Marius Wieschollek <marius-wieschollek@users.noreply.github.com>
Available in 25 languages: 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/uksmall.gif" title="English" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/desmall.gif" title="German" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/essmall.gif" title="Spanish" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/frsmall.gif" title="French" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/itsmall.gif" title="Italian" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/nlsmall.gif" title="Dutch" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/dksmall.gif" title="Danish" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/czsmall.gif" title="Czech" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/nosmall.gif" title="Norwegian Bokmål" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/rusmall.gif" title="Russian" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/jpsmall.gif" title="Japanese" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/plsmall.gif" title="Polish" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/brsmall.gif" title="Portuguese (Brazil)" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/ptsmall.gif" title="Portuguese (Portugal)" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/mxsmall.gif" title="Spanish (Mexico)" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/trsmall.gif" title="Turkish" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/sesmall.gif" title="Swedish" height="15" /> 
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Catalonia.svg/150px-Flag_of_Catalonia.svg.png" title="Catalan" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/thsmall.gif" title="Thai" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/ilsmall.gif" title="Hebrew" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/rosmall.gif" title="Romanian" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/alsmall.gif" title="Albanian" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/sismall.gif" title="Slovenian" height="15" /> 
<img src="http://www.worldatlas.com/webimage/flags/countrys/zzzflags/issmall.gif" title="Icelandic" height="15" /> 
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Galicia.svg/150px-Flag_of_Galicia.svg.png" title="Galician" height="15" />  

## Contents
*  [Overview](https://github.com/marius-wieschollek/passwords#overview)
*  [Summary](https://github.com/marius-wieschollek/passwords#summary)
*  [Security](https://github.com/marius-wieschollek/passwords#security)
 * [Password generation](https://github.com/marius-wieschollek/passwords#-password-generation)
 * [Encryption (for storage in database)](https://github.com/marius-wieschollek/passwords#-encryption-for-storage-in-database)
 * [Decryption (for pulling from database)](https://github.com/marius-wieschollek/passwords#-decryption-for-pulling-from-database)
 * [Sharing](https://github.com/marius-wieschollek/passwords#-sharing)
*  [Remote control](https://github.com/marius-wieschollek/passwords#remote-control)
*  [**Requirements**](https://github.com/marius-wieschollek/passwords#requirements)
*  [**Installation**](https://github.com/marius-wieschollek/passwords#installation)
*  [Credits](https://github.com/marius-wieschollek/passwords#credits)


## Overview
:camera: [More pictures in the gallery](https://github.com/marius-wieschollek/passwords/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots)).
![Overview of ownCloud Passwords](https://raw.githubusercontent.com/marius-wieschollek/passwords/stable/img/screenshot3.PNG)

:camera: [More pictures in the gallery](https://github.com/marius-wieschollek/passwords/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots)).

## Summary
This is the safest Password Manager for generating, sharing, editing, and categorizing passwords in ownCloud 8 and later and NextCloud 9 and later ([see 'img'-folder](/img/) for screenshots or [here for the gallery](https://github.com/marius-wieschollek/passwords/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots))). It has full LDAP support and features **both client side and server side encryption** (using combined EtM [Encrypt-then-MAC] and MCRYPT_BLOWFISH encryption with user-specific, ownCloud/NextCloud-specific, and database entry-specific data), where only the user who creates the password is able to decrypt and view it. So passwords are stored heavily encrypted into the ownCloud/NextCloud database (read [Security part](https://github.com/marius-wieschollek/passwords#security) for details). You can insert or import your own passwords or randomly generate new ones. Some characters are excluded upon password generation for readability purposes (1, I, l and B, 8 and o, O, 0).

This app is primarily intended as a password MANAGER, e.g. for a local ownCloud/NextCloud instance on your own WPA2 protected LAN. If you trust yourself enough as security expert, you can use this app behind an SSL secured server for a neat cloud solution. The app will be blocked (with message) if not accessed thru https, which will result in your passwords not being loaded (decrypted) and shown. To prevent this, use ownCloud/NextClouds own 'Force SSL'-function on the admin page, or use HSTS (HTTP Strict Transport Security) on your server. Also, make sure your server hasn't any kind of vulnerabilities (POODLE, CSRF, XSS, SQL Injection, Privilege Escalation, Remote Code Execution, to name a few).

The script for creating passwords can be found in [these lines of `/js/passwords.js`](/js/passwords.js#L1898-L1950).

## Security
### + Password generation
Generated passwords are in fact pseudo-generated (i.e. not using atmospheric noise), since only the Javascript Math.random-function is used, of which I think is randomly 'enough'. After generation of different types of characters (your choice to include lowercase, uppercase, numbers and/or reading marks, strength will be calculated), scrambling of these characters is done using the [Fisher-Yates shuffle](http://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle) (also known as Knuth, a de-facto unbiased shuffle algorithm).

### + Encryption (for storage in database)
This app features both **server-side encryption** (since encryption takes place on the server, before the data is placed in the database table) and **client-side encryption** (since encryption is performed with a key that is not known to the server). All passwords (generated or your own) are stored into your own ownCloud/NextCloud database, using these high-end cryptological functions:
* Encryption is done using a key built from user-specific, ownCloud/NextCloud-specific, and database entry-specific data so it is unique for every encrypted block of text (i.e. every password). It therefore provides key rotation for cipher and authentication keys.
* The keys are not used directly. Instead, it uses [key stretching](http://en.wikipedia.org/wiki/Key_stretching) which relies on [Password-Based Key Derivation Function 2](http://en.wikipedia.org/wiki/PBKDF2) (PBKDF2).
* It uses [Encrypt-then-MAC](http://en.wikipedia.org/wiki/Authenticated_encryption#Approaches_to_Authenticated_Encryption) (EtM), which is a very good method for ensuring the authenticity of the encrypted data.
* It uses mcrypt to perform the encryption using [MCRYPT_BLOWFISH ciphers](https://en.wikipedia.org/wiki/Blowfish_(cipher)) and [MCRYPT_MODE_CBC](https://en.wikipedia.org/wiki/Block_cipher_mode_of_operation#Cipher_Block_Chaining_.28CBC.29) for the mode. It's strong enough, and still fairly fast.
* It hides the [Initialization vector](http://en.wikipedia.org/wiki/Initialization_vector) (IV).
* It uses a [timing-safe comparison](http://blog.ircmaxell.com/2014/11/its-all-about-time.html) function using [double Hash-based Message Authentication Code](http://en.wikipedia.org/wiki/Hash-based_message_authentication_code) (HMAC) verification of the source data.

### + Decryption (for pulling from database)
All passwords are encrypted with user-specific, ownCloud/NextCloud-specific and server-specific keys. This means passwords can be decrypted:
* only by the user who created the password (so this user must be logged in),
* only on the same ownCloud/NextCloud instance where the password was created in (meaning: same password salt in config.php).

Other users or administrators are never able to decrypt passwords, since they cannot login as the user (assuming the user's password isn't known). *If the password salt is lost, all passwords of all users are lost and irretrievable.*

### + Sharing
For sharing, an ad hoc share key is created everytime a share is initiated. This is a 256-bit strong hash, with no retrievable information. The share key is stored encrypted as above for the user who shares a password and copied to another table where this key matches the password ID and the ownCloud/NextCloud ID of the user to whom the password is shared with. If the share keys match, the password will be decrypted at the receiving user's side too. If they don't, the receiving user will see an 'Invalid share key' notice and the password will not be decrypted at all.

## Remote control
This app allows full remote control by using a RESTful API. Read here about how to use it: https://github.com/marius-wieschollek/passwords/wiki.

Browser plugins are available for [Firefox here](https://addons.mozilla.org/en-US/firefox/addon/firefox-owncloud-passwords) (thanks to [@eglia](https://github.com/eglia)) and for [Chrome here](https://github.com/thefirstofthe300/ownCloud-Passwords) (thanks to [@thefirstofthe300](https://github.com/thefirstofthe300)).

## Requirements
* Nextcloud 12
* PHP 7.1

## Installation
### Updating from previous version
From v19 on: Login as admin on ownCloud/NextCloud and **go to the passwords section** on the **admin page**. It will notify you whether there's an update, or you're already up to date. When there's an update, buttons will appear to download the latest version and all command lines with adapted file owner names (`www-data` in below example) and right app location (`/var/www/owncloud_prod/apps/passwords` in below example) to run the update very fast on your CLI.

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
A big thanks to all participants in this project. I thank Anthony Ferrara ([ircmaxell](http://careers.stackoverflow.com/ircmaxell)), for [teaching the world how to properly set up](http://stackoverflow.com/questions/5089841/two-way-encryption-i-need-to-store-passwords-that-can-be-retrieved/5093422#5093422) security in PHP.
