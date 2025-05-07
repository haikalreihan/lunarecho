<ul class="dropdown-menu dropdown-menu-end">
<li>
  <a class="dropdown-item" href="<?php echo BASE_URL ?>/account/settings">
    <div class="d-flex">
      <div class="flex-shrink-0 me-2">
        <div class="avatar avatar-online">
          <img src="/assets/img/profile/<?php echo $_SESSION["profile_picture"] ?>" alt class="rounded-circle" />
        </div>
      </div>
      <div class="flex-grow-1">
        <span class="fw-medium d-block small"><?php echo $_SESSION['name'] ?></span>
        <small class="text-muted"><?php echo $_SESSION["access_level"] == 1 ? 'Support' : ($_SESSION["access_level"] == 2 ? 'Admin' : 'User'); ?></small>
      </div>
    </div>
  </a>
</li>
<li>
  <div class="dropdown-divider"></div>
</li>
<li>
  <a class="dropdown-item" href="<?php echo BASE_URL ?>/public/profile/<?php echo $_SESSION['username'] ?>">
    <i class="ri-user-3-line ri-22px me-3"></i><span class="align-middle">My Profile</span>
  </a>
</li>
<li>
  <a class="dropdown-item" href="<?php echo BASE_URL ?>/account/settings">
    <i class="ri-settings-4-line ri-22px me-3"></i><span class="align-middle">Settings</span>
  </a>
</li>
<li>
  <a class="dropdown-item" href="<?php echo BASE_URL ?>/account/security">
      <i class="ri-lock-line ri-22px me-3"></i><span class="align-middle">Security</span>
  </a>
</li>
<li>
  <div class="dropdown-divider"></div>
</li>
<li>
  <div class="d-grid px-4 pt-2 pb-1">
    <a class="btn btn-sm btn-danger d-flex" href="<?php echo BASE_URL ?>/account/logout">
      <small class="align-middle">Logout</small>
      <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
    </a>
  </div>
</li>
</ul>