<?php include ($_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/app/controls/dashboard.php'); ?>

<!doctype html>
<html lang="en">
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://kit.fontawesome.com/757f66b528.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/assets/css/admin.css" rel="stylesheet">
	<link href="/assets/css/styles.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Hello, world!</title>
</head>
<body>
<header>
	<div class="header">
		<div class="logo center"><h1><a href="/">My Dashboard</a></h1></div>
	</div>
</header>

<main>
	<div style="display:flex; flex-wrap:wrap;margin-bottom: 20px;" class="posts">
		<!--Виджет погода-->
		<? include($_SERVER['DOCUMENT_ROOT'].'/app/includes/weather.php'); ?>
		<!--Виджет погода-->
		<!--Виджет расписание-->
		<? include($_SERVER['DOCUMENT_ROOT'].'/app/includes/train_schedule.php'); ?>
		<!--Виджет расписание-->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/assets/js/script_start.php'); ?>
		<!--Виджет курсы-->
		<? include($_SERVER['DOCUMENT_ROOT'].'/app/includes/exchange_rates.php'); ?>
		<!--Виджет курсы-->
	</div>
</main>

<footer>
	<div class="footer">
		<div class="footer-sections">
			<section class="footer-section about">
				<h3>Мой блог</h3>
				<p>Мой блог это лучший блог на свете)</p>
				<div class="contact">
					<span><i class="fas fa-phone"></i> 123-456-789</span>
					<span><i class="fas fa-envelope"></i> info@myblog.com</span>
				</div>
				<div class="socials">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</section>
			<section class="footer-section links">
				<div class="links__container">
					<h3>Quick links</h3>
					<br>
					<ul>
						<a href="#">
							<li>События</li>
						</a>
						<a href="#">
							<li>Команда</li>
						</a>
						<a href="11">
							<li>Упражнения</li>
						</a>
						<a href="#">
							<li>Галерея</li>
						</a>
						<a href="#">
							<li>Что-то ещё</li>
						</a>
					</ul>
				</div>
			</section>
			<section class="footer-section contacts">
				<h3>Контакты</h3>
				<br>
				<form action="/index.php" method="post">
					<input type="email" name="email" class="contact-input text-input" placeholder="Your email-address">
					<textarea rows="4" name="message" class="contact-input text-input" placeholder="Your message..."></textarea>
					<button class="contact-btn">
						<i class="fas fa-envelope"></i>
						Отправить
					</button>
				</form>
			</section>

		</div>
		<div class="copyright">
			&copy;  <?php echo $_SERVER['SERVER_NAME'];?> | Designed by Patriot
		</div>
	</div>
</footer>

<?php include($_SERVER['DOCUMENT_ROOT'].'/assets/js/script_end.php'); ?>

<script>
	<? if(isset($_COOKIE['dir'])): ?>
	let el_direction = document.querySelector(".direction option[value='<?=$_COOKIE['dir']?>']");
	el_direction.setAttribute('selected', '');
	<? endif; ?>
</script>
</body>
</html>
