<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?/*if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;*/?>

<? if ( $arResult["FORM_NOTE"] != "") : ?>

	<div class="mini-thanks">
		<?=$arResult["FORM_NOTE"]?>
	</div>

<? endif;?>

<?//ввод значений для скрытых полей
/*foreach(array("SERVICE_HIDDEN",) as $hidden_field){
	$arResult['QUESTIONS'][$hidden_field]['HTML_CODE'] = str_replace('value=""', 'value="'.$arParams[$hidden_field].'"', $arResult['QUESTIONS'][$hidden_field]['HTML_CODE']);
}*/

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

<div class="xl gy feedback-mini"><?=$arResult["FORM_TITLE"]?>:</div>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
	<?//антиспам?>
		<div class="hidden">Name:<br />
			<input type="text" name="name" value="<?=( !empty($_POST['name']) ) ? $_POST['name'] : '';?>" />
		</div>
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{

		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea')
		{
			$arAREA['key'] = $FIELD_SID;
			$arAREA['value'] = $arQuestion;
		}
		else
		{
	?>

			<?if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'file'):?>
				<span style="line-height: 30px; float: left"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></span>
				<span class="file" style="margin-right: 0px; float: right">
    				<input type="text" class="inputFileText" id="psevdoFileValue" tabindex="-1"  />
    				<input type="file" name="form_file_<?=$arQuestion['STRUCTURE'][0]['ID'];?>"  onchange="setFileName(this)" size="1" class="fileInput" tabindex="-1" />
				</span>
			<?else:?>
				<div class="w25" align="left" style="line-height: 30px;"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
				<div class="w75" align="right"><?=$arQuestion["HTML_CODE"];?></div>
			<?endif;?>	

			<br />
	<?
		}
	} //endwhile
	?>

	<div class="clear"></div>

	<?// вывод textarea
	if (!empty($arAREA['key'])):?>
		<?$FIELD_SID = $arAREA['key'];?>
		<?$arQuestion = $arAREA['value'];?>
			<div class="w25" align="left">
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
			</div>
			<div class="w75" align="right">
				<?=$arQuestion["HTML_CODE"]?>
			</div>
	<?endif;?>

<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<div class="bottom">
			<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?>
			<br /><br />

			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" height="30" />
			<input type="text" name="captcha_word" value="" data-prev-value="" class="inputtext short <?=(!empty($arResult["FORM_ERRORS"][0])) ? 'error' : '';?>" />
			<?if(!empty($arResult["FORM_ERRORS"][0])):?>
				<span class="error"><?=$arResult["FORM_ERRORS"][0];?></span>
			<?endif;?>

			<br />
			
			<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
			<br />
<?
} // isUseCaptcha
?>
		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="f-button m10" />
	
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
		</div>

<script>
	initFormValidation();
</script>

<?if (!empty($_POST['bxajaxid'])):?>
	<script>
		initDDs(".feedback-form.big");
	</script>
<?else:?>
	<script>
		$('input[data-name="FEDERAL_STATE"]').val($("div[name='fstate']").children('div').html());
		$('input[data-name="CITY"]').val($("div[name='city']").children('div').html());
	</script>
<?endif;?>