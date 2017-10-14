<?php
namespace Kanboard\Plugin\ScifiNotifications\Model;

use Kanboard\Model\UserNotificationModel;

class ScifiUserNotificationModel extends UserNotificationModel {
    /**
     * Monkey patch to user our notification filter model.
     */
    public function sendNotifications($event_name, array $event_data) {
        $users = $this->getUsersWithNotificationEnabled($event_data['task']['project_id'], $this->userSession->getId());

        foreach ($users as $user) {
            if ($this->userNotificationFilterModel->shouldReceiveNotification($user, $event_name, $event_data)) {
                $this->sendUserNotification($user, $event_name, $event_data);
            }
        }
    }
}
