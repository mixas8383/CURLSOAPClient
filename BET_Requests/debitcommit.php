<?php defined('_JEXEC') or die('Restricted access');
echo '<?xml version="1.0" encoding="utf-8"?>';?>
<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:BetService">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:DebitCommit soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
         <Cashier xsi:type="xsd:string">{CASHIER}</Cashier>
         <Branch xsi:type="xsd:string">{BRANCH}</Branch>
         <EUTransactionID xsi:type="xsd:string">{EUTRANSACTIONID}</EUTransactionID>
         <Hash xsi:type="xsd:string">{HASH}</Hash>
      </urn:DebitCommit>
   </soapenv:Body>
</soapenv:Envelope>