document.addEventListener('change', (event) => {
    const input = event.target.closest('input[type="file"][data-preview-target]');

    if (!input?.files?.length) {
        return;
    }

    const preview = document.getElementById(input.dataset.previewTarget);

    if (preview) {
        preview.src = URL.createObjectURL(input.files[0]);
    }
});
