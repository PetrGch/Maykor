<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?
/*foreach($arResult["MESSAGE"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"OK"));*/
foreach($arResult["ERROR"] as $itemID=>$itemValue)
	//echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"ERROR"));
	echo ShowMessage(array("MESSAGE"=>'Подписка не существует', "TYPE"=>"ERROR"));

if($arResult["ALLOW_ANONYMOUS"]=="N" && !$USER->IsAuthorized()):
	echo ShowMessage(array("MESSAGE"=>GetMessage("CT_BSE_AUTH_ERR"), "TYPE"=>"ERROR"));
else:
?>
<div class="subscription">
	<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
	<?echo bitrix_sessid_post();?>
	<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
	<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
	<input type="hidden" name="RUB_ID[]" value="0" />
	<input type="hidden" name="EMAIL" value="<?echo $arResult["SUBSCRIPTION"]["EMAIL"]!=""? $arResult["SUBSCRIPTION"]["EMAIL"]: $arResult["REQUEST"]["EMAIL"];?>" class="subscription-email" />

	<div>
		<div class="press-head page-header wgy">Подписка</div>
		<div class="clear"></div>
		<?if ($arResult['DELETE_SUBSCR'] == "Y"):?>
			<?='Подписка удалена!';?>
		<?else:?>
		<table cellspacing="0" class="subscription-layout">
			<?/*?>
			<tr>
				<td class="field-name"><?echo GetMessage("CT_BSE_EMAIL_LABEL")?></td>
				<td class="field-form">
					<div class="subscription-format">
						<span>
							<?echo GetMessage("CT_BSE_FORMAT_LABEL")?>
						</span>
						&nbsp;
						<input type="radio" name="FORMAT" id="MAIL_TYPE_TEXT" value="text" <?if($arResult["SUBSCRIPTION"]["FORMAT"] != "html") echo "checked"?> />
						<label for="MAIL_TYPE_TEXT">
							<?echo GetMessage("CT_BSE_FORMAT_TEXT")?>
						</label>
						&nbsp;
						<input type="radio" name="FORMAT" id="MAIL_TYPE_HTML" value="html" <?if($arResult["SUBSCRIPTION"]["FORMAT"] == "html") echo "checked"?> />
						<label for="MAIL_TYPE_HTML">
							<?echo GetMessage("CT_BSE_FORMAT_HTML")?>
						</label>
					</div>
				<input type="text" name="EMAIL" value="<?echo $arResult["SUBSCRIPTION"]["EMAIL"]!=""? $arResult["SUBSCRIPTION"]["EMAIL"]: $arResult["REQUEST"]["EMAIL"];?>" class="subscription-email" />
				</td>
			</tr>
			<?*/?>
			<tr>
				<td class="field-name"><?echo GetMessage("CT_BSE_RUBRIC_LABEL")?></td>
				<td class="field-form">
					<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
						<div class="subscription-rubric <?=($itemValue['ID'] != $arParams['RUBRIC_ID'] ? 'hidden' : '');?>">
							<input type="checkbox" id="RUBRIC_<?echo $itemID?>" name="RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> />
							<label for="RUBRIC_<?echo $itemID?>">
								<b><?echo $itemValue["NAME"]?></b>
								<span><?echo $itemValue["DESCRIPTION"]?></span>
							</label>
						</div>
					<?endforeach;?>

					<?if($arResult["ID"]==0):?>
						<div class="subscription-notes"><?echo GetMessage("CT_BSE_NEW_NOTE")?></div>
					<?else:?>
						<div class="subscription-notes"><?echo GetMessage("CT_BSE_EXIST_NOTE")?></div>
					<?endif?>

					<div class="subscription-buttons">
						<input class="f-button" type="submit" name="Save" value="<?echo ($arResult["ID"] > 0? GetMessage("CT_BSE_BTN_EDIT_SUBSCRIPTION"): GetMessage("CT_BSE_BTN_ADD_SUBSCRIPTION"))?>" />
					</div>
				</td>
			</tr>
		</table>
		<?endif;?>
	</div>

	</form>
</div>

<?endif;?>

<script>
	$(document).on( "ready", function() {
		$("#right-menu").hide();
		$(".keyphrases").css("margin-bottom", 90);
	})
</script>