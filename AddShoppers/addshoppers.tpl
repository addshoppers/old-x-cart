{if $config.AddShoppers.AddShoppers_Share_Buttons == 'Y'}
	<div class='share-buttons share-buttons-tab' data-buttons='twitter,facebook,pinterest' data-style='medium' data-counter='true' data-hover='true' data-promo-callout='true' data-float='left'></div>
{/if}
{if $smarty.get.mode == 'order_message'}
	{if $config.AddShoppers.AddShoppers_ROI_Tracking == 'Y'}
	{literal}
		<script type="text/javascript">
			AddShoppersConversion = {
        		order_id: '{/literal}{$orders[0].order.orderid}{literal}',
        		value: '{/literal}{$orders[0].order.total}{literal}'
			};
			var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true; js.id = 'AddShoppers';
			js.src = ('https:' == document.location.protocol ? 'https://shop.pe/widget/' : 'http://cdn.shop.pe/widget/') + 'widget_async.js#{/literal}{$config.AddShoppers.AddShoppers_Shop_Id}{literal}';
			document.getElementsByTagName("head")[0].appendChild(js);
			</script>
	{/literal}
		{/if}
	
	{if $config.AddShoppers.AddShoppers_Purchase_Sharing == 'Y'}
	{literal}
		<script type="text/javascript">
		AddShoppersTracking = {
    		auto: true,
    		header:'{/literal}{$config.AddShoppers.AddShoppers_PS_Title}{literal}',
    		image:'{/literal}{$config.AddShoppers.AddShoppers_PS_Logo}{literal}',
    		url:'{/literal}{$config.AddShoppers.AddShoppers_PS_Link}{literal}',
    		name:'{/literal}{$config.AddShoppers.AddShoppers_PS_Text}{literal}',
    		description:'{/literal}{$config.AddShoppers.AddShoppers_PS_Desc}{literal}'
		}
		</script>
	{/literal}
	{/if}
{/if}

	{$store_language}
	{if $store_language == "es"}
	{assign var="addshoppers_language" value="es_MX"}

	{elseif $store_language == "fr"}
	{assign var="addshoppers_language" value="fr_FR"}

	{elseif $store_language == "sk"}
	{assign var="addshoppers_language" value="sk_SK"}

	{elseif $store_language == "de"}
	{assign var="addshoppers_language" value="de_DE"}

	{elseif $store_language == "pt"}
	{assign var="addshoppers_language" value="pt_BR"}

	{elseif $store_language == "cz"}
	{assign var="addshoppers_language" value="cz_CZ"}

	{elseif $store_language == "el"}
	{assign var="addshoppers_language" value="el_GR"}

	{elseif $store_language == "lt"}
	{assign var="addshoppers_language" value="lt_LT"}

	{elseif $store_language == "az"}
	{assign var="addshoppers_language" value="az_AZ"}

	{elseif $store_language == "tr"}
	{assign var="addshoppers_language" value="tr_TR"}
	
	{elseif $store_language == "it"}
	{assign var="addshoppers_language" value="it_IT"}
	
	{elseif $store_language == "pl"}
	{assign var="addshoppers_language" value="pl_PL"}
	
	{elseif $store_language == "no"}
	{assign var="addshoppers_language" value="no_NO"}
	
	{elseif $store_language == "cs"}
	{assign var="addshoppers_language" value="cs_CZ}
	
	{/if}
	{literal}
	<script type="text/javascript">
	if(typeof AddShoppersTracking === 'undefined'){
    	AddShoppersTracking = {
            	{/literal}{if $addshoppers_language != ""}{literal} lang: { widget: '{/literal}{$addshoppers_language}{literal}' }{/literal}{/if}{literal} };
	}
	else {
		{/literal}{if $addshoppers_language != ""} AddShoppersTracking.lang = {literal}{{/literal} widget: '{$addshoppers_language}' {literal}}{/literal} {/if}{literal}};
	{/literal}
    var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true; js.id = 'AddShoppers';
    js.src = ('https:' == document.location.protocol ? 'https://shop.pe/widget/' : 'http://cdn.shop.pe/widget/') + 'widget_async.js#{/literal}{$config.AddShoppers.AddShoppers_Shop_Id}{literal}';
    document.getElementsByTagName("head")[0].appendChild(js);
</script>
{/literal}
