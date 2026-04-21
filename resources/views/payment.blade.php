@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex" style="align-items: center">{{ __('Таблица "Оплата"') }}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"
                                style="margin-left: auto;">Добавить
                        </button>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{route('payment')}}">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="search" name="search"
                                           placeholder="Поиск названию" value="{{$search}}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Поиск</button>
                                </div>
                            </div>

                        </form>
                        @foreach($all as $record)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex"><b>ID:</b> {{$record->id_contract}}
                                    <div class="d-flex" style="margin-left: auto;">
                                        <a class="btn btn-primary" style="margin-right: 10px" data-bs-toggle="collapse"
                                           href="#collapseExample{{$record->id_contract}}" role="button"
                                           aria-expanded="false"
                                           aria-controls="collapseExample{{$record->id_contract}}">
                                            Подробнее
                                        </a>
                                        <button
                                            onclick="document.getElementById('id_contractDel').value={{$record->id_contract}};"
                                            data-bs-toggle="modal" data-bs-target="#delModal" type="button"
                                            class="btn btn-danger" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                                            </svg>
                                        </button>
                                        <button onclick="document.getElementById('id_contractEdit1').innerHTML='ID: {{$record->id_contract}}';
                                                document.getElementById('id_contractEdit2').value='{{$record->id_contract}}';
                                                document.getElementById('payment_dateEdit').value='{{$record->payment_date}}';
                                                document.getElementById('payment_amountEdit').value='{{$record->payment_amount}}';
                                                document.getElementById('fk_id_type_of_paymentEdit').value='{{$record->fk_id_type_of_payment}}';
                                                document.getElementById('payment_document_numberEdit').value='{{$record->payment_document_number}}';
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
                                <div class="collapse" id="collapseExample{{$record->id_contract}}">
                                    <li class="list-group-item"><b>Дата оплаты:</b> {{$record->payment_date}}</li>
                                    <li class="list-group-item"><b>Сумма оплаты:</b> {{$record->payment_amount}}</li>
                                    <li class="list-group-item"><b>Код вида
                                            оплаты:</b> {{$record->fk_id_type_of_payment}}</li>
                                    <li class="list-group-item"><b>Номер платежного
                                            документа:</b> {{$record->payment_document_number}}</li>
                                </div>
                            </ul>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- ModalAdd -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('add_payment')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление записи в таблицу</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_contract" class="form-label">Выберете договор:</label>
                                <select id="id_contract" name="id_contract" class="form-select" required>
                                    <option value="" selected>Пусто</option>
                                    @foreach($contracts as $contract)
                                        <option
                                            value="{{$contract->id_contract}}">{{$contract->id_contract}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Введите дату оплаты</label>
                                <input type="date" class="form-control" id="payment_date" name="payment_date"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_amount" class="form-label">Введите сумму оплаты</label>
                                <input type="number" class="form-control" id="payment_amount" name="payment_amount"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="fk_id_type_of_payment" class="form-label">Выберете тип оплаты:</label>
                                <select id="fk_id_type_of_payment" name="fk_id_type_of_payment" class="form-select"
                                        required>
                                    <option value="" selected>Пусто</option>
                                    @foreach($types_of_payments as $type_of_payment)
                                        <option
                                            value="{{$type_of_payment->id_type_of_payment}}">{{$type_of_payment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_document_number" class="form-label">Введите платежного
                                    документа</label>
                                <input type="number" class="form-control" id="payment_document_number"
                                       name="payment_document_number" required>
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
                    <form class="modal-content" action="{{route('edit_payment')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование записи в таблице</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <p id="id_contractEdit1"></p>
                            <input type="number" class="form-control" id="id_contractEdit2" name="id_contract" hidden>

                            <div class="mb-3">
                                <label for="payment_dateEdit" class="form-label">Введите дату оплаты</label>
                                <input type="date" class="form-control" id="payment_dateEdit" name="payment_date"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_amountEdit" class="form-label">Введите сумму оплаты</label>
                                <input type="number" class="form-control" id="payment_amountEdit" name="payment_amount"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="fk_id_type_of_paymentEdit" class="form-label">Выберете тип оплаты:</label>
                                <select id="fk_id_type_of_paymentEdit" name="fk_id_type_of_payment" class="form-select"
                                        required>
                                    <option value="" selected>Пусто</option>
                                    @foreach($types_of_payments as $type_of_payment)
                                        <option
                                            value="{{$type_of_payment->id_type_of_payment}}">{{$type_of_payment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_document_numberEdit" class="form-label">Введите платежного
                                    документа</label>
                                <input type="number" class="form-control" id="payment_document_numberEdit"
                                       name="payment_document_number" required>
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
                    <form class="modal-content" action="{{route('del_payment')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление записи из таблицы</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_contractDel" class="form-label">Вы точно хотите удалить
                                    запись?</label>
                                <input type="text" id="id_contractDel" name="id_contract" hidden>
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
                    <div id="successToast" class="toast show" role="alert" data-bs-autohide="true"
                         data-bs-delay="10000">
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
