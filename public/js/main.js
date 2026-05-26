// ── Navbar toggle (menú móvil) ──────────────────────────────
const toggle = document.getElementById('navToggle');
const links  = document.getElementById('navLinks');
if (toggle && links) {
    toggle.addEventListener('click', () => links.classList.toggle('open'));
}

// ── Dropdowns en móvil (click) ──────────────────────────────
document.querySelectorAll('.nav-btn[data-target]').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        if (window.innerWidth <= 1024) {
            e.preventDefault();
            const item = this.closest('.nav-item');
            const isOpen = item.classList.contains('dropdown-open');
            // Cerrar todos los demás
            document.querySelectorAll('.nav-item').forEach(function(i) {
                i.classList.remove('dropdown-open');
            });
            // Abrir el actual si estaba cerrado
            if (!isOpen) {
                item.classList.add('dropdown-open');
            }
        }
    });
});

// Cerrar dropdowns móvil al hacer clic fuera del navbar
document.addEventListener('click', function(e) {
    if (window.innerWidth <= 1024 && !e.target.closest('.navbar')) {
        document.querySelectorAll('.nav-item').forEach(function(i) {
            i.classList.remove('dropdown-open');
        });
    }
});
