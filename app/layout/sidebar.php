<?php
if ($disable_unit == 1) { $unit_id = -1; }
?>
<ul class="menu-inner py-1">
<!-- Dashboards -->
<li class="menu-item<?php echo $unit_id == 0 ? ' active' : ''; ?>">
  <a href="<?php echo $unit_id == 0 ? 'javascript:void(0);' : BASE_URL.'/dashboard'; ?>" class="menu-link">
    <i class="menu-icon tf-icons ri-home-line"></i>
    <div data-i18n="Dashboard">Dashboard</div>
  </a>
</li>
<!-- LOGBOOK -->
<li class="menu-item<?php echo $unit_id >= 1 && $unit_id <= 8 ? ' active open' : ''; ?>">
<a href="javascript:void(0);" class="menu-link menu-toggle">
  <i class="menu-icon tf-icons ri-book-2-line"></i>
  <div data-i18n="Logbook">Logbook</div>
</a>
<ul class="menu-sub">
  <li class="menu-item<?php echo $unit_id == 1 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/1/dashboard" class="menu-link">
      <div data-i18n="FDPS-RDPS">FDPS-RDPS</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 2 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/2/dashboard" class="menu-link">
      <div data-i18n="AMSS-ADPS">AMSS-ADPS</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 3 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/3/dashboard" class="menu-link">
      <div data-i18n="SURVEILLANCE">SURVEILLANCE</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 4 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/4/dashboard" class="menu-link">
      <div data-i18n="NAVIGATION">NAVIGATION</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 5 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/5/dashboard" class="menu-link">
      <div data-i18n="RADIO-KOMUNIKASI">RADIO-KOMUNIKASI</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 6 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/6/dashboard" class="menu-link">
      <div data-i18n="SSJJ">SSJJ</div>
    </a>
  </li>
  <li class="menu-item<?php echo $unit_id == 7 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/7/dashboard" class="menu-link">
      <div data-i18n="LISTRIK">LISTRIK</div>
    </a>
  </li>
   <li class="menu-item<?php echo $unit_id == 8 ? ' active' : ''; ?>">
    <a href="<?php echo BASE_URL ?>/logbook/8/dashboard" class="menu-link">
      <div data-i18n="BANGUNAN">BANGUNAN</div>
    </a>
  </li>
</ul>
</li>
<li class="menu-item<?php echo $unit_id == 9 ? ' active' : ''; ?>">
  <a href="<?php echo BASE_URL ?>/logbook/9/dashboard" class="menu-link">
    <i class="menu-icon tf-icons ri-database-2-line"></i>
    <div data-i18n="Damage Data">Damage Data</div>
  </a>
</li>
<!-- Apps & Pages -->
<li class="menu-header mt-5">
  <span class="menu-header-text" data-i18n="MANAGE">MANAGE</span>
</li>
<li class="menu-item<?php echo ($is_manage_tools == 1 ? ' active' : ''); ?>">
  <a href="<?php echo BASE_URL ?>/manage/tools" class="menu-link">
    <i class="menu-icon tf-icons ri-tools-line"></i>
    <div data-i18n="Manage Tools">Manage Tools</div>
  </a>
</li>
<li class="menu-item<?php echo ($is_manage_position == 1 ? ' active' : ''); ?>">
  <a href="<?php echo BASE_URL ?>/manage/position" class="menu-link">
    <i class="menu-icon tf-icons ri-briefcase-4-line"></i>
    <div data-i18n="Manage Position">Manage Position</div>
  </a>
</li>
<li class="menu-header mt-5">
  <span class="menu-header-text" data-i18n="USER">User</span>
</li>
<li class="menu-item<?php echo ($is_manage_user == 1 ? ' active' : ''); ?>">
  <a href="<?php echo BASE_URL ?>/manage/users" class="menu-link">
    <i class="menu-icon tf-icons ri-user-settings-line"></i>
    <div data-i18n="Manage User">Manage Users</div>
  </a>
</li>

<!-- Components -->
<li class="menu-header mt-5">
  <span class="menu-header-text" data-i18n="LOGOUT">LOGOUT</span>
</li>
<!-- Icons -->
<li class="menu-item">
  <a href="<?php echo BASE_URL ?>/account/logout" class="menu-link">
    <i class="menu-icon tf-icons ri-logout-box-line"></i>
    <div data-i18n="Logout">Logout</div>
  </a>
</li>
</ul>