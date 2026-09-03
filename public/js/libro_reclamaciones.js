/**
 * Script de Libro de Reclamaciones
 * Toggle de campos de apoderado para menores de edad
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        const chkMenor = document.getElementById('menorDeEdad');
        const apoderadoFields = document.getElementById('apoderadoFields');

        if (!chkMenor || !apoderadoFields) return;

        function toggleApoderado() {
            apoderadoFields.style.display = chkMenor.checked ? 'block' : 'none';
        }

        chkMenor.addEventListener('change', toggleApoderado);
        toggleApoderado(); // estado inicial
    });
})();
