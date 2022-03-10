<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">UTY</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">UTY</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Pages</li>

            <li><a class="nav-link" href="/user"><i class="bi bi-person-fill text-info"></i> <span>My Profil</span></a></li>
            <?php if (in_groups('user')) : ?>
            <li><a class="nav-link" href="/validasi/pengajuan_ta"><i class="bi bi-file-arrow-up-fill text-info"></i> <span>Pengajuan TA</span></a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
            <li><a class="nav-link" href="/validasi/pdftext"><i class="bi bi-clipboard-fill text-info"></i><span>Validasi</span></a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li><a class="nav-link" href="/validasi"><i class="bi bi-people-fill text-info"></i> <span>Manage Data MHS</span></a></li>
            <?php endif; ?>
            <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="bi bi-arrow-left-square-fill text-danger"></i> <span>Logout</span></a></li>
        </ul>
    </aside>
</div>