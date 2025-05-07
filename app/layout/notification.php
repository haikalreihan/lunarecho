<?php

// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');

$user_id = $_SESSION['user_id'];
$unreadCount = 0;

// Mengambil notifikasi dan status baca untuk pengguna yang sedang masuk, dibatasi 8 notifikasi
$query = "
    SELECT n.*, COALESCE(un.status, 0) AS status, un.notification_id
    FROM notifications n
    LEFT JOIN user_notifications un ON n.id = un.notification_id AND un.user_id = $user_id
    ORDER BY n.date DESC
    LIMIT 8
";
$result = mysqli_query($conn, $query);
$notifications = [];

while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = $row;
    if ($row['status'] == 0) {
        $unreadCount++;
    }
}
?>
<a
  class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
  href="javascript:void(0);"
  data-bs-toggle="dropdown"
  data-bs-auto-close="outside"
  aria-expanded="false">
  <i class="ri-notification-2-line ri-22px"></i>
  <?php if ($unreadCount > 0) {
    echo '<span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border" name="unread_notif" id="unread_notif"></span>'; 
  }
  ?>
</a>
<ul class="dropdown-menu dropdown-menu-end py-0">
<li class="dropdown-menu-header border-bottom py-50">
  <div class="dropdown-header d-flex align-items-center py-2">
    <h6 class="mb-0 me-auto">Notification</h6>
    <?php if ($unreadCount != 0) {
        echo '
          <div class="d-flex align-items-center" name="notification_count" id="notification_count">
            <span class="badge rounded-pill bg-label-primary fs-xsmall me-2">'.$unreadCount.' New</span>
            <a
              href="javascript:void(0)"
              class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Mark all as read" name="mark_all" id="mark_all"><i class="ri-mail-open-line text-heading ri-20px"></i
            ></a>
          </div>';  
      }
    ?>
  </div>
</li>
<li class="dropdown-notifications-list scrollable-container">
    <ul class="list-group list-group-flush">
        <?php
            if (count($notifications) == 0) {
                echo '<li class="list-group-item">No notifications available</li>';
            } else {
                foreach ($notifications as $row) {
                    // Perhitungan selisih waktu untuk setiap notifikasi
                    $now = time();
                    $notification_time = strtotime($row['date']);
                    $diff = $now - $notification_time;

                    if ($diff < 60) {
                        $date_ago = $diff . "s";
                    } elseif ($diff < 3600) {
                        $date_ago = floor($diff / 60) . "m";
                    } elseif ($diff < 86400) {
                        $date_ago = floor($diff / 3600) . "h";
                    } elseif ($diff < 2592000) {
                        $date_ago = floor($diff / 86400) . "d";
                    } elseif ($diff < 31536000) {
                        $date_ago = floor($diff / (30 * 86400)) . "m"; // Approximation of 30 days per month
                    } else {
                        $date_ago = floor($diff / (365 * 86400)) . "y"; // Approximation of 365 days per year
                    }

                    echo '<li class="list-group-item list-group-item-action dropdown-notifications-item" data-id="'.$row['id'].'">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <img src="/assets/img/profile/'.$row['profile'].'" alt class="rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="small mb-1">'.$row['title'].'</h6>
                                <small class="mb-1 d-block text-body">'.$row['body'].'</small>
                                <small class="text-muted">'.$date_ago.' ago</small>
                            </div>';
                            if ($row['status'] == 0) {
                                echo '<div class="flex-shrink-0 dropdown-notifications-actions">
                                  <a href="'.BASE_URL.'/notification/'.$row['notification_id'].'" class="dropdown-notifications-read"
                                    ><span class="badge badge-dot"></span
                                  ></a>
                                </div>';
                            }
                            echo '
                        </div>
                      </li>';
                }
            }
        ?>
    </ul>
</li>
<li class="border-top">
    <div class="d-grid p-4">
        <a class="btn btn-primary btn-sm d-flex" href="<?php echo BASE_URL?>/account/notifications">
            <small class="align-middle">View all notifications</small>
        </a>
    </div>
</li>
</ul>