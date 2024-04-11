@extends('layouts.app')
@section('content')
<br>
@if (session('success'))
    <br>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <br>
    <br>
@endif

@if (session('error'))

    <br>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <br>
    <br>
@endif
    @if($data->isEmpty())
        <p>Nebyla nalezena žádná auta</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Datum výroby</th>
                    <th>&nbsp;&nbsp;ID spol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->name }}</td>
                        <td>&nbsp;&nbsp;{{ $car->made }}</td>
                        <td>&nbsp;&nbsp;{{ $car->Company_id }}</td>
                        <td><button class="btn btn-outline btn-error" data-id="{{ $car->id }}" onclick="setFormAction('{{ $car->id }}')">Smazat</button></td>
                        <td></td>
                        <td><button class="btn btn-outline btn-warning">Editovat</button></td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

<div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Tuto akci nebude možné vrátit!
            </h3>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    

      <form id="deleteForm" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline btn-error" type="submit">Smazat</button>
</form>




        &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-outline btn-primary" id="cancelButton">
          Zrušit
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("myModal");
    var form = document.getElementById('deleteForm');
    var deleteButton = document.querySelector('.btn.btn-outline.btn-error');
    var cancelButton = document.querySelector('.btn.btn-outline.btn-primary'); 

    this.setFormAction = function(carId) {
        form.action = '/car/' + carId;
        modal.classList.remove("hidden");
        deleteButton.dataset.id = carId;
    }

    var modalHandler = {
  openModal: setFormAction,
  closeModal: function () {
        console.log('closeModal function called');
        modal.classList.add("hidden");
    }
};

    var btns = document.querySelectorAll('.btn.btn-outline.btn-error');
    btns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var carId = this.dataset.id;
            modalHandler.openModal(carId);
        });
    });


    cancelButton.addEventListener('click', modalHandler.closeModal);
});

</script>
@endsection
