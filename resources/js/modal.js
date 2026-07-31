document.addEventListener('click', (event) => {
    const openTrigger = event.target.closest('[data-modal-open]');
    const closeTrigger = event.target.closest('[data-modal-close]');

    if (openTrigger) {
        document.querySelector(openTrigger.dataset.modalOpen)?.classList.remove('hidden');
    }

    if (closeTrigger) {
        closeTrigger.closest('[data-modal]')?.classList.add('hidden');
    }
});
