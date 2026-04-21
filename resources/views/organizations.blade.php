@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex" style="align-items: center">{{ __('Таблица "Организации"') }}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"
                                style="margin-left: auto;">Добавить
                        </button>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{route('organizations')}}">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Поиск по ID" value="{{$search}}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Поиск</button>
                                </div>
                            </div>

                        </form>
                        @foreach($all as $record)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex"><b>ID:</b> {{$record->id_organization}}
                                    <div class="d-flex" style="margin-left: auto;">
                                        <a class="btn btn-primary" style="margin-right: 10px" data-bs-toggle="collapse" href="#collapseExample{{$record->id_organization}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$record->id_organization}}">
                                            Подробнее
                                        </a>
                                        <button
                                            onclick="document.getElementById('id_organizationDel').value={{$record->id_organization}};"
                                            data-bs-toggle="modal" data-bs-target="#delModal" type="button"
                                            class="btn btn-danger" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                                            </svg>
                                        </button>
                                        <button onclick="document.getElementById('id_organizationEdit').value={{$record->id_organization}};
                                                document.getElementById('nameEdit').value='{{$record->name}}';
                                                document.getElementById('postcodeEdit').value='{{$record->postcode}}';
                                                document.getElementById('addressEdit').value='{{$record->address}}';
                                                document.getElementById('telephoneEdit').value='{{$record->telephone}}';
                                                document.getElementById('fax_numberEdit').value='{{$record->fax_number}}';
                                                document.getElementById('tinEdit').value='{{$record->tin}}';
                                                document.getElementById('correspondent_accountEdit').value='{{$record->correspondent_account}}';
                                                document.getElementById('bankEdit').value='{{$record->bank}}';
                                                document.getElementById('payment_accountEdit').value='{{$record->payment_account}}';
                                                document.getElementById('okonhEdit').value='{{$record->okonh}}';
                                                document.getElementById('okpoEdit').value='{{$record->okpo}}';
                                                document.getElementById('bicEdit').value='{{$record->bic}}';
                                                " data-bs-toggle="modal" data-bs-target="#editModal" type="button"
                                                class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"></path>
                                            </svg>
                                        </button>
                                    </div>

                                </li>
                                <li class="list-group-item"><b>Название организации:</b> {{$record->name}}</li>
                                <div class="collapse" id="collapseExample{{$record->id_organization}}">
                                    <li class="list-group-item"><b>Почтовый индекс:</b> {{$record->postcode}}</li>
                                    <li class="list-group-item"><b>Адрес:</b> {{$record->address}}</li>
                                    <li class="list-group-item"><b>Телефон:</b> {{$record->telephone}}</li>
                                    <li class="list-group-item"><b>Номер Факса:</b> {{$record->fax_number}}</li>
                                    <li class="list-group-item"><b>ИНН:</b> {{$record->tin}}</li>
                                    <li class="list-group-item"><b>Корр. счёт:</b> {{$record->correspondent_account}}</li>
                                    <li class="list-group-item"><b>Название банка:</b> {{$record->bank}}</li>
                                    <li class="list-group-item"><b>Рассч. счёт:</b> {{$record->payment_account}}</li>
                                    <li class="list-group-item"><b>ОКОНХ:</b> {{$record->okonh}}</li>
                                    <li class="list-group-item"><b>ОКПО:</b> {{$record->okpo}}</li>
                                    <li class="list-group-item"><b>БИК:</b> {{$record->bic}}</li>
                                </div>
                            </ul>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- ModalAdd -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('add_organization')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление записи в таблицу</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Введите название</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postcode" class="form-label">Введите индекс</label>
                                        <input type="number" x-data x-mask="9999999999" class="form-control" id="postcode" name="postcode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Введите адрес</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Введите телефон</label>
                                        <input type="number" x-data x-mask="99999999999" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fax_number" class="form-label">Введите номер факса</label>
                                        <input type="number" x-data x-mask="99999999999" class="form-control" id="fax_number" name="fax_number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tin" class="form-label">Введите ИНН</label>
                                        <input type="number" x-data x-mask="999999999999" class="form-control" id="tin" name="tin" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="correspondent_account" class="form-label">Введите корр. счёт</label>
                                        <input type="number" x-data x-mask="99999999999999999999" class="form-control" id="correspondent_account" name="correspondent_account" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bank" class="form-label">Введите название банка</label>
                                        <input type="text" class="form-control" id="bank" name="bank" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_account" class="form-label">Введите рассч. счёт</label>
                                        <input type="number" x-data x-mask="99999999999999999999" class="form-control" id="payment_account" name="payment_account" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="okonh" class="form-label">Введите ОКОНХ</label>
                                        <input type="number" x-data x-mask="99999" class="form-control" id="okonh" name="okonh" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="okpo" class="form-label">Введите ОКПО</label>
                                        <input type="number" x-data x-mask="9999999999" class="form-control" id="okpo" name="okpo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bic" class="form-label">Введите БИК</label>
                                        <input type="number" x-data x-mask="999999999" class="form-control" id="bic" name="bic" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ModalEdit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('edit_organization')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование записи в таблице</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="id_organizationEdit" name="id_organization" hidden>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nameEdit" class="form-label">Введите название</label>
                                        <input type="text" class="form-control" id="nameEdit" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postcodeEdit" class="form-label">Введите индекс</label>
                                        <input type="number" x-data x-mask="9999999999" class="form-control" id="postcodeEdit" name="postcode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addressEdit" class="form-label">Введите адрес</label>
                                        <input type="text" class="form-control" id="addressEdit" name="address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephoneEdit" class="form-label">Введите телефон</label>
                                        <input type="number" x-data x-mask="99999999999" class="form-control" id="telephoneEdit" name="telephone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fax_numberEdit" class="form-label">Введите номер факса</label>
                                        <input type="number" x-data x-mask="99999999999" class="form-control" id="fax_numberEdit" name="fax_number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tinEdit" class="form-label">Введите ИНН</label>
                                        <input type="number" x-data x-mask="999999999999" class="form-control" id="tinEdit" name="tin" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="correspondent_accountEdit" class="form-label">Введите корр. счёт</label>
                                        <input type="number" x-data x-mask="99999999999999999999" class="form-control" id="correspondent_accountEdit" name="correspondent_account" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bankEdit" class="form-label">Введите название банка</label>
                                        <input type="text" class="form-control" id="bankEdit" name="bank" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_accountEdit" class="form-label">Введите рассч. счёт</label>
                                        <input type="number" x-data x-mask="99999999999999999999" class="form-control" id="payment_accountEdit" name="payment_account" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="okonhEdit" class="form-label">Введите ОКОНХ</label>
                                        <input type="number" x-data x-mask="99999" class="form-control" id="okonhEdit" name="okonh" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="okpoEdit" class="form-label">Введите ОКПО</label>
                                        <input type="number" x-data x-mask="9999999999" class="form-control" id="okpoEdit" name="okpo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bicEdit" class="form-label">Введите БИК</label>
                                        <input type="number" x-data x-mask="999999999" class="form-control" id="bicEdit" name="bic" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ModalDel -->
            <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('del_organization')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление записи из таблицы</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_organizationDel" class="form-label">Вы точно хотите удалить
                                    запись?</label>
                                <input type="text" id="id_organizationDel" name="id_organization" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Тосты в правом нижнем углу -->
            @if(session('message') !== null)
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="successToast" class="toast show" role="alert" data-bs-autohide="true" data-bs-delay="10000">
                        <div class="toast-header bg-success text-white">
                            <strong class="me-auto">Успешно</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">
                            {{session('message')}}
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
