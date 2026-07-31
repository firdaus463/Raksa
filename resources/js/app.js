import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const initializeLandingNavbar = () => {
    const navbar = document.querySelector('[data-landing-navbar]');

    if (!navbar) {
        return;
    }

    const navLinks = Array.from(navbar.querySelectorAll('[data-nav-link][data-section-target]'));
    const scrollLinks = Array.from(document.querySelectorAll('[data-scroll-link], [data-nav-link][data-section-target]'));
    const toggle = navbar.querySelector('[data-mobile-nav-toggle]');
    const menu = navbar.querySelector('[data-mobile-nav-menu]');
    const backdrop = navbar.querySelector('[data-mobile-nav-backdrop]');
    const desktopIndicator = navbar.querySelector('[data-nav-indicator]');
    const toggleLines = Array.from(navbar.querySelectorAll('[data-mobile-nav-line]'));
    const sectionIds = [...new Set(navLinks.map((link) => link.dataset.sectionTarget).filter(Boolean))];
    const sections = sectionIds
        .map((id) => document.getElementById(id))
        .filter(Boolean);
    const desktopNavigation = window.matchMedia('(min-width: 835px)');

    if (!sections.length) {
        return;
    }

    let mobileMenuOpen = false;
    let closeTimer = null;
    let scrollFrame = null;

    const desktopActiveClasses = ['border-raksa-primary', 'font-bold', 'text-raksa-text'];
    const desktopInactiveClasses = ['border-transparent', 'text-raksa-neutral'];
    const mobileActiveClasses = ['border-raksa-primary', 'bg-raksa-primary-light', 'text-raksa-primary'];
    const mobileInactiveClasses = ['border-transparent', 'text-raksa-neutral'];

    const isMobileLink = (link) => Boolean(link.closest('[data-mobile-nav-menu]'));

    const moveDesktopIndicator = (sectionId) => {
        if (!desktopIndicator) {
            return;
        }

        const activeDesktopLink = navLinks.find((link) => (
            !isMobileLink(link) && link.dataset.sectionTarget === sectionId
        ));

        if (!activeDesktopLink || activeDesktopLink.offsetParent === null) {
            desktopIndicator.style.opacity = '0';
            return;
        }

        const navigationRect = desktopIndicator.parentElement.getBoundingClientRect();
        const linkRect = activeDesktopLink.getBoundingClientRect();

        desktopIndicator.style.width = `${linkRect.width}px`;
        desktopIndicator.style.transform = `translateX(${linkRect.left - navigationRect.left}px)`;
        desktopIndicator.style.opacity = '1';
    };

    const setActiveSection = (sectionId) => {
        navLinks.forEach((link) => {
            const active = link.dataset.sectionTarget === sectionId;
            const activeClasses = isMobileLink(link) ? mobileActiveClasses : desktopActiveClasses;
            const inactiveClasses = isMobileLink(link) ? mobileInactiveClasses : desktopInactiveClasses;

            link.classList.toggle('hover:border-raksa-primary/30', !active && !isMobileLink(link));
            link.classList.toggle('hover:text-raksa-text', !active);
            link.classList.toggle('hover:bg-raksa-surface', !active && isMobileLink(link));

            if (active) {
                link.classList.add(...activeClasses);
                link.classList.remove(...inactiveClasses);
                link.setAttribute('aria-current', 'page');
                return;
            }

            link.classList.remove(...activeClasses);
            link.classList.add(...inactiveClasses);
            link.removeAttribute('aria-current');
        });

        moveDesktopIndicator(sectionId);
    };

    const getScrollOffset = () => navbar.offsetHeight + 16;

    const updateActiveFromViewport = () => {
        const offset = getScrollOffset();
        const pageBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2;
        let currentSectionId = sections[0].id;

        if (pageBottom) {
            setActiveSection(sections[sections.length - 1].id);
            return;
        }

        sections.forEach((section) => {
            const rect = section.getBoundingClientRect();

            if (rect.top <= offset + 8) {
                currentSectionId = section.id;
            }
        });

        setActiveSection(currentSectionId);
    };

    const requestActiveUpdate = () => {
        if (scrollFrame) {
            return;
        }

        scrollFrame = window.requestAnimationFrame(() => {
            updateActiveFromViewport();
            scrollFrame = null;
        });
    };

    const setMobileMenuOpen = (open) => {
        if (!toggle || !menu || !backdrop || mobileMenuOpen === open) {
            return;
        }

        mobileMenuOpen = open;
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');

        if (closeTimer) {
            window.clearTimeout(closeTimer);
            closeTimer = null;
        }

        if (open) {
            menu.classList.remove('hidden');
            backdrop.classList.remove('hidden');

            window.requestAnimationFrame(() => {
                menu.classList.remove('-translate-y-3', 'opacity-0');
                menu.classList.add('translate-y-0', 'opacity-100');
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
            });

            toggleLines[0]?.classList.add('top-2', 'rotate-45');
            toggleLines[0]?.classList.remove('top-0');
            toggleLines[1]?.classList.add('opacity-0');
            toggleLines[2]?.classList.add('top-2', '-rotate-45');
            toggleLines[2]?.classList.remove('top-4');
            return;
        }

        menu.classList.add('-translate-y-3', 'opacity-0');
        menu.classList.remove('translate-y-0', 'opacity-100');
        backdrop.classList.add('opacity-0');
        backdrop.classList.remove('opacity-100');

        toggleLines[0]?.classList.remove('top-2', 'rotate-45');
        toggleLines[0]?.classList.add('top-0');
        toggleLines[1]?.classList.remove('opacity-0');
        toggleLines[2]?.classList.remove('top-2', '-rotate-45');
        toggleLines[2]?.classList.add('top-4');

        closeTimer = window.setTimeout(() => {
            menu.classList.add('hidden');
            backdrop.classList.add('hidden');
        }, 220);
    };

    scrollLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            const hash = link.getAttribute('href');

            if (!hash?.startsWith('#') || hash === '#') {
                return;
            }

            const section = document.querySelector(hash);

            if (!section) {
                return;
            }

            event.preventDefault();
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            setActiveSection(section.id);
            setMobileMenuOpen(false);
        });
    });

    toggle?.addEventListener('click', () => setMobileMenuOpen(!mobileMenuOpen));
    backdrop?.addEventListener('click', () => setMobileMenuOpen(false));

    document.addEventListener('pointerdown', (event) => {
        if (!mobileMenuOpen || !menu || !toggle) {
            return;
        }

        const target = event.target;

        if (target instanceof Node && !menu.contains(target) && !toggle.contains(target)) {
            setMobileMenuOpen(false);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setMobileMenuOpen(false);
        }
    });

    const observer = new IntersectionObserver(requestActiveUpdate, {
        rootMargin: `-${getScrollOffset()}px 0px -55% 0px`,
        threshold: [0, 0.15, 0.4, 0.7],
    });

    sections.forEach((section) => observer.observe(section));
    window.addEventListener('scroll', requestActiveUpdate, { passive: true });
    window.addEventListener('resize', () => {
        if (desktopNavigation.matches) {
            setMobileMenuOpen(false);
        }

        requestActiveUpdate();
    });
    updateActiveFromViewport();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeLandingNavbar);
} else {
    initializeLandingNavbar();
}
