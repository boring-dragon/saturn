<?php

namespace Jinas\Saturn;

use Jinas\Saturn\Extractors\Extractor;
use Jinas\Saturn\AppBaseUtil;

class Saturn extends AppBaseUtil{

    /**
     * parse
     *
     * @param  mixed $url
     *
     * @return void
     */
    public function parse($url)
    {
        $extractor = new Extractor($url);
        $data = [
            "title" => $extractor->title,
            "un_title" => $extractor->un_title,
            "lead_image" => $extractor->lead_image_url,
            "date_published" => $extractor->date_published,
            "description" => $extractor->description,
            "keywords" => $extractor->keywords,
            "url" => $extractor->url,
            "word_count" => $extractor->word_count,
            "domain" => $extractor->domain,
            "site_name" => $extractor->site_name
        ];
        $jsonData = $this->sendResponse($data, 'Data extracted successfuly');
        return $jsonData;
    }

    
}

