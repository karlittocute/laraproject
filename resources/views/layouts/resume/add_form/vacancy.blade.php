<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div class="boxed-group">
      <div class="section-header">
        <h3>Желаемая вакансия</h3>
      </div>
      <div class="row">
        <div class="group">
          <div class="col-xs-12 col-sm-9 col-md-9">
            <div class="form-group">
              <label for="vacancy">Должность<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label> 
              <input id="vacancy" name="vacancy" class="form-control" placeholder="Менеджер по продажам" required>
            </div>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
              <!-- если зарплата договорная, можно поставить 0 -->
              <label for="salary">Зарплата в месяц<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
              <div class="input-group">
                <span class="input-group-addon">от</span>
                <input id="salary" name="salary" min="0" max="1000000" type="number" step="100" class="form-control" required>
                <span class="input-group-addon">&#8381;</span>
              </div>
            </div>
          </div>
          </div><!-- .group -->
          </div><!-- .row -->
          <div class="row">
            <div class="group">
              <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
                <div class="form-group">
                  <label for="vacancyField">Поместить в раздел<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
                  <select id="vacancyField" name="vacancyField" class="form-control" required>
                    <option label="&nbsp;"></option>
                    <option value="1">Другое</option>
                    <option value="2">Директора, управляющие</option>
                    <option value="3">Экономика, бухгалтерия</option>
                    <option value="4">Менеджмент</option>
                    <option value="5">Тяжелая промышленность, машиностроение</option>
                    <option value="6">Легкая промышленность</option>
                    <option value="6">Пищевая промышленность</option>
                    <option value="8">Деревообрабатывающая промышленность</option>
                    <option value="9">Издательство, полиграфия</option>
                    <option value="10">Радиотехника, электроника</option>
                    <option value="11">Энергетика</option>
                    <option value="12">Информационные технологии</option>
                    <option value="13">Строительство, архитектура</option>
                    <option value="14">Гидрометеорология, экология</option>
                    <option value="15">Химия, фармация</option>
                    <option value="16">Медицина, ветеринария</option>
                    <option value="17">Торговля, сфера обслуживания</option>
                    <option value="18">Педагогика, психология</option>
                    <option value="19">Юриспруденция, нотариат</option>
                    <option value="20">Дизайн, художники, оформители</option>
                    <option value="21">Филология, социология</option>
                    <option value="22">Транспорт</option>
                  </select>
                  </div> <!-- .form-group -->
                  </div> <!-- .col-sm-12 -->
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <label for="work">Опыт<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
                      <select id="work" name="work" class="form-control" required>
                        <option label="&nbsp;"></option>
                        <option value="1">меньше года</option>
                        <option value="2">больше года</option>
                        <option value="3">больше 2 лет</option>
                        <option value="4">больше 3 лет</option>
                        <option value="5">больше 5 лет</option>
                        <option value="6">больше 10 лет</option>
                        <option value="7">больше 20 лет</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <label for="busy">Занятость</label>
                      <select id="busy" name="busy" class="form-control">
                        <option label="любая"></option>
                        <option value="1">полная</option>
                        <option value="2">неполная</option>
                        <option value="3">сезонная</option>
                        <option value="4">практика для студентов</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="group">
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                    <div class="form-group">
                      <label for="schedule">График работы<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label> 
                      <select id="schedule" name="schedule" class="form-control" required>
                        <option label="&nbsp;"></option>
                        <option value="1">любой</option>
                        <option value="2">полный день</option>
                        <option value="3">сменный график</option>
                        <option value="4">гибкий график</option>
                      </select>
                      </div> <!-- .form-group -->
                      </div> <!-- .col-sm-3 -->
                      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
                        <div class="form-group">
                          <label for="schedulespecial">Уточнение графика работы</label>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <input id="schedulespecial" name="schedulespecial" type="checkbox" aria-label="">
                            </span>
                            <input id="scheduleText" name="scheduleText" type="text" class="form-control" aria-label="" placeholder="опишите лаконично особенности графика работы">
                            </div><!-- /input-group -->
                          </div>
                      </div><!-- /.col-lg-6 -->
                        </div>
                        </div> <!-- .row -->
                        <div class="row"> <!-- last-row -->
                        <div class="group">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                              <label for="workExp">Опыт работы</label>
                              <textarea id="workExp" name="workExp" class="form-control" rows="3" placeholder="Для описания лучше всего использовать хронологический порядок и начинать с последнего места работы. Пример: [11.2014] - ООО &laquo;Интерстеллар&raquo;, менеджер по персоналу, подбор специалистов для участия в межгалактическом перелёте."></textarea> <!-- в хронологическом порядке (как правило, обратном, начиная с последнего места работы) -->
                              </div> <!-- .form-group -->
                              </div> <!-- .col-sm-12 -->
                              </div> <!-- .group -->
                              </div> <!-- .row -->
                              </div>  <!--.boxed-group -->
                            </div>
                            </div> <!-- .row -->