#### 2017.12
* Added API v21 Support
* EOL release

#### 2017.11
* **SECURITY** Fixed Encrypted data leak in API

#### 2017.9
* **SECURITY** Fixed XSS Injection Bug
* Improved Update Checks
* Set PHP requirement to 5.5
* Set Nextcloud requirement to 11

#### 20
* Added possibility to **send emails to users** you've shared a password with
  * The email will not contain the password, but does contain the direct link to the Passwords app
  * The senders name, subject and body text of the email are written in the recipients language, even when you share it with multiple users that have set different languages
  * Theme name of your ownCloud/NextCloud instance is supported, so the senders name can be MyGreatCloud Passwords (e.g. if the recipients language is German, this will be MyGreatCloud Passwörter)
  * HTML body and plain body are both supported
  * Sending emails is not available for use with the API; this is intended
  * The button for sharing is only available when at least one user is selected
  * When a users stops a share, a notification mail can be sent
* Added full integration with **activity feed**
  * Actions like creating a new passwords, sharing and deleting existing passwords will be sent to the Activity app
  * On the Personal settings page, you can sign up for mail notifications about these events
* Added version checker for administrators
  * Since I don't support the ownCloud App Store due to their rediculous release and upload flow (which interferes with GitHub AND my privacy AND is perfectly improvable/fixable by the ownCloud developers) a version checker was added to the admin page
  * The check verifies the installed version with the latest official release and the latest master version and adds buttons and instructions when an update is available
  * The check is disabled by default, as it sends the server IP address to github.com and administrators should decide themselves whether they permit this (in other words: if you do use the App Store, ownCloud GmbH has your server info and configuration but they have no privacy statement)
* Added possibility to reset a master password (admin page)
* Added more picture sizes for website/company name
* Added pictures to buttons on share dialog
* Added check for overwriteprotocol in config.php (secure if it is 'https')
* Temporary fix for use with the `user_saml` authentication: the extra ownCloud/NextCloud authentication doesn't work and will be blocked. A notice will be displayed on the admin page.
* Renamed `script.js` to `passwords.js` to make debugging more transparant and to comply with ownCloud and NextCloud standards
* Fix for records with user names in API, with ID = 0
* Fix for NextCloud 11
* Improved HTML escape function, based on `mustache.js`
* Fix for user defined avatars not showing
* Fix for deleted flag in PostgreSQL combined with Firefox, but changing the database type to 'real' booleans (rather than integers - 0 and 1)
* Fix for trashbin not working well on newer installations of NextCloud
* Fix for sharing using LDAP
* Fix for sharing using PostgreSQL
* Fix for category filter
* Fix for `Undefined offset` in passwordservice.php
* Small design fix for double horizontal break lines on personal page when icons are disabled

#### 19 - Sept 15th, 2016
* Support for ownCloud 9.1 and NextCloud 9 and 10 (now works on all versions of OC 8 and OC 9, and NC 9 and NC 10 too)
* Added the possibility for a master password! Users can choose between their own **ownCloud password** (default after you update), a self chosen **master password** or **no extra password** at all.
  * Authentication is served over POST requests (safer than URL requests)
  * A timer (cookie) is available and can be set per user
  * A master password and the cookie timer will be hashed with a 512-bit SHA2-hash. This hash contains no retrievable information and is useless, even for database administrators. It will only be used to verify it with the hashed version of the user's input.
  * This is particularly handy when other users know your ownCloud password (for practical reasons).
  * Master passwords do not re-encrypt existing passwords, it is only used for entering the app.
  * The countdown timer will lock the app instead of log you off when it reaches zero and you use an extra authentication
  * Added 'Lock app' button as option for users who have set an extra authentication
* Full LDAP support
  * LDAP users can now share their passwords with other LDAP users and local users
  * Extra authentication using the ownCloud password is possible too 
* Added user option to change icon sizes. Default is now larger: 32px instead of 16px, but users can change this themselves to 16px, 24px or 32px.
* Added support for different app locations. If you use `/owncloud/apps2/passwords` for an instance, this will now be supported too. Admins can change this in the admin settings of ownCloud.
* Readded support for PostgreSQL (changed database format for BLOB-types to string format)
* Added version info on ownCloud/NextCloud admin page; it will check this GitHub project (/appinfo/info.xml) for a new version and will alert you with a message and buttons to visit this project, download the ZIP or TAR file, or view all releases
* Added 'Share' button to cell menu
* Added 'View' button to cell menu on shared passwords (removed 'Edit' and 'Share')
* Added 'Clone' button to cell menu; e.g. with this button you can clone/recreate a password that has been shared to you
* Added 'Stop sharing' button to popup for passwords that have been shared
* Added immediate clipboard copy when you click on a username or password, hidden or not
* Added 'Clear' button to popup
* Added support for Danish, Japanese, Romanian, Russian, Slovenian, Spanish (Mexico), Thai and Turkish. Now available in 25 languages: English, German, Spanish, French, Italian, Dutch, Danish, Czech, Norwegian Bokmål, Russian, Japanese, Polish, Portuguese (Brazil), Portuguese (Portugal), Spanish (Mexico), Turkish, Swedish, Catalan, Thai, Hebrew, Romanian, Albanian, Slovenian, Icelandic, Galician.
* Added auto load of website picture (favicon) when creating a password so it is instantly visible
* Changed appearance of left navigation pane, including removal of password form (which has moved to a popup)
* Changed password generation (pre-)algorithm, it now loops 10 times and returns the strongest of them
* Removed ZeroClipboard in favour of Clipboard.js, so Flash is fully eliminated and copy support has been extended (except for Safari)
* CSS fixes for checkboxes to comply with the ownCloud 9 standard
* Fixed responsive design, especially for mobile screens (OC Passwords looks great on iPhone!)
* Fix for loading avatars on share dialog
* Fix for notes and categories not being saved on unshared passwords
* Fix for sharing with users whose username contains a `.` or `@`
* Fix for SQLite databases
* Fix for import of addresses and notes
* Fix for `Not Found Exception`
* Fix for many small CSS bugs
* Fixed ownCloud dialogs with own CSS so they actually work and the buttons are always in sight

#### 18.0 - Apr 4th, 2016
* **Added sharing!** Share all your passwords with others (you can trust)!
  * The users you can share with, is based on the admin settings (only from your own group, or all users, ...)
  * Icons indicate the number of users you've shared a password with
  * Popup shows avatars, ownCloud login names and display names
  * It uses a random share key (256-bit strong) that is created everytime a share is created. This key is saved to a new (third) database table, `oc_passwords_share`, and to the encrypted `properties` column of the password owner. When the keys match, the password will be decrypted on the receiving user's side.
  * Note: LDAP is not yet supported, but will be in v18.1.
* **This app can now fully be controlled remotely!** This makes it technically possible to use ownCloud Passwords on Android, iPhones, remote servers, you name it. Other authors have already made browser plugins available for Firefox and Chrome. No strict need to use the website of ownCloud anymore, but it all works just as safe. 
  * Changed RESTful API to support GET, POST, DELETE, and PUT
  * Moved all calculation classes to server-side (translated JavaScript to PHP, which is all PHP 7 safe)
  * Wrote documentation for API use: [ownCloud Passwords | RESTful API](https://github.com/fcturner/passwords/wiki/ownCloud-Passwords-%7C-RESTful-API)
  * Firefox addon: [here](https://addons.mozilla.org/en-US/firefox/addon/firefox-owncloud-passwords) (thanks to [@eglia](https://github.com/eglia)) 
  * Chrome extension: [here](https://github.com/thefirstofthe300/ownCloud-Passwords) (thanks to [@thefirstofthe300](https://github.com/thefirstofthe300))
* Created a gallery with screenshots: [ownCloud Passwords | Gallery (screenshots)](https://github.com/fcturner/passwords/wiki/ownCloud-Passwords-%7C-Gallery-(screenshots))
* Allow tabs for input in notes field (so pressing Tab doesn't switch to another field, but instead inserts a tab)
* Filtering a category or text now only searches active passwords, ignoring passwords in the trash bin
* Added 'Edit categories' button to category popup
* Changed all deprecated PHP classes, to follow ownCloud's guidelines
* Changed default `session_lifetime` to 15 minutes. This will terminate a user session after 15 minutes of inactivity, if (1) a user has set a countdown timer in his personal settings and (2) this user setting is longer than 15 minutes (900 seconds). The timer will reset on activity, just like the normal countdown timer on the lower right of the screen.
* Dropped support for PostgreSQL, for now (I'll try to support it from 18.1 on again)
* Faster transition to categories and back
* Changed popup background to better show buttons like 'Generate password'
* Enlarged popup
* Set default length for generating passwords to 30 instead of 25
* Show password fields in space fixed font, which makes complex passwords easier to read
* Fix for column headers `Strength` and `Last changed`
* Fix for scrollbar on sidebar
* Fix for reset of category list after adding a password
* Fix for losing a full URL when password was changed
* Fix for popup on smaller screens (mobile phones): the popup is now scrollable when it covers more than 75% of the browsers height
* Fix for website icons not always showing
* Fix for password column width
* Fix for restore icon not always showing after deleting a password
* Fix for JavaScript errors after closing a OC dialog
* Fix for JavaScript error if using the countdown timer
* Fix for select boxes after deleting a category
* Fix for SQLite when database type is not defined in config/config.php

#### 17.2 - Mar 12, 2016
* Fix for saving and updating a password on PostgreSQL backends
* **If you don't use PostgreSQL (but MySQL or SQLite3 instead), you don't need this update**

#### 17.1 - Mar 10, 2016
* Support for ownCloud 9.0 - this app now works with all versions of OC8 and OC9
* Support for Firefox! [Andreas Egli](https://github.com/eglia) created a browser plugin for Firefox, which works with **Firefox 30.0 and later** (includes Android too): https://addons.mozilla.org/en-US/firefox/addon/firefox-owncloud-passwords/?src=userprofile
* Added automated Transifex translations, by so introducing support for Albanian, Czech, British English, Hebrew, Icelandic, Norwegian and Portuguese (Brazil)
* Fix for import window position
* Fix for SQLite3 and PostgreSQL databases
* Fix for importing passwords that gave 'session expired' error
* Fix for notes containing tabs
* Fix for update process where new database tables weren't created

#### 17 - Feb 24, 2016
* Added coloured categories. The amazing colour picker was made by [bgrins](https://bgrins.github.io/spectrum/).
* Added filter for categories
* Added category-specific popup
* Added a button for directly copying values to clipboard, using [ZeroClipboard](https://github.com/zeroclipboard/ZeroClipboard). This function relies on Flash. Browsers without Flash support (like most mobile devices) will be presented with a popup containing their value.
* Removed actual values 'beneath' hidden values (`*****`) from cells, improving privacy. By so, hovering a hidden value (like username or password) to view its actual value, is not possible anymore and this function is removed. It also means that column sorting for hidden values will not work anymore (which is redundant anyway). Hiding values can still be set on the users personal page.
* Changed database format so that password properties (like strength, length, changed date etc., but also categories and future shared users) will be saved in a hashed, encrypted BLOB format. Database admins will no longer be able to view even the changed date of a password. This improves privacy and **greatly reduces the time to load a page too**, since Handlebars now loads passwords in conjunction with JSON. This will require users to update their own database data. **Therefore, all users will be presented with an update popup after this update** (needs to be done only once). After this, the database columns `loginname`, `address` and `creation_date` will be empty and obsolete for those users (but will remain for backwards compatibility).
* Added URL to sidebar, if available
* Added text to log off alert, that timer settings are in Personal menu
* Added transition to popup
* Added confirmation to backup button if deleted passwords should be in backup too
* Totally rewrote Javascript, making more use of CSS classes and no more columns numbering
* Cleansed CSS
* Removed password colours, improving privacy
* Changed initial sorting of values in both passwords and categories by forcing `COLLATE utf8_general_ci` on the database query. This will make e.g. `Händel` appear before `Haydn`, instead of after it (ignoring the accent on `ä`). Really useful for German users who are sorting usernames and categories.
* Changed width of popup, now wider
* Fix for sidebar background due to incompatibility with Javascript XMPP Chat app
* Fix for countdown timer, which did not properly reset on activity
* Fix for strength calculation when password length is 0
* Fix for German language (v17 is fully translated to English, German, Spanish, Dutch and Catalan and partially to Italian)
* Added all release dates of previous versions to changelog
* As ownCloud moves towards PHP 7: all my classes are PHP 7 safe
* The next release (v18, expected April/May 2016) will contain sharing.
 
#### 16.2 - Nov 21, 2015
* Now -did- fixed the bug for ownCloud 8.2 and higher
 
#### 16.1 - Nov 21, 2015
* Fixed a bug for ownCloud 8.2 and higher

#### 16 - Nov 21, 2015
* Added a countdown timer, which can be set by users. When the timer reaches 0, the user will be logged off (will show a message first). Valid values are 10-3599 seconds. The countdown timer resets on activity in the passwords app. When a timer is set, the user will be logged off too when the session cookie ends (if set by admin in config.php, will else be 60 seconds and not the default 15 days).
* Added a sidebar with info about the password
* Added a progress bar for importing passwords
* Added admin option to disable the browsers context menu on this app
* Added a button to move all active passwords to trash
* Removed info columns 'length', 'a-z', 'A-Z', '0-9' and '!@#' (now available in the sidebar)
* Edited settings to hide 'strength' and 'last changed' columns, instead of a-z, A-Z, 0-9 and !@#
* Replaced alerts and confirmation popups by native OC dialogs
* Fix for emptying trash on Firefox (#80)
* Fix for saving a website URL on Firefox (#91)
* Fix for importing huge CSV files (i.e. a lot of passwords) (#89)
* Fix for checking for website column on CSV import (#90)
* Fix for importing values with double quotation marks and removed unneeded extra CSV column (#86)
* Fix for (multiline) notes sometimes not being imported (#85)
* Updated language files for English, Spanish, Dutch. Want to do an update for your own language? Look at the changes at [TRANSLATION.js](https://github.com/fcturner/passwords/commit/7f9428bac14fbfb8f866eff59d7b0efa1899967d)

#### 15 - Oct 10, 2015
* Changed version numbering: 8.0.15 is replaced by 15, since future release may support more versions than OC8 only, and it suggested an ownCloud version more than an app version
* Added new CSV import screen, with live preview
* Added Italian language support
* Added note for users when admin has blocked downloading of back-ups
* Fix for editing values containing `<` or `>`
* Language update? Look at [TRANSLATION.js](TRANSLATION.js)

#### 8.0.14 - Sep 28, 2015
* Added button in trash to permanently delete all passwords in trash bin
* Auto-select on hover of passwords and usernames, with notification text to copy them with Ctrl+C or Cmd+C (detects system automatically). This is disabled for Android and iOS (of course)
* Renamed *Creation date* to *Last changed*
* Fix for CSV files containing double quotation marks `"` or backslash `\` in values 
* Fix for CSV files containing notes with multiple lines
* Fix for CSV files containing a file extension in uppercase
* Fix for height of popup title

#### 8.0.13 - Sep 20, 2015
* Added search icon in search bar, saving another non-whitespaced line on navigation pane
* Added auto-save in settings, both admin and personal (no more button clicking)
* Totally rewrote (and fixed) the import function (for CSV files), with added error description for every possible error
* Fix for usernames and passwords containing HTML-characters like < or >
* Fix for editing a website value which became lowercase even when not a valid URL
* Fix for icon not showing on empty trash bin
* CSS fix for button texts

#### 8.0.12 - Sep 15, 2015
* Added trash bin: deleted password are now moved to the trash bin, so they can be reverted or permanently deleted (this triggers the ownCloud update screen, since a mandatory database edit to the passwords table will be made)
* Added option to save old values to the trash bin when editing a website, username or password, so you can look them up when needed
* Edited strength algorithm. Now emphasizes length better by adding the rounded value of n<sub></sub><sup>x</sup> / 10<sup>x + 1</sup> to the calculated strength, where `n` stands for the amount of characters (i.e. length) and `x` is the power. By using `x = 6`, this gives a more accurate value when passwords are longer than +/- 15 characters and grows exponentially.
* Added Catalan language, including date format
* Improvement: title of edit popup now shows active website with username in subtitle
* Improvement: read user language from html tag, instead of language files
* Fix: date format for foreign languages (i.e. undefined in this app) 
* Fix: CSV files with empty lines aren't considered invalid anymore (so KeePass import should work again!)
* Fix: overlay now actually overlays everything, including header
* Fix: align popup vertically, independant of its content and height
* Fix: no more jumping widths when hovering values
* Small other bugfixes
* Add you own language! Strings all sorted out here: [TRANSLATION.js](TRANSLATION.js).

#### 8.0.11 - Aug 11, 2015
* A new way of editing values with an interactive popup. This will let you use the password generator and is a more easy way of editing.
* Edited the backup function to make it an export function. These export files are fully compatible with KeePass, 1Password, LastPass and many other password services. Besides, Microsoft Excel can open the exported files natively as well.
* Small bugfixes

#### 8.0.10 - Aug 7, 2015
* Added possibility to import passwords from KeePass, 1Password, LastPass, SplashID or every other source, as long as it was exported as CSV. You can set the source columns yourself. 
  * Note: This is **not** less safe than putting in passwords one by one. This is Javascript only, so reading a CSV is practically very similar to typing in new passwords yourself.
* Added possibility in Personal settings to hide the columns |  a-z  |  A-Z  |  0-9  |  !@#  |

#### 8.0.9 - Aug 3, 2015
* Bugfix for Firefox: now clicking hidden values and the pencil actually works (`event` was not defined in JS)
* CSS fix: line-height doesn't change anymore when hovering a hidden password

#### 8.0.8 - Aug 1, 2015
* Bugfix: some variables were undefined, leading to errors in log
* Bugfix: hidden values now editable
* Hidden values are now viewable on mouse hover

#### 8.0.7 - July 30, 2015
* Added possibility to add notes to a password. These notes are encrypted just as strong as the passwords. 
* Added possibility to edit every field (website, full address, username, password and notes). Hover over a value and click on the pencil icon to change a value. 
* Added new icons for the form to add new passwords 
* No more page refreshing after creating, deleting (or editing) a row or value. All edits are done directly to the loaded table, so the page doesn't need to be refreshed.
* Other minor fixes

#### 8.0.6 - July 26, 2015

* Thanks to all contributors on GitHub, this is a rather big update. So thanks, you all!
  * Downloadable backup
  * Hiding of usernames and passwords
  * Added optional URL-field

* Introducing settings!
  * Admin setting: check for secure connection at start and block app if there isn't one (leave this one checked preferably!)
  * Admin setting: allow/disallow downloading of backups (because they are not secure)
  * Admin setting: allow/disallow showing website icons (since using this service, the IP address wil be sent to another server)
  * Admin setting: service used for website icons: DuckDuckGo (default) or Google
  * Admin setting: amount of days before the creation date colours orange or red
  * User setting: show/hide website icons
  * User setting: show/hide usernames
  * User setting: show/hide passwords
* 'Secure connection check' at start now checks for 'forcesll => true' in config.php too, fixing a false-positive error for people using (external) SSL extensions
* Fixed length for search fields
* Minor bug fixes and code cleaning
* *NOTE: this version works on 8.0.** *and 8.1.**

#### 8.0.5 - July 8, 2015
* Compatibility with ownCloud 8.1 (this release however works with 8.0 too!)

#### 8.0.4 - July 3, 2015
* Added German translation
* Completed Spanish translation
* Moved search field to navigation page, so this will stay visible when scrolling in a long list
* Mask passwords (click to view them). This is CSS-only for now, to prevent simple screenshot-theft of passwords. Will be JS-coded later, so passwords will actually load and be decrypted when '*****' is clicked
* Bug fixes (alignment of table heads, minor other things)

#### 8.0.3 - June 27, 2015
* Initial release, tested on ownCloud Server 8.0.*
