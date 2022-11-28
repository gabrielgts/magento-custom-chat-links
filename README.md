# Module Gtstudio ChatLinks

    ``gtstudio/module-chatlinks``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
This module adds custom chat links for whatsapp Telegran and othes.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Gtstudio`
 - Enable the module by running `php bin/magento module:enable Gtstudio_ChatLinks`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require gtstudio/module-chatlinks`
 - enable the module by running `php bin/magento module:enable Gtstudio_ChatLinks`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - enabled (custom_chat_links/general/enabled)

 - message (custom_chat_links/general/message)

 - telephone (custom_chat_links/whatsapp/telephone)

 - active (custom_chat_links/whatsapp/active)

 - user (custom_chat_links/telegran/user)

 - active (custom_chat_links/telegran/active)


## Specifications

 - Block
	- Magento\Framework\View\Element\Template > magento/framework/view/element/template.phtml


## Attributes



