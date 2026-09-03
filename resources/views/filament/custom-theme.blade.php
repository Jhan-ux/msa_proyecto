<style>
    /* ==========================================================================
       CUSTOM THEME — MSA AUTOMOTRIZ (FILAMENT ADMIN & VENDEDOR)
       ========================================================================== */

    :root {
        --msa-red: #d90429;
        --msa-red-dark: #b50322;
        --msa-red-glow: rgba(217, 4, 41, 0.25);
        --msa-black: #111111;
        --msa-card-border: rgba(0, 0, 0, 0.08);
    }

    /* ── Tipografía Moderna ── */
    body, .fi-body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif !important;
        letter-spacing: -0.01em;
    }

    /* ── Sidebar Estilizado ── */
    .fi-sidebar {
        border-right: 1px solid rgba(0, 0, 0, 0.06) !important;
    }

    .fi-sidebar-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }

    .fi-sidebar-item-active .fi-sidebar-item-btn {
        background: linear-gradient(135deg, #d90429 0%, #b50322 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px var(--msa-red-glow) !important;
        border-radius: 8px !important;
    }

    .fi-sidebar-item-active .fi-sidebar-item-icon {
        color: #ffffff !important;
    }

    .fi-sidebar-item-active .fi-sidebar-item-label {
        font-weight: 700 !important;
        color: #ffffff !important;
    }

    .fi-sidebar-group-label {
        font-size: 0.72rem !important;
        font-weight: 800 !important;
        letter-spacing: 0.08em !important;
        text-transform: uppercase !important;
        color: #888888 !important;
    }

    /* ── Tarjetas y Widgets ── */
    .fi-section, .fi-wi-stats-overview-stat, .fi-ta {
        border-radius: 12px !important;
        border: 1px solid var(--msa-card-border) !important;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04) !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .fi-wi-stats-overview-stat:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08) !important;
    }

    /* ── Tablas ── */
    .fi-ta-header {
        border-bottom: 2px solid rgba(0, 0, 0, 0.04) !important;
    }

    .fi-ta-row:hover {
        background-color: rgba(217, 4, 41, 0.02) !important;
    }

    /* ── Botones Primarios ── */
    .fi-btn-primary {
        background: linear-gradient(135deg, #d90429 0%, #b50322 100%) !important;
        border: none !important;
        box-shadow: 0 3px 10px var(--msa-red-glow) !important;
        font-weight: 700 !important;
        border-radius: 8px !important;
        transition: all 0.2s ease !important;
    }

    .fi-btn-primary:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 6px 18px rgba(217, 4, 41, 0.4) !important;
    }

    /* ── Badges ── */
    .fi-badge {
        font-weight: 700 !important;
        border-radius: 6px !important;
        letter-spacing: 0.02em !important;
    }

    /* ── Pantalla de Login ── */
    .fi-simple-layout {
        background: radial-gradient(circle at top right, #1f1f1f 0%, #111111 100%) !important;
    }

    .fi-simple-main-ctn .fi-simple-main {
        border-radius: 16px !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5) !important;
        border-top: 4px solid var(--msa-red) !important;
    }
</style>
