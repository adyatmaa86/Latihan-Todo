/**
 * ============================================================
 * Custom Dashboard JavaScript
 * Sidebar toggle, OverlayScrollbars, Color Mode, Charts & Map
 * ============================================================
 */

document.addEventListener('DOMContentLoaded', function () {

    // ============================================================
    // OverlayScrollbars untuk Sidebar
    // ============================================================
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };

    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    const isMobile = window.innerWidth <= 992;

    if (
        sidebarWrapper &&
        typeof OverlayScrollbarsGlobal !== 'undefined' &&
        OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
        !isMobile
    ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }

    // ============================================================
    // Color Mode Toggle (Light/Dark/Auto)
    // ============================================================
    const STORAGE_KEY = 'lte-theme';

    const getStoredTheme = () => localStorage.getItem(STORAGE_KEY);
    const setStoredTheme = (theme) => localStorage.setItem(STORAGE_KEY, theme);
    const prefersDark = () => globalThis.matchMedia('(prefers-color-scheme: dark)').matches;

    const getPreferredTheme = () => {
        const stored = getStoredTheme();
        if (stored) return stored;
        return prefersDark() ? 'dark' : 'light';
    };

    const setTheme = (theme) => {
        const resolved = theme === 'auto' ? (prefersDark() ? 'dark' : 'light') : theme;
        document.documentElement.setAttribute('data-bs-theme', resolved);
    };

    setTheme(getPreferredTheme());

    const showActiveTheme = (theme) => {
        document.querySelectorAll('[data-bs-theme-value]').forEach((el) => {
            el.classList.remove('active');
            el.setAttribute('aria-pressed', 'false');
            const check = el.querySelector('.bi-check-lg');
            if (check) check.classList.add('d-none');
        });
        const active = document.querySelector(`[data-bs-theme-value="${theme}"]`);
        if (active) {
            active.classList.add('active');
            active.setAttribute('aria-pressed', 'true');
            const check = active.querySelector('.bi-check-lg');
            if (check) check.classList.remove('d-none');
        }
        document.querySelectorAll('[data-lte-theme-icon]').forEach((icon) => {
            icon.classList.toggle('d-none', icon.dataset.lteThemeIcon !== theme);
        });
    };

    globalThis.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        const stored = getStoredTheme();
        if (!stored || stored === 'auto') setTheme(getPreferredTheme());
    });

    showActiveTheme(getPreferredTheme());
    document.querySelectorAll('[data-bs-theme-value]').forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const theme = toggle.getAttribute('data-bs-theme-value');
            setStoredTheme(theme);
            setTheme(theme);
            showActiveTheme(theme);
        });
    });

    // ============================================================
    // Sales Value - ApexCharts Area Chart
    // ============================================================
    const salesChartEl = document.querySelector('#sales-chart');
    if (salesChartEl && typeof ApexCharts !== 'undefined') {
        const isDark = document.documentElement.getAttribute('data-bs-theme') === 'dark';
        const salesOptions = {
            series: [
                {
                    name: 'Revenue',
                    data: [65, 59, 80, 81, 56, 55, 72, 80, 65, 59, 80, 84],
                },
                {
                    name: 'Profit',
                    data: [28, 48, 40, 45, 36, 48, 52, 55, 41, 48, 40, 60],
                },
            ],
            chart: {
                type: 'area',
                height: 280,
                toolbar: { show: false },
                fontFamily: 'Source Sans 3, sans-serif',
                background: 'transparent',
            },
            colors: ['#0d6efd', '#20c997'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [0, 100],
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            xaxis: {
                categories: ["Jan '21", "Feb '21", "Mar '21", "Apr '21", "May '21", "Jun '21",
                    "Jul '21", "Aug '21", "Sep '21", "Oct '21", "Nov '21", "Dec '21"],
                labels: {
                    style: {
                        colors: isDark ? '#adb5bd' : '#6c757d',
                    },
                },
                axisBorder: { show: false },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: isDark ? '#adb5bd' : '#6c757d',
                    },
                },
            },
            grid: {
                borderColor: isDark ? '#333' : '#e9ecef',
                strokeDashArray: 4,
            },
            tooltip: {
                theme: isDark ? 'dark' : 'light',
            },
            legend: {
                show: true,
                position: 'top',
                labels: {
                    colors: isDark ? '#adb5bd' : '#495057',
                },
            },
            dataLabels: {
                enabled: false,
            },
        };

        const salesChart = new ApexCharts(salesChartEl, salesOptions);
        salesChart.render();
    }

    // ============================================================
    // World Map - jsvectormap
    // ============================================================
    const worldMapEl = document.querySelector('#world-map');
    if (worldMapEl && typeof jsVectorMap !== 'undefined') {
        console.log('Registered maps in jsVectorMap:', Object.keys(jsVectorMap.maps || {}));
        try {
            // Cek map yang tersedia, default ke 'world' atau fallback ke first available map
            const availableMaps = Object.keys(jsVectorMap.maps || {});
            const mapName = availableMaps.includes('world') ? 'world' : (availableMaps[0] || 'world');
            
            console.log('Initializing world map with map name:', mapName);
            new jsVectorMap({
                selector: '#world-map',
                map: mapName,
                backgroundColor: 'transparent',
                regionStyle: {
                    initial: {
                        fill: 'rgba(255, 255, 255, 0.7)',
                        stroke: 'rgba(255, 255, 255, 0.3)',
                        'stroke-width': 1,
                    },
                    hover: {
                        fill: 'rgba(255, 255, 255, 0.9)',
                    }
                }
            });
            console.log('World map initialized successfully.');
        } catch (e) {
            console.error('Error initializing world map:', e);
        }
    } else {
        console.warn('World map element not found or jsVectorMap is undefined:', {
            el: !!worldMapEl,
            jsVectorMap: typeof jsVectorMap
        });
    }

    // ============================================================
    // Sparkline Charts (mini charts below the map)
    // ============================================================
    function createSparkline(selector, data, color) {
        const el = document.querySelector(selector);
        if (!el || typeof ApexCharts === 'undefined') return;

        const options = {
            series: [{
                data: data,
            }],
            chart: {
                type: 'area',
                height: 50,
                width: 100,
                sparkline: { enabled: true },
                background: 'transparent',
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.5,
                    opacityTo: 0.1,
                    stops: [0, 100],
                },
            },
            colors: [color],
            tooltip: {
                enabled: false,
            },
        };

        const chart = new ApexCharts(el, options);
        chart.render();
    }

    createSparkline('#sparkline-visitors', [15, 40, 35, 25, 50, 30, 45, 35, 50, 40], '#ffffff');
    createSparkline('#sparkline-online', [25, 30, 20, 45, 35, 50, 40, 30, 25, 45], '#ffffff');
    createSparkline('#sparkline-sales', [35, 25, 45, 30, 50, 20, 40, 35, 30, 50], '#ffffff');

    // ============================================================
    // Direct Chat - Toggle Contacts Pane
    // ============================================================
    const chatToggle = document.querySelector('[data-lte-toggle="chat-pane"]');
    if (chatToggle) {
        chatToggle.addEventListener('click', function () {
            const chatCard = this.closest('.direct-chat');
            if (chatCard) {
                chatCard.classList.toggle('direct-chat-contacts-open');
            }
        });
    }

});
