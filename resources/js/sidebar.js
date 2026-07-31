const sidebarTriggers = document.querySelectorAll('[data-sidebar-toggle]');

sidebarTriggers.forEach((trigger) => {
    trigger.addEventListener('click', () => {
        const target = document.querySelector(trigger.dataset.sidebarToggle);

        target?.classList.toggle('hidden');
    });
});
