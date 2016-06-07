<?php
// get text file
$textFile = file_get_contents('alice.txt');


class WordCounter
{
    public function __construct($textFile)
    {
        $this->textFile = $textFile;
    }
    public function show($textFile)
    {
        $byLine = explode("\n", $textFile);
        $dictionary = [];
        $bannedCharacters = [
            ',',
            '?',
            '(',
            '-',
            ')',
            '`',
            '!',
            ';',
            '.',
            '_',
            '\'',
            '"',
            '[',
            '*'
        ];

        foreach ($byLine as $line)
        {
            $line = strtolower($line);
            $line = str_replace($bannedCharacters, "", $line);

            if ($line)
            {
                $byWord = explode(" ", $line);

                foreach ($byWord as $index => $word):
                    $word = trim($word);


                    if (array_key_exists($word, $dictionary) && strlen($word) > 0)
                    {
                        ++$dictionary[$word];
                    }
                    else
                    {
                        $dictionary[$word] = 1;
                    }
                endforeach;
            }
        }
        return $dictionary;
    }


    public function sortWord($count)
    {
        ksort($count);
        return $count;
    }
    public function topWord($sort)
    {
        arsort($sort);
        $sort = array_slice($sort, 0, 20);
        return $sort;
    }
}


$wordCount = new WordCounter();
echo "Top 20 Words: ". "<pre>";
print_r($wordCount->topWord($wordCount->show($textFile)));
echo "Counting of Words: ". "<pre>";
print_r($wordCount->sortWord($wordCount->show($textFile)));






