<?php

function prepareVariables($page, $action)
{

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params ['layout'] = 'layout';
    $session_id = session_id();

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
            $params['upload_message'] = getFormMessage($_GET['status']);
            break;

        case 'image':
            $id = (int)$_GET['id'];
            addLike($id);
            $params ['layout'] = 'gallery';
            $params['image'] = getOneImage($id);
            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;

        case 'catalog_item':
            doCatalogItemAction($action, $session_id);
            $id = (int)$_GET['id'];
            $catalog_item = getGatalogItem($id);
            $params['catalog_item'] = $catalog_item;
            $_GET['status'] = !$catalog_item ? 'error' : $_GET['status'];
            $status = $_GET['status'];
            $params['catalog_message'] = getCatalogMessage($status);

            break;

        case 'cart':
            $goods_id = $_POST['goods_id'];
            $params['cart'] = doCartAction($action, $session_id, $goods_id);
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
            $editableFeedback = getEditableFeedback($action);
            $params['feedbacks'] = getAllFeedback();
            $params['message'] = getFeedbackMessage();
            $params['editable_feedback'] = $editableFeedback;
            $params['name_submit'] = $editableFeedback ? 'Сохранить' : 'Добавить';
            $id = (int)$_GET['id'];
            $params['action'] = $editableFeedback ? "save/?id={$id}" : 'add/';
            break;

        default:
            echo "404";
            die();
    }

    return $params;
}