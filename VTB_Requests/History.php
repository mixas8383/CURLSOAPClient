<?php defined('_JEXEC') or die('Restricted access');?><TKKPG>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:History>
         <tem:ClientID>{CLIENTID}</tem:ClientID>
         <tem:ProviderAlias>{PROVIDERALIAS}</tem:ProviderAlias>
         <tem:iDateFrom>{IDATEFROM}</tem:iDateFrom>
         <tem:iDateTo>{IDATETO}</tem:iDateTo>
      </tem:History>
   </soapenv:Body>
</soapenv:Envelope>