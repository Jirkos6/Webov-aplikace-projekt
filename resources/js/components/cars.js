document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname === '/car') {
        var modal = document.getElementById("myModal");
        var form = document.getElementById('deleteForm');
        var deleteButton = document.getElementById('deleteButton1');
        var cancelButton = document.getElementById('cancelButton');
        var multieditbutton = document.getElementById('MultieditButton');
        var multiaddbutton = document.getElementById('addButton');
        var numberInput = document.getElementById('numberInput');

        cancelButton.addEventListener('click', function() {
            modal.classList.add("hidden");
        });

        this.setFormAction = function(carId) {
            form.action = '/cars/' + carId;
            modal.classList.remove("hidden");
            deleteButton.dataset.id = carId;
        };

        multiaddbutton.addEventListener('click', function() {
            var enteredId = numberInput.value; 
            if (enteredId) {
                window.location.href = '/cars/multi-create?value=' + enteredId;
            } else {
                console.log('Nebylo vloženo žádné číslo.');
            }
        });

        multieditbutton.addEventListener('click', function() {
            var selectedIds = [];
            var checkboxes = document.querySelectorAll('.item-checkbox:checked');
            console.log("test");
            checkboxes.forEach(function(checkbox) {
                selectedIds.push(checkbox.dataset.id);
            });
            if (selectedIds.length > 0) {
                window.location.href = '/cars/multi-edit?id=' + selectedIds.join(',');
            } else {
                console.log('Nebylo vybráno nic na editaci.');
            }
        });
    }

    var modalHandler = {
        openModal: setFormAction
    };

    var btns = document.getElementById('deleteButton1');
    btns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var carId = this.dataset.id;
            modalHandler.openModal(carId);
        });
    });
});
