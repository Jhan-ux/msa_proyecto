/**
 * MSA Automotriz — Detalle de Modelo
 * Interactividad para pestañas de versiones y filtros de categorías
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // 1. Pestañas de Versiones Disponibles
        const versionTabs = document.querySelectorAll('.version-tab');
        const versionPanels = document.querySelectorAll('.version-panel');

        if (versionTabs.length && versionPanels.length) {
            versionTabs.forEach((tab) => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = tab.dataset.tab;

                    versionTabs.forEach((t) => t.classList.remove('active'));
                    versionPanels.forEach((p) => p.classList.remove('active'));

                    tab.classList.add('active');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                    }
                });
            });
        }

        // 2. Filtro por Categoría en "Otros Modelos"
        const otrosTabs = document.querySelectorAll('.otros-tab');
        const otroCards = document.querySelectorAll('.otro-card');

        if (otrosTabs.length && otroCards.length) {
            otrosTabs.forEach((tab) => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    const filter = tab.dataset.filter;

                    otrosTabs.forEach((t) => t.classList.remove('active'));
                    tab.classList.add('active');

                    otroCards.forEach((card) => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = 'flex';
                            card.classList.remove('fade-in-card');
                            void card.offsetWidth; // Trigger reflow for animation
                            card.classList.add('fade-in-card');
                        } else {
                            card.style.display = 'none';
                            card.classList.remove('fade-in-card');
                        }
                    });
                });
            });
        }
    });
})();
