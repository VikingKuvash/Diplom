<!DOCTYPE html>
<html lang="ru" data-ng-app="profile">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $pageData['title']; ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/style-lg.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
        integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</head>
<body>
  <header class="header">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="header__menu menu">
          <a href="#" class="menu__logo"><img src="/images/logo.png" alt="Логотип" /></a>
          <div class="menu__burger">
            <span></span>
          </div>
          <nav class="menu__body">
            <ul class="menu__list">
              <li class="menu__item">
                <a href="/templates/main.html" class="menu__link">Главная</a>
              </li>
              <li class="menu__item">
                <a href="#" class="menu__link">Мероприятия</a>
              </li>
              <li class="menu__item">
                <a href="#" class="menu__link">Новости</a>
              </li>
              <li class="menu__item">
                <a href="#" class="menu__link">Информация</a>
              </li>
              <?php if ($_SESSION ['users']!=''){ ?>
              <li class="menu__item menu__item--in">
                <a class="menu__link" href="#">Вход</a>
              </li>
              <? } else { ?>
              <li class="menu__item menu__item--in">
                <a class="menu__link" href="/cabinet">Профиль</a>
              </li>
              <? } ?>
              <?php if($_SESSION['users']!=''){ ?> 
              <li class="menu__item menu__item--reg">
                <a class="menu__link" href="#">Регистрация</a>
              </li>
              <? } else { ?>
              <li class="menu__item menu__item--reg">
                <a class="menu__link" href="/cabinet/logout">Выход</a>
              </li>
              <? } ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
  <section class="events">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="events__path breadcrumb">
            <nav class="breadcrumb__nav" aria-label="breadcrumb">
              <ul class="breadcrumb__list">
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Личный кабинет</a></li>
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Пользователь</a></li>
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Профиль</a></li>
                <span class="breadcrumb__item breadcrumb__item--active" aria-current="page">Редактирование профиля</span>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
          <div class="events__user-block user-block">
            <div class="user-block__header">
              <div class="user-block__img-border">
                <a class="user-block__link" href="#"><img class="user-block__icon" src="/images/user-icon.svg"
                    alt="..." /></a>
              </div>
              <div class="user-block__name"><?php echo $pageData ['userInfo']['login'];?></div>
            </div>
            <div class="user-block__menu">
              <a href="/cabinet" class="user-block__button" >
                Профиль
              </a>
              <a href="/cabinet/profile" class="user-block__button" >
                Редактирование профиля
              </a>
              <a href="/cabinet/applications" class="user-block__button">
                Подать заявку на участие
              </a>
              <a href="/cabinet/AOP" class="user-block__button">
                Заявки на участие
              </a>
              <a href="#" class="user-block__button">
                Уведомления
              </a>
              <?php 
                if ($_SESSION['role_id'] == 1)
                echo " <a href=',' class='user-block__button'>
                Привет админ!
              </a>";
              ?>
              <a href="/cabinet/logout"class="user-block__button">
                Выход
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9" >
          <div class="events__pl">
            <div class="events__pl-head pl-head">
              <img class="pl-head__img" src="/images/settings-icon.svg" alt="..." />
              <div class="pl-head__title">Пользователь</div>
            </div>
            <div class="row">
              <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                <div class="events__icon">
                  <div class="events__account-icon">
                    <img class="events__account-img" src="/images/user-bigicon.svg" alt="..." />
                  </div>
                </div>
              </div>
              <div class="col-8 col-sm-6 col-md-8 col-lg-9 col-xl-10 align-self-center">
                <div class="events__group-id">
                  <div class="events__initials">
                    <?php 
                    // echo  $_SESSION['fullName'];
                      echo $pageData['userInfo'] ['fullName'];
                    ?>
                  </div>
                  <div class="events__nickname"><?php echo $pageData['userInfo']['login'];?></div>
                </div>
              </div>
            </div>
            <div class="row" data-ng-controller="profileController">
            <form id="form-settings" class="form-settings" method="POST"  data-ng-submit="updateUserData()">
                <br>
                  <input class="form-settings__input"  type="hidden" id="id" name="id" data-ng  model="userId" value="<?php echo $pageData ['userInfo'] ['id'] ?>"  />
                    <div class="form-settings__field">
                      <label class="form-settings__name">ФИО:</label>
                      <input class="form-settings__input" id="newfullName" type="text" name="newfullName" value=""
                        placeholder="Введите без сокращений" data-ng-model="newfullName" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Телефон (номер):</label>
                      <input class="form-settings__input" id="newphone" type="tel" name="newphone" value=""
                        placeholder="Введите свой телефоный номер" data-ng-model="newphone" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Страна:</label>
                      <input class="form-settings__input" id="newcountry" type="text" name="newcountry"
                        placeholder="Введите свою страну" data-ng-model="newcountry" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Область:</label>
                     <input class="form-settings__input" id="newregion" type="text" name="newregion" value=""
                        placeholder="Введите свою область" data-ng-model="newregion" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Город</label>
                      <input class="form-settings__input" id="newcity" type="text" name="newcity" value=""
                        placeholder="Введите свой город" data-ng-model="newcity" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name" >Образовательное учреждение:</label>
                      <input class="form-settings__input" id="newinstitution" type="text" name="newinstitution" value=""
                        placeholder="Введите свой город" data-ng-model="newinstitution" />
                    </div>
                    <div class="form-settings__button button">
                      <button class="button__save" type="submit">Сохранить</button>
                      <button class="button__cancel" type="reset"> Отмена</button>
                    </div>
                  </form>
              <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6">
                <div class="events__form">
                  <h4>Мой аккаунт</h4> 
                  <form id="form-settings" class="form-settings" method="POST" data-ng-submit="saveProfileData()" >
                    <div class="form-settings__field">
                    <input type="hidden" name="userId" id="userId" value="<?php echo $pageData['userInfo']['id']?>"
                    </div>
                    <fieldset>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Логин:</label>
                      <input class="form-settings__input" id="login" type="text" name="login" 
                        placeholder="Логин" value="<?php  echo $pageData['userInfo']['login'] ?>" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Почта (Email):</label>
                      <input class="form-settings__input" id="email" type="email" name="email" 
                        placeholder="Email" value="<?php echo $pageData['userInfo']['email']  ?>" />
                    </div>
                    <div class="form-settings__button button">      
                      <button type="submit" class="button__save">Сохранить</button>
                    </div>
                  </fieldset>
                  </form>
                  <div class="events__form">
                  <h4>Смена пароля</h4>
                  <form id="form-settings" class="form-settings" method="POST" data-ng-submit="updatePassword()" >
                    <div class="form-settings__field">
                    <input type="hidden" name="userId" id="userId" value="<?php echo $pageData['userInfo']['id']?>"
                    </div>
                    <fieldset>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Новый пароль:</label>
                      <input class="form-settings__input"  placeholder="Введите пароль"  
                       data-ng-model="newpass" required="true" type="password" id="newpass" name="newpass" />
                    </div>
                    <div class="form-settings__field">
                      <label class="form-settings__name">Павторите пароль:</label>
                      <input class="form-settings__input" placeholder="Повторите пароль"
                      data-ng-model="repeatpass" required="true" type="password" id="repeatPass" name="repeatPass" />
                    </div>
                    <div class="form-settings__button button">      
                      <button type="submit" class="button__save" id="updates" name="update" >Обновить</button>
                    </div>
                </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
  <footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="footer__card">
          <div class="card-left">
            <div class="card-left__card-header">
              <div class="card-left__title">Важные ссылки</div>
            </div>
            <div class="card-left__body">
              <ul class="card-left__links">
                <li class="card-left__item">
                  <a class="card-left__link" href="#">Главная</a>
                </li>
                <li class="card-left__item">
                  <a class="card-left__link" href="#">Новости</a>
                </li>
                <li class="card-left__item">
                  <a class="card-left__link" href="#">Мероприятия</a>
                </li>
                <li class="card-left__item">
                  <a class="card-left__link" href="#">Сайт СГУГиТ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer__social-bar">
          <a class="footer__social-link footer__social-link--vk" type="button">
            <i class="fab fa-vk"></i>
          </a>
          <a class="footer__social-link footer__social-link--fab" type="button">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a class="footer__social-link footer__social-link--tw" type="button">
            <i class="fab fa-twitter"></i>
          </a>
          <a class="footer__social-link footer__social-link--od" type="button">
            <i class="fab fa-odnoklassniki"></i>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="footer__card">
          <div class="card-right">
            <div class="card-right__card-header">
              <div class="card-right__card-title">Обратная связь</div>
            </div>
            <div class="card-right__card-body">
              <div class="card-right__card-text">
                <div class="card-right__text-item">
                  <span class="card-right__text-title">Номер:</span>(383) 343-93-22
                </div>
                <div class="card-right__text-item">
                  <span class="card-right__text-title">e-mail:</span>info.sgugit@mail.ru
                </div>
                <div class="card-right__text-item">
                  <span class="card-right__text-title">Адрес:</span>г. Новосибирск, ул. Плахотного 10
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__copyright">
    <div class="footer__copyright-text">
      1994 - 2019. Сибирский государственный университет геосистем и
      технологий
    </div>
  </div>
</footer>
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

<!-- Angular -->
<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.js"></script>
<script src="../js/admin/app.js"></script>
<script src="../js/profile.js"></script>

<!-- FancyBox -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<!-- js -->
<script src="../js/main.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/jquery.bcSwipe.min.js"></script>
</body>

</html>

