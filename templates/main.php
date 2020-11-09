<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
    <div class="popular container">
        <div class="popular__filters-wrapper">
            <div class="popular__sorting sorting">
                <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
                <ul class="popular__sorting-list sorting__list">
                    <li class="sorting__item sorting__item--popular">
                        <a class="sorting__link sorting__link--active" href="#">
                            <span>Популярность</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="sorting__link" href="#">
                            <span>Лайки</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="sorting__link" href="#">
                            <span>Дата</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="popular__filters filters">
                <b class="popular__filters-caption filters__caption">Тип контента:</b>
                <ul class="popular__filters-list filters__list">
                    <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
<a class="filters__button filters__button--ellipse filters__button--all <?php if (!$type): ?><?= $button_class; ?> <?php endif; ?> " href="/">
                            <span>Все</span>
                        </a>
                    </li>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--photo button <?php if ($type == "photo"):?><?=$button_class;?><?php endif;?>" href="/?type=photo">
                            <span class="visually-hidden"><?=$types_content[3]['name_type']?></span>
                            <svg class="filters__icon" width="22" height="18">
                                <use xlink:href="#icon-filter-photo"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--video button <?php if ($type == "video"):?><?=$button_class;?><?php endif;?>" href="/?type=video">
                            <span class="visually-hidden"><?=$types_content[0]['name_type']?></span>
                            <svg class="filters__icon" width="24" height="16">
                                <use xlink:href="#icon-filter-video"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--text button <?php if ($type == "text"):?><?=$button_class;?><?php endif;?>" href="/?type=text">
                            <span class="visually-hidden"><?=$types_content[2]['name_type']?></span>
                            <svg class="filters__icon" width="20" height="21">
                                <use xlink:href="#icon-filter-text"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--quote button <?php if ($type == "quote"):?><?=$button_class;?><?php endif;?>" href="/?type=quote">
                            <span class="visually-hidden"><?=$types_content[4]['name_type']?></span>
                            <svg class="filters__icon" width="21" height="20">
                                <use xlink:href="#icon-filter-quote"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--link button<?php if ($type == "link"):?><?=$button_class;?><?php endif;?>" href="/?type=link">
                            <span class="visually-hidden"><?=$types_content[1]['name_type']?></span>
                            <svg class="filters__icon" width="21" height="18">
                                <use xlink:href="#icon-filter-link"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="popular__posts">
        <?php foreach ($popular_posts as $post): ?>
            <article class="popular__post post <?=$post['name_class_icons'];?>">
                <header class="post__header">
                    <h2><a href = "/post.php?id=<?= $post['id']; ?>"><?=filter_text($post['title']);?></a></h2>
                </header>
                <div class="post__main">
                    <?php if($post['name_class_icons'] === 'post-quote'): ?>
                <blockquote>
                    <p>
                        <?=filter_text($post['content_text']);?>
                    </p>
                    <cite><?=filter_text($post['author_quotes']);?></cite>
                </blockquote>
                    <?php elseif($post['name_class_icons'] === 'post-text'): ?>
                        <p><?=format_text(filter_text($post['content_text']));?></p>
                    <?php elseif($post['name_class_icons'] === 'post-photo'): ?>
                        <div class="post-photo__image-wrapper">
                        <img src="img/<?=$post['picture'];?>" alt="Фото от пользователя" width="360" height="240">
                        </div> 
                    <?php elseif($post['name_class_icons'] === 'post-link'): ?> 
                        <div class="post-link__wrapper">
                        <a class="post-link__external" href="http://" title="Перейти по ссылке">
                        <div class="post-link__info-wrapper">
                            <div class="post-link__icon-wrapper">
                                <img src="https://www.google.com/s2/favicons?domain=vitadental.ru" alt="Иконка">
                            </div>
                            <div class="post-link__info">
                                <h3><?=filter_text($post['title']);?></h3>
                            </div>
                        </div>
                        <span><?=filter_text($post['href']);?></span>
                    </a>
                         </div>   
                    <?php endif; ?>
                </div>
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="<?=format_date($post['post_time'])?>">
                            <div class="post__avatar-wrapper">
                                <img class="post__author-avatar" src="img/<?=$post['avatar'];?>" alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><?=$post['login'];?></b>
                                <time class="post__time" datetime="<?=$post['post_time'];?>"><?= post_time($post['post_time'], $unit_of_time);?></time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        <?php endforeach; ?>
    </div>
</div> 
 