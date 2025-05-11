<?php /** @var \App\Model\Product[] $products */?>
<?php ob_start(); ?>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php if (empty($products)): ?>
    <p>Продукты отсутствуют.</p>
  <?php else: ?>
<?php foreach ($products as $p): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?php echo htmlspecialchars($p->photo ?: '/static/no-image.png') ?>"
               class="card-img-top" alt="<?php echo htmlspecialchars($p->name) ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlspecialchars($p->name) ?></h5>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($p->description)) ?></p>
            <a href="/product/<?php echo $p->id ?>" class="mt-auto btn btn-primary">Подробнее</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
<?php
    $content = ob_get_clean();
    $title   = 'Продукция – AEROSYSTEMS';
include __DIR__ . '/../layout.php';
