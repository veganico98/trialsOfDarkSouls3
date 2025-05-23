<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">
    
    <?php include __DIR__ . '/../layouts/title.php'; ?>

    <div class="bosses-container">
        <?php if (count($this->view->sorceries) > 0): ?>
            <?php foreach ($this->view->sorceries as $sorceries): ?>
                <form method="POST" action="/sorceries" class="boss-card">
                    <input type="hidden" name="id" value="<?= $sorceries['id'] ?>">
                    <div class="card">
                        <img src="<?= $sorceries['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $sorceries['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $sorceries['name'] ?></h5>
                            <p class="card-text">Game: <?= $sorceries['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($sorceries['trophy']): ?>
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