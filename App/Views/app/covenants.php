<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php include __DIR__ . '/../layouts/title.php'; ?>   

    <div class="bosses-container">
        <?php if (count($this->view->covenants) > 0): ?>
            <?php foreach ($this->view->covenants as $covenants): ?>
                <form method="POST" action="/covenants" class="boss-card">
                    <input type="hidden" name="id" value="<?= $covenants['id'] ?>">
                    <div class="card">
                        <img src="<?= $covenants['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $covenants['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $covenants['name'] ?></h5>
                            <p class="card-text">
                                <img src="/img/number_icon.png" alt="Number Icon" style="width: 20px; vertical-align: middle; margin-right: 5px;">
                                <?= $covenants['item_type'] ?> - <?= $covenants['number'] ?>
                            </p>
                            <p class="card-text">
                                <img src="/img/loot_icon.png" alt="Loot Icon" style="width: 20px; vertical-align: middle; margin-right: 5px;">
                                <?= $covenants['loot'] ?>
                            </p>
                            <p class="card-text">Trophy: 
                        <?php if ($covenants['trophy']): ?>
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