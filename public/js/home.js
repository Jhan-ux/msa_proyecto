/**
 * MSA Automotriz - Script de Home
 * Buscador y Filtro Rápido de Vehículos
 */
(function () {
    'use strict';

    const marcaModelos = {
        'baic':           ['BJ30', 'BJ40', 'BJ212', 'X35'],
        'chevrolet':      ['Onix', 'Tracker', 'Montana', 'N300 Max', 'Groove', 'Colorado'],
        'dongfeng':       ['Rich 6', 'H30 Cross', 'S50'],
        'forland':        ['Fonton 3T', 'Fonton 5T', 'Furgón'],
        'foton':          ['Aumark S', 'Aumark GT', 'Toano', 'Tunland'],
        'honda-autos':    ['HR-V', 'City', 'Civic', 'WR-V', 'CR-V'],
        'honda-motos':    ['CB190R', 'CG150', 'Tornado 250', 'XR150L', 'Wave 110', 'Navi'],
        'isuzu-camiones': ['NPR 400', 'NQR 700', 'FRR 800', 'ELF 350', 'Forward'],
        'isuzu-pick-ups': ['D-Max 4x2', 'D-Max 4x4'],
        'omoda-jaecoo':   ['Omoda 5', 'Omoda C5', 'Jaecoo 7'],
    };

    let selectedTipo = '0km';

    function setFinderTipo(btn, tipo) {
        document.querySelectorAll('.finder-tab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedTipo = tipo;
    }

    function filtrarModelos() {
        const marcaSelect = document.getElementById('findMarca');
        const vehiculoSelect = document.getElementById('findVehiculo');
        if (!marcaSelect || !vehiculoSelect) return;

        const marca = marcaSelect.value;
        vehiculoSelect.innerHTML = '<option value="">Todos los modelos</option>';

        if (marca && marcaModelos[marca]) {
            marcaModelos[marca].forEach(function (m) {
                const opt = document.createElement('option');
                opt.value = m;
                opt.textContent = m;
                vehiculoSelect.appendChild(opt);
            });
        }
    }

    function buscarVehiculo() {
        if (selectedTipo === 'seminuevo') {
            window.location.href = window.location.origin + '/seminuevos';
            return;
        }

        const marcaSelect = document.getElementById('findMarca');
        const marca = marcaSelect ? marcaSelect.value : '';
        const base = window.location.origin + '/marcas';
        window.location.href = marca ? base + '/' + marca : base;
    }

    window.setFinderTipo = setFinderTipo;
    window.filtrarModelos = filtrarModelos;
    window.buscarVehiculo = buscarVehiculo;
})();
