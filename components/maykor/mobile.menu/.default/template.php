<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;

$arFilial = array(
	'Головной офис'        => '/about/contacts/offices_and_units/golovnoy-ofis-maykor/',
	'Дальневосточный ФО'   => '/filials/?fstate=dal_vos',
	'Приволжский ФО'       => '/filials/?fstate=privol',
	'Северо-Западный ФО'   => '/filials/?fstate=sev_zap',
	'Северо-Кавказский ФО' => '/filials/?fstate=sev_kav',
	'Сибирский ФО'         => '/filials/?fstate=sibir',
	'Уральский ФО'         => '/filials/?fstate=ural',
	'Центральный ФО'       => '/filials/?fstate=centr',
	'Южный ФО'             => '/filials/?fstate=yuzhn',
	);

foreach($arResult["arMap"] as $index => $arItem)
{
	if ($arItem["LEVEL"] == 0)
		$arFirst[] = $arItem;
	else
		$arSeconds[count($arFirst)-1][] = $arItem;
}
?>
		<?foreach($arFirst as $key => $value):?>
			<?  $isServ = ( $value['FULL_PATH'] == '/services/')? true : false;
				if($value['FULL_PATH'] != '/filials/'):?>
				<div class="section">
					<div class="title <?= ($isServ) ? 'active' : '';?>">
						<a href="<?=$value['FULL_PATH'];?>"><?=$value['NAME'];?></a>
					</div>
					<div class="list <?=(!$isServ) ? 'hidden' : '';?>">
						

				<?foreach($arSeconds[$key] as $arItem):?>
					<div>
						<a href="<?=$arItem['FULL_PATH'];?>"><?=$arItem['NAME'];?></a>
					</div>
				<?endforeach;?>
					</div>
				</div>
			<?else:?>
				<div class="section">
					<div class="title">
						<a href="<?=$value['FULL_PATH'];?>"><?=$value['NAME'];?></a>
					</div>
					<div class="list hidden">
						<?foreach($arFilial as $name => $href):?>
							<div>
								<a href="<?=$href;?>"><?=$name;?></a>
							</div>
						<?endforeach;?>
					</div>
				</div>
			<?endif;?>
		<?endforeach;?>
