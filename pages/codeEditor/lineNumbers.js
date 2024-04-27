window.addEventListener('DOMContentLoaded', function () {
    const textarea = document.querySelector('textarea');
    const lineNumbers = document.querySelector('.line-numbers');

    function updateLineNumbers() {
        const lines = textarea.value.split('\n').length;
        lineNumbers.innerHTML = '';
        for (let i = 1; i <= lines; i++) {
            lineNumbers.innerHTML += `<span>${i}</span>`;
        }
    }

    textarea.addEventListener('input', updateLineNumbers);
    updateLineNumbers();
});
