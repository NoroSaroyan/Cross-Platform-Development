<?php
    /** @var string[] $galleryImages */
?>

<section class="about-intro mb-5 text-center">
    <h1 class="mb-3">О компании AEROSYSTEMS</h1>
    <p class="lead">
        AEROSYSTEMS – ведущий производитель высокотехнологичных аэрокосмических систем,
        предлагающий решения для оборонного и гражданского секторов.
    </p>
</section>

<section class="about-details mb-5">
    <h2 class="mb-3">Наша история</h2>
    <p>
        С момента основания мы зарекомендовали себя как инновационная компания,
        постоянно совершенствующая технологии и расширяющая границы возможного
        в аэрокосмической отрасли.
    </p>
</section>

<section class="product-gallery mb-5">
    <h2 class="text-center mb-4">Наша продукция</h2>
    <div class="row justify-content-center g-3">
        <?php foreach ($galleryImages as $img): ?>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm h-100">
                    <img src="/static/photos/<?php echo htmlspecialchars($img) ?>"
                         alt="<?php echo htmlspecialchars(pathinfo($img, PATHINFO_FILENAME)) ?>"
                         class="card-img-top" style="height: 200px; object-fit: cover;">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
