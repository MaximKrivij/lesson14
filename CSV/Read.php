<?php
require_once 'ReadInterface.php';
class Read implements ReadInterface
{
    private $_csv_file = null;

    /**
     * @param string $csv_file - путь до csv-файла
     */
    public function __construct($csv_file)
    {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        } else {
            die("Файл  не найден");
        }

        $info = new SplFileInfo($this->_csv_file);
        $fileInfo = $info->getExtension();

        if ($fileInfo != 'csv') {
            die("Не верный формат файла,файл должен быть формата .csv!");
        }
    }

    public function getCSV()
    {
        $handle = fopen($this->_csv_file, "r");

        $array_line_full = array();

        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line;
        }
        fclose($handle);
        return $array_line_full;
    }
}


