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
                                <?php if($covenants['item_type_path'] !== '.') { ?>
                                    <img src="<?=$covenants['item_type_path']?>" alt="Number Icon" style="width: 20px; vertical-align: middle; margin-right: 5px;">
                                <?php } ?>
                                <?= $covenants['item_type'] ?> - <?= $covenants['number'] ?>
                            </p>
                            <p class="card-text">
                                <?php if($covenants['loot_image'] !== '.') { ?>
                                    <img src="<?=$covenants['loot_image']?>" alt="Loot Icon" style="width: 20px; vertical-align: middle; margin-right: 5px;">
                                <?php } ?>
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