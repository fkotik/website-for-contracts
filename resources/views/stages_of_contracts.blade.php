@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex" style="align-items: center">{{ __('Таблица "Стадии договоров"') }}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"
                                style="margin-left: auto;">Добавить
                        </button>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{route('stages_of_contracts')}}">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="search" name="search"
                                           placeholder="Поиск по ID договора" value="{{$search}}">
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
                                           href="#collapseExample{{$record->id_contract}}{{$record->stage_number}}" role="button"
                                           aria-expanded="false"
                                           aria-controls="collapseExample{{$record->id_contract}}{{$record->stage_number}}">
                                            Подробнее
                                        </a>
                                        <button
                                            onclick="
                                            document.getElementById('id_contractDel').value={{$record->id_contract}};
                                            document.getElementById('stage_numberDel').value={{$record->stage_number}};
                                            "
                                            data-bs-toggle="modal" data-bs-target="#delModal" type="button"
                                            class="btn btn-danger" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                                            </svg>
                                        </button>
                                        <button onclick="
                                                document.getElementById('id_contractEdit1').innerHTML='ID: {{$record->id_contract}} <br> Номер этапа: {{$record->stage_number}}';
                                                document.getElementById('id_contractEdit2').value='{{$record->id_contract}}';
                                                document.getElementById('stage_numberEdit').value='{{$record->stage_number}}';
                                                document.getElementById('stage_execution_dateEdit').value='{{$record->stage_execution_date}}';
                                                document.getElementById('fk_id_stages_of_executionEdit').value='{{$record->fk_id_stages_of_execution}}';
                                                document.getElementById('stage_amountEdit').value='{{$record->stage_amount}}';
                                                document.getElementById('advance_paymentEdit').value='{{$record->advance_payment}}';
                                                document.getElementById('themeEdit').value='{{$record->theme}}';
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
                                <li class="list-group-item"><b>Номер этапа:</b> {{$record->stage_number}}</li>

                                <div class="collapse" id="collapseExample{{$record->id_contract}}{{$record->stage_number}}">
                                    <li class="list-group-item"><b>Дата исполнения этапа:</b> {{$record->stage_execution_date}}</li>
                                    <li class="list-group-item"><b>Код стадии исполнения:</b> {{$record->fk_id_stages_of_execution}}</li>
                                    <li class="list-group-item"><b>Сумма этапа:</b> {{$record->stage_amount}}</li>
                                    <li class="list-group-item"><b>Сумма аванса:</b> {{$record->advance_payment}}</li>
                                    <li class="list-group-item"><b>Тема:</b> {{$record->theme}}</li>
                                </div>
                            </ul>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- ModalAdd -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('add_stage_of_contract')}}" method="post">
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
                                <label for="stage_execution_date" class="form-label">Введите дату исполнения этапа</label>
                                <input type="date" class="form-control" id="stage_execution_date" name="stage_execution_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="fk_id_stages_of_execution" class="form-label">Выберете стадию исполнения:</label>
                                <select id="fk_id_stages_of_execution" name="fk_id_stages_of_execution" class="form-select" required>
                                    <option value="" selected>Пусто</option>
                                    @foreach($stages_of_execution as $stage_of_execution)
                                        <option
                                            value="{{$stage_of_execution->id_stage_of_execution}}">{{$stage_of_execution->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stage_amount" class="form-label">Введите сумму этапа</label>
                                <input type="number" class="form-control" id="stage_amount" name="stage_amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="advance_payment" class="form-label">Введите сумму аванса</label>
                                <input type="number" class="form-control" id="advance_payment" name="advance_payment" required>
                            </div>
                            <div class="mb-3">
                                <label for="theme" class="form-label">Введите тему</label>
                                <input type="number" class="form-control" id="theme" name="theme" required>
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
                    <form class="modal-content" action="{{route('edit_stage_of_contract')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование записи в таблице</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="id_contractEdit1"></p>

                            <input type="number" class="form-control" id="id_contractEdit2" name="id_contract" hidden>
                            <input type="number" class="form-control" id="stage_numberEdit" name="stage_number" hidden>

                            <div class="mb-3">
                                <label for="stage_execution_dateEdit" class="form-label">Введите дату исполнения этапа</label>
                                <input type="date" class="form-control" id="stage_execution_dateEdit" name="stage_execution_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="fk_id_stages_of_executionEdit" class="form-label">Выберете стадию исполнения:</label>
                                <select id="fk_id_stages_of_executionEdit" name="fk_id_stages_of_execution" class="form-select" required>
                                    <option value="" selected>Пусто</option>
                                    @foreach($stages_of_execution as $stage_of_execution)
                                        <option
                                            value="{{$stage_of_execution->id_stage_of_execution}}">{{$stage_of_execution->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stage_amountEdit" class="form-label">Введите сумму этапа</label>
                                <input type="number" class="form-control" id="stage_amountEdit" name="stage_amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="advance_paymentEdit" class="form-label">Введите сумму аванса</label>
                                <input type="number" class="form-control" id="advance_paymentEdit" name="advance_payment" required>
                            </div>
                            <div class="mb-3">
                                <label for="themeEdit" class="form-label">Введите тему</label>
                                <input type="number" class="form-control" id="themeEdit" name="theme" required>
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
                    <form class="modal-content" action="{{route('del_stage_of_contract')}}" method="post">
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
                                <input type="text" id="stage_numberDel" name="stage_number" hidden>

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
