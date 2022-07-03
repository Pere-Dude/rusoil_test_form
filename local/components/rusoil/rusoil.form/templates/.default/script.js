document.addEventListener('DOMContentLoaded', function () {
    let i_code = 1;

    document.querySelector('.form-cell-button.plus').addEventListener('click', event => {
        if (i_code < 10){

            var elemKod = document.querySelector('.table-line').innerHTML;
            var elemOutKod = document.querySelector('.form-table');
            //elemOutKod.innerHTML += elemKod;
            elemOutKod.insertAdjacentHTML("beforeend", elemKod);

            ++i_code;

            var brands = document.querySelectorAll('.brand');
            var lastBrand = brands[brands.length - 1];
            lastBrand.setAttribute('name', `brand` + i_code);

            var names = document.querySelectorAll('.name');
            var lastName = names[names.length - 1];
            lastName.setAttribute('name', `name` + i_code);

            var amounts = document.querySelectorAll('.amount');
            var lastAm = amounts[amounts.length - 1];
            lastAm.setAttribute('name', `amount` + i_code);

            var packings = document.querySelectorAll('.packing');
            var lastPack = packings[packings.length - 1];
            lastPack.setAttribute('name', `packing` + i_code);

            var clients = document.querySelectorAll('.client');
            var lastClient = clients[clients.length - 1];
            lastClient.setAttribute('name', `client` + i_code);
        }
    });

    document.querySelector('.form-cell-button.minus').addEventListener('click', event => {
        if(i_code !== 1){
            var inputs = document.querySelectorAll('.form-table tbody');
            var lastElem = inputs[inputs.length - 1];
            lastElem.remove();
            --i_code;
        }
    });
}, false);