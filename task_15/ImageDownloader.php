<?php

class ImageDownloader
{
    private $url;
    private $dir;

    function __construct($url = 'http://mev.com/', $dir = 'img')
    {
        $this->url = $url;
        $this->dir = $dir;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getDir()
    {
        return $this->dir;
    }

    /**
     * this method get source web page using curl
     * @param string $url site address
     * @return string $code full page source
     */
    private function getPageSource($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $code = curl_exec($curl);
        curl_close($curl);

        return $code;
    }

    /**
     * this method get img link using regular expression and download it
     * @param string $code, $dir
     */
    private function downloadImages($code, $dir)
    {
        $host = parse_url($this->url, PHP_URL_HOST);
        $arrayImg = array();
        $regex = '/<\s*img[^>]*src=[\"|\'](.*?)[\"|\'][^>]*\/*>/i';
        preg_match_all($regex, $code, $arrayImg);

        for($i = 0; $i < count($arrayImg[1]); $i++) {

            $path = parse_url($arrayImg[1][$i], PHP_URL_PATH);
            $absolute_url = 'http://'.$host.$path;

            $name = explode("/", $absolute_url);
            $name = $name[count($name)-1];

            if (!copy($absolute_url, $dir.'/'.$name)) {
                echo '<p style="color:red;">Error copy - '.$name.'</p>';
            }

        }
    }

    public function runProgram($url, $dir)
    {
        $code = $this->getPageSource($url);
        $this->downloadImages($code, $dir);

        if (count(scandir($this->dir)) > 3) {
            return true;
            break;
        } else {
            return false;
        }
    }
}

$object = new ImageDownloader;
$a = $object->runProgram($object->getUrl(), $object->getDir());
