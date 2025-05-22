<?php include_once __DIR__ . '/../../Helpers/helpers.php'; ?>

<?php if (isCurrentRoute('/bosses')): ?>
    <?php if (isset($status) && $status == 0): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Defeated
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php elseif (isset($status) && $status == 1): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Alive
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php endif; ?>

<?php elseif (isCurrentRoute('/covenants') || isCurrentRoute('/quests')): ?>
    <?php if (isset($status) && $status == 0): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Finalised
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php elseif (isset($status) && $status == 1): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Unfinished
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php endif; ?>

<?php else: ?>
    <?php if (isset($status) && $status == 0): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Collected
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php elseif (isset($status) && $status == 1): ?>
        <div class="status-checkbox">
            <label>
                <input type="checkbox" name="checkBox" value="1" onchange="this.form.submit()"> Not collected
                <input type="hidden" name="status" value="<?= $status ?>">
            </label>
            <button type="submit" class="btn-submit" style="display:none;">Submit</button>
        </div>
    <?php endif; ?>
<?php endif; ?>
