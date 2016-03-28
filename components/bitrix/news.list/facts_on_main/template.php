<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

	<div class="section-header-ind">
		<a href="/about/key_facts/tsifry-i-fakty/" class="a-togreen gy"><?=GetMessage('FACTS_TITLE_ON_MAIN');?></a>
	</div>

	<div class="nums-circles">
		<?$page_code = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 4, "ID" => 52))->Fetch();?>
		<?$i=1;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="nums-circle-ind">
				<div class="circle" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-href="<?=(!empty($arItem["PROPERTIES"]['FIGURE_LINK']["VALUE"]) ? $arItem["PROPERTIES"]['FIGURE_LINK']["VALUE"] : '/about/key_facts/'.$page_code['CODE'].'/');?>">

					<div class="zone"></div>
					<div class="circle-back r<?=$i++;?>"></div>
					<div class="circle-front">
						<div class="inner">
							<div class="text">
								<div class="xxl"><?=$arItem["PROPERTIES"]['FIGURE']["VALUE"];?></div>
								<div class="l"><?=$arItem["PROPERTIES"]['STRING_VALUE']["VALUE"];?></div>
							</div>
						</div>
					</div>

				</div>

				<div class="m10 gy" style="padding: 0 5px;">
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<?=$arItem["NAME"];?>
					<?endif;?>
				</div>

			</div>
		<?endforeach;?>

		<div class="clear"></div>
	</div>