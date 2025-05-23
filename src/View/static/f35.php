<?php
ob_start();
?>
<section class="product-hero" id="hero">
    <h1>F‑35 – Истребитель нового поколения</h1>
</section>

<main class="main-content">
    <div class="product-content" id="content">
        <p class="product-info">
            F‑35 – это передовой истребитель, разработанный с использованием новейших технологий, обеспечивающий
            высочайшую манёвренность, скрытность и интеграцию с современными системами управления...
        </p>
        <div class="gallery">
            <img src="/static/photos/f35side.jpg" alt="F‑35 боковой вид">
            <img src="/static/photos/f35flight.jpg" alt="F‑35 в полете">
            <img src="/static/photos/f35cockpit.png" alt="Кабина F‑35">
            <img src="/static/photos/f35det.jpg" alt="Детали F‑35">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Характеристика</th>
                    <th>Значение</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Длина</td>
                    <td>15,67 м</td>
                </tr>
                <tr>
                    <td>Размах крыла</td>
                    <td>10,7 м</td>
                </tr>
                <tr>
                    <td>Макс. скорость</td>
                    <td>1930 км/ч</td>
                </tr>
                <tr>
                    <td>Экипаж</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
        <a href="/static/f35-brochure.pdf" class="btn-download" download>Скачать PDF‑брошюру</a>
    </div>
</main>

<script>
    window.addEventListener('scroll', () => {
        const hero = document.getElementById('hero');
        const content = document.getElementById('content');
        const scrollY = window.scrollY;
        const heroHeight = hero.offsetHeight;

        if (scrollY < heroHeight) {
            hero.style.opacity = 1 - (scrollY / heroHeight);
        } else {
            hero.style.opacity = 0;
        }

        if (scrollY > heroHeight * 0.5) {
            content.classList.add('visible');
        } else {
            content.classList.remove('visible');
        }
    });
</script>
<?php
$content = ob_get_clean();
$title = 'F‑35 – AEROSYSTEMS';
$styles = ['/static/styles.css'];
include __DIR__ . '/../layout.php';