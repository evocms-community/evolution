# Evolution CMS - Community Edition

![evocms](https://user-images.githubusercontent.com/523389/167645693-694ca1c1-fb53-45d5-aa63-e3d8c5e1cc84.jpg)

[![CMS Evolution](https://img.shields.io/badge/CMS-Evolution-brightgreen.svg)](https://github.com/evocms-community/evolution) [![GitHub release](https://img.shields.io/github/release/evocms-community/evolution.svg)](https://github.com/evocms-community/evolution/releases) ![PHP version](https://img.shields.io/badge/PHP->=v8.1-green.svg?php=8.1) [![Documentation](https://img.shields.io/badge/Documentation-processed-orange.svg)](https://github.com/evocms-community/docs/)


## What is Evolution CMS
**Evolution CMS** is an open source Content Management System and Application Framework.

## History
Initially inspired by **Etomite 0.6**, then it been **MODX Evolution 0.7 - 1.0.8** is an ongoing project written by *Raymond Irving* and a core team of contributors **MODX**, and now its **Evolution CMS** maintained by a team of contributors at the **Evolution CMS Project**.

## License
**Evolution CMS** is distributed under the **GPL license** and is now run by a professional team of developers from all over the world. Visit the Forums for more information.

## Features
**Evolution CMS** provides a fast, lightweight and powerful framework on which to deploy and secure your website and web applications.

For example, it gives you a true system for registered web users and groups that is separate from administration users. You can grant some web users access to one page and others access to another page.

For content management, you can easily duplicate documents, folders (and all their children!), chunks and snippets.

Most significant, though, is **Evolution CMS's** ability to empower you to quickly and easily create and maintain a rich and dynamic website like never before.

## Install
You can use the single click installer: [Evolution CMS Installer](https://github.com/evocms-community/installer)
Evolution CMS requires **PHP >= 8.1**.

To install the latest version with Composer:
1. Go to the site root folder.
2. Run:
```
composer create-project evocms/evolution .
```
3. Run:
```
php ./install/cli-install.php --typeInstall=1 --databaseType=mysql --databaseServer=localhost --database=db_name --databaseUser=db_user --databasePassword=db_password  --tablePrefix=evo_ --cmsAdmin=admin --cmsAdminEmail=evoadmin@sitename.com --cmsPassword=123456 --language=en --removeInstall=y
```
Or open sitename.com/install/ in the browser.

## Docker
To run **Evolution CMS** using docker make **docker-compose up -d** command in your terminal. Additional configs and access parameters you can find in **docker-compose.yml** file and **docker** folder 

## References
| Reference  | Website |
| ------------- | ------------- |
| Official Website | https://evo-cms.com/ |
| | https://evocms.ru/ |
| Documentation | https://docs.evo-cms.com |
| | https://github.com/evocms-community/docs |
| Downloads | https://github.com/evocms-community/evolution/releases |
| Translations | https://www.transifex.com/evo-cms-community/evolution-3x/ |
| Add-ons | https://extras.evocms.ru |
| Telegram group (ru) | https://t.me/evo_cms |
| News channel (ru) | https://t.me/evo_cms_news |
| Youtube (ru) | https://www.youtube.com/@evolutionlessons |
