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

            <li><a class="nav-link" href="/user"><i class="bi bi-speedometer text-primary"></i> <span>Dashboard</span></a></li>
            <?php if (in_groups('user')) : ?>
                <li><a class="nav-link" href="/validasi/pengajuan_ta"><i class="bi bi-file-arrow-up-fill text-primary"></i> <span>Pengajuan TA</span></a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li><a class="nav-link" href="/validasi/pdftext"><i class="bi bi-clipboard-fill text-primary"></i><span>Validasi</span></a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li><a class="nav-link" href="/validasi"><i class="bi bi-people-fill text-primary"></i> <span>Hasil Validasi</span></a></li>
            <?php endif; ?>
            <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="bi bi-arrow-left-square-fill text-danger"></i> <span>Logout</span></a></li>
        </ul>
    </aside>
</div>