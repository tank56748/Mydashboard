<!--Виджет курсы-->
<div class="widget rates">
	<div style="margin-left:10px;" class="search section">
		<div style="text-align:center; margin-bottom:25px;font-weight: bolder;">Курсы:</div>
		<?
		$sql = "SELECT * FROM crypto";
		global $pdo;
		$query_crypto = $pdo->prepare($sql);
		$query_crypto->execute();
		$crypto_arr = $query_crypto->fetchAll();
		?>
		<div style="display:flex; text-align:center;">
			<div style="width:20%; font-weight: bolder;">
				<? $i = 0; ?>
				<? foreach($crypto_arr[0] as $key => $value): ?>
					<? $colors = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
						$color = '#';
						for($g = 0; $g < 6; $g++){
							$color .= $colors[rand(0, 15)];
						}
					?>
					<? if($i != 0 && $i != 1): ?>
						<div style="padding: 5px 0; color:<?=$color?>"><?=$key?></div>
					<? endif; ?>
					<? $i++; ?>
				<? endforeach; ?>
			</div>
			<div style="width:40%">
				<? $i = 0; ?>
				<? foreach($crypto_arr[0] as $key => $value): ?>
					<? if($i != 0 && $i != 1): ?>
						<div style="padding: 5px 0;"><? echo round($value, 2) . ' руб'; ?></div>
					<? endif; ?>
					<? $i++; ?>
				<? endforeach; ?>
			</div>
			<div style="width:40%">
				<? $i = 0; ?>
				<? foreach($crypto_arr[1] as $key => $value): ?>
					<? if($i != 0 && $i != 1): ?>
						<div style="padding: 5px 0;"><? echo round($value, 2) . ' $'; ?></div>
					<? endif; ?>
					<? $i++; ?>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</div>
<!--Виджет курсы-->
