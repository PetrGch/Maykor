<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo '<pre>'; print_r($arResult); echo '<pre>';
$ClientID = 'navigation_'.$arResult['NavNum'];

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div class="adm-navigation clear l" align="right">
	<?
	$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
	$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
	if($arResult["bDescPageNumbering"] === true)
	{
		// to show always first and last pages
		$arResult["nStartPage"] = $arResult["NavPageCount"];
		$arResult["nEndPage"] = 1;

		$sPrevHref = '';
		if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
		{
			$bPrevDisabled = false;
			if ($arResult["bSavePage"])
			{
				$sPrevHref = $arResult["sUrlPath"].((preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?').$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
			}
			else
			{
				if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1))
				{
					$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
				}
				else
				{
					$sPrevHref = $arResult["sUrlPath"].((preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?').$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
				}
			}
		}
		else
		{
			$bPrevDisabled = true;
		}

		$sNextHref = '';
		if ($arResult["NavPageNomer"] > 1)
		{
			$bNextDisabled = false;
			$sNextHref = $arResult["sUrlPath"].((preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?').$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
		}
		else
		{
			$bNextDisabled = true;
		}
		?>
			<div class="adm-nav-pages-block">

<?//стрелка на предыдущую страницу
				if ($bPrevDisabled):?>

				<?else:?>
				<a class="a-grey a-null" href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page">&#9668;</a>
			
				<?endif;?>
				
		<?
		$bFirst = true;
		$bPoints = false;
		do
		{
			$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
			if ($arResult["nStartPage"] <= 2 || $arResult["NavPageCount"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
			{

				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<span class="adm-nav-page-active adm-nav-page gn">
						<?=$NavRecordGroupPrint?>
					</span>
				<?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
					<a class="adm-nav-page a-grey" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
						<?=$NavRecordGroupPrint?>
					</a>
				<?else:?>
					<a class="adm-nav-page a-grey" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>">
						<?=$NavRecordGroupPrint?>
					</a>
				<?endif;
				$bFirst = false;
				$bPoints = true;
			}
			else
			{
				if ($bPoints)
				{
					$curPage = $arResult['NavPageCount'] - $arResult['NavPageNomer'] + 1;
					$curEndPage = ($NavRecordGroupPrint > $curPage) ? $arResult['NavPageCount'] : $curPage;
					if ($curEndPage-$NavRecordGroupPrint > 1)
					{
						$hrefPageNumber = floor(($curEndPage-$NavRecordGroupPrint-2)/2)+$NavRecordGroupPrint;?>
						...
						<?
					}
					else
					{
						?>...<?
					}
					$bPoints = false;
				}
			}
			$arResult["nStartPage"]--;
		} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
	}
	else
	{
		// to show always first and last pages
		$arResult["nStartPage"] = 1;
		$arResult["nEndPage"] = $arResult["NavPageCount"];

		$sPrevHref = '';
		if ($arResult["NavPageNomer"] > 1)
		{
			$bPrevDisabled = false;

			if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2)
			{
				$sPrevHref = $arResult["sUrlPath"].((preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?').$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
			}
			else
			{
				$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
			}
		}
		else
		{
			$bPrevDisabled = true;
		}

		$sNextHref = '';
		if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
		{
			$bNextDisabled = false;
			$sNextHref = $arResult["sUrlPath"].((preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?').$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
		}
		else
		{
			$bNextDisabled = true;
		}
		?>
			<div class="adm-nav-pages-block">
				<!--span class="navigation-title"><?//=GetMessage("navigation_pages")?></span-->
				<?//стрелка на предыдущую страницу
				if ($bPrevDisabled):?>

				<?else:?>
				<a class="a-grey a-null" href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page">&#9668;</a>
				<?endif;?>

		<?
		$bFirst = true;
		$bPoints = false;
		do
		{
			if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
			{
				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<span class="adm-nav-page-active adm-nav-page">
						<?=$arResult["nStartPage"]?>
					</span>
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
				<a class="adm-nav-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
					<?=$arResult["nStartPage"]?>
				</a>
				<?else:?>
				<a class="adm-nav-page" href="<?=$arResult["sUrlPath"]?><?=(preg_match('/^.*\?.*$/', $arResult["sUrlPath"]) != 0) ? '&' : '?';?><?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>">
					<?=$arResult["nStartPage"]?>
				</a>
				<?endif;
				$bFirst = false;
				$bPoints = true;
			}
			else
			{
				if ($bPoints)
				{
					$curEndPage = ($arResult['nStartPage'] > $arResult['NavPageNomer']) ? $arResult['nEndPage'] : $arResult['NavPageNomer'];
					if ($curEndPage-$arResult['nStartPage'] > 1)
					{
						$hrefPageNumber = floor(($curEndPage-$arResult["nStartPage"]-2)/2)+$arResult["nStartPage"];?>
						...
					<?
					}
					else
					{
						?>...<?
					}
					$bPoints = false;
				}
			}
			$arResult["nStartPage"]++;
		} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
	}?>

<?//стрелка на следующую страницу
			if ($bNextDisabled):?>

			<?else:?>
			<a class="a-grey a-null" href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page">&#9658;</a>
			<?endif;?>


	<?if ($arResult["bShowAll"]):
		if ($arResult["NavShowAll"]):
	?>
			<a class="adm-nav-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("navigation_paged")?></a>
	<?
		else:
	?>
			<!-- next -->
			<? if ($bNextDisabled): ?>
				<span class="adm-nav-page adm-nav-page-next disabled" id="<?=$ClientID?>_next_page"></span>
			<? else: ?>
				<a class="adm-nav-page adm-nav-page-next" href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page"></a>
			<? endif; ?>

			<a class="adm-nav-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("navigation_all")?></a>
	<?
		endif;
	endif;
	?>
		</div>
	</div>
	<?CJSCore::Init();?>
	<script type="text/javascript">
		BX.bind(document, "keydown", function (event) {

			event = event || window.event;
			if (!event.ctrlKey)
				return;

			var target = event.target || event.srcElement;
			if (target && target.nodeName && (target.nodeName.toUpperCase() == "INPUT" || target.nodeName.toUpperCase() == "TEXTAREA"))
				return;

			var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
			if (!key)
				return;

			var link = null;
			if (key == 39)
				link = BX('<?=$ClientID?>_next_page');
			else if (key == 37)
				link = BX('<?=$ClientID?>_previous_page');

			if (link && link.href)
				document.location = link.href;
		});
		BX.ready(function () {
			var prev = BX('<?=$ClientID?>_previous_page');
			var el = prev;
			while (el = BX.findNextSibling(el, {class: 'adm-nav-page-separator'}))
			{
				BX.bind(el, 'mouseover', function () {
					this.innerHTML = this.getAttribute('pagenum');
				});
				BX.bind(el, 'mouseout', function () {
					this.innerHTML='';
				});
			}
		});
	</script>