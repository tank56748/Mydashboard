<script>
var direction_cookie;
<? if(isset($_COOKIE['dir'])): ?>
	direction_cookie = '<?=$_COOKIE['dir']?>';
<? endif; ?>
$.ajax({
	type: "POST",
	url: "app/ajax/select_direction.php",
	data: {direction:direction_cookie},
	success: function (data){
		var resp = JSON.parse(data);
		for (var key in resp){
			$('.from').append(`<option value="${key}">${resp[key]}</option>`);
			$('.to').append(`<option value="${key}">${resp[key]}</option>`);
		}
		<? if(isset($_COOKIE['dep'])): ?>
		let el_from = document.querySelector(".from option[value='<?=$_COOKIE['dep']?>']");
		el_from.setAttribute('selected', '');
		<? endif; ?>
		<? if(isset($_COOKIE['arr'])): ?>
		let el_to = document.querySelector(".to option[value='<?=$_COOKIE['arr']?>']");
		el_to.setAttribute('selected', '');
		<? endif; ?>
		}
	});
var from_cookie;
var to_cookie;
<? if(isset($_COOKIE['dep'])): ?>
from_cookie = '<?=$_COOKIE['dep']?>';
to_cookie = '<?=$_COOKIE['arr']?>';
<? endif; ?>
$.ajax({
	type: "POST",
	url: "app/ajax/select_station.php",
	data: {action:'visible_rasp', from:from_cookie, to:to_cookie},
	success: function (data){
		$('.now-rasp').append(data);
	}
});
$.ajax({
	type: "POST",
	url: "app/ajax/select_station.php",
	data: {action:'full_rasp', from:from_cookie, to:to_cookie},
	success: function (data){
		$('.c').append(data);
	}
});

</script>