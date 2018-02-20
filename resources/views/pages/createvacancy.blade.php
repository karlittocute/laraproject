@extends ('layouts.layout')

@section('content')
    <form method="POST" action="/vacancy">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <h1>Добавление вакансии</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="alert alert-info" role="alert">
                        <p><strong>Внимание!</strong> Поля, помеченные знаком <sup><i class="fa fa-asterisk"
                                                                                      style="color: #c0392b;"></i></sup>,
                            являются обязательными для заполнения. <br/>
                            Если поле заполнено правильно, вы увидите <i class="fa fa-check"
                                                                         style="color: #2ecc71;"></i>, а если
                            неправильно, то <i class="fa fa-exclamation-triangle" style="color: #e67e22;"></i> внутри
                            соответствующего поля. Используйте клавишу <kbd>Tab</kbd> и <kbd>Shift + Tab</kbd> на
                            клавиатуре для перемещения по полям формы.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="boxed-group">
                        <div class="section-header">
                            <h3>Информация о вакансии</h3>
                        </div>
                        <div class="row"> <!-- .row -->
                            <div class="group"> <!-- .group -->
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label for="name">Название вакансии<sup><i class="fa fa-asterisk"
                                                                                   style="color: #c0392b;"></i></sup></label>
                                        <input id="name" name="name" class="form-control" type="text"
                                               placeholder="Инженер-проектировщик" autofocus required>
                                    </div> <!-- .form-group -->
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="place">Количество мест<sup><i class="fa fa-asterisk"
                                                                                  style="color: #c0392b;"></i></sup></label>
                                        <input id="place" name="place" type="number" min="1" max="999" type="number"
                                               step="1" class="form-control" value="1" required>
                                    </div>
                                </div>
                            </div><!-- .group -->
                        </div> <!-- .row -->
                    </div> <!-- .boxed-group -->
                </div> <!-- col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2  -->
            </div> <!-- .row -->

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="boxed-group">
                        <div class="section-header">
                            <h3>Требования к соискателю</h3>
                        </div>


                        <div class="row"> <!-- .row -->
                            <div class="group"> <!-- .group -->
                                <div class="col-sm-2">
                                    <label for="sex"></label> <sup><i
                                                class="fa fa-asterisk" style="color: #c0392b;"></i></sup>
                                    <div class="btn-group" role="group" aria-label="sex">
                                        <button name="sex" type="button" class="btn btn-default" value="1"><i
                                                    style="color:#2980b9;" class="fa fa-male"></i> м
                                        </button>
                                        <button name="sex" type="button" class="btn btn-default" value="2"><i
                                                    style="color:#9b59b6;" class="fa fa-female"></i> ж
                                        </button>
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="ageAny">Возраст от, до, не важно</label> <sup><i
                                                    class="fa fa-asterisk" style="color: #c0392b;"></i></sup>
                                        <input id="ageAny" name="ageAny" type="text" class="form-control" placeholder=""
                                               required>
                                    </div>
                                </div>
                            </div> <!-- .group -->
                        </div> <!-- .row -->

                        <div class="row">
                            <div class="group">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="education">Образование</label> <sup><i class="fa fa-asterisk"
                                                                                           style="color: #c0392b;"></i></sup>
                                        <input id="education" name="education" type="text" class="form-control"
                                               placeholder="высшее, н/высшее, ср.-специальное, среднее, не важно"
                                               required>
                                    </div>
                                </div>
                            </div> <!-- .group -->
                        </div> <!-- .row -->

                        <div class="row">
                            <div class="group">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="workExp">Опыт работы</label> <sup><i class="fa fa-asterisk"
                                                                                         style="color: #c0392b;"></i></sup>
                                        <input id="workExp" name="workExp" type="tel" class="form-control"
                                               placeholder="" required>
                                    </div>
                                </div>

                            </div> <!-- .group -->
                        </div> <!-- .row -->

                        <div class="row">
                            <div class="group">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="visa">Прописка</label> <sup><i class="fa fa-asterisk"
                                                                                   style="color: #c0392b;"></i></sup>
                                        <input id="visa" name="visa" type="text" class="form-control"
                                               placeholder="городская, областная, временная регистрация, другой город, не важно"
                                               required>
                                    </div>
                                </div>
                            </div> <!-- .group -->
                        </div> <!-- .row -->

                        <div class="row">
                            <div class="group">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <!-- Поменять перевод на "Навык владения ПК" -->
                                        <label for="pcLevel" ></label>
                                        <select name="pcLevel" id="pcLevel" class="form-control">
                                            <option value="0" selected>&nbsp;</option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                            <option value="4"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="eduSpec">Сфера образования</label> <sup><i class="fa fa-asterisk"
                                                                                               style="color: #c0392b;"></i></sup>
                                        <input id="eduSpec" name="eduSpec" type="text" class="form-control"
                                               placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row"> <!-- .row, notes  -->
                            <div class="group">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="notes">Примечания</label> <sup><i class="fa fa-asterisk"
                                                                                      style="color: #c0392b;"></i>
                                            <textarea id="notes" name="notes" class="form-control" rows="3" required></textarea>
                                    </div> <!-- .form-group -->
                                </div> <!-- .col-sm-12 -->
                            </div> <!-- .group -->
                        </div> <!-- .row -->


                    </div> <!-- .boxed-group -->
                </div> <!-- col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2  -->
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="boxed-group">
                        <div class="row">
                            <div class="group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <p class="text-center">
                                        <small>
                                            Нажимая кнопку &laquo;Добавить вакансию&raquo;, Вы&nbsp;соглашаетесь с&nbsp;<a
                                                    href="#">правилами использования сервиса</a> и&nbsp;подтверждаете,
                                            что форма заполнена
                                            <mark>правильно</mark>
                                            , а&nbsp;информация в&nbsp;ней&nbsp;&mdash;
                                            <mark>достоверна</mark>
                                            .
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <button type="submit" id="submitResume" name="submitResume" type="button"
                                            class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i>
                                        <span>Добавить вакансию</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
