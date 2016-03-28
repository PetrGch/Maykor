<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="section-header-ind"><a class="a-togreen gy" href="<?=$arResult["ITEMS"][0]["DETAIL_PAGE_URL"];?>"><?=GetMessage('ACTIONS_TITLE_ON_MAIN');?></a></div>
<?foreach($arResult["ITEMS"] as $key => $arItem):?>

	<div class="action-ind" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<div class="date-ind"><?=ShowMyDateMin($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
		<?endif?>

		<a class="a-togreen m bk" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem["CODE"];?>/">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<?=$arItem["NAME"];?>
					<?else:?>
						<?echo $arItem["NAME"]?>
					<?endif;?>
			<?endif;?>


			<div class="mini-content">

			<?if (!empty($arItem["PREVIEW_PICTURE"]["SRC"]) && $key == 0):?>
				<div class="acts-preview-ind" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"
					 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
				</div>
			<?endif;?>

				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<?=$arItem["PREVIEW_TEXT"];?>
				<?endif;?>

				<br />

				<!--<div class="more">
					<a class="a-green" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem["CODE"];?>/"><?=GetMessage('MORE_ABOUT_ACTION');?></a>
				</div>-->
				

			</div>

		</a>
	</div>

<?endforeach;?>


