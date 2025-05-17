<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php include __DIR__ . '/../layouts/title.php'; ?>

    <div class="bosses-container">
        <?php if (count($this->view->rings) > 0): ?>
            <?php foreach ($this->view->rings as $rings): ?>
                <form method="POST" action="/rings" class="boss-card">
                    <input type="hidden" name="id" value="<?= $rings['id'] ?>">
                    <div class="card">
                        <img src="<?= $rings['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $rings['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $rings['name'] ?></h5>
                            <p class="card-text">Game: <?= $rings['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($rings['trophy']): ?>
                            <span class="material-symbols-outlined trophy">emoji_events</span>
                        <?php endif ?>
                        </p>
                            <?php include __DIR__ . '/../layouts/checkbox.php'; ?>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>