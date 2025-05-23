<?php

namespace TikTok\Driver;

use TikTok\Concern\Crawlable;
use TikTok\Util\Token;

/**
 * @implements DriverInterface<string|false>
 */
class SnaptikDriver implements DriverInterface
{
    use Crawlable;

    //const CDN_URL = 'https://d.rapidcdn.app//v2';

    public function handle(string $url)
    {
        $browser = $this->getBrowser();

        $crawler = $browser
            ->request('GET', 'https://snaptik.app/en2')
            ->filter('form')
            ->first();

        /** @var \DOMElement */
        $el = $crawler->getNode(0);
        $el->setAttribute('action', '/abc2.php');
        $el->setAttribute('method', 'POST');

        $form = $crawler->form()->setValues(['url' => $url]);

        $browser->submit($form);

        /** @var \Symfony\Component\BrowserKit\Response */
        $response = $browser->getResponse();

        $content = $response->getContent();

        $token = Token::extract($content);

        return $token != null ? $token : false;

        //return $token ? sprintf('%s/?token=%s&dl=1', self::CDN_URL, $token) : false;
    }
}
