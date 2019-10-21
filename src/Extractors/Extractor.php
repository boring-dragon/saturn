<?php

namespace Jinas\Saturn\Extractors;

use Jinas\Saturn\Request\Client;
use Jinas\Saturn\AppBaseUtil;
use DOMDocument;
use Exception;

class Extractor extends AppBaseUtil
{

    protected $doc;
    protected $content_url;

    public $title = null;
    public $un_title = null;
    public $lead_image_url = null;
    public $url = null;
    public $keywords = null;
    public $description = null;
    public $date_published = null;
    public $word_count = null;
    public $domain = null;

    public $author = null;
    public $site_name = null;



    /**
     * __construct
     *
     * @param  mixed $url
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->content_url = $url;
        $this->url = $url;

        $domain = parse_url($url);
        $this->domain = $domain['host'];

        $this->doc = new DOMDocument;

        $this->loadHtml()
            ->Title()
            ->UnTitle()
            ->Date()
            ->Meta();
    }

    /**
     * loadHtml
     *
     * @return void
     */
    protected function loadHtml()
    {
        $client = new Client;
        $html = $client->request($this->content_url);
        @$this->doc->loadHTML($html);

        return $this;
    }

    /**
     * Title
     *
     * @return void
     */
    protected function Title()
    {
        $nodes = $this->doc->getElementsByTagName('title');
        $this->title = $nodes->item(0)->nodeValue;
        return $this;
    }

    /**
     * UnTitle
     *
     * @return void
     */
    protected function UnTitle()
    {
        $nodes = $this->doc->getElementsByTagName('h1');
        $single_node = $nodes->item(0);
        $untemp_title = $single_node === null ? null : $single_node->nodeValue;

        $this->un_title = $untemp_title;

        return $this;
    }

    /**
     * Date
     *
     * @return void
     */
    protected function Date()
    {
        $nodes = $this->doc->getElementsByTagName('time');
        $single_node = $nodes->item(0);
        $dates = $dates = $single_node === null ? null : $single_node->getAttribute('datetime');

        $this->date_published = $dates;

        return $this;
    }

    /**
     * Meta
     *
     * @return void
     */
    protected function Meta()
    {
        $metas = $this->doc->getElementsByTagName('meta');

        foreach ($metas as $meta) {
            if ($meta->getAttribute('property') == 'og:image') {
                $this->lead_image_url = $meta->getAttribute('content');
            }

            if ($meta->getAttribute('property') == 'og:site_name') {
                $this->site_name = $meta->getAttribute('content');
            }

            if ($meta->getAttribute('property') == 'og:description') {
                $this->description = $meta->getAttribute('content');
                $this->word_count = str_word_count($this->description);
            }

            if ($meta->getAttribute('name') == 'keywords') {
                $this->keywords = $meta->getAttribute('content');
            }
        }

        return $this;
    }
}
