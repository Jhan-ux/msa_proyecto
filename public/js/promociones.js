/**
 * Promociones / Ruleta interactiva
 * MSA Automotriz
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        const ruletas = document.querySelectorAll('[data-ruleta]');
        if (!ruletas.length) return;

        const normalize = (value) => (value || '').toString().trim().toLowerCase();

        ruletas.forEach((ruleta) => {
            const wheel = ruleta.querySelector('[data-wheel]');
            if (!wheel) return;

            const labels = Array.from(ruleta.querySelectorAll('.ruleta-label'));
            const form = ruleta.querySelector('[data-spin-form]');
            const button = ruleta.querySelector('[data-spin-button]');
            const premioGanado = normalize(ruleta.getAttribute('data-premio-ganado'));
            const total = labels.length;

            const rotateToPrize = (nombrePremio, extraTurns = 5) => {
                if (!nombrePremio || total === 0) return;

                const index = labels.findIndex((label) => normalize(label.getAttribute('data-premio')) === nombrePremio);
                if (index < 0) return;

                const sector = 360 / total;
                const centroSector = (index * sector) + (sector / 2);
                const destino = (360 - centroSector) + (extraTurns * 360);
                wheel.style.setProperty('--rotation', destino + 'deg');
            };

            if (premioGanado) {
                window.setTimeout(() => rotateToPrize(premioGanado, 6), 120);
            }

            if (!form || !button) return;

            button.addEventListener('click', (event) => {
                event.preventDefault();
                button.disabled = true;
                button.textContent = 'Girando...';

                const randomTurns = 6 + Math.floor(Math.random() * 2);
                const randomAngle = Math.floor(Math.random() * 360);
                wheel.style.setProperty('--rotation', ((randomTurns * 360) + randomAngle) + 'deg');

                window.setTimeout(() => {
                    form.submit();
                }, 3600);
            });
        });
    });
})();
