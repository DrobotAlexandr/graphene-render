<?php

const GRAPHENE_RENDER = 1.0;

/*
 * GRAPHENE-RENDER
 * Расширение платформы GRAPHENE
 * Обеспечивает умный рендеринг web-страниц
 * Работает со статикой css+js
 * Обеспечивает молниеносную отдачу html благодаря статическому пре-рендеру
 */

$app = new GrapheneRender();

$app->extractPageFromCache();

$app->render();

$app->saveHtmlCache();

$app->saveHtmlCache();

/*startInstall*/

/*
 * Код для развертывания расширения
 * После установки код будет удален из расширения
 * Установка происходит на лету, после запуска index.php
 */

if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/')) {
    mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/');
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/gitignore', '.idea
graphene-render/cache
');
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
    ],
    [
        'url' => '/404',
        'name' => 'Ошибка 404',
        'code' => 'NotFound',
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
import(\'/basic-view/resources/css/ui.css\');
import(\'/basic-view/App.css\');
import(\'/basic-view/App.js\');

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= title() ?></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
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
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/css/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/css/');
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/css/ui.css', '');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/');
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/fonts/fonts.css', '');
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/img/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/basic-view/resources/img/');
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

/*
 * Основной класс для работы с расширением
 * Вся работа по сборке и рендеренгу проводится в классе GrapheneRender
 */

class GrapheneRender
{
    private $route = [];
    private $pageHtml = '';
    private $viewHtml = '';
    private $htmlCacheKey = '';
    private $isGrapheneReStaticRequest = false;
    private $pageVersion = '';

    public function __construct()
    {
        $this->checkReStaticRequest();
        $this->setHtmlCacheKey();
    }

    public function render()
    {

        $routes = include 'router.php';

        $this->createRoutes($routes);

        $this->route = $this->getRoute($routes);

        $this->setRoute();

        $this->pageHtml = $this->renderPageHtml();

        $this->viewHtml = $this->renderView();

        $this->renderAddCssJs();

        $this->versionManager();

        $this->optimizeHtml();

        if (!$this->isReStaticRequest()) {
            echo $this->viewHtml;
        }

    }

    private function checkReStaticRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GRAPHENE-RE-STATIC') {
            $this->isGrapheneReStaticRequest = true;
        }
    }

    private function isReStaticRequest()
    {
        return $this->isGrapheneReStaticRequest;
    }

    public function extractPageFromCache()
    {

        if ($this->isReStaticRequest()) {
            return false;
        }

        if ($this->isLocal()) {
            return false;
        }

        $cacheKey = $this->getCacheKey();

        $pageCacheFile = $_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/pages/' . $cacheKey . '.php';

        if (file_exists($pageCacheFile)) {
            include $pageCacheFile;
            exit(PHP_EOL . PHP_EOL . PHP_EOL . '<!-- graphene-static : ' . $cacheKey . ' -->');
        }
    }

    private function isLocal()
    {

        if (strstr($_SERVER['REQUEST_URI'], '.loc')) {
            return true;
        }
        return false;

    }

    private function setHtmlCacheKey()
    {
        $key = explode('?', $_SERVER['REQUEST_URI'])[0];

        $this->htmlCacheKey = md5($key);
    }

    private function getCacheKey()
    {
        return $this->htmlCacheKey;
    }

    public function saveHtmlCache()
    {

        if ($this->pageRequestVersion() == $this->pageVersion) {
            exit($this->pageVersion);
        }

        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/pages/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/pages/');
        }

        $pageCacheFile = $_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/pages/' . $this->getCacheKey() . '.php';

        $cache = '<?php
defined(\'GRAPHENE_RENDER\') or die;
?>
';
        $cache .= $this->viewHtml;

        file_put_contents($pageCacheFile, $cache);

        if ($this->isReStaticRequest()) {
            exit($this->pageVersion);
        }

    }

    private function optimizeHtml()
    {
        $html = $this->viewHtml;

        $this->viewHtml = '';

        foreach (explode(' ', $html) as $string) {

            $string = trim($string);
            if ($string) {
                $this->viewHtml .= $string . ' ';
            }
        }

        $this->viewHtml = strtr($this->viewHtml,
            [
                PHP_EOL => '',
                '> <' => '><'
            ]
        );

        $copy = '<!-- meta name="GENERATOR" content="graphene-render" -->' . PHP_EOL . PHP_EOL . PHP_EOL;

        $this->viewHtml = strtr($this->viewHtml, ['<head>' => '<head><meta name="generator" content="graphene-render">']);

        $this->viewHtml = $copy . $this->viewHtml;
    }

    private function versionManager()
    {
        $version = $this->versionManagerGetVersion();

        $this->pageVersion = $version;

        $this->viewHtml = strtr($this->viewHtml,
            [
                '<head>' => "<head><script>let pageVersion='$version';</script>"
            ]
        );
    }

    private function versionManagerGetVersion()
    {
        return md5($this->viewHtml);
    }

    private function renderAddCssJs()
    {

        if ($this->route['code']) {

            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/')) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/');
            }

            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/static/')) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/cache/static/');
            }

            $cacheKey = mb_strtolower($this->route['code']);

            $appCssFile = '/graphene-render/cache/static/app.css';
            $appJsFile = '/graphene-render/cache/static/app.js';

            $cssFile = '/graphene-render/cache/static/' . $cacheKey . '.css';
            $jsFile = '/graphene-render/cache/static/' . $cacheKey . '.js';

            $appCss = '';
            $appJs = $this->renderAddCssJsGetSystemAppJs();
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
                        $appCss .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
                    }

                    if (strstr($res, '.js')) {
                        $appJs .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/graphene-render/' . $res) . PHP_EOL . PHP_EOL;
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

            $appCss = trim($appCss);
            $appJs = trim($appJs);

            $css = trim($css);
            $js = trim($js);

            $verAppCss = md5($appCss);
            $verAppJs = md5($appJs);

            $verCss = md5($css);
            $verJs = md5($js);

            $staticVersion = md5($verAppCss . $verAppJs . $verCss . $verJs);

            $replace['</head>'] = '
            <link data-static-version="' . md5($staticVersion . $verAppCss) . '" type="text/css" rel="stylesheet" href="' . $appCssFile . '?ver=' . $verAppCss . '"/>
            <link data-static-version="' . md5($staticVersion . $verCss) . '" type="text/css" rel="stylesheet" href="' . $cssFile . '?ver=' . $verCss . '"/>' . PHP_EOL . '</head>';

            $replace['</body>'] = '
            <script data-static-version="' . md5($staticVersion . $verAppJs) . '" type="text/javascript" src="' . $appJsFile . '?ver=' . $verAppJs . '"></script>
            <script data-static-version="' . md5($staticVersion . $verJs) . '" type="text/javascript" src="' . $jsFile . '?ver=' . $verJs . '"></script>' . PHP_EOL . '</body>';

            $this->viewHtml = strtr(
                $this->viewHtml,
                $replace
            );

            if ($this->pageRequestVersion() != $this->versionManagerGetVersion()) {

                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $appCssFile, $appCss);
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $appJsFile, $appJs);

                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $cssFile, $css);
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $jsFile, $js);

            }

        }

    }

    private function pageRequestVersion()
    {
        if (!isset($_GET['version'])) {
            return '';
        }

        return (string)$_GET['version'];
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

    private function setRoute()
    {
        $GLOBALS['__route'] = $this->route;
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

        if (!$dataRoute) {
            foreach ($routes as $route) {

                $vars = [];

                if (substr_count(rtrim($url, '/'), '/') == substr_count(rtrim($route['url'], '/'), '/')) {

                    $dataUrl = explode('/', $url);
                    $dataRouteUrl = explode('/', $route['url']);
                    $dataRouteUrlCompile = $route['url'];

                    foreach ($dataRouteUrl as $k => $dataRoutePath) {

                        if (strstr($dataRoutePath, ':')) {

                            $dataRouteUrlCompile = strtr($dataRouteUrlCompile, [$dataRoutePath => $dataUrl[$k]]);

                            $vars[strtr($dataRoutePath, [':' => ''])] = $dataUrl[$k];

                        }
                    }

                    if ($dataRouteUrlCompile == $url) {
                        $dataRoute = $route;
                        $dataRoute['variables'] = $vars;
                    }
                }
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

<div class="' . $route['code'] . '">
    <h1><?= h1() ?></h1>
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

    private function renderAddCssJsGetSystemAppJs()
    {

        $js = "

let reStaticUrl = '?version='+pageVersion;   
      
if(window.location.search)
{
    reStaticUrl = window.location.search+'&version='+pageVersion;   
}
        
fetch(new Request(reStaticUrl, {method: 'GRAPHENE-RE-STATIC'})).then(data => {
        
    data.text().then(version => { 
        if(pageVersion !== version && version.length === 32){
           window.location.href='';
        }
    });
        
});";
        return $js . PHP_EOL . PHP_EOL;
    }
}

/*
 * Дра работы внутри приложения graphene-render,
 * при разработке используются функции описанные ниже
 */

function controller($do)
{
    $res = $do();

    return $res;
}

function topMenu()
{
    $routes = include 'router.php';

    $arData = [];

    foreach ($routes as $route) {

        if (strstr($route['url'], ':')) {
            continue;
        }

        $isActive = false;

        if (explode('?', $_SERVER['REQUEST_URI'])[0] == $route['url']) {
            $isActive = true;
        }

        $arData[] = [
            'title' => $route['name'],
            'link' => $route['url'],
            'isActive' => $isActive
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

function setMeta($meta)
{
    title($meta['title']);
    description($meta['description']);
    h1($meta['h1']);
    $GLOBALS['GRAPHENE_RENDER']['meta'] = $meta;
}

function meta($key)
{
    return $GLOBALS['GRAPHENE_RENDER']['meta'][$key];
}

function title($title = false)
{
    if ($title) {
        $GLOBALS['GRAPHENE_RENDER']['title'] = $title;
    } else {
        return $GLOBALS['GRAPHENE_RENDER']['title'];
    }
}

function h1($h1 = false)
{
    if ($h1) {
        $GLOBALS['GRAPHENE_RENDER']['h1'] = $h1;
    } else {
        return $GLOBALS['GRAPHENE_RENDER']['h1'];
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

function import($src)
{

    if (strstr($src . '--', '.php--')) {

        if (strstr('--' . $src, '--/')) {
            $src = $_SERVER['DOCUMENT_ROOT'] . '/' . $src;
        }

        include $src;
        return true;
    }

    $GLOBALS['GRAPHENE_RENDER']['import'][md5($src)] = $src;
}

function getRoute()
{
    return $GLOBALS['__route'];
}
