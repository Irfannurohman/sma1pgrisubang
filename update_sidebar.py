import os
import re

directory = r'c:\xampp\htdocs\si_skl-tracking\si_skl-tracking\app\Views\kepsek'

def replace_sidebar(filepath, active_menu):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # replace the faulty literal '{ ' active' if active_menu == 'dashboard' else '' }' 
    # we can just use re.sub for all nav items
    
    # Actually, let's just regenerate the sidebar correctly.
    sidebar_template = f'''<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon" style="background:none;box-shadow:none;border-radius:0;"><img src="<?= base_url('logo%20pgri.png') ?>" alt="Logo" style="width:50px;height:auto;"></div>
        <div>
            <h5>SMA PGRI 1</h5>
            <small>Kepala Sekolah</small>
        </div>
    </div>
    <a href="<?= base_url('kepsek/dashboard') ?>" class="nav-item{' active' if active_menu == 'dashboard' else ''}"><i class="fa-solid fa-chart-pie"></i><span>Dashboard</span></a>
    <a href="<?= base_url('kepsek/siswa') ?>" class="nav-item{' active' if active_menu == 'siswa' else ''}"><i class="fa-solid fa-users"></i><span>Data Siswa</span></a>
    <a href="<?= base_url('kepsek/alumni') ?>" class="nav-item{' active' if active_menu == 'alumni' else ''}"><i class="fa-solid fa-user-graduate"></i><span>Data Alumni</span></a>
    <a href="<?= base_url('kepsek/tracer') ?>" class="nav-item{' active' if active_menu == 'tracer' else ''}"><i class="fa-solid fa-clipboard-list"></i><span>Tracer Study</span></a>
    <a href="<?= base_url('kepsek/laporan') ?>" class="nav-item{' active' if active_menu == 'laporan' else ''}"><i class="fa-solid fa-chart-bar"></i><span>Laporan</span></a>
    <a href="<?= base_url('kepsek/pengaturan-kelulusan') ?>" class="nav-item{' active' if active_menu == 'pengaturan-kelulusan' else ''}"><i class="fa-solid fa-clock"></i><span>Pengaturan Kelulusan</span></a>
    <a href="<?= base_url('kepsek/keterserapan') ?>" class="nav-item{' active' if active_menu == 'keterserapan' else ''}"><i class="fa-solid fa-chart-line"></i><span>Keterserapan</span></a>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</div>'''
    
    new_content = re.sub(r'<div class="sidebar">.*?<div class="main-content">', sidebar_template + '\n<div class="main-content">', content, flags=re.DOTALL)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(new_content)

files = {
    'dashboard.php': 'dashboard',
    'siswa.php': 'siswa',
    'alumni.php': 'alumni',
    'tracer.php': 'tracer',
    'laporan.php': 'laporan',
    'pengaturan_kelulusan.php': 'pengaturan-kelulusan',
    'keterserapan.php': 'keterserapan'
}

for filename, active in files.items():
    filepath = os.path.join(directory, filename)
    if os.path.exists(filepath):
        replace_sidebar(filepath, active)
        print(f"Fixed {filename}")
