<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>


<?//ввод значений для скрытых полей
foreach(array("EMAIL_ADMIN_HIDDEN", "ACTIVITY_HIDDEN") as $hidden_field){
	$arResult['QUESTIONS'][$hidden_field]['HTML_CODE'] = str_replace('value=""', 'value="'.$arParams[$hidden_field].'"', $arResult['QUESTIONS'][$hidden_field]['HTML_CODE']);
}

?>


<?echo $arResult['QUESTIONS']['CITY_HIDDEN']['HTML_CODE'];?>


<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
					form header
***********************************************************************************/
?>

<div class="page-header wgy l"><?=$arResult["FORM_TITLE"]?> "<?=$arParams['ACTIVITY_HIDDEN'];?>"</div>

Заполните форму:
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
	<div class="feedback-form">
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
//echo '<pre>'; print_r($arQuestion); echo '<pre>';


		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea')
		{
			$arAREA['key'] = $FIELD_SID;
			$arAREA['value'] = $arQuestion;
		}
		elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'file')
		{
			$arFile = $arQuestion;
		}
		else
		{
	?>

	<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
		<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
	<?endif;?>

			
		<div class="w50 m10">
				<div>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				</div>
				<?=$arQuestion["HTML_CODE"];?>
		</div>
	<?
		}
	} //endwhile
	?>
			<div class="m10" margin="right">
				<div>
					<span style="line-height: 30px"><?=$arFile["CAPTION"]?><?if ($arFile["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></span>
				</div>
				<span class="file" style="margin-right: 3px; float: right">
    				<input type="text" class="inputFileText" id="psevdoFileValue" tabindex="-1"  />
    				<input type="file" name="form_file_<?=$arFile['STRUCTURE'][0]['ID'];?>" onChange="setFileName(this)" size="1" class="fileInput" tabindex="-1" />
				</span>
			</div>


	<div class="clear"></div>

	<?// вывод textarea
	if (!empty($arAREA['key'])):?>
		<?$FIELD_SID = $arAREA['key'];?>
		<?$arQuestion = $arAREA['value'];?>
		<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
			<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
		<?endif;?>
		
			<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
			<?=$arQuestion["HTML_CODE"]?>
	<?endif;?>

<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<div class="bottom">
			<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?>
			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" height="30" />
			<input type="text" name="captcha_word" value="" class="inputtext" />
			<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
<?
} // isUseCaptcha
?>
		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="f-button m10" />
	
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
	</div>
</div>