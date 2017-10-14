<p><b><?= $comment['name'] ?: $comment['username'] ?></b> mentioned you in this comment.</p>
</hr>

<?= $this->text->markdown($comment['comment'], true) ?>

<?= $this->render('notification/footer', array('task' => $task)) ?>
