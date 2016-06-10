<?php
$data = file_get_contents("http://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en");

        
        $data = stripslashes($data);
        $send = 'https://api.telegram.org/bot188344587:AAHzfOqFv0jJr6wR5VDTZzeeNl1X88Xv0II/sendmessage?chat_id=-113952372&text=';

        $quote = json_decode($data);
      $quoteSensibleText = "$quote->quoteText \n\nBy $quote->quoteAuthor"; 
       $quoteSensibleText = urlencode($quoteSensibleText);

        if ($quote) {
            if (isset($quote->quoteText)) {
               $author = $quote->quoteAuthor;
            //    file_get_contents($send.$quote->quoteText.' -> '.$author);
                file_get_contents($send.$quoteSensibleText);
                return;
            }
    }