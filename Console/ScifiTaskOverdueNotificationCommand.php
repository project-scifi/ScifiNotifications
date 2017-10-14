<?php
namespace Kanboard\Plugin\ScifiNotifications\Console;

use Kanboard\Model\TaskModel;
use Kanboard\Console\TaskOverdueNotificationCommand;

class ScifiTaskOverdueNotificationCommand extends TaskOverdueNotificationCommand {
    /**
     * Monkey patch to use our notification filter model
     */
    public function sendUserOverdueTaskNotifications(array $user, array $tasks) {
        $user_tasks = array();
        $project_names = array();

        foreach ($tasks as $task) {
            if ($this->userNotificationFilterModel->shouldReceiveNotification($user, TaskModel::EVENT_OVERDUE, array('task' => $task))) {
                $user_tasks[] = $task;
                $project_names[$task['project_id']] = $task['project_name'];
            }
        }

        if (! empty($user_tasks)) {
            $this->userNotificationModel->sendUserNotification(
                $user,
                TaskModel::EVENT_OVERDUE,
                array('tasks' => $user_tasks, 'project_name' => implode(', ', $project_names))
            );
        }
    }
}
