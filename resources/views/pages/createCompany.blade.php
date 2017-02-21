@extends ('layouts.layout')

@section('content')
    <form method="POST" action="/company">
        {{ csrf_field() }}
        <div class="form-group ">
            <label class="control-label requiredField" for="name">
                Название компании
                <span class="asteriskField">
        *
       </span>
            </label>
            <input class="form-control" id="name" name="name" type="text"/>
            <span class="help-block" id="hint_name">
       Впишите название вашей компании
      </span>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="field">
                Область деятельности
                <span class="asteriskField">
        *
       </span>
            </label>
            <select class="select form-control" id="field" name="field">
                <option value="1">
                    1
                </option>
                <option value="2">
                    2
                </option>
                <option value="3">
                    3
                </option>
            </select>
            <span class="help-block" id="hint_field">
       Выберете область деятельности вашей компании
      </span>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="profile">
                Чем занимается компания
                <span class="asteriskField">
        *
       </span>
            </label>
            <textarea class="form-control" cols="40" id="profile" name="profile" rows="10"></textarea>
            <span class="help-block" id="hint_profile">
       Краткое описание вашей деятельности
      </span>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="cityId">
                Город
                <span class="asteriskField">
        *
       </span>
            </label>
            <select class="select form-control" id="cityId" name="cityId">
                <option value="1">
                    1
                </option>
                <option value="2">
                    2
                </option>
                <option value="3">
                    3
                </option>
            </select>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="address">
                Адрес
                <span class="asteriskField">
        *
       </span>
            </label>
            <textarea class="form-control" cols="40" id="address" name="address" rows="10"></textarea>
            <span class="help-block" id="hint_address">
       Адрес Вашей компании
      </span>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="persons">
                Контакты
                <span class="asteriskField">
        *
       </span>
            </label>
            <textarea class="form-control" cols="40" id="persons" name="persons" rows="10"></textarea>
            <span class="help-block" id="hint_persons">
       Данные для связи
      </span>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="phone">
                Телефон
                <span class="asteriskField">
        *
       </span>
            </label>
            <input class="form-control" id="phone" name="phone" placeholder="8-900-123-45-67" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="email">
                Электронная почта
                <span class="asteriskField">
        *
       </span>
            </label>
            <input class="form-control" id="email" name="email" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="contractNumber">
                Номер договора
                <span class="asteriskField">
        *
       </span>
            </label>
            <input class="form-control" id="contractNumber" name="contractNumber" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="additionalInfo">
                Дополнительная информация
                <span class="asteriskField">
        *
       </span>
            </label>
            <textarea class="form-control" cols="40" id="additionalInfo" name="additionalInfo"
                      rows="10"></textarea>
        </div>
        <div class="form-group">
            <div>
                <button class="btn btn-primary " name="submit" type="submit">
                    Отправить
                </button>
            </div>
        </div>
    </form>
@endsection