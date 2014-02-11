<?php defined('_JEXEC') or die('Restricted access');
echo '<?xml version="1.0" encoding="utf-8"?>';?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:GetCurrentRatesKassa/>
   </soapenv:Body>
</soapenv:Envelope>