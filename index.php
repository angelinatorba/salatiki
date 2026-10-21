<?php
include 'php/conf.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Salatnica - Главная</title>
</head>
<body>

<?php include 'php/header.php'; ?>

<main>
    <section class="main">
        <div class="container">
            <div class="main-flex">
                <div class="main-content">
                    <h1 class="main-title">Просто <span>ешьте здоровую </span>пищу, чтобы жить более здоровой жизнью</h1>
                    <p class="main-description">Наслаждайтесь здоровой жизнью, употребляя здоровую пищу, которая обладает необыкновенным вкусом и делает вашу жизнь здоровее сегодня и в будущем</p>
                    <a href="#" class="main-button">Заказать сейчас</a>
                </div>
                <div class="main-image">
                    <img src="images/header Image.png" alt="изображение">
                </div>
            </div>
        </div>
    </section>
</main>

<section class="why-choose">
    <div class="container">
        <h2 class="section-title">Почему выбирают нас?</h2>
        <p class="section-subtitle">Органическая еда выращивается без использования синтетических химикатов.</p>
        
        <div class="features">
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/Icon.png" alt="Легко заказать">
                </div>
                <h3>Легко заказать</h3>
                <p>продукты включают свежие фрукты и овощи, мясо, а также переработанные</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/Icon (1).png" alt="Онлайн-заказ">
                </div>
                <h3>Онлайн-заказ</h3>
                <p>Оформите заказ онлайн легко и получите еду мгновенно</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/leaf 1.png" alt="100% Органическое">
                </div>
                <h3>100% Органическое</h3>
                <p>Органическая еда выращивается без использования синтетических химикатов</p>
            </div>
        </div>

        <div class="stats">
            <div class="stat-item">
                <span class="stat-number">40+</span>
                <p>Партнеров по еде</p>
            </div>
            <div class="stat-item">
                <span class="stat-number">459+</span>
                <p>Доверяющих клиентов</p>
            </div>
            <div class="stat-item">
                <span class="stat-number">12k+</span>
                <p>Онлайн-заказов</p>
            </div>
        </div>
    </div>
</section>

<main>
    <section class="main">
        <div class="container">
            <div class="main-flex">
                <div class="main-content">
                    <h1 class="main-title">О нас</h1>
                    <p class="main-description">Органическая еда выращивается без использования синтетических химикатов, таких как искусственные пестициды и удобрения, и не содержит генетически модифицированных организмов (ГМО).</p>
                    <a href="#" class="main-button">Узнать больше</a>
                </div>
                <div class="main-image">
                    <img src="images/Image.png" alt="изображение">
                </div>
            </div>
        </div>
    </section>
</main>

<section class="fresh-vegetables">
    <div class="container">
        <div class="fresh-flex">
            <div class="fresh-image">
                <img src="images/Group 4114.png" alt="Свежие овощи">
            </div>
            <div class="fresh-content">
                <h2 class="main-title">Свежие овощи каждый день</h2>
                <p class="main-description">Здоровая жизнь, как было заявлено, мы наслаждаемся, Маргарет. Радость ужасна, кроме того, человек чувствует себя собственным застенчивым.</p>
                <a href="#" class="main-button">Узнать больше</a>
            </div>
        </div>
    </div>
</section>

<section class="special-dishes">
    <div class="container">
        <h2 class="section-title">Особые блюда для вас</h2>
        <p class="section-subtitle">Приготовлено из премиальных и 100% органических ингредиентов</p>
        
        <div class="dishes-grid">
            <div class="dish-card">
                <div class="dish-img-wrapper">
                    <img src="images/green-salad.jpg" alt="Зеленый салат">
                </div>
                <h3 class="dish-title">Авокадо-Фреш с фетой</h3>
                <p class="dish-desc">Микс салатных листьев, авокадо, черри, огурец и фета с оливковым маслом.</p>
            </div>
            
            <div class="dish-card">
                <div class="dish-img-wrapper">
                    <img src="images/beef-salad.jpg" alt="Салат с говядиной">
                </div>
                <h3 class="dish-title">Боул с говядиной и яйцом</h3>
                <p class="dish-desc">Полоски говядины, варёное яйцо, брокколи, кукуруза, помидоры черри и стебель сельдерея, посыпанные кунжутом.</p>
            </div>
            
            <div class="dish-card">
                <div class="dish-img-wrapper">
                    <img src="images/nut-salad.jpg" alt="Салат с орехами">
                </div>
                <h3 class="dish-title">Лёгкий овощной салат</h3>
                <p class="dish-desc">Листья салата, помидоры, огурцы и зелень петрушки с оливковым маслом.</p>
            </div>
        </div>
        <div class="cta-container">
            <a href="/salatnica/php/catalog.php" class="button2">Посмотреть все</a>
        </div>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <h2 class="section-title">Подпишитесь на рассылку</h2>
        <p class="section-subtitle">Введите свой адрес электронной почты ниже, чтобы получать наши ежедневные предложения и новости</p>
        
        <div class="newsletter-form">
            <input type="email" placeholder="Введите ваш адрес электронной почты" class="email-input">
            <a href="#" class="btn-green">Начать</a>
        </div>
    </div>
</section>

<?php include 'php/footer.php'; ?>

</body>
</html>