@extends('layouts.app')
@section('title', 'Términos y Condiciones - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/terminos.css') }}?v=1">
@endsection

@section('content')

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">Términos y Condiciones</span>
    </div>
</nav>

{{-- SECCIÓN PRINCIPAL --}}
<section class="terminos-section">
    <div class="terminos-container">
        
        {{-- ENCABEZADO --}}
        <div class="terminos-header">
            <span class="terminos-tag">Información Legal y Transparencia</span>
            <h1 class="terminos-title">Términos y Condiciones</h1>
            <p class="terminos-subtitle">
                Conoce las condiciones generales de uso del sitio web, políticas comerciales de cotización, compra de vehículos y servicios de taller en <strong>MSA Automotriz S.A.A.</strong>
            </p>
            <span class="terminos-updated">Última actualización: Septiembre de 2026 | Conforme a la legislación de la República del Perú</span>
        </div>

        {{-- LAYOUT --}}
        <div class="terminos-layout">
            
            {{-- ÍNDICE RÁPIDO (STICKY) --}}
            <aside class="terminos-nav">
                <h3 class="terminos-nav__title">Contenido</h3>
                <ul class="terminos-nav__list">
                    <li><a href="#sec-1" class="terminos-nav__link">1. Titularidad y Generalidades</a></li>
                    <li><a href="#sec-2" class="terminos-nav__link">2. Aceptación del Usuario</a></li>
                    <li><a href="#sec-3" class="terminos-nav__link">3. Precios y Cotizaciones</a></li>
                    <li><a href="#sec-4" class="terminos-nav__link">4. Vehículos y Garantía</a></li>
                    <li><a href="#sec-5" class="terminos-nav__link">5. Servicios de Taller</a></li>
                    <li><a href="#sec-6" class="terminos-nav__link">6. Promociones y Ruleta</a></li>
                    <li><a href="#sec-7" class="terminos-nav__link">7. Datos Personales (Privacidad)</a></li>
                    <li><a href="#sec-8" class="terminos-nav__link">8. Propiedad Intelectual</a></li>
                    <li><a href="#sec-9" class="terminos-nav__link">9. Reclamos y Jurisdicción</a></li>
                </ul>
            </aside>

            {{-- CONTENIDO LEGAL DETALLADO --}}
            <div class="terminos-content">
                
                {{-- Sección 1 --}}
                <article id="sec-1" class="terminos-card">
                    <span class="terminos-card__num">Sección 01</span>
                    <h2>Información General y Titularidad</h2>
                    <p>
                        El presente portal web <strong>msaautomotriz.com</strong> es de titularidad y operación exclusiva de <strong>MSA AUTOMOTRIZ S.A.A.</strong> (en adelante, "MSA Automotriz"), con <strong>RUC N° 20491781409</strong>, con sede principal en Av. Vía de Evitamiento Norte Cdra. 3 S/N, Cajamarca, Perú.
                    </p>
                    <p>
                        MSA Automotriz es concesionario oficial autorizado para la distribución, comercialización y servicio posventa de vehículos nuevos de las marcas automotrices representadas en nuestro catálogo, así como vehículos seminuevos certificados.
                    </p>
                </article>

                {{-- Sección 2 --}}
                <article id="sec-2" class="terminos-card">
                    <span class="terminos-card__num">Sección 02</span>
                    <h2>Aceptación y Ámbito de Aplicación</h2>
                    <p>
                        El acceso, navegación y uso de este sitio web atribuye la condición de <strong>Usuario</strong> e implica la aceptación plena y sin reservas de todas y cada una de las disposiciones incluidas en estos Términos y Condiciones.
                    </p>
                    <p>
                        Si el Usuario no está de acuerdo con alguno de los términos aquí establecidos, deberá abstenerse de utilizar el sitio web y sus canales digitales vinculados.
                    </p>
                </article>

                {{-- Sección 3 --}}
                <article id="sec-3" class="terminos-card">
                    <span class="terminos-card__num">Sección 03</span>
                    <h2>Precios, Cotizaciones y Disponibilidad de Stock</h2>
                    <p>
                        Toda la información referente a precios, especificaciones técnicas, versiones, equipamiento y colores mostrados en el sitio web tienen carácter <strong>referencial e informativo</strong>.
                    </p>
                    <ul>
                        <li><strong>Moneda y Tipo de Cambio:</strong> Los precios expresados en Soles (S/) y Dólares Americanos (USD) están sujetos a variaciones según el tipo de cambio del día oficial fijado por la empresa al momento del cierre de la transacción.</li>
                        <li><strong>Vigencia de Cotizaciones:</strong> Las cotizaciones solicitadas a través de formularios o WhatsApp tienen una vigencia estipulada por el asesor comercial y están sujetas a la disponibilidad física de inventario (stock 0 Km o seminuevo).</li>
                        <li><strong>Confirmación Comercial:</strong> El precio final de venta, formas de pago, bonos de descuento y plazos de entrega serán formalizados únicamente mediante proforma oficial suscrita en nuestras sedes autorizadas.</li>
                    </ul>
                    <div class="terminos-highlight-box">
                        <strong>Nota Importante sobre Imágenes:</strong>
                        <p>Las fotografías de los vehículos y accesorios son de carácter ilustrativo. Las especificaciones pueden variar según la versión y año modelo comercializado en el Perú.</p>
                    </div>
                </article>

                {{-- Sección 4 --}}
                <article id="sec-4" class="terminos-card">
                    <span class="terminos-card__num">Sección 04</span>
                    <h2>Vehículos Nuevos y Seminuevos Certificados</h2>
                    <p>
                        <strong>Vehículos Nuevos:</strong> Cuentan con la garantía oficial de fábrica otorgada por el fabricante respectivo, condicionada al cumplimiento estricto del plan de mantenimientos preventivos periódicos en nuestros talleres autorizados.
                    </p>
                    <p>
                        <strong>Seminuevos Certificados:</strong> Cada unidad seminueva ha pasado por una inspección técnica multipunto y cuenta con documentación y transferencia notarial en regla, libre de gravámenes y multas al momento de la entrega.
                    </p>
                </article>

                {{-- Sección 5 --}}
                <article id="sec-5" class="terminos-card">
                    <span class="terminos-card__num">Sección 05</span>
                    <h2>Servicios de Taller, Posventa y Repuestos</h2>
                    <p>
                        La programación de citas para mantenimiento preventivo o correctivo a través de nuestros canales digitales está sujeta a confirmación de disponibilidad de horarios y bahías técnicas de trabajo por parte de nuestro equipo de asesores de servicio.
                    </p>
                    <p>
                        Todos los repuestos, fluidos y accesorios instalados en nuestras sedes son 100% genuinos y cuentan con garantía de instalación de fábrica.
                    </p>
                </article>

                {{-- Sección 6 --}}
                <article id="sec-6" class="terminos-card">
                    <span class="terminos-card__num">Sección 06</span>
                    <h2>Promociones, Campañas y Dinámicas Digitales</h2>
                    <p>
                        Las promociones, descuentos especiales y dinámicas interactivas (como la Ruleta Ganadora y campañas estacionales) publicadas en el sitio web se rigen por sus respectivas bases comerciales:
                    </p>
                    <ul>
                        <li>Los premios o cupones son personales, intransferibles y no canjeables por dinero en efectivo.</li>
                        <li>Cada cupón o beneficio tiene una fecha límite de redención y condiciones específicas de aplicación (ej. monto mínimo de compra o servicio en taller).</li>
                        <li>MSA Automotriz se reserva el derecho de validar la autenticidad del registro y DNI/RUC del participante antes de hacer efectivo cualquier beneficio.</li>
                    </ul>
                </article>

                {{-- Sección 7 --}}
                <article id="sec-7" class="terminos-card">
                    <span class="terminos-card__num">Sección 07</span>
                    <h2>Protección de Datos Personales y Privacidad</h2>
                    <p>
                        De conformidad con la <strong>Ley N° 29733 (Ley de Protección de Datos Personales)</strong> y su Reglamento, los datos personales proporcionados por el Usuario (nombres, teléfono, correo electrónico, DNI, etc.) a través de los formularios del sitio web serán tratados de forma confidencial y segura.
                    </p>
                    <p>
                        La información será utilizada exclusivamente para la atención de consultas, envío de cotizaciones comerciales solicitadas, agendamiento de citas de taller y, en caso de autorización expresa, información sobre promociones y novedades del sector automotriz. El Usuario podrá ejercer sus derechos ARCO (Acceso, Rectificación, Cancelación y Oposición) comunicándose a nuestro correo oficial.
                    </p>
                </article>

                {{-- Sección 8 --}}
                <article id="sec-8" class="terminos-card">
                    <span class="terminos-card__num">Sección 08</span>
                    <h2>Propiedad Intelectual</h2>
                    <p>
                        Todos los contenidos del sitio web, incluyendo textos, gráficos, logotipos, iconos, imágenes, código fuente y diseño visual, son propiedad de <strong>MSA Automotriz S.A.A.</strong> o de sus respectivos fabricantes y licenciantes autorizados, encontrándose protegidos por las leyes de propiedad intelectual e industrial vigentes.
                    </p>
                    <p>
                        Queda prohibida su reproducción total o parcial sin la autorización expresa y por escrito de MSA Automotriz.
                    </p>
                </article>

                {{-- Sección 9 --}}
                <article id="sec-9" class="terminos-card">
                    <span class="terminos-card__num">Sección 09</span>
                    <h2>Libro de Reclamaciones, Ley Aplicable y Jurisdicción</h2>
                    <p>
                        En cumplimiento del <strong>Código de Protección y Defensa del Consumidor (Ley N° 29571)</strong>, ponemos a disposición de nuestros clientes el <a href="{{ route('libro-reclamaciones') }}" style="color: var(--color-primary, #d90429); font-weight: 700; text-decoration: underline;">Libro de Reclamaciones Virtual</a> para el registro de cualquier queja o reclamo respecto a nuestros productos y servicios.
                    </p>
                    <p>
                        Para cualquier controversia derivada del uso del sitio web o de las relaciones comerciales establecidas, las partes se someten a la legislación de la República del Perú y a la jurisdicción de los jueces y tribunales de la ciudad de <strong>Cajamarca, Perú</strong>.
                    </p>
                </article>

            </div>

        </div>

    </div>
</section>

@endsection
