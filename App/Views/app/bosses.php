<div class="content">
    <h2>Bosses Alive</h2>
    <div class="bosses-container">
        <?php if (count($this->view->bossesAlive) > 0): ?>
            <?php foreach ($this->view->bossesAlive as $boss): ?>
                <form method="POST" action="/bosses" class="boss-card">
                    <input type="hidden" name="id" value="<?= $boss['id'] ?>">
                    <div class="card">
                        <img src="<?= $boss['image'] ?? 'https://via.placeholder.com/300x200' ?>" 
                             class="card-img-top" 
                             alt="<?= $boss['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $boss['name'] ?></h5>
                            <p class="card-text">Game: <?= $boss['game'] ?></p>
                            <p class="card-text">Trophy: <span class="material-symbols-outlined">emoji_events</span></p>
                            <div class="status-checkbox">
                                <label>
                                    <input type="checkbox" name="checkBox" value="1" 
                                           onchange="this.form.submit()">
                                    Defeated
                                </label>
                                <button type="submit" class="btn-submit" style="display:none;">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-bosses">All bosses defeated! 🎉</p>
        <?php endif; ?>
    </div>
</div>