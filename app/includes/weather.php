<!--Виджет погода-->
<div class="widget">
	<!--Прогноз-->
	<div class="wheather_click search section"
		 style="display:flex; justify-content:center; align-items:center; height:10px; width:100%">
		<div style="font-weight: bolder;">Прогноз</div>
	</div>
	<div style="position:absolute; top:129px; right:14%; width:75%;" class="a hidden">
		<div style="border-radius: 80px;" class="search section forecasts hidden" id="hidden_wheather">
			<?php foreach($forecasts as $day => $day_info): ?>
				<?php if($day != 0): ?>
					<div>
						<div id="days_date" style="text-align:center;font-size:20px; margin:15px 0;"><?php echo date('d F Y', strtotime($day_info['date']))?></div>
						<div class="wheather_days_icons" style="display:flex; flex-direction: column; justify-content:center; align-items:center">
							<div style="display:flex; justify-content:space-evenly;">
								<div>
									<div class="wheather_days_time">Ночь</div>
									<div style="display:flex; justify-content:center; align-items:center;">
										<div>
											<img style="height:50px"
												 src="https://yastatic.net/weather/i/icons/funky/dark/<?=$day_info['parts']['night']['icon']?>.svg">
										</div>
										<div><?=$day_info['parts']['night']['temp_avg']?> &deg;C</div>
									</div>
								</div>
								<div>
									<div class="wheather_days_time">Утро</div>
									<div style="display:flex; justify-content:center; align-items:center;">
										<div>
											<img style="height:50px"
												 src="https://yastatic.net/weather/i/icons/funky/dark/<?=$day_info['parts']['morning']['icon']?>.svg">
										</div>
										<div><?=$day_info['parts']['morning']['temp_avg']?> &deg;C</div>
									</div>
								</div>
							</div>
							<div style="display:flex">
								<div>
									<div class="wheather_days_time">День</div>
									<div style="display:flex; justify-content:center; align-items:center;">
										<div>
											<img style="height:50px"
												 src="https://yastatic.net/weather/i/icons/funky/dark/<?=$day_info['parts']['day']['icon']?>.svg">
										</div>
										<div><?=$day_info['parts']['day']['temp_avg']?> &deg;C</div>
									</div>
								</div>
								<div>
									<div class="wheather_days_time">Вечер</div>
									<div style="display:flex; justify-content:center; align-items:center;">
										<div>
											<img style="height:50px"
												 src="https://yastatic.net/weather/i/icons/funky/dark/<?=$day_info['parts']['evening']['icon']?>.svg">
										</div>
										<div><?=$day_info['parts']['evening']['temp_avg']?> &deg;C</div>
									</div>
								</div>
							</div>

						</div>
						<div style="text-align:center"><b><?=$condition[$day_info['parts']['day']['condition']]?></b></div>
						<div class="wheather_item" style="text-align:center">Скорость ветра: <?=$day_info['parts']['day']['wind_speed']?> м/с</div>
						<div class="wheather_item" style="text-align:center">Направление ветра: <?=$wind_dirs[$day_info['parts']['day']['wind_dir']]?></div>
						<div class="wheather_item" style="text-align:center">Влажность: <?=$day_info['parts']['day']['humidity']?> %</div>
						<div class="wheather_item" style="text-align:center">Фаза луны: <?=$moon_fases[$day_info['moon_text']]?></div>
					</div>
				<? endif; ?>
			<? endforeach; ?>
		</div>
	</div>
	<!--Прогноз-->

	<!--Погода сейчас-->
	<div class="search section wheather">
		<div>
			<?=$geo['locality']['name']?>
		</div>
		<div style="display:flex; padding-top:5px">
			<div>
				<img style="height:50px"
					 src="https://yastatic.net/weather/i/icons/funky/dark/<?=$fact['icon']?>.svg">
			</div>
			<div class="temp_now" style="font-size:42px;margin-left: 10px; display:flex; align-items:center">
				<div><?=$fact['temp']?> &deg;C</div>
			</div>
		</div>
		<div class="condition_now" style="font-size: 22px; margin-bottom: 10px;">
			<?
			$type_wheather = $fact['condition'];
			echo $condition[$type_wheather];
			?>
		</div>
		<div class="wheather_item">
			Скорость ветра: <?=$fact['wind_speed']?> м/с
		</div>
		<div class="wheather_item">

			<?$wind_dir_letter = $fact['wind_dir'];?>
			Направление ветра: <?=$wind_dirs[$wind_dir_letter]?>
		</div class="wheather_item">
		<div class="wheather_item">
			Влажность: <?=$fact['humidity']?> %
		</div>
		<div class="wheather_item">
			Рассвет: <?=$forecasts['0']['sunrise']?>
		</div class="wheather_item">
		<div class="wheather_item">
			Закат: <?=$forecasts['0']['sunset']?>
		</div>
		<div class="wheather_item">
			<?
			$moon_fase_code = $forecasts['0']['moon_text'];
			$moon_fase = $moon_fases[$moon_fase_code];
			?>
			Фаза луны: <?=$moon_fase?>
		</div>
		<div class="today_wheather_parts" style="display:flex">
			<div>
				<div>Ночь</div>
				<div style="display:flex; justify-content: center;">
					<div><img src="https://yastatic.net/weather/i/icons/funky/dark/<?=$forecasts[0]['parts']['night']['icon']?>.svg"></div>
					<div style="display:flex; align-items:center"><span><?=$forecasts[0]['parts']['night']['temp_avg']?> &deg;C</span></div>
				</div>
			</div>
			<div>
				<div>Утро</div>
				<div style="display:flex; justify-content: center;">
					<div><img src="https://yastatic.net/weather/i/icons/funky/dark/<?=$forecasts[0]['parts']['morning']['icon']?>.svg"></div>
					<div style="display:flex; align-items:center"><span><?=$forecasts[0]['parts']['morning']['temp_avg']?> &deg;C</span></div>
				</div>
			</div>
			<div>
				<div>День</div>
				<div style="display:flex; justify-content: center;">
					<div><img src="https://yastatic.net/weather/i/icons/funky/dark/<?=$forecasts[0]['parts']['day']['icon']?>.svg"></div>
					<div style="display:flex; align-items:center"><span><?=$forecasts[0]['parts']['day']['temp_avg']?> &deg;C</span></div>
				</div>
			</div>
			<div>
				<div>Вечер</div>
				<div style="display:flex; justify-content: center;">
					<div><img src="https://yastatic.net/weather/i/icons/funky/dark/<?=$forecasts[0]['parts']['evening']['icon']?>.svg"></div>
					<div style="display:flex; align-items:center"><span><?=$forecasts[0]['parts']['evening']['temp_avg']?> &deg;C</span></div>
				</div>
			</div>
		</div>
	</div>
	<!--Погода сейчас-->
</div>
<!--Виджет погода-->
