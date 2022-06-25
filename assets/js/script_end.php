
<script>





	// AJAX

function setCookie(name, value, options = {}) {

	options = {
		path: '/',
		// при необходимости добавьте другие значения по умолчанию
		...options
	};

	if (options.expires instanceof Date) {
		options.expires = options.expires.toUTCString();
	}

	let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

	for (let optionKey in options) {
		updatedCookie += "; " + optionKey;
		let optionValue = options[optionKey];
		if (optionValue !== true) {
			updatedCookie += "=" + optionValue;
		}
	}

	document.cookie = updatedCookie;
}


$('.direction').change(function (){
	let dir = $('.direction option:selected').attr('value');
	$.ajax({
		type: "POST",
		url: "app/ajax/select_direction.php",
		data: {direction: dir},
		success: function (data){
			$(".from").empty();
			$(".to").empty();
			var resp = JSON.parse(data);
			for (var key in resp){
				$('.from').append(`<option value="${key}">${resp[key]}</option>`);
				$('.to').append(`<option value="${key}">${resp[key]}</option>`);
				setCookie('dir', dir, {secure: false, 'max-age': 86000*365});
			}
		}
	});
});

$('.from, .to').change(function () {
	let dep = $('.from option:selected').attr('value');
	let arr = $('.to option:selected').attr('value');
	$.ajax({
		type: "POST",
		url: "app/ajax/select_station.php",
		data: {action: 'visible_rasp', fromto: 'change', from: dep, to: arr},
		success: function (data) {
			$("#errMsg").empty();
			if (data.includes('Станции должны быть разными!')){
				$("#errMsg").append(data);
			}else{
				let now_rasp = $(".now-rasp");
				now_rasp.empty();
				now_rasp.append(data);
				setCookie('dep', dep, {secure: false, 'max-age': 86000*365});
				setCookie('arr', arr, {secure: false, 'max-age': 86000*365});
			}
		}
	});
	$.ajax({
		type: "POST",
		url: "app/ajax/select_station.php",
		data: {action: 'full_rasp', fromto: 'change', from: dep, to: arr},
		success: function (data) {
			if (!data.includes('Станции должны быть разными!')){
				let c = $(".c");
				c.empty();
				c.append(data);
			}
		}
	});
});



$('.wheather_click').on('click', function(){
	$('.a').toggle()
});
$('.rasp_click').on('click', function(){
	$('.b').toggle()
});
$('.full_click').on('click', function(){
	$('.c').toggle()
});
$(document).mouseup(function (e) {
	var container = $(".a");
	if (container.has(e.target).length === 0){
		container.hide();
	}
});
$(document).mouseup(function (e) {
	var container1 = $(".b");
	if (container1.has(e.target).length === 0){
		container1.hide();
	}
});
$(document).mouseup(function (e) {
	var container2 = $(".c");
	if (container2.has(e.target).length === 0){
		container2.hide();
	}
});

</script>