# Magento module "Agoris_PopupLastAddProductToCart" #
This module provides the ability to display the last item added to the cart in the form of a popup to the customer
## How to use Agoris_PopupLastAddProductToCart extension ##
### Step 1 : Download Magento 2 Agoris_PopupLastAddProductToCart extension ###
#### Install via composer (recommend) ####
Run the following commands in Magento 2 root folder:
```
composer require agoris/module-popup-last-add-product-to-cart

php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```
### Step 2: User guide ####
#### 2.1. General configuration ####
You can disable this solution:
_Login to Magento admin > Stores > Configuration > Agoris extenstions > Pop Up Last Add Product To Cart > General Options > Enable Functionality > Choose Yes to enable the module._

![picture alt](https://i.postimg.cc/2rpJctMd/2022-08-10-11-05-59.png "Admin area")

Clear the cache after disabling

```
php bin/magento cache:clean
```
#### 2.2. Result ####

![picture alt](https://i.postimg.cc/9ckQsChg/popup.png "Popup Cart")
