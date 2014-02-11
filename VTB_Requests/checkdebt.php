<?php defined('_JEXEC') or die('Restricted access');
echo '<?xml version="1.0" encoding="utf-8"?>';?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:CheckDebt>
         <tem:ProviderAlias>{PROVIDERALIAS}</tem:ProviderAlias>
         <tem:ClientID>{CLIENTID}</tem:ClientID>
         <tem:CheckSum>{CHECKSUM}</tem:CheckSum>
         <tem:SessionID>{SESSIONID}</tem:SessionID>
      </tem:CheckDebt>
   </soapenv:Body>
</soapenv:Envelope>