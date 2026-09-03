/**
 * MSA Automotriz — Script Principal
 * Header scroll, navegación responsive, megamenú interactivo y selector de WhatsApp
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        // ── 1. Navbar Scroll Effect ─────────────────────────────────
        const siteNavbar = document.getElementById('siteNavbar');
        function handleScroll() {
            if (!siteNavbar) return;
            if (window.scrollY > 20) {
                siteNavbar.classList.add('navbar--scrolled');
            } else {
                siteNavbar.classList.remove('navbar--scrolled');
            }
        }
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll(); // Chequeo inicial

        // ── 2. Menú Móvil (Hamburguesa) ─────────────────────────────
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');

        if (navToggle && navLinks) {
            navToggle.addEventListener('click', function () {
                navToggle.classList.toggle('open');
                navLinks.classList.toggle('open');
            });

            // Cerrar menú al hacer click en un link dentro del menú
            navLinks.querySelectorAll('a:not(.nav-btn)').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 1080) {
                        navToggle.classList.remove('open');
                        navLinks.classList.remove('open');
                    }
                });
            });
        }

        // ── 3. Acordeones / Dropdowns en Móvil ───────────────────────
        document.querySelectorAll('.nav-btn').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                if (window.innerWidth <= 1080) {
                    const item = this.closest('.nav-item');
                    const hasDropdown = item.querySelector('.dropdown-menu') || item.querySelector('.megamenu');
                    if (hasDropdown) {
                        e.preventDefault();
                        const wasOpen = item.classList.contains('open');
                        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('open'));
                        if (!wasOpen) item.classList.add('open');
                    }
                }
            });
        });

        // ── 4. Megamenú de Marcas ────────────────────────────────────
        const megamenu = document.getElementById('dropMarcas');
        if (megamenu) {
            const marcaBtns = megamenu.querySelectorAll('.megamenu__marca-btn');
            const marcaPanels = megamenu.querySelectorAll('.megamenu__marca-panel');

            function activateMarca(slug) {
                marcaBtns.forEach(b => b.classList.toggle('active', b.dataset.marca === slug));
                marcaPanels.forEach(p => {
                    const isCurrent = p.id === 'mega-' + slug;
                    p.classList.toggle('active', isCurrent);
                    if (isCurrent) {
                        const activeTipo = p.querySelector('.megamenu__tipo-btn.active');
                        if (!activeTipo) {
                            const firstBtn = p.querySelector('.megamenu__tipo-btn');
                            if (firstBtn) {
                                firstBtn.classList.add('active');
                                const targetId = firstBtn.dataset.panel;
                                const target = document.getElementById(targetId);
                                if (target) target.classList.add('active');
                            }
                        }
                    }
                });
            }

            if (marcaBtns.length) {
                activateMarca(marcaBtns[0].dataset.marca);
            }

            marcaBtns.forEach(btn => {
                btn.addEventListener('mouseenter', () => activateMarca(btn.dataset.marca));
                btn.addEventListener('click', () => activateMarca(btn.dataset.marca));
            });

            // Pestañas de tipos/categorías dentro de cada panel de marca
            megamenu.querySelectorAll('.megamenu__tipo-btn').forEach(btn => {
                function switchType(e) {
                    if (e) e.preventDefault();
                    const panelId = btn.dataset.panel;
                    const wrap = btn.closest('.megamenu__marca-panel');
                    if (!wrap) return;
                    wrap.querySelectorAll('.megamenu__tipo-btn').forEach(b => b.classList.remove('active'));
                    wrap.querySelectorAll('.megamenu__tipo-cards').forEach(p => p.classList.remove('active'));
                    btn.classList.add('active');
                    const target = document.getElementById(panelId);
                    if (target) target.classList.add('active');
                }

                btn.addEventListener('click', switchType);
                btn.addEventListener('mouseenter', switchType);
            });
        }

        // ── 5. Modal Selector de WhatsApp (waChooser) ───────────────
        const chooser = document.getElementById('waChooser');
        const salesBtn = document.getElementById('waSalesBtn');
        const afterSalesBtn = document.getElementById('waAfterSalesBtn');
        const cancelBtn = document.getElementById('waCancelBtn');
        let lastWaHref = '';

        if (chooser && salesBtn && afterSalesBtn && cancelBtn) {
            function buildWaUrl(type) {
                const ventasPhone = '51966154210';
                const posventaPhone = '51946823182';
                const targetPhone = type === 'ventas' ? ventasPhone : posventaPhone;
                const baseMessage = type === 'ventas'
                    ? '¡Hola! Me gustaría comunicarme con un asesor de ventas de MSA Automotriz.'
                    : '¡Hola! Me gustaría comunicarme con el área de Taller y Posventa de MSA Automotriz.';

                try {
                    const parsed = new URL(lastWaHref, window.location.origin);
                    const existingText = parsed.searchParams.get('text');
                    const message = existingText
                        ? baseMessage + '\n\n' + existingText
                        : baseMessage;

                    return 'https://wa.me/' + targetPhone + '?text=' + encodeURIComponent(message);
                } catch (e) {
                    return 'https://wa.me/' + targetPhone + '?text=' + encodeURIComponent(baseMessage);
                }
            }

            function openChooser(href) {
                lastWaHref = href || '';
                chooser.classList.add('open');
                document.body.style.overflow = 'hidden';
            }

            function closeChooser() {
                chooser.classList.remove('open');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('a[href*="wa.me"], a[href*="api.whatsapp.com/send"]').forEach((link) => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    openChooser(link.getAttribute('href'));
                });
            });

            salesBtn.addEventListener('click', function () {
                window.open(buildWaUrl('ventas'), '_blank', 'noopener');
                closeChooser();
            });

            afterSalesBtn.addEventListener('click', function () {
                window.open(buildWaUrl('posventa'), '_blank', 'noopener');
                closeChooser();
            });

            cancelBtn.addEventListener('click', closeChooser);

            chooser.addEventListener('click', function (e) {
                if (e.target === chooser) closeChooser();
            });

            // Cerrar con tecla Escape
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && chooser.classList.contains('open')) {
                    closeChooser();
                }
            });
        }

        // ── 6. Banner Flotante de Términos y Consentimiento ─────────
        const consentBanner = document.getElementById('consentBanner');
        const acceptConsentBtn = document.getElementById('acceptConsentBtn');

        if (consentBanner && acceptConsentBtn) {
            const hasConsent = localStorage.getItem('msa_terms_consent');

            if (!hasConsent) {
                setTimeout(function () {
                    consentBanner.classList.add('show');
                }, 1200);
            }

            acceptConsentBtn.addEventListener('click', function () {
                localStorage.setItem('msa_terms_consent', 'accepted');
                consentBanner.classList.remove('show');
            });
        }
    });
})();
