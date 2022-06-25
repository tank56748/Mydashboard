<!--Виджет расписание-->
<div class="widget">
	<div class="rasp_click search section"
		 style="display:flex; justify-content:center; align-items:center; height:10px;  width: 97%; margin-left: 10px">
		<div style="font-weight: bolder;">Выбор станции</div>
	</div>
	<div style="position:absolute; top:140px; right:32%; width:32%;" class="b hidden">
		<div style="text-align:center; border: 12px outset;" class="search section wheather" id="hidden_wheather">
			<div style="text-align:center; font-size: 19px; margin-bottom:8px;">Направление</div>
			<div style="display:flex; justify-content:center">
				<select class="direction" style="font-size: 19px !important;margin-bottom:10px; width:50%;" name="direction">
					<? foreach($directions as $key => $value): ?>
					<option value="<?=$key?>"><?=$value?></option>
					<? endforeach; ?>
				</select>
			</div>
			<div id="errMsg" style="color:red; text-align:center; font-size: 19px; margin-bottom:8px;"></div>
			<div style="display:flex">
				<div style="text-align:center; font-size: 19px; margin-bottom:8px; flex:1">Откуда:</div>
				<div style="text-align:center; font-size: 19px; margin-bottom:8px; flex:1">Куда:</div>
			</div>
			<select class="from" style="font-size: 19px !important; width:42%; height:39px; border: 1px solid #0f3483; border-radius: 6px;" name="from">
			</select>
			-
			<select class="to" style="font-size: 19px !important; width:42%; height:39px; border: 1px solid #0f3483; border-radius: 6px;" name="to">
			</select>
		</div>
	</div>
	<div style="margin-left:10px;min-height: 70%;" class="now-rasp search section">

	</div>
	<div class="full_click search section"
		 style="display:flex; justify-content:center; align-items:center; height:10px;  width: 97%; margin-left: 10px">
		<div style="font-weight: bolder;">Полное расписание</div>
	</div>
	<div class="c hidden">

	</div>
</div>

<!--Виджет расписание-->
