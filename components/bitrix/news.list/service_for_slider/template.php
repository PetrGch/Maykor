<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?//echo '<pre>'; print_r($arParams); echo '<pre>';?>

<!--<table class="service-list">

	<?	$i = 0;
		foreach($arResult["ITEMS"] as $arItem):?>

		<tr>
			<td class="service-list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-to="<?=$i++;?>">

				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a class="a-bolder s we" href="/services/<?=$arItem["CODE"];?>/"><?=$arItem["NAME"];?></a>
					<?else:?>
						<?=$arItem["NAME"];?>
					<?endif;?>
				<?endif;?>

			</td>
		</tr>
	<?endforeach;?>
</table>-->

<table class="service-list">
	<tr>
		<td class="service-list-item" id="bx_992874306_10" data-to="0">
			<a class="a-bolder s we" href="/services/autsorsing-it-uslug/">
				Аутсорсинг ИТ-услуг
			</a>
		</td>
	</tr>

	<tr>
		<td class="service-list-item" id="bx_992874306_4736" data-to="1">
			<a class="a-bolder s we" href="/services/otraslevoy-servis/">
				Отраслевой сервис
			</a>
		</td>
	</tr>
	
	<tr>
		<td class="service-list-item" id="bx_992874306_11" data-to="2">
			<a class="a-bolder s we" href="/services/upravlenie-inzhenernoy-infrastrukturoy/">
				Управление инженерной инфраструктурой
			</a>	
		</td>
	</tr>

	<tr>
		<td class="service-list-item" id="bx_992874306_147" data-to="3">
			<a class="a-bolder s we" href="/services/biznes-resheniya-kak-usluga/">
				Бизнес-решения<br />
				как услуга
			</a>
		</td>
	</tr>

	<tr>
		<td class="service-list-item" id="bx_992874306_146" data-to="4">
			<a class="a-bolder s we" href="/services/vnedrenie-i-podderzhka-biznes-prilozheniy/">
				Внедрение и поддержка бизнес-приложений
			</a>
		</td>
	</tr>

	<tr>
		<td class="service-list-item" id="bx_992874306_148" data-to="5">
			<a class="a-bolder s we" href="/services/autsorsing-biznes-protsessov/">
				Аутсорсинг<br />
				бизнес-процессов
			</a>
		</td>
	</tr>
 </table>