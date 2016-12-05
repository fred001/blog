
  # simpletest源代码阅读

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:44:02 


      None


      <p>
      simpletst源代码阅读
2013-09-18 


browser->get(URL,PARAMS)
-------------
核心：
http.php
   route->fetch
       打开请求， 此时只有  host,路径信息
  request->dispatchRequest
      write 剩余请求， 包括参数等
      传送文件估计也在这里

browser.php
   SimpleBrowser::get
   SimpleBrowser::load($url, new SimpleGetEncoding($parameters));
   SimpleBrowser::loadPage($url,$parameters);
   SimpleBrowser::fetch($url, $parameters);
   $response = $this->user_agent->fetchResponse($url, $encoding);
     
   user_agent.php:
         SimpleUserAgent::fetchResponse($url, $encoding)
         SimpleUserAgent::fetchWhileRedirected($url, $encoding)
         SimpleUserAgent::fetch($url, $encoding)
         
      http.php
         SimpleHttpRequest($this->createRoute($url), $encoding)
        
         
         $socket = $this->route->createConnection($this->encoding->getMethod(), $timeout);
          SimpleRoute:createConnection
          
          
         return $this->createResponse($socket);
         
           $response = new SimpleHttpResponse(
                $socket,
                $this->route->getUrl(),
                $this->encoding);
        $socket->close();
        
         socket.php:SimpleStickyError
         
        return $response;




   $page = $this->parse($response, $depth);
   return $this->page->getRaw();


===============================
Browser.php
  
    代码块
    
require_once(dirname(__FILE__) . '/simpletest.php');
require_once(dirname(__FILE__) . '/http.php');
require_once(dirname(__FILE__) . '/encoding.php');
require_once(dirname(__FILE__) . '/page.php');
require_once(dirname(__FILE__) . '/php_parser.php');
require_once(dirname(__FILE__) . '/tidy_parser.php');
require_once(dirname(__FILE__) . '/selector.php');
require_once(dirname(__FILE__) . '/frames.php');
require_once(dirname(__FILE__) . '/user_agent.php');
if (! SimpleTest::getParsers()) {
    SimpleTest::setParsers(array(new SimpleTidyPageBuilder(), new SimplePHPPageBuilder()));
    //SimpleTest::setParsers(array(new SimplePHPPageBuilder()));
}

if (! defined('DEFAULT_MAX_NESTED_FRAMES')) {
    define('DEFAULT_MAX_NESTED_FRAMES', 3);
}

class SimpleBrowserHistory {
    private $sequence = array();
    private $position = -1;


    protected function isEmpty() {
        return ($this->position == -1);
    }


    protected function atBeginning() {
        return ($this->position == 0) && ! $this->isEmpty();
    }

  
    protected function atEnd() {
        return ($this->position + 1 >= count($this->sequence)) && ! $this->isEmpty();
    }

    function recordEntry($url, $parameters) {
        $this->dropFuture();
        array_push(
                $this->sequence,
                array('url' => $url, 'parameters' => $parameters));
        $this->position++;
    }

  
     function getUrl() 
     {
        if ($this->isEmpty()) {
            return false;
        }
        return $this->sequence[$this->position]['url'];
    }

    function getParameters() {
        if ($this->isEmpty()) {
            return false;
        }
        return $this->sequence[$this->position]['parameters'];
    }


    function back() {
        if ($this->isEmpty() || $this->atBeginning()) {
            return false;
        }
        $this->position--;
        return true;
    }


    function forward() {
        if ($this->isEmpty() || $this->atEnd()) {
            return false;
        }
        $this->position++;
        return true;
    }


    protected function dropFuture() {
        if ($this->isEmpty()) {
            return;
        }
        while (! $this->atEnd()) {
            array_pop($this->sequence);
        }
    }
}


class SimpleBrowser {
    private $user_agent;
    private $page;
    private $history;
    private $ignore_frames;
    private $maximum_nested_frames;
    private $parser;

    function __construct() {

    }

   
    protected function createUserAgent() {

    }

   
    protected function createHistory() {

    }

 
    protected function getParser() {
        if ($this->parser) {
            return $this->parser;
        }
        foreach (SimpleTest::getParsers() as $parser) {
            if ($parser->can()) {
                return $parser;
            }
        }
    }

    
    public function setParser($parser) {
        $this->parser = $parser;
    }

  
    function ignoreFrames() {
        $this->ignore_frames = true;
    }

  
    function useFrames() {
        $this->ignore_frames = false;
    }


    function ignoreCookies() {
        $this->user_agent->ignoreCookies();
    }

   
    function useCookies() {
        $this->user_agent->useCookies();
    }


    protected function parse($response, $depth = 0) {
        $page = $this->buildPage($response);
        if ($this->ignore_frames || ! $page->hasFrames() || ($depth > $this->maximum_nested_frames)) {
            return $page;
        }
        $frameset = new SimpleFrameset($page);
        foreach ($page->getFrameset() as $key => $url) {
            $frame = $this->fetch($url, new SimpleGetEncoding(), $depth + 1);
            $frameset->addFrame($frame, $key);
        }
        return $frameset;
    }


    protected function buildPage($response) {
        return $this->getParser()->parse($response);
    }


     protected function fetch($url, $encoding, $depth = 0) 
     {
        $response = $this->user_agent->fetchResponse($url, $encoding);
        if ($response->isError()) {
            return new SimplePage($response);
        }
        return $this->parse($response, $depth);
    }

     protected function load($url, $parameters) 
     {
        $frame = $url->getTarget();
        if (! $frame || ! $this->page->hasFrames() || (strtolower($frame) == '_top')) 
        {
            return $this->loadPage($url, $parameters);
        }
        return $this->loadFrame(array($frame), $url, $parameters);
    }

    
     protected function loadPage($url, $parameters) 
     {
        $this->page = $this->fetch($url, $parameters);
        $this->history->recordEntry(
                $this->page->getUrl(),
                $this->page->getRequestData());
        return $this->page->getRaw();
    }

    protected function loadFrame($frames, $url, $parameters) {
        $page = $this->fetch($url, $parameters);
        $this->page->setFrame($frames, $page);
        return $page->getRaw();
    }

   
    function restart($date = false) {
        $this->user_agent->restart($date);
    }

   
    function addHeader($header) {
        $this->user_agent->addHeader($header);
    }

 
    function ageCookies($interval) {
        $this->user_agent->ageCookies($interval);
    }

  
    function setCookie($name, $value, $host = false, $path = '/', $expiry = false) {
        $this->user_agent->setCookie($name, $value, $host, $path, $expiry);
    }

  
    function getCookieValue($host, $path, $name) {
        return $this->user_agent->getCookieValue($host, $path, $name);
    }

 
    function getCurrentCookieValue($name) {
        return $this->user_agent->getBaseCookieValue($name, $this->page->getUrl());
    }

 
    function setMaximumRedirects($max) {
        $this->user_agent->setMaximumRedirects($max);
    }

   
    function setMaximumNestedFrames($max) {
        $this->maximum_nested_frames = $max;
    }

    function setConnectionTimeout($timeout) {
        $this->user_agent->setConnectionTimeout($timeout);
    }


    function useProxy($proxy, $username = false, $password = false) {
        $this->user_agent->useProxy($proxy, $username, $password);
    }


    function head($url, $parameters = false) {
        if (! is_object($url)) {
            $url = new SimpleUrl($url);
        }
        if ($this->getUrl()) {
            $url = $url->makeAbsolute($this->getUrl());
        }
        $response = $this->user_agent->fetchResponse($url, new SimpleHeadEncoding($parameters));
        $this->page = new SimplePage($response);
        return ! $response->isError();
    }

    
    function get($url, $parameters = false) {
        if (! is_object($url)) {
            $url = new SimpleUrl($url);
        }
        if ($this->getUrl()) {
            $url = $url->makeAbsolute($this->getUrl());
        }
        return $this->load($url, new SimpleGetEncoding($parameters));
    }

 
     function post($url, $parameters = false, $content_type = false) 
     {
        if (! is_object($url)) 
        {
           $url = new SimpleUrl($url);
        }
        if ($this->getUrl()) 
        {
           $url = $url->makeAbsolute($this->getUrl());
        }
        return $this->load($url, new SimplePostEncoding($parameters, $content_type));
     }


    function put($url, $parameters = false, $content_type = false) {
        if (! is_object($url)) {
            $url = new SimpleUrl($url);
        }
        return $this->load($url, new SimplePutEncoding($parameters, $content_type));
    }


    function delete($url, $parameters = false) {
        if (! is_object($url)) {
            $url = new SimpleUrl($url);
        }
        return $this->load($url, new SimpleDeleteEncoding($parameters));
    }

  
    function retry() {
        $frames = $this->page->getFrameFocus();
        if (count($frames) > 0) {
            $this->loadFrame(
                    $frames,
                    $this->page->getUrl(),
                    $this->page->getRequestData());
            return $this->page->getRaw();
        }
        if ($url = $this->history->getUrl()) {
            $this->page = $this->fetch($url, $this->history->getParameters());
            return $this->page->getRaw();
        }
        return false;
    }


    function back() {
        if (! $this->history->back()) {
            return false;
        }
        $content = $this->retry();
        if (! $content) {
            $this->history->forward();
        }
        return $content;
    }


    function forward() {
        if (! $this->history->forward()) {
            return false;
        }
        $content = $this->retry();
        if (! $content) {
            $this->history->back();
        }
        return $content;
    }


    function authenticate($username, $password) {
        if (! $this->page->getRealm()) {
            return false;
        }
        $url = $this->page->getUrl();
        if (! $url) {
            return false;
        }
        $this->user_agent->setIdentity(
                $url->getHost(),
                $this->page->getRealm(),
                $username,
                $password);
        return $this->retry();
    }


    function getFrames() {
        return $this->page->getFrames();
    }


    function getFrameFocus() {
        return $this->page->getFrameFocus();
    }

    function setFrameFocusByIndex($choice) {
        return $this->page->setFrameFocusByIndex($choice);
    }

  
    function setFrameFocus($name) {
        return $this->page->setFrameFocus($name);
    }

    function clearFrameFocus() {
        return $this->page->clearFrameFocus();
    }


    function getTransportError() {
        return $this->page->getTransportError();
    }

    function getMimeType() {
        return $this->page->getMimeType();
    }

  
    function getResponseCode() {
        return $this->page->getResponseCode();
    }

 
    function getAuthentication() {
        return $this->page->getAuthentication();
    }

   
    function getRealm() {
        return $this->page->getRealm();
    }


    function getUrl() {
        $url = $this->page->getUrl();
        return $url ? $url->asString() : false;
    }

  
    function getBaseUrl() {
        $url = $this->page->getBaseUrl();
        return $url ? $url->asString() : false;
    }


    function getRequest() {
        return $this->page->getRequest();
    }

   
    function getHeaders() {
        return $this->page->getHeaders();
    }

   
    function getContent() {
        return $this->page->getRaw();
    }

  
    function getContentAsText() {
        return $this->page->getText();
    }

  
    function getTitle() {
        return $this->page->getTitle();
    }


    function getUrls() {
        return $this->page->getUrls();
    }


    function setField($label, $value, $position=false) {
        return $this->page->setField(new SimpleByLabelOrName($label), $value, $position);
    }


    function setFieldByName($name, $value, $position=false) {
        return $this->page->setField(new SimpleByName($name), $value, $position);
    }


    function setFieldById($id, $value) {
        return $this->page->setField(new SimpleById($id), $value);
    }

 
    function getField($label) {
        return $this->page->getField(new SimpleByLabelOrName($label));
    }


    function getFieldByName($name) {
        return $this->page->getField(new SimpleByName($name));
    }


    function getFieldById($id) {
        return $this->page->getField(new SimpleById($id));
    }


    function clickSubmit($label = 'Submit', $additional = false) {
        if (! ($form = $this->page->getFormBySubmit(new SimpleByLabel($label)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitButton(new SimpleByLabel($label), $additional));
        return ($success ? $this->getContent() : $success);
    }

   
    function clickSubmitByName($name, $additional = false) {
        if (! ($form = $this->page->getFormBySubmit(new SimpleByName($name)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitButton(new SimpleByName($name), $additional));
        return ($success ? $this->getContent() : $success);
    }

 
    function clickSubmitById($id, $additional = false) {
        if (! ($form = $this->page->getFormBySubmit(new SimpleById($id)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitButton(new SimpleById($id), $additional));
        return ($success ? $this->getContent() : $success);
    }


    function isSubmit($label) {
        return (boolean)$this->page->getFormBySubmit(new SimpleByLabel($label));
    }


    function clickImage($label, $x = 1, $y = 1, $additional = false) {
        if (! ($form = $this->page->getFormByImage(new SimpleByLabel($label)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitImage(new SimpleByLabel($label), $x, $y, $additional));
        return ($success ? $this->getContent() : $success);
    }


    function clickImageByName($name, $x = 1, $y = 1, $additional = false) {
        if (! ($form = $this->page->getFormByImage(new SimpleByName($name)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitImage(new SimpleByName($name), $x, $y, $additional));
        return ($success ? $this->getContent() : $success);
    }

 
    function clickImageById($id, $x = 1, $y = 1, $additional = false) {
        if (! ($form = $this->page->getFormByImage(new SimpleById($id)))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submitImage(new SimpleById($id), $x, $y, $additional));
        return ($success ? $this->getContent() : $success);
    }

 
    function isImage($label) {
        return (boolean)$this->page->getFormByImage(new SimpleByLabel($label));
    }


    function submitFormById($id, $additional = false) {
        if (! ($form = $this->page->getFormById($id))) {
            return false;
        }
        $success = $this->load(
                $form->getAction(),
                $form->submit($additional));
        return ($success ? $this->getContent() : $success);
    }


    function getLink($label, $index = 0) {
        $urls = $this->page->getUrlsByLabel($label);
        if (count($urls) == 0) {
            return false;
        }
        if (count($urls) < $index + 1) {
            return false;
        }
        return $urls[$index];
    }


    function clickLink($label, $index = 0) {
        $url = $this->getLink($label, $index);
        if ($url === false) {
            return false;
        }
        $this->load($url, new SimpleGetEncoding());
        return $this->getContent();
    }

 
    function getLinkById($id) {
        return $this->page->getUrlById($id);
    }

    function clickLinkById($id) {
        if (! ($url = $this->getLinkById($id))) {
            return false;
        }
        $this->load($url, new SimpleGetEncoding());
        return $this->getContent();
    }

   
    function click($label) {
        $raw = $this->clickSubmit($label);
        if (! $raw) {
            $raw = $this->clickLink($label);
        }
        if (! $raw) {
            $raw = $this->clickImage($label);
        }
        return $raw;
    }

 
    function isClickable($label) {
        return $this->isSubmit($label) || ($this->getLink($label) !== false) || $this->isImage($label);
    }
}




      </p>

  