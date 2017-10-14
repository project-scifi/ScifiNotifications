<p>
    Moved to
    <?php if ($task['swimlane_id'] == 0): ?>
        <b>first swimlane</b>
    <?php else: ?>
        swimlane <b><?= $task['swimlane_name'] ?></b>
    <?php endif ?>,
    column <b><?= $task['column_title'] ?></b>,
    position <?= $task['position'] ?>.
</p>

<?= $this->render('notification/footer', array('task' => $task)) ?>
