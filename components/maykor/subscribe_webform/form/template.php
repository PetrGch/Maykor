<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?/*if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;*/?>




<?//ввод значений для скрытых полей
foreach($arParams['HIDDEN_FIELD'] as $key => $value){
	$arResult['QUESTIONS'][$key]['HTML_CODE'] = str_replace('value=""', 'value="'.$value.'"', $arResult['QUESTIONS'][$key]['HTML_CODE']);
}

?>


<?//echo $arResult['QUESTIONS']['CITY_HIDDEN']['HTML_CODE'];?>


<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
					form header
***********************************************************************************/
?>


<div class="page-header gy"><?=$arResult["FORM_TITLE"]?></div>
<?//=GetMessage("CALL_US_TITLE_FORM");?>
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
	<div class="feedback-form big">

		<? if($arResult['isFormNote'] == "Y") : ?>
			<div class="thanks pop-ctrl <?=($arResult['isFormNote'] != "Y")? 'no' : '';?>" >
				<div class="text">
					<?=$arResult["FORM_NOTE"]?>
				</div>
			</div>
			<script>//setTimeout( function() { $(".feedback").click() }, 2500 )</script>
		<?endif;?>


		<?//антиспам?>
		<div class="hidden">Name:<br />
			<input type="text" name="name" value="<?=( !empty($_POST['name']) ) ? $_POST['name'] : '';?>" />
		</div>
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
//echo '<pre>'; print_r($arQuestion); echo '<pre>';


		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			if($FIELD_SID == 'FEDERAL_STATE'):?>
			<div class="w50 m10">
				<div>
					Фед.окр.
				</div>
				<?if (!empty($_POST['FEDERAL_STATE']))
					$fstateName = $_POST['FEDERAL_STATE'];
				elseif (!empty($_SESSION['REGION'])){
					$fstateCode = ($_SESSION['REGION'] == 'mosk') ? 'centr' : $_SESSION['REGION'];
					$arFstate = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 28, 'CODE' => $fstateCode))->Fetch();
					$fstateName = $arFstate['NAME'];
				}
				?>
				<span class="dd">
					<div class="f-dd" name="fstate" data-value="<?=$_SESSION['REGION'];?>" data-on-change="changeFstate($(this))" style="z-index: 20">
						<div class="f-dd-head closed"><?=(!empty($fstateName)) ? $fstateName : 'Выберите Фед. округ';?></div>
						<div class="f-dd-list hidden">
							<?$res = CIBlockElement::GetList(array('name' => 'asc'), array('IBLOCK_ID' => 28, '!CODE' => 'mosk'));?>
							<?while ($fstate = $res->GetNext()):?>
								<div data-value="<?=$fstate['CODE'];?>"><?=$fstate['NAME'];?></div>
							<?endwhile;?>
						</div>
					</div>
				</span>
			</div>
			<?elseif($FIELD_SID == 'CITY'):?>
			<div class="w50 m10">
				<div>
					Город
				</div>
				<?
				$res = CIBlockElement::GetList(array('name' => 'asc'), array('IBLOCK_ID' => 17, 'PROPERTY_FEDERAL_STATE.CODE' => $fstateCode));
				$first_city = $res->Fetch();
				if (!empty($_POST['CITY']))
					$cityName = $_POST['CITY'];
				else
					$cityName = $first_city['NAME'];
				?>
				<span class="dd">
					<div class="f-dd" name="city" data-value="" data-on-change="changeCity($(this))"  style="z-index: 10">
						<div class="f-dd-head closed"><?=(!empty($cityName)) ? $cityName : 'Выберите город';?></div>
						<div class="f-dd-list hidden">
								<div data-value="<?=$first_city['ID'];?>"><?=$first_city['NAME'];?></div>
								<?while ($city = $res->GetNext()):?>
									<div data-value="<?=$city['ID'];?>"><?=$city['NAME'];?></div>
								<?endwhile;?>
						</div>
					</div>
				</span>
			</div>
			<?endif?>
			<?echo $arQuestion["HTML_CODE"];
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

	<div class="clear"></div>

	<?// вывод textarea
	if (!empty($arAREA['key'])):?>
		<?$FIELD_SID = $arAREA['key'];?>
		<?$arQuestion = $arAREA['value'];?>
		
			<div class="tareaLbl" style="float: left; margin-left: 15px; padding-top: 10px;"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
			<?=$arQuestion["HTML_CODE"]?>
	<?endif;?>

<?
if($arResult["isUseCaptcha"] == "Y")
{
?>

		<div class="bottom">
			<span class="capcha-text"><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?></span>
			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" height="30" />
			<input type="text" name="captcha_word" value="" data-prev-value="" class="inputtext sh <?=(!empty($arResult["FORM_ERRORS"][0])) ? 'error' : '';?>" />
			<? /* if(!empty($arResult["FORM_ERRORS"][0])):?>
				<span class="error"><?=$arResult["FORM_ERRORS"][0];?></span>
			<? endif; */ ?>
			<span class="req"><?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?></div>
<?
} // isUseCaptcha
?>

		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="f-button m10" />
	
		<?=$arResult["FORM_FOOTER"]?>

		<div class="clear"></div>
	</div>
	<div class="clear"></div>

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

