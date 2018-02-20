<div class="row"> <!-- 1. Information about attendee -->
<div class="col-xs-12 col-sm-12 col-md-12  col-lg-10 col-lg-offset-1">
  <div class="boxed-group">
    <div class="section-header">
      <h3>Информация о соискателе</h3>
    </div>
    <div class="row"> <!-- .row -->
    <div class="group"> <!-- .group -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
      <div class="form-group">
        <label for="name">Фамилия имя отчество<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
        <input id="name" name="name" class="form-control" type="text" value="{{$resume->name}}" placeholder="Константинопольский Константин Константинович"  autofocus required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      <div class="form-group">
        <label for="bday">Дата рождения<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
        <input id="bday" name="bday" class="form-control" type="text" placeholder="01.11.1901" value="{{$resume->bDay}}" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
      <label>Пол<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
      <div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default">
          <input type="radio" name="sex" id="sex1" value="1">
          <i style="color:#2980b9;" class="fa fa-male"></i> <span class="hidden-xs hidden-sm visible-md-*">м</span><span class="hidden-md hidden-lg">мужской</span>
        </label>
        <label class="btn btn-default">
          <input type="radio" name="sex" id="sex2" value="2">
          <i style="color:#9b59b6;" class="fa fa-female"></i> <span class="hidden-xs hidden-sm visible-md-*">ж</span><span class="hidden-md hidden-lg">женский</span>
        </label>
        </div> <!-- .btn-group -->
        <div class="col-xs-12 col-sm-12 visible-sm-block visible-xs-block">&nbsp;</div>
      </div>
      </div><!-- .group -->
      </div> <!-- .row -->
      <div class="row">
        <div class="group">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
              <label for="cityId">Место проживания</label>
              <select id="cityId" name="cityId" class="form-control">
                <option selected value="1">Санкт-Петербург</option>
              </select>
              </div> <!-- .form-group -->
              </div> <!-- .col-sm-4 -->
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="form-group">
                  <label for="region">Район проживания</label>
                  <input id="region" name="region" type="text" class="form-control" placeholder="Приморский район, проспект Королёва">
                  </div> <!-- .form-group -->
                  </div> <!-- .col-sm-4 -->
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="visa">Прописка<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
                      <select id="visa" name="visa" class="form-control" required>
                        <option label="&nbsp;"></option>
                        <option value="1">городская</option>
                        <option value="2">временная</option>
                        <option value="3">областная</option>
                        <option value="4">другой город</option>
                      </select>
                      </div> <!-- .form-group -->
                      </div> <!-- .col-sm-2 -->
                      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group"> <!-- Прикрутить классификатор стран -->
                            <label for="citizenship">Гражданство<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
                            <input id="citizenship" name="citizenship" type="text" class="form-control" placeholder="Российская Федерация" required>
                          </div>
                        </div>
                      </div> <!-- .group -->
                      </div> <!-- .row -->
                      <div class="row">
                        <div class="group">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                            <div class="form-group">
                              <label for="phone">Контактный телефон<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
                              <input id="phone" name="phone" type="tel" class="form-control" placeholder="+7 (812) 212 85 06" required>
                            </div>
                          </div>
                          
                        </div> <!-- .group -->
                        </div> <!-- .row -->
                      </div>
                    </div>
                    </div>