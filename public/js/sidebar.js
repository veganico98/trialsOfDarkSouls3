document.addEventListener('DOMContentLoaded', function() {
    // Toggle submenus
    document.querySelectorAll('.has-submenu > a').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            parent.classList.toggle('active');
        });
    });
    const toggleBtn = document.querySelector('.sidebar-toggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            document.querySelector('.nav-side-menu').classList.toggle('active');
        });
    }
});
