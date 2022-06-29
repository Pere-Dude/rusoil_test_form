document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.form-cell-control .plus').addEventListener('click', event => {
        if (document.querySelector('.form-cell-inputs .form-input.hidden') !== null) {
            document.querySelector('.form-cell-inputs .form-input.hidden').classList.remove('hidden');
        }
    });

    document.querySelector('.form-cell-control .minus').addEventListener('click', event => {
        var inputs = document.querySelectorAll('.form-cell-inputs .form-input:not(.hidden)');
        var lastElem = inputs[inputs.length - 1];
        lastElem.classList.add('hidden');
    });
}, false);