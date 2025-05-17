<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php include __DIR__ . '/../layouts/title.php'; ?>   

    <div class="bosses-container">
        <?php if (count($this->view->gestures) > 0): ?>
            <?php foreach ($this->view->gestures as $gestures): ?>
                <form method="POST" action="/gestures" class="boss-card">
                    <input type="hidden" name="id" value="<?= $gestures['id'] ?>">
                    <div class="card">
                        <img src="<?= $gestures['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $gestures['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $gestures['name'] ?></h5>
                            <p class="card-text">Game: <?= $gestures['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($gestures['trophy']): ?>
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