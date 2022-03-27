<?php

function prepareVariables($page, $action)
{

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params ['layout'] = 'layout';

    switch ($page){
        case 'index':
            $params['name'] = 'Вася';
            break;

        case 'news':
            $params['news'] = getNews();

            break;

        case 'onenews':
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;

        case 'gallery':

            if (isset($_POST['load'])) {
                loadImage();
            }

            $params ['layout'] = 'gallery';
            $params['gallery'] = getGallery(IMG_BIG);
            // $params['message'] = $messages[$_GET['status']];
            break;

        case 'image':
            $id = (int)$_GET['id'];
            var_dump($id);
            $params ['layout'] = 'gallery';
            $params['image'] = getImage($id);
            break;

        case 'catalog':
            $params['catalog'] = [
                [
                    'name' => 'Пицца',
                    'price' => 24
                ],
                [
                    'name' => 'Чай',
                    'price' => 1
                ],
                [
                    'name' => 'Яблоко',
                    'price' => 12
                ],
            ];
            break;

        case 'apicatalog':
            $params['catalog'] = [
                [
                    'name' => 'Пицца',
                    'price' => 24
                ],
                [
                    'name' => 'Чай',
                    'price' => 1
                ],
                [
                    'name' => 'Яблоко',
                    'price' => 12
                ],
            ];
            echo json_encode($params, JSON_UNESCAPED_UNICODE);
            exit;

        case 'feedback':
            doFeedbackAction($action);
            $params['feedback'] = getAllFeedback();
            break;

        default:
            echo "404";
            die();
    }

    return $params;
}