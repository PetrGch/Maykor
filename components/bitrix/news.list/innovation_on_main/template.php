<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<div class="section-header-ind"><a class="a-togreen gy" href="/services/"><?=GetMessage('INNOVATION_TITLE_ON_MAIN');?></a></div>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$arSection = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID'])->Fetch();?>
	<a class="a-bolder we" href="http://<?=$_SERVER['SERVER_NAME'].$arItem['PROPERTIES']['INNOVATION_LINK']['VALUE'];?>">
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" 
			 class="inov-preview-ind" 
			 style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"
			 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
			 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" >
			
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="inov-text-ind">
					<div>
						<?=$arItem["PREVIEW_TEXT"];?>
					</div>
				</div>
				<div class="inov-skew"></div>
			<?endif;?>

		</div>
	</a>
	<? break; ?>
<?endforeach;?>
