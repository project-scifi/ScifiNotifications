<p>Added a subtask.</p>
<hr/>

<p><?= $subtask['title'] ?></p>
<hr/>

<ul>
    <?php if (!empty($subtask['name']) || !empty($subtask['username'])): ?>
        <li>Assignee: <b><?= $subtask['name'] ?: $subtask['username'] ?></b></li>
    <?php endif ?>
    <?php if (!empty($subtask['time_estimated']) && $subtask['time_estimated'] > 0): ?>
        <li>Time estimated: <?= $subtask['time_estimated'] ?>h</li>
    <?php endif ?>
    <li>Status: <?= $this->text->e($subtask['status_name']) ?></li>
</ul>

<?= $this->render('notification/footer', array('task' => $task)) ?>
