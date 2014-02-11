<?php defined('_JEXEC') or die('Restricted access');?><TKKPG>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:GetSaldo>
          <tem:SessionID>{SESSIONID}</tem:SessionID>
      </tem:GetSaldo>
   </soapenv:Body>
</soapenv:Envelope>