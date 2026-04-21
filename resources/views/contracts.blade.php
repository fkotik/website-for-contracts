@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex" style="align-items: center">{{ __('Таблица "Договора"') }}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"
                                style="margin-left: auto;">Добавить
                        </button>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{route('contracts')}}">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="number" class="form-control" id="search" name="search" placeholder="Поиск по ID" value="{{$search}}">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-3">Поиск</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <label for="order" class="form-label">Сортировать по ID от:</label>
                                    <select id="order" name="order" class="form-select mb-3">
                                        <option value="asc">А-Я</option>
                                        <option value="desc">Я-А</option>
                                    </select>
                                    <script>document.getElementById('order').value='{{$order}}'</script>

                                </div>
                                <div class="col-4">
                                    <label for="filterCustomer" class="form-label">Фильтровать по заказчику:</label>
                                    <select id="filterCustomer" name="filterCustomer" class="form-select">
                                        <option value="" selected>Пусто</option>
                                        @foreach($organizations as $organization)
                                            <option value="{{$organization->id_organization}}" selected>{{$organization->id_organization}} - {{$organization->name}}</option>
                                        @endforeach
                                    </select>
                                    <script>document.getElementById('filterCustomer').value='{{$filterCustomer}}'</script>

                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-3">Выбрать</button>
                            </div>

                        </form>
                        @foreach($all as $record)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex"><b>ID:</b> {{$record->id_contract}}
                                    <div class="d-flex" style="margin-left: auto;">
                                        <a class="btn btn-primary" style="margin-right: 10px" data-bs-toggle="collapse" href="#collapseExample{{$record->id_contract}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$record->id_contract}}">
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
                                        <button onclick="document.getElementById('id_contractEdit').value={{$record->id_contract}};
                                                document.getElementById('date_of_conclusionEdit').value='{{$record->date_of_conclusion}}';
                                                document.getElementById('fk_id_customerEdit').value='{{$record->fk_id_customer}}';
                                                document.getElementById('fk_id_performerEdit').value='{{$record->fk_id_performer}}';
                                                document.getElementById('fk_id_type_of_contractEdit').value='{{$record->fk_id_type_of_contract}}';
                                                document.getElementById('fk_id_stage_of_executionEdit').value='{{$record->fk_id_stage_of_execution}}';
                                                document.getElementById('fk_id_vat_rateEdit').value='{{$record->fk_id_vat_rate}}';
                                                document.getElementById('date_of_executionEdit').value='{{$record->date_of_execution}}';
                                                document.getElementById('themeEdit').value='{{$record->theme}}';
                                                document.getElementById('noteEdit').value='{{$record->note}}';
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
                                    <li class="list-group-item"><b>Дата заключения:</b> {{$record->date_of_conclusion}}</li>
                                    <li class="list-group-item"><b>Код заказчика:</b> {{$record->fk_id_customer}}</li>
                                    <li class="list-group-item"><b>Код исполнителя:</b> {{$record->fk_id_performer}}</li>
                                    <li class="list-group-item"><b>Код типа договора:</b> {{$record->fk_id_type_of_contract}}</li>
                                    <li class="list-group-item"><b>Код стадий исполнения:</b> {{$record->fk_id_stage_of_execution}}</li>
                                    <li class="list-group-item"><b>Код ставки НДС:</b> {{$record->fk_id_vat_rate}}</li>
                                    <li class="list-group-item"><b>Дата исполнения:</b> {{$record->date_of_execution}}</li>
                                    <li class="list-group-item"><b>Тема:</b> {{$record->theme}}</li>
                                    <li class="list-group-item"><b>Примечание:</b> {{$record->note}}</li>
                                </div>
                            </ul>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- ModalAdd -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{route('add_contract')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление записи в таблицу</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="date_of_conclusion" class="form-label">Введите дату заключения</label>
                                        <input type="date" class="form-control" id="date_of_conclusion" name="date_of_conclusion" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_customer" class="form-label">Выберете заказчика</label>
                                        <select id="fk_id_customer" name="fk_id_customer" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id_organization}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_performer" class="form-label">Выберете исполнителя</label>
                                        <select id="fk_id_performer" name="fk_id_performer" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id_organization}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_type_of_contract" class="form-label">Выберете тип договора</label>
                                        <select id="fk_id_type_of_contract" name="fk_id_type_of_contract" class="form-select">
                                            <option value="" selected>Пусто</option>
                                            @foreach($types_of_contracts as $type_of_contract)
                                                <option value="{{$type_of_contract->id_type_of_contract}}">{{$type_of_contract->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_stage_of_execution" class="form-label">Выберете стадию исполнения</label>
                                        <select id="fk_id_stage_of_execution" name="fk_id_stage_of_execution" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($stages_of_execution as $stage_of_execution)
                                                <option value="{{$stage_of_execution->id_stage_of_execution}}">{{$stage_of_execution->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="fk_id_vat_rate" class="form-label">Выберете ставку НДС</label>
                                        <select id="fk_id_vat_rate" name="fk_id_vat_rate" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($vat_rates as $vat_rate)
                                                <option value="{{$vat_rate->id_vat_rate}}">{{$vat_rate->percent}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_execution" class="form-label">Введите дату исполнения</label>
                                        <input type="date" class="form-control" id="date_of_execution" name="date_of_execution" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="theme" class="form-label">Введите тему</label>
                                        <input type="text" class="form-control" id="theme" name="theme" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Введите примечание</label>
                                        <input type="text" class="form-control" id="note" name="note">
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
                    <form class="modal-content" action="{{route('edit_contract')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование записи в таблице</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="id_contractEdit" name="id_contract" hidden>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="date_of_conclusionEdit" class="form-label">Введите дату заключения</label>
                                        <input type="date" class="form-control" id="date_of_conclusionEdit" name="date_of_conclusion" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_customerEdit" class="form-label">Выберете заказчика</label>
                                        <select id="fk_id_customerEdit" name="fk_id_customer" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id_organization}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_performerEdit" class="form-label">Выберете исполнителя</label>
                                        <select id="fk_id_performerEdit" name="fk_id_performer" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id_organization}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_type_of_contractEdit" class="form-label">Выберете тип договора</label>
                                        <select id="fk_id_type_of_contractEdit" name="fk_id_type_of_contract" class="form-select">
                                            <option value="" selected>Пусто</option>
                                            @foreach($types_of_contracts as $type_of_contract)
                                                <option value="{{$type_of_contract->id_type_of_contract}}">{{$type_of_contract->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fk_id_stage_of_executionEdit" class="form-label">Выберете стадию исполнения</label>
                                        <select id="fk_id_stage_of_executionEdit" name="fk_id_stage_of_execution" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($stages_of_execution as $stage_of_execution)
                                                <option value="{{$stage_of_execution->id_stage_of_execution}}">{{$stage_of_execution->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="fk_id_vat_rateEdit" class="form-label">Выберете ставку НДС</label>
                                        <select id="fk_id_vat_rateEdit" name="fk_id_vat_rate" class="form-select" required>
                                            <option value="" selected>Пусто</option>
                                            @foreach($vat_rates as $vat_rate)
                                                <option value="{{$vat_rate->id_vat_rate}}">{{$vat_rate->percent}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_executionEdit" class="form-label">Введите дату исполнения</label>
                                        <input type="date" class="form-control" id="date_of_executionEdit" name="date_of_execution" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="themeEdit" class="form-label">Введите тему</label>
                                        <input type="text" class="form-control" id="themeEdit" name="theme" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="noteEdit" class="form-label">Введите примечание</label>
                                        <input type="text" class="form-control" id="noteEdit" name="note">
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
                    <form class="modal-content" action="{{route('del_contract')}}" method="post">
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
