<?php

namespace mev\task_1;

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
     * this method get img links using regular expression and download it
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
            $absolute_url = 'http://' . $host . $path;

            $name = explode("/", $absolute_url);
            $name = $name[count($name) - 1];

            $a = $this->renameEqLink($name);
            $name = $a;

            if (!copy($absolute_url, $dir . '/' . $name)) {
                echo 'Error copy - ' . $name;
            }
        }

        return $arrayImg;
    }

    /**
     * rename img name if it equal with img in dir
     * @param  string $name
     * @return string $name
     */
    private function renameEqLink($name)
    {
        for ($i = 0; $i < count(scandir($this->dir)); $i++) {
            if ($name == scandir($this->dir)[$i]) {
                $name = rand(0, 99) . $name;
            }
        }

        return $name;
    }


    /**
     * call methods and compare img in dir before and after
     * @param  string $url - url where be downloading images
     * @param  string $dir - dir where be images on pc
     * @return boolean
     */
    public function runProgram($url, $dir)
    {
        echo $dirCount = count(scandir($this->dir)), "\n";

        $code = $this->getPageSource($url);
        $links = $this->downloadImages($code, $dir);

        if (count(scandir($this->dir)) == ($dirCount + count($links[1]))) {
            return true;
        } else {
            return false;
        }
    }
}

$object = new ImageDownloader;
$object->runProgram($object->getUrl(), $object->getDir());
