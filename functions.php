<?php
/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template($name, array $data = [])
{
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
// Функция, которая обрезает текст и добавляет ссылку, если текста больше чем 300 символов
function format_text($string, $simbols = 300) {
    $words = explode(" ", $string);
    foreach ($words as $word) {
        $word_simbols = strlen(utf8_decode($word));
        $summary_simbols = $summary_simbols + $word_simbols;
        if ($summary_simbols <= $simbols) {
            $formatted_text[] = $word;
        }
        else {   
        break;
        }   
    };
    $formatted_text = implode(" ", $formatted_text);
    if ($summary_simbols > $simbols) {
        $formatted_text = "<p>{$formatted_text}...</p>" . '<a class="post-text__more-link" href="#">Читать далее</a>';
    }
    else {
        $formatted_text = "<p>$formatted_text</p>";
    }
            return $formatted_text;       
    };
    // Функция, которая вырезает все теги
    function filter_text($string) {
        $text = strip_tags($string);

        return $text;
    }
