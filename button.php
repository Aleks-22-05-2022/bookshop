<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Читай</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <a href="#"><img src="photo/logoza.ru.png" class="logo"></a>
            <input type="text" placeholder="Поиск..." class="search"> <!--Нужно написать поиск по странице-->
            <input type="submit" value="&#128269;" class="searchSub">
            <img src="https://xn--80aaaacc4bth9atiu.xn--p1ai/static/img/cabinet.png" class="login"> 
            <a href="" class="log">Войти</a>
            <div class="imgblock">
                <a href=""><img src="https://avatars.mds.yandex.net/i?id=3647d58c8eb96d86f46741f5292d21ba-5663007-images-thumbs&n=13" alt="Snow"></a>
                <span><?php echo $num; ?></span> <!-- Нужно потом считать количество товаров в корзине -->
            </div>
        </header>
        <nav class="menu">
            <a href="">Бестселлеры</a>
            <a href="">Классика</a>
            <a href="">Психология</a>
            <a href="">Романы</a>
            <a href="">Фэнтези</a>
            <a href="">Детская литература</a>
        </nav>
        <li class="header-menu__item">
								<button>
									<a class="header__show-menu" href="/profile/">Name</a>
									<i class="chg-icon chg-icon-arrow-down"></i>
								</button>
																<div class="user-menu__hidden">
									<div class="user-menu" data-pos="n">
										<a class="user-menu__item" href="/profile/orders/">
											<i class="chg-icon chg-icon-cart user-menu__icon cart"></i>
											Мои заказы
										</a>
										<a class="user-menu__item" href="/personal/basket/bookmarks/">
											<i class="chg-icon chg-icon-book user-menu__icon bookmark"></i>
											Понравившееся
										</a>
										<a class="user-menu__item" href="/profile/reserves/">
											<i class="chg-icon chg-icon-three-books-1 user-menu__icon reserve"></i>
											Мои резервы
										</a>
										<a class="user-menu__item" href="/?logout=yes">
											<i class="chg-icon chg-icon-exit user-menu__icon exit"></i>
											Выйти
										</a>
									</div>
								</div>
</li>
		<title itemprop="headline">Мой профиль</title>
		<main class="main">

    <div class="container container_flex">
        <div class="container__leftside">
	<div class="account-menu">
		<ul class="account-menu__list">
	</div>
</div>
        <div class="content">
                                        <ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a href="/" title="Книжный магазин" itemprop="item">
			<span itemprop="name">Книжный магазин</span>
		</a>
		<meta itemprop="position" content="1"/>
	</li>
    				<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a href="/profile/" title="Мой профиль"
		   itemprop="item">
			<span itemprop="name">Мой профиль</span>
		</a>
		<meta itemprop="position" content="2"/>
	</li>
			</li>
	</ul>                        

                        <div class="popup-main-wrapper js__popup_main_wrapper">
	<div class="popup popup-order-cancel hidden">
		<div class="popup__header">
			<div class="popup__title">Отмена заказа</div>
			<div class="popup__close js__popup__close">
				<i class="chg-icon chg-icon-close"></i>
			</div>
		</div>
		<div class="popup__body">
			<form method="post" action="" class="js-analytic-refundorder">
				<input type="hidden" name="id" value="">
				<input type="hidden" name="cancel" value="1"> 				<div class="popup__text mtb0">
					<b>Отмена заказа необратима.</b><br>
					<span class="js__order_cancel_text"></span>
					<br><br>
					Пожалуйста, укажите причину отмены заказа:
				</div>
				<textarea class="input input_textarea input_textarea" name="reason_canceled"></textarea>
				<button class="btn_normal popup__btn_normal" type="submit" value="Отменить заказ">Отменить заказ</button>
			</form>
		</div>
	</div>
</div>

<div class="popup-main-wrapper js__popup_main_wrapper">
	<div class="popup popup-reserve-cancel hidden">
		<div class="popup__header">
			<div class="popup__title">Отмена резерва</div>
			<div class="popup__close js__popup__close">
				<i class="chg-icon chg-icon-close"></i>
			</div>
		</div>
		<div class="popup__body">
			<form method="post" action="" class="js-analytic-refundorder">
				<input type="hidden" name="id" value="">
				<input type="hidden" name="cancel" value="1"> 				<div class="popup__text">Пожалуйста, укажите причину отмены резерва:</div>
				<textarea class="input input_textarea input_textarea" name="reason_canceled"></textarea>
				<div class="popup__text js__popup_reserve_cancel">Вы уверены, что хотите отменить резерв №<span class="js__order_id"></span>?
					<b>Отмена резерва необратима.</b>
				</div>
				<button class="btn_normal popup__btn_normal" type="submit" value="Отменить резерв">Отменить резерв</button>
			</form>
		</div>
	</div>
</div>



                        <h1 class="color_blue flex flex-align-center">
                <i class="chg-icon chg-icon-popup-user"></i>
                <span class="heading__text">Мой профиль</span>
            </h1>
                        <div class="account-group">
                <h2 class="color_blue section-title">
                    <i class="chg-icon chg-icon-assignment"></i>
                    <span class="heading__text">Личные данные</span>
                </h2>
                <div class="short-personal__fio"> Name </div>
                <div class="container_flex">
                    <div class="short-personal__contact">
                        <div class="short-personal__label">Эл. почта</div>
                        <div class="short-personal__content">aaa@gmail.com</div>
                    </div>
                    <div class="short-personal__contact">
                        <div class="short-personal__label">Телефон</div>
                        <div class="short-personal__content">+79955555555</div>
                    </div>
                </div>
            </div>
            
                        <div class="account-group">
                <h2 class="color_blue section-title">
                    <i class="chg-icon chg-icon-cart"></i>
                    <span class="heading__text">Активные заказы</span>
                </h2>
                                    <div class="color_grey">У Вас нет активных заказов</div>
                

                                                            </div>
                                    <div class="account-group">
                <h2 class="color_blue section-title">
                    <i class="chg-icon chg-icon-three-books-1"></i>
                    <span class="heading__text">Активные резервы</span>
                </h2>
                                                    <div class="color_grey">У Вас нет активных резервов</div>
                            </div>
            
                        <div class="account-menu account-menu_text">
                <div class="account-menu-group">
                    <h3 class="account-menu_heading">Личные данные</h3>
                    <ul class="account-menu__list">
                        <li class="account-menu__item">
                            <a href="/profile/personal/" class="account-menu__link">Редактировать данные</a>
                        </li>
                        <li class="account-menu__item">
                            <a href="/profile/personal/legal/" class="account-menu__link">Юридическое лицо</a>
                        </li>
                        <li class="account-menu__item">
                            <a href="/profile/personal/settings/" class="account-menu__link">Настройки аккаунта</a>
                        </li>
                    </ul>
                </div>
                <div class="account-menu-group">
                    <h3 class="account-menu_heading">Заказы</h3>
                    <ul class="account-menu__list">
                        <li class="account-menu__item">
                            <a href="/profile/orders/" class="account-menu__link">Активные</a>
                        </li>
                        <li class="account-menu__item">
                            <a href="/profile/orders/?filter=archive" class="account-menu__link">Архив</a>
                        </li>
                    </ul>
                </div>
                <div class="account-menu-group">
                    <h3 class="account-menu_heading">Резервы</h3>
                    <ul class="account-menu__list">
                        <li class="account-menu__item">
                            <a href="/profile/reserves/" class="account-menu__link">Активные</a>
                        </li>
                        <li class="account-menu__item">
                            <a href="/profile/reserves/?filter=archive" class="account-menu__link">Архив</a>
                        </li>
                    </ul>
                </div>
                <div class="account-menu-group">
                    <h3 class="account-menu_heading">Понравившееся</h3>
                    <ul class="account-menu__list">
                        <li class="account-menu__item">
                            <a href="/personal/basket/bookmarks/" class="account-menu__link">Хочу почитать</a>
                        </li>
                    </ul>
                </div>
                <div class="account-menu-group">
                    <h3 class="account-menu_heading">Корзина</h3>
                    <ul class="account-menu__list">
                        <li class="account-menu__item">
                            <a href="/personal/basket/" class="account-menu__link">Интернет-магазин</a>
                        </li>
                        <li class="account-menu__item">
                            <a href="/personal/basket/reserve/" class="account-menu__link">Резерв</a>
                        </li>
                    </ul>
                </div>
            </div>
                    </div>
                            </div>

        
    </main>
			<div class='block'>
				<?php 
				for($i = 1; $i < $col + 1; $i++){?>
					<a href="#">
					<div class='tovar'>
						<img class="Pictures" src="<?php echo $photo[$i]?>"> <br>
						<p class=NameBook><?php echo $name[$i], "<br>";?></p>
						<p class="Author"><?php echo $author[$i], '<br>';?></p>
						<div class="button">
							<p class="Price"><?php echo $price[$i], " Рублей <br>";?> </p>
							<input type="button" value="Купить" onclick="<?php Basket($id[$i]); ?>"> <!--Добавление в корзину корзину-->
						</div>
					</div></a><?php 
			} ?>
			</div>
			
    </body>
</html>