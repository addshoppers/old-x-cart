README
======

For full installation instructions including screenshots, please go to http://help.addshoppers.com/customer/portal/articles/1233407--x-cart-installation-instructions

Installation Instructions
-------------------------

1)If you do not have one already, create an AddShoppers account at http://www.addshoppers.com.

2)Move all the included files except the AddShoppers folder to ~/xcart/. When prompted, choose to merge the selected folders.

	2a)Move the included AddShoppers folder to ~/xcart/skin/common_files/	modules.

3)Open up the bottom.tpl file, located at ~/xcart/skin/ACTIVE SKIN/customer/bottom.tpl. Obviously, replace 'ACTIVE SKIN' with the skin you are currently using. Add in, at the bottom of the file right before the closing div, the following lines of code:

{if $active_modules.AddShoppers}
    {include file="modules/AddShoppers/addshoppers.tpl"}
 {/if}

4) Open up the included install-addshoppers.php file. Find line 8:

define('COMPATIBLE_VERSION', 'X.X.X');

and update the 'X.X.X' with your X-Cart version.

If you don't know your exact version number, you can search in the include/install.php file. Search for "Check for valid module version" and you'll see your version where it says:

constant('COMPATIBLE_VERSION') != 'X.X.X')

5)In your browser, go to the included YOURDOMAIN.com/X-CART FOLDER/install-addshoppers.php file, and follow the prompts. Of course, you have to replace YOURDOMAIN with your site and X-CART FOLDER with the folder you have X-Cart in currently. Also, only add the X-Cart folder to the URL if install-addshoppers.php is not in the root directory.

6)Now you should be all set using AddShoppers with X-Cart.