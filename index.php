<?php

define('GRAPHENE_RENDER', true);
/*startInstall*/

if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/')) {
    mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/');

    file_put_contents('router.php', "<?php

return [
    [
        'url' => '/',
        'name' => 'Главная',
        'code' => 'Main',
    ],
    [
        'url' => '/about',
        'name' => 'О нас',
        'code' => 'About',
    ],
    [
        'url' => '/news',
        'name' => 'Новости',
        'code' => 'News',
    ],
    [
        'url' => '/news/:code',
        'name' => 'Новости',
        'code' => 'NewsDetail',
    ],
    [
        'url' => '/contacts',
        'name' => 'Контакты',
        'code' => 'Contacts',
    ]
];");

    $routes = include 'router.php';

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '.htaccess')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/.htaccess', '
RewriteEngine On
RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php [L,QSA]');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.css')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.css', '.App {
    
}');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.js')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.js', 'let App = {

    init: function () {

    }

}

document.addEventListener(\'DOMContentLoaded\', function () {

    App.init();

});');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.php')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/App.php', '<?php
defined(\'GRAPHENE_RENDER\') or die;

import(\'/basic-view/resources/extensions/reset/reset.css\');
import(\'/basic-view/resources/fonts/fonts.css\');
import(\'/basic-view/App.css\');
import(\'/basic-view/App.js\');

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= title() ?></title>
</head>
<body>
<div class="App">

    <nav>
        <?php foreach (topMenu() as $item) { ?>
            <a href="<?= $item[\'link\'] ?>">
                <?= $item[\'title\'] ?>
            </a>
        <?php } ?>
    </nav>

    #content#
</div>
</body>
</html>

');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/static/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/static/');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/');
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/fonts.css', '');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/reset/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/reset/');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/reset/reset.css')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/extensions/reset/reset.css', 'html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
    display: block;
}
body {
    line-height: 1;
}
ol, ul {
    list-style: none;
}
blockquote, q {
    quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
    content: "";
    content: none;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}');
    }


    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/resources/img/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/resources/img/');
    }

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/resources/css/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/resources/css/');
    }


    $installFile = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/index.php');

    $res = explode(base64_decode('LypzdGFydEluc3RhbGwqLw=='), $installFile)[1];

    $res = explode(base64_decode('LyplbmRJbnN0YWxsKi8='), $res)[0];

    $installFile = strtr($installFile, [$res => '', base64_decode('LypzdGFydEluc3RhbGwqLw==') => '', base64_decode('LyplbmRJbnN0YWxsKi8=') => '']);

    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/index.php', $installFile);

}

/*endInstall*/
class GrapheneRender
{

    private $route = [];
    private $pageHtml = '';
    private $viewHtml = '';

    public function render()
    {

        $routes = include 'router.php';

        $this->createRoutes($routes);

        $this->route = $this->getRoute($routes);

        $this->pageHtml = $this->renderPageHtml();

        $this->viewHtml = $this->renderView();

        $this->renderAddCssJs();

        exit($this->viewHtml);

    }

    private function renderAddCssJs()
    {

        if ($this->route['code']) {

            $cacheKey = mb_strtolower($this->route['code']);

            $cssFile = '/graphene-render/cache/static/' . $cacheKey . '.css';
            $jsFile = '/graphene-render/cache/static/' . $cacheKey . '.js';

            $css = '';
            $js = '';

            $global = [];
            $local = [];

            foreach ($GLOBALS['GRAPHENE_RENDER']['import'] as $src) {

                $src = '--/' . $src;

                $src = strtr($src, ['--//' => '/']);
                $src = strtr($src, ['--/' => '/']);

                if (strstr($src, '/pages/')) {
                    $local[] = $src;
                } else {
                    $global[] = $src;
                }

            }

            if ($global) {
                foreach ($global as $res) {

                    if (strstr($res, '.css')) {
                        $css .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
                    }

                    if (strstr($res, '.js')) {
                        $js .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
                    }

                }
            }

            if ($local) {
                foreach ($local as $res) {

                    if (strstr($res, '.css')) {
                        $css .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
                    }

                    if (strstr($res, '.js')) {
                        $js .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
                    }

                }
            }

            $css = trim($css);
            $js = trim($js);

            $verCss = md5($css);
            $verJs = md5($js);

            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $cssFile, $css);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $jsFile, $js);

            $replace['</head>'] = '    <link type="text/css" rel="stylesheet" href="' . $cssFile . '?ver=' . $verCss . '"/>' . PHP_EOL . '</head>';
            $replace['</body>'] = '<script type="text/javascript" src="' . $jsFile . '?ver=' . $verJs . '"></script>' . PHP_EOL . '</body>';
            $this->viewHtml = strtr(
                $this->viewHtml,
                $replace
            );

        }

    }

    private function renderView()
    {
        $extend = extend();

        $appView = $_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $extend . '/App.php';

        if (!file_exists($appView)) {
            return false;
        }

        ob_start();
        include $appView;
        $html = ob_get_contents();
        ob_end_clean();

        $html = strtr($html, ['#content#' => $this->pageHtml]);

        return $html;

    }

    private function renderPageHtml()
    {

        if (!file_exists($this->route['page']['component'])) {
            return false;
        }

        ob_start();
        include $this->route['page']['component'];
        $html = ob_get_contents();
        ob_end_clean();

        return $html;

    }

    private function getRoute($routes)
    {
        $url = explode('?', $_SERVER['REQUEST_URI'])[0];

        $dataRoute = [];

        foreach ($routes as $route) {
            if ($route['url'] == $url) {
                $dataRoute = $route;
                break;
            }
        }

        $pageSrc = '/graphene-render/pages/' . $dataRoute['code'] . '/';

        $dataRoute['page'] = [
            'title' => $dataRoute['name'],
            'src' => $pageSrc,
            'path' => $_SERVER['DOCUMENT_ROOT'] . $pageSrc,
            'cssStyles' => $pageSrc . $dataRoute['code'] . '.css',
            'jsScripts' => $pageSrc . $dataRoute['code'] . '.css',
            'component' => $_SERVER['DOCUMENT_ROOT'] . $pageSrc . $dataRoute['code'] . '.php',
        ];

        return $dataRoute;
    }

    private function createRoutes($routes)
    {

        foreach ($routes as $route) {
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/' . $route['code'] . '.php')) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/');
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/resources/');
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/resources/img/');
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/' . $route['code'] . '.php', '<?php
defined(\'GRAPHENE_RENDER\') or die;

import(\'/pages/' . $route['code'] . '/' . $route['code'] . '.css\');
import(\'/pages/' . $route['code'] . '/' . $route['code'] . '.js\');

$data = controller(function () {

    setMeta(
        [
            \'title\' => \'' . $route['name'] . '\',
            \'description\' => \'' . $route['name'] . '\',
            \'h1\' => \'' . $route['name'] . '\',
        ]
    );

    return [];

});


?>

<?php extend(\'basic-view\'); ?>

<div class="Contacts">
    <h1><?= meta(\'h1\') ?></h1>
</div>

        ');
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/' . $route['code'] . '.css', '.' . $route['code'] . ' {
                
}');
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/pages/' . $route['code'] . '/' . $route['code'] . '.js', 'let ' . $route['code'] . ' = {

    init: function () {

    }

}

document.addEventListener(\'DOMContentLoaded\', function () {

    ' . $route['code'] . '.init();

});');
            }
        }
    }
}

function topMenu()
{
    $routes = include 'router.php';

    $arData = [];

    foreach ($routes as $route) {

        if (strstr($route['url'], ':')) {
            continue;
        }

        $arData[] = [
            'title' => $route['name'],
            'link' => $route['url'],
        ];
    }

    return $arData;
}

function extend($view = '')
{
    if ($view) {
        $GLOBALS['GRAPHENE_RENDER']['extend'] = $view;
    } else {
        return $GLOBALS['GRAPHENE_RENDER']['extend'];
    }
}

function title($title = false)
{
    if ($title) {
        $GLOBALS['GRAPHENE_RENDER']['title'] = $title;
    } else {
        return $GLOBALS['GRAPHENE_RENDER']['title'];
    }
}

function description($description = '')
{
    if ($description) {
        $GLOBALS['GRAPHENE_RENDER']['description'] = $description;
    } else {
        return $GLOBALS['GRAPHENE_RENDER']['description'];
    }
}

function setMeta($meta)
{
    title($meta['title']);
    description($meta['description']);
    $GLOBALS['GRAPHENE_RENDER']['meta'] = $meta;
}

function meta($key)
{
    return $GLOBALS['GRAPHENE_RENDER']['meta'][$key];
}

function controller($do)
{
    $res = $do();

    return $res;
}

function import($src)
{
    $GLOBALS['GRAPHENE_RENDER']['import'][md5($src)] = $src;
}

$app = new GrapheneRender();

$app->render();
