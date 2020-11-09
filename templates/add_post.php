      <div class="page__main-section">
        <div class="container">
          <h1 class="page__title page__title--adding-post">Добавить публикацию</h1>
        </div>
        <div class="adding-post container">
          <div class="adding-post__tabs-wrapper tabs">
            <div class="adding-post__tabs filters">
              <ul class="adding-post__tabs-list filters__list tabs__list">
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--photo filters__button--active tabs__item tabs__item--active button">
                    <svg class="filters__icon" width="22" height="18">
                      <use xlink:href="#icon-filter-photo"></use>
                    </svg>
                    <span><?= $types_of_content[2]['name_type'] ?></span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--video tabs__item button" href="#">
                    <svg class="filters__icon" width="24" height="16">
                      <use xlink:href="#icon-filter-video"></use>
                    </svg>
                    <span><?= $types_of_content[4]['name_type'] ?></span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--text tabs__item button" href="#">
                    <svg class="filters__icon" width="20" height="21">
                      <use xlink:href="#icon-filter-text"></use>
                    </svg>
                    <span><?= $types_of_content[1]['name_type'] ?></span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--quote tabs__item button" href="#">
                    <svg class="filters__icon" width="21" height="20">
                      <use xlink:href="#icon-filter-quote"></use>
                    </svg>
                    <span><?= $types_of_content[0]['name_type'] ?></span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--link tabs__item button" href="#">
                    <svg class="filters__icon" width="21" height="18">
                      <use xlink:href="#icon-filter-link"></use>
                    </svg>
                    <span><?= $types_of_content[3]['name_type'] ?></span>
                  </a>
                </li>
              </ul>
            </div>

            <div class="adding-post__tab-content">
              <section class="adding-post__photo tabs__content tabs__content--active">
                <h2 class="visually-hidden">Форма добавления фото</h2>
                <form class="adding-post__form form" name="form_photo" action="/add.php" method="POST" enctype="multipart/form-data">
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-heading" type="text" name="title" placeholder="Введите заголовок">
                          <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
                          <div class="form__error-text">
                            <h3 class="form__error-title">Заголовок сообщения</h3>
                            <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                          </div>
                        </div>
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-url">Ссылка из интернета</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-url" type="text" name="href" placeholder="Введите ссылку">
                          <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
                          <div class="form__error-text">
                            <h3 class="form__error-title">Заголовок сообщения</h3>
                            <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                          </div>
                        </div>
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-tags" type="text" name="name_hashtags" placeholder="Введите теги">
                          <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
                          <div class="form__error-text">
                            <h3 class="form__error-title">Заголовок сообщения</h3>
                            <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form__invalid-block">
                      <b class="form__invalid-slogan">Пожалуйста, исправьте следующие ошибки:</b>
                      <ul class="form__invalid-list">
                        <li class="form__invalid-item">Заголовок. Это поле должно быть заполнено.</li>
                      </ul>
                    </div>
                  </div>
                  <div class="adding-post__input-file-container form__input-container form__input-container--file">
                    <div class="adding-post__input-file-wrapper form__input-file-wrapper">
                      <div class="adding-post__file-zone adding-post__file-zone--photo form__file-zone dropzone">
                        <input type="file" name="image">
                        <div class="form__file-zone-text">
                          <span>Перетащите фото сюда</span>
                        </div>
                      </div>
                      <button class="adding-post__input-file-button form__input-file-button form__input-file-button--photo button" type="button">
                        <span>Выбрать фото</span>
                        <svg class="adding-post__attach-icon form__attach-icon" width="10" height="20">
                          <use xlink:href="#icon-attach"></use>
                        </svg>
                      </button>
                    </div>
                    <div class="adding-post__file adding-post__file--photo form__file dropzone-previews">

                    </div>
                  </div>
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="/add.php">Закрыть</a>
                  </div>
                </form>
              </section>

            
            </div>
          </div>
        </div>
      </div>

      <form name="signup" method="POST" action="add.php" enctype="multipart/form-data">
  <label>E-mail: <input type="text" name="email"></label>
  <label>Логин: <input type="text" name="login"></label>
  <input type="file" name="test">
  <input type="submit" name="send" value="Отправить">
</form>
