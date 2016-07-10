<?php
require 'lib/twitteroauth/autoload.php';
require 'lib/PHPExcel.php';
require 'lib/PHPExcel/Writer/Excel5.php';

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterMessages
{
    const CONSUMER_KEY       = 'ONru9tPq2h89sqU9uhjUxrWaU';
    const CONSUMER_SECRET    = 'ONWAXszAwMm6eoPZLIyaRo59QAp08tPI8g4ii6QmFV6gGfwF3e';
    const ACCES_TOKEN        = '722030522659115009-cYhbNFIjDSurhqnwIgfG19ghnYoLHF0';
    const ACCES_TOKEN_SECRET = 'bkR9mABZD5zVK19oFoxckoUApA8MadSMycT1g4BKlB0bZ';

    private $username;

    function __construct($username = 'tutspluscode') {
        $this->username = $username;
    }

    public static function getConsumerKey()
    {
        return self::CONSUMER_KEY;
    }

    public static function getConsumerSecret()
    {
        return self::CONSUMER_SECRET;
    }

    public function getAccessToken()
    {
        return self::ACCES_TOKEN;
    }

    public function getAccessTokenSecret()
    {
        return self::ACCES_TOKEN_SECRET;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * set connection using Twitter OAuth
     * @return object of Twitter OAuth
     */
    private function connection()
    {
        $connection = new TwitterOAuth(
            $this->getConsumerKey(),
            $this->getConsumerSecret(),
            $this->getAccessToken(),
            $this->getAccessTokenSecret()
        );

        return $connection;
    }

    /**
     *	get Published Date and Messages of user using API
     *  @return array - result of parse of $content
     */
    private function getDataFromApi()
    {
        $connection = $this->connection();
        $content = $connection->get('statuses/user_timeline', array(
            "screen_name" => $this->username,
            "count" => "200"
        ));

        $data = array('Published Date' => array(), 'Message' => array());

        for($i = 0; $i < count($content); $i++){
            $data['Published Date'][$i] = strftime('%A, %d/%m/%Y', strtotime($content[$i]->created_at));
            $data['Message'][$i] = $content[$i]->text;
        }

        return $data;
    }

    /**
     * set Excel settings
     * @param object $pExcel of PHPExcel
     * @return object $aSheet - object with set options
     */
    private function setDocumentSettings($pExcel)
    {
        $pExcel->setActiveSheetIndex(0);
        $aSheet = $pExcel->getActiveSheet();

        // Page orientation and paper size
        $aSheet->getPageSetup()
           ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $aSheet->getPageSetup()
           ->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

        // Document fields
        $aSheet->getPageMargins()->setTop(1);
        $aSheet->getPageMargins()->setRight(0.75);
        $aSheet->getPageMargins()->setLeft(0.75);
        $aSheet->getPageMargins()->setBottom(1);

        // Sheet name
        $aSheet->setTitle('Twitter messages');

        // Font setting
        $pExcel->getDefaultStyle()->getFont()->setName('Arial');
        $pExcel->getDefaultStyle()->getFont()->setSize(11);

        return $aSheet;
    }

    /**
     * Fill Excel of $data
     * @param array - associative array of Published Date and Message
     */
    private function fillDocument($data)
    {
        $pExcel = new PHPExcel();
        $aSheet = $this->setDocumentSettings($pExcel);
        $aSheet->getColumnDimension('A')->setWidth(22);
        $aSheet->getColumnDimension('B')->setWidth(100);
        $aSheet->setCellValue('A1','PUBLISHED DATE');
        $aSheet->setCellValue('B1','MESSAGES');

        $data = $this->getDataFromApi();

        for($i = 0; $i < count($data['Published Date']); $i++){
            $aSheet->setCellValue('A'.strval($i+2), $data['Published Date'][$i]);
            $aSheet->setCellValue('B'.strval($i+2), $data['Message'][$i]);
        }

        $objWriter = new PHPExcel_Writer_Excel2007($pExcel);
        $objWriter->save('data.xlsx');
    }

    /**
     * Fill Excelt of Published Date and Message it with TwitterMessages::fillDocument
     * @return array $data
     */
    public function run()
    {
        $data = $this->getDataFromApi();
        $this->fillDocument($data);

        return $data;
    }
}

$object = new TwitterMessages();
print_r($object->run());
