<?php $agent = "AAPP Application/1.0 (Windows; U; Windows NT 5.1; de; rv:1.8.0.4)";
      $host = "http://suggestqueries.google.com/complete/search?output=toolbar&hl=".$this->locale."&q=".$this->query;
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, $host);
      curl_setopt($ch, CURLOPT_USERAGENT, $agent);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   
      $this->xml = curl_exec($ch);
      curl_close($ch);