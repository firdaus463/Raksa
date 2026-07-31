document.addEventListener('click', (event) => {
    const trigger = event.target.closest('[data-dropdown-toggle]');

    document.querySelectorAll('[data-dropdown-menu]').forEach((menu) => {
        if (!trigger || menu.id !== trigger.dataset.dropdownToggle) {
            menu.classList.add('hidden');
        }
    });

    if (trigger) {
        document.getElementById(trigger.dataset.dropdownToggle)?.classList.toggle('hidden');
    }
});
