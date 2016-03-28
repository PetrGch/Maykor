<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
			<div class="w33">
				<div class="l gy"><?=mb_strtoupper(GetMessage('NAME_BLOCK_NEWS'));?></div>

				<div class="m10 date-ind"><?=ShowMyDate($arResult["DISPLAY_ACTIVE_FROM"]);?></div>
				
				<a class="a-togreen gy" href="" title="<?=$arResult["NAME"];?>">				
					<div class="m5">
						<?=$arResult['PREVIEW_TEXT'];?>
					</div>
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["PREVIEW_PICTURE"])):?>
						<img
							class="m5"
							border="0"
							width= "100%"
							height= "auto"
							src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>"
							title="<?=$arResult["NAME"];?>"
						/>
					<?endif;?>
				</a>
			</div>