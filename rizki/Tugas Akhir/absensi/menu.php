<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if (!ISSET($_GET['module'])){ echo 'active'; } ?>" href="media.php"><i data-feather="home"></i><span>Dashboard</span></a></li>
<?php
    if($_SESSION['roles_id'] == 1){
        ?>
            <li class="sidebar-list">
                <a class="sidebar-link sidebar-title <?php if (ISSET($_GET['module']) && ($_GET['module']=='user' || $_GET['module']=='kelas' || $_GET['module']=='user_kelas')){ echo 'active'; } ?>" href="#"><i data-feather="settings"></i><span>Setting Admin</span></a>
                <ul class="sidebar-submenu">
                    <li><a class="submenu-setting-admin <?php if (ISSET($_GET['module']) && $_GET['module']=='user'){ echo 'active'; } ?>" href="media.php?module=user">User</a></li>
                    <li><a class="submenu-setting-admin <?php if (ISSET($_GET['module']) && ($_GET['module']=='kelas' || $_GET['module']=='user_kelas')){ echo 'active'; } ?>" href="media.php?module=kelas">Kelas</a></li>
                </ul>
            </li>
        <?php
    }
?>
<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if (ISSET($_GET['module']) && $_GET['module']=='absensi'){ echo 'active'; } ?>" href="media.php?module=absensi"><i data-feather="file-text"> </i><span>Absensi</span></a></li>