<?php

#
# $Id: install-addshoppers.php 61 2013-07-02 15:03 intel352 $
#

define('XCART_INSTALL',1);
define('COMPATIBLE_VERSION', 'X.X.X');

$module_definition = array (
	"name" => "X-Cart AddShoppers",
	"script" => "install-addshoppers.php",
	"prefix" => "x-cart_addshoppers",
	"successmessage" => "func_success",
	"is_installed" => "func_is_installed"
);

if (!@include("./top.inc.php"))
	die("X-Cart not found in ".dirname(__FILE__));
if (defined('BENCH')) { // X-Cart 4.6
	if (!@include("./init.php"))
		die("init.php not found. Please, unpack ".$module_definition["name"]." module in &lt;xcart&gt; directory");
}else{ // X-Cart 4.0
	if (!@include("./config.php"))
		die("config.php not found. Please, unpack ".$module_definition["name"]." module in &lt;xcart&gt; directory");
}

$modules = array (
	0 => array(
		"name" => "language",
		"comment" => "mod_language"
	),
	1 => array(
		"name" => "default",
		"comment" => "mod_license",
		"js_next" => true
	),
	2 => array(
		"name" => "modinstall",
		"comment" => "mod_modinstall",
	),
	3 => array(
		"name" => "install_done",
		"comment" => "install_complete",
		"param" => @$module_definition["successmessage"]
	)
);

#
# start: Default module
# Shows Terms & Conditions
#

function module_default(&$params) {
	global $error, $templates_directory;
	global $installation_auth_code;
	global $installation_product;
	global $xcart_dir;
	global $module_definition;
	$func_is_installed = @$module_definition["is_installed"];
?>
<center>
<?php message(lng_get("thank_you", "product", $installation_product)); ?>
<br /><br />

<textarea name="copyright" cols="80" rows="22" readonly="readonly">
<?php
ob_start();
require "modules/AddShoppers/gpl.txt";
$tmp = ob_get_contents();
ob_end_clean();
echo htmlspecialchars($tmp);
?>
</textarea>

<p />
<table>
<?php if (!empty($func_is_installed) && function_exists($func_is_installed) && $func_is_installed()) { ?>
<tr>
	<td><input type="radio" id="install_type_1" name="params[install_type]" value="1" checked="checked" /></td>
	<td align="left"><label for="install_type_1"><b><?php echo_lng("new_install"); ?></b></label></td>
</tr>
<tr>
	<td><input type="radio" id="install_type_3" name="params[install_type]" value="3" /></td>
	<td align="left"><label for="install_type_3"><b><?php echo_lng("uninstall_module"); ?></b></label></td>
</tr>
<?php } else {?>
<tr style="display: none;">
	<td><input type="hidden" name="params[install_type]" value="1" /></td>
</tr>
<?php }?>
<tr>
	<td colspan="2" align="left">
<b><?php echo_lng("auth_code"); ?>: </b><input type="text" name="params[auth_code]" size="20" /><br /><font size="1"><?php echo_lng("auth_code_note"); ?></font>
	</td>
</tr>
</table>

<p />

<input id="agree" type="checkbox" name="params[agree]" /> <label for="agree"><?php echo_lng("i_accept_license"); ?></label>

<br /><br />

</center>

<br />

<?php
	return false;
}

function module_default_js_back() {
?>
	function step_back() {
		history.back();
		return true;
	}
<?php
}

function module_default_js_next() {
?>
	function step_next() {
		if (document.getElementById('agree').checked || (document.getElementById('install_type_3') && document.getElementById('install_type_3').checked))
			return true;

		alert("<?php echo_lng_js("mod_license_alert"); ?>");
		return false;
	}
<?php
}

function func_success() {
	global $xcart_package;
	global $module_definition, $xcart_web_dir;
?>
<ol>
<li><u>
<?php if ($xcart_package=="PRO") { ?>
<a href="<?php echo $xcart_web_dir.DIR_ADMIN; ?>/home.php"><b><?php echo_lng("admin_area"); ?></b></a>
<?php } else { ?>
<a href="<?php echo $xcart_web_dir.DIR_PROVIDER; ?>/home.php"><b><?php echo_lng("admin_area"); ?></b></a>
<?php } ?>
</u><br />
<?php echo_lng("modules_admin_note"); ?><br />
</li>
</ol>
<?php
}

function func_is_installed() {
	global $sql_tbl;

	return func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[modules] WHERE module_name='AddShoppers'") > 0;
}

include $xcart_dir."/include/install.php";

?>