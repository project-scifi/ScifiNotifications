<?php
namespace Kanboard\Plugin\ScifiNotifications\Model;

use Kanboard\Model\CommentModel;
use Kanboard\Model\TaskModel;
use Kanboard\Model\SubtaskModel;
use Kanboard\Model\UserNotificationFilterModel;

class ScifiUserNotificationFilterModel extends UserNotificationFilterModel {
    const ALLOWED_EVENTS = array(
        TaskModel::EVENT_ASSIGNEE_CHANGE,
        TaskModel::EVENT_CLOSE,
        TaskModel::EVENT_CREATE,
        CommentModel::EVENT_CREATE,
        CommentModel::EVENT_DELETE,
        SubtaskModel::EVENT_CREATE,
        SubtaskModel::EVENT_DELETE,
    );

    /**
     * Decides whether the given user should receive a notification for
     * the given event.
     *
     * Ignores user notification settings and instead decides whether to
     * send a notification based solely on the event type.
     */
    public function shouldReceiveNotification(array $user, $event_name, array $event_data) {
        return in_array($event_name, self::ALLOWED_EVENTS);
    }
}
