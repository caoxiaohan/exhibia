<?php

/*
 +-----------------------------------------------------------------------+
 | localization/<lang>/labels.inc                                        |
 |                                                                       |
 | Localization file of the Roundcube Webmail client                     |
 | Copyright (C) 2005-2013, The Roundcube Dev Team                       |
 |                                                                       |
 | Licensed under the GNU General Public License version 3 or            |
 | any later version with exceptions for skins & plugins.                |
 | See the README file for a full license statement.                     |
 |                                                                       |
 +-----------------------------------------------------------------------+

 For translation see https://www.transifex.com/projects/p/roundcube-webmail/resource/labels/
*/

$labels = array();

// login page
$labels['welcome']   = 'Welkom bij $product';
$labels['username']  = 'Gebruikersnaam';
$labels['password']  = 'Wachtwoord';
$labels['server']    = 'Server';
$labels['login']     = 'Aanmelden';

// taskbar
$labels['logout']   = 'Afmelden';
$labels['mail']     = 'Berichten';
$labels['settings'] = 'Instellingen';
$labels['addressbook'] = 'Contactpersonen';

// mailbox names
$labels['inbox']  = 'Postvak IN';
$labels['drafts'] = 'Concepten';
$labels['sent']   = 'Verzonden berichten';
$labels['trash']  = 'Prullenbak';
$labels['junk']   = 'Spam';

// message listing
$labels['subject'] = 'Onderwerp';
$labels['from']    = 'Van';
$labels['sender']  = 'Afzender';
$labels['to']      = 'Aan';
$labels['cc']      = 'Cc';
$labels['bcc']     = 'Bcc';
$labels['replyto'] = 'Antwoorden aan';
$labels['followupto'] = 'Followup aan';
$labels['date']    = 'Datum';
$labels['size']    = 'Grootte';
$labels['priority'] = 'Prioriteit';
$labels['organization'] = 'Organisatie';
$labels['readstatus'] = 'Gelezen?';
$labels['listoptions'] = 'Lijstopties...';

$labels['mailboxlist'] = 'Mappen';
$labels['messagesfromto'] = 'Berichten $from - $to van $count';
$labels['threadsfromto'] = 'Conversaties $from - $to van $count';
$labels['messagenrof'] = 'Bericht $nr van $count';
$labels['fromtoshort'] = '$from - $to van $count';

$labels['copy']     = 'Kopieer';
$labels['move']     = 'Verplaats';
$labels['moveto']   = 'Verplaats naar...';
$labels['download'] = 'Downloaden';
$labels['open']     = 'Open';
$labels['showattachment'] = 'Weergeven';
$labels['showanyway'] = 'Toch weergeven';

$labels['filename'] = 'Bestandsnaam';
$labels['filesize'] = 'Bestandsgrootte';

$labels['addtoaddressbook'] = 'Voeg toe aan lijst met contactpersonen';

// weekdays short
$labels['sun'] = 'Zo';
$labels['mon'] = 'Ma';
$labels['tue'] = 'Di';
$labels['wed'] = 'Wo';
$labels['thu'] = 'Do';
$labels['fri'] = 'Vr';
$labels['sat'] = 'Za';

// weekdays long
$labels['sunday']    = 'Zondag';
$labels['monday']    = 'Maandag';
$labels['tuesday']   = 'Dinsdag';
$labels['wednesday'] = 'Woensdag';
$labels['thursday']  = 'Donderdag';
$labels['friday']    = 'Vrijdag';
$labels['saturday']  = 'Zaterdag';

// months short
$labels['jan']	= 'Jan';
$labels['feb']	= 'Feb';
$labels['mar']	= 'Mrt';
$labels['apr']	= 'Apr';
$labels['may']	= 'Mei';
$labels['jun']	= 'Jun';
$labels['jul'] 	= 'Jul';
$labels['aug']	= 'Aug';
$labels['sep']	= 'Sep';
$labels['oct']	= 'Okt';
$labels['nov']	= 'Nov';
$labels['dec']	= 'Dec';

// months long
$labels['longjan']	= 'Januari';
$labels['longfeb']	= 'Februari';
$labels['longmar']	= 'Maart';
$labels['longapr']	= 'April';
$labels['longmay']	= 'Mei';
$labels['longjun']	= 'Juni';
$labels['longjul']	= 'Juli';
$labels['longaug']	= 'Augustus';
$labels['longsep']	= 'September';
$labels['longoct']	= 'Oktober';
$labels['longnov']	= 'November';
$labels['longdec']	= 'December';

$labels['today'] = 'Vandaag';

// toolbar buttons
$labels['refresh']          = 'Vernieuwen';
$labels['checkmail']        = 'Controleer op nieuwe berichten';
$labels['compose']          = 'Nieuw bericht opstellen';
$labels['writenewmessage']  = 'Nieuw bericht';
$labels['reply']            = 'Beantwoorden';
$labels['replytomessage']   = 'Beantwoorden aan afzender';
$labels['replytoallmessage'] = 'Antwoorden naar lijst of naar afzender en alle ontvangers';
$labels['replyall']         = 'Allen beantwoorden';
$labels['replylist']        = 'Lijst beantwoorden';
$labels['forward']          = 'Doorsturen';
$labels['forwardinline']    = 'Forward inline';
$labels['forwardattachment'] = 'Doorsturen als bijlage';
$labels['forwardmessage']   = 'Bericht doorsturen';
$labels['deletemessage']    = 'Dit bericht verwijderen';
$labels['movemessagetotrash'] = 'Verplaats bericht naar verwijderde items';
$labels['printmessage']     = 'Afdrukken';
$labels['previousmessage']  = 'Vorig bericht';
$labels['firstmessage']     = 'Eerste bericht';
$labels['nextmessage']      = 'Volgende bericht';
$labels['lastmessage']      = 'Laatste bericht';
$labels['backtolist']       = 'Terug naar berichtenlijst';
$labels['viewsource']       = 'Broncode bericht weergeven';
$labels['mark']             = 'Markeren';
$labels['markmessages']     = 'Markeer berichten';
$labels['markread']         = 'Als gelezen';
$labels['markunread']       = 'Als ongelezen';
$labels['markflagged']      = 'Selecteren';
$labels['markunflagged']    = 'Niet Selecteren';
$labels['moreactions']      = 'Meer acties...';
$labels['more']             = 'Meer';
$labels['back']             = 'Terug';
$labels['options']          = 'Opties';

$labels['select'] = 'Selecteren';
$labels['all'] = 'Alle';
$labels['none'] = 'Geen';
$labels['currpage'] = 'Huidige pagina';
$labels['unread'] = 'Ongelezen';
$labels['flagged'] = 'Geselecteerd';
$labels['unanswered'] = 'Onbeantwoord';
$labels['withattachment'] = 'With attachment';
$labels['deleted'] = 'Verwijderd';
$labels['undeleted'] = 'Niet verwijderd';
$labels['invert'] = 'Selectie omkeren';
$labels['filter'] = 'Filter';
$labels['list'] = 'Lijst';
$labels['threads'] = 'Conversaties';
$labels['expand-all'] = 'Alles uitklappen';
$labels['expand-unread'] = 'Ongelezen uitklappen';
$labels['collapse-all'] = 'Alles inklappen';
$labels['threaded'] = 'Conversaties';

$labels['autoexpand_threads'] = 'Klap alle conversaties uit';
$labels['do_expand'] = 'alle conversaties';
$labels['expand_only_unread'] = 'alleen met ongelezen berichten';
$labels['fromto'] = 'Afzender/Ontvanger';
$labels['flag'] = 'Markeer';
$labels['attachment'] = 'Bijlage';
$labels['nonesort'] = 'Geen';
$labels['sentdate'] = 'Verzenddatum';
$labels['arrival'] = 'Ontvangstdatum';
$labels['asc'] = 'oplopend';
$labels['desc'] = 'aflopend';
$labels['listcolumns'] = 'Kolommen';
$labels['listsorting'] = 'Sorteerkolom';
$labels['listorder'] = 'Sorteervolgorde';
$labels['listmode'] = 'Lijstweergave mode';

$labels['folderactions'] = 'Acties voor map...';
$labels['compact'] = 'Comprimeren';
$labels['empty'] = 'Legen';

$labels['quota'] = 'Gebruikte schijfruimte';
$labels['unknown']  = 'onbekend';
$labels['unlimited']  = 'onbeperkt';

$labels['quicksearch']  = 'Snelzoeken';
$labels['resetsearch']  = 'Zoek opnieuw';
$labels['searchmod']  = 'Zoekopties';
$labels['msgtext']  = 'Volledig bericht';
$labels['body']  = 'Body';

$labels['openinextwin'] = 'Openen in een nieuw venster';
$labels['emlsave'] = 'Opslaan (.eml)';
$labels['changeformattext'] = 'Display in plain text format';
$labels['changeformathtml'] = 'Display in HTML format';

// message compose
$labels['editasnew']      = 'Als nieuw bewerken';
$labels['send']           = 'Verzenden';
$labels['sendmessage']    = 'Bericht verzenden';
$labels['savemessage']    = 'Bewaar als concept';
$labels['addattachment']  = 'Bestand toevoegen als bijlage';
$labels['charset']        = 'Karakterset';
$labels['editortype']     = 'Opmaak';
$labels['returnreceipt']  = 'Ontvangstbevestiging';
$labels['dsn']            = 'Delivery Status Notification';
$labels['mailreplyintro'] = 'Op $date, schreef $sender:';
$labels['originalmessage'] = 'Orgineel bericht';

$labels['editidents']    = 'Bewerk identiteiten';
$labels['spellcheck']    = 'Spellen';
$labels['checkspelling'] = 'Controleer spelling';
$labels['resumeediting'] = 'Hervat bewerken';
$labels['revertto']      = 'Ongedaan maken';

$labels['attach'] = 'Bijvoegen';
$labels['attachments'] = 'Bijlagen';
$labels['upload'] = 'Uploaden';
$labels['uploadprogress'] = '$percent ($current van $total)';
$labels['close']  = 'Sluiten';
$labels['messageoptions']  = 'Opties voor bericht...';

$labels['low']     = 'Laag';
$labels['lowest']  = 'Laagste';
$labels['normal']  = 'Normaal';
$labels['high']    = 'Hoog';
$labels['highest'] = 'Hoogste';

$labels['nosubject']  = '(geen onderwerp)';
$labels['showimages'] = 'Toon afbeeldingen';
$labels['alwaysshow'] = 'Afbeeldingen van $sender altijd tonen';
$labels['isdraft']    = 'Dit is een concept bericht.';
$labels['andnmore']   = '$nr meer...';
$labels['togglemoreheaders'] = 'Toon meer berichthoofden';
$labels['togglefullheaders'] = 'Toggle raw message headers';

$labels['htmltoggle'] = 'HTML';
$labels['plaintoggle'] = 'Platte tekst';
$labels['savesentmessagein'] = 'Bewaar verzonden bericht in';
$labels['dontsave'] = 'niet bewaren';
$labels['maxuploadsize'] = 'Maximum toegestane bestandsgrootte is $size';

$labels['addcc'] = 'Cc toevoegen';
$labels['addbcc'] = 'Bcc toevoegen';
$labels['addreplyto'] = 'Antwoorden aan toevoegen';
$labels['addfollowupto'] = 'Followup aan toevoegen';

// mdn
$labels['mdnrequest'] = 'De afzender heeft een ontvangstbevestiging gevraagd. Wilt u deze versturen?';
$labels['receiptread'] = 'Ontvangstbevestiging (gelezen)';
$labels['yourmessage'] = 'Dir is een onvangstbevestiging voor uw bericht';
$labels['receiptnote'] = 'Opmerking: deze ontvangstbevestiging houdt enkel in dat het bericht was weergegeven bij de ontvanger. Er is geen garantie dat de ontvanger het bericht daadwerkelijk heeft gelezen en/of begrepen.';

// address boook
$labels['name']         = 'Naam';
$labels['firstname']    = 'Voornaam';
$labels['surname']      = 'Achternaam';
$labels['middlename']   = 'Middle Name';
$labels['nameprefix']   = 'Prefix';
$labels['namesuffix']   = 'Suffix';
$labels['nickname']     = 'Nickname';
$labels['jobtitle']     = 'Job Title';
$labels['department']   = 'Department';
$labels['gender']       = 'Gender';
$labels['maidenname']   = 'Maiden Name';
$labels['email']        = 'E-mailadres';
$labels['phone']        = 'Phone';
$labels['address']      = 'Address';
$labels['street']       = 'Street';
$labels['locality']     = 'City';
$labels['zipcode']      = 'ZIP Code';
$labels['region']       = 'State/Province';
$labels['country']      = 'Country';
$labels['birthday']     = 'Birthday';
$labels['anniversary']  = 'Anniversary';
$labels['website']      = 'Website';
$labels['instantmessenger'] = 'IM';
$labels['notes'] = 'Notes';
$labels['male']   = 'male';
$labels['female'] = 'female';
$labels['manager'] = 'Manager';
$labels['assistant'] = 'Assistant';
$labels['spouse'] = 'Spouse';
$labels['allfields'] = 'All fields';
$labels['search'] = 'Search';
$labels['advsearch'] = 'Advanced Search';
$labels['advanced'] = 'Advanced';
$labels['other'] = 'Other';

$labels['typehome']   = 'Home';
$labels['typework']   = 'Work';
$labels['typeother']  = 'Other';
$labels['typemobile']  = 'Mobile';
$labels['typemain']  = 'Main';
$labels['typehomefax']  = 'Home Fax';
$labels['typeworkfax']  = 'Work Fax';
$labels['typecar']  = 'Car';
$labels['typepager']  = 'Pager';
$labels['typevideo']  = 'Video';
$labels['typeassistant']  = 'Assistant';
$labels['typehomepage']  = 'Home Page';
$labels['typeblog'] = 'Blog';
$labels['typeprofile'] = 'Profile';

$labels['addfield'] = 'Add field...';
$labels['addcontact'] = 'Geselecteerde contactpersoon toevoegen';
$labels['editcontact'] = 'Contactpersoon bewerken';
$labels['contacts'] = 'Contactpersonen';
$labels['contactproperties'] = 'Eigenschappen van contactpersoon';
$labels['personalinfo'] = 'Personal information';

$labels['edit']   = 'Bewerken';
$labels['cancel'] = 'Annuleren';
$labels['save']   = 'Opslaan';
$labels['delete'] = 'Verwijderen';
$labels['rename'] = 'Hernoemen';
$labels['addphoto'] = 'Add';
$labels['replacephoto'] = 'Replace';
$labels['uploadphoto'] = 'Upload photo';

$labels['newcontact']     = 'Contactpersoon toevoegen';
$labels['deletecontact']  = 'Verwijder geselecteerde contactpersonen';
$labels['composeto']      = 'Mail sturen aan';
$labels['contactsfromto'] = 'Contactpersonen $from - $to van $count';
$labels['print']          = 'Afdrukken';
$labels['export']         = 'Exporteren';
$labels['exportall']      = 'Export all';
$labels['exportsel']      = 'Export selected';
$labels['exportvcards']   = 'Exporteer contactpersonen in vCard formaat';
$labels['newcontactgroup'] = 'Maak een nieuwe contactgroep';
$labels['grouprename']    = 'Rename group';
$labels['groupdelete']    = 'Delete group';
$labels['groupremoveselected'] = 'Remove selected contacts from group';

$labels['previouspage']   = 'Toon vorige';
$labels['firstpage']      = 'Toon eerste';
$labels['nextpage']       = 'Toon volgende';
$labels['lastpage']       = 'Toon laatste';

$labels['group'] = 'Groep';
$labels['groups'] = 'Groepen';
$labels['personaladrbook'] = 'Personlijke adressen';

$labels['searchsave'] = 'Save search';
$labels['searchdelete'] = 'Delete search';

$labels['import'] = 'Importeer';
$labels['importcontacts'] = 'Contactpersonen importeren';
$labels['importfromfile'] = 'Importeer van bestand:';
$labels['importtarget'] = 'Add new contacts to address book:';
$labels['importreplace'] = 'Vervang het complete adresboek';
$labels['importdesc'] = 'You can upload contacts from an existing address book.<br/>We currently support importing addresses from the <a href="http://en.wikipedia.org/wiki/VCard">vCard</a> or CSV (comma-separated) data format.';
$labels['done'] = 'Klaar';

// settings
$labels['settingsfor'] = 'Instellingen voor';
$labels['about'] = 'About';
$labels['preferences'] = 'Voorkeuren';
$labels['userpreferences'] = 'Gebruikersvoorkeuren';
$labels['editpreferences'] = 'Gebruikersvoorkeuren bewerken';

$labels['identities'] = 'Identiteiten';
$labels['manageidentities'] = 'Beheer de identiteiten voor deze gebruiker';
$labels['newidentity'] = 'Nieuwe identiteit';

$labels['newitem'] = 'Nieuw';
$labels['edititem'] = 'Bewerken';

$labels['preferhtml'] = 'Gebruik HTML-opmaak';
$labels['defaultcharset'] = 'Standaard karakterset';
$labels['htmlmessage'] = 'HTML-bericht';
$labels['messagepart'] = 'Part';
$labels['digitalsig'] = 'Digital Signature';
$labels['dateformat'] = 'Date format';
$labels['timeformat'] = 'Time format';
$labels['prettydate'] = 'Uitgebreide datumweergave';
$labels['setdefault']  = 'Als standaard instellen';
$labels['autodetect']  = 'Automatisch';
$labels['language']  = 'Taal';
$labels['timezone']  = 'Tijdzone';
$labels['pagesize']  = 'Berichten per pagina';
$labels['signature'] = 'Handtekening';
$labels['dstactive']  = 'Zomer/wintertijd';
$labels['showinextwin'] = 'Open message in a new window';
$labels['composeextwin'] = 'Compose in a new window';
$labels['htmleditor'] = 'HTML berichten opmaken';
$labels['htmlonreply'] = 'enkel bij beantwoorden van een HTML bericht';
$labels['htmlonreplyandforward'] = 'on forward or reply to HTML message';
$labels['htmlsignature'] = 'HTML handtekening';
$labels['showemail'] = 'Show email address with display name';
$labels['previewpane'] = 'Toon voorbeeldvenster';
$labels['skin'] = 'Opmaakprofiel';
$labels['logoutclear'] = 'Prullenbak legen bij uitloggen';
$labels['logoutcompact'] = 'Postvak IN opschonen bij uitloggen';
$labels['uisettings'] = 'Gebruikersinterface';
$labels['serversettings'] = 'Serverinstellingen';
$labels['mailboxview'] = 'Opmaak Mailbox';
$labels['mdnrequests'] = 'Ontvangstmeldingen';
$labels['askuser'] = 'vraag de gebruiker';
$labels['autosend'] = 'stuur automatisch';
$labels['autosendknown'] = 'stuur ontvangstbevestiging naar mijn contactpersonen, anders vraag mij';
$labels['autosendknownignore'] = 'stuur ontvangstbevestiging naar mijn contactpersonen, anders negeer';
$labels['ignore'] = 'negeer';
$labels['readwhendeleted'] = 'Bericht na verwijderen als gelezen markeren';
$labels['flagfordeletion'] = 'Bericht niet verwijderen maar als verwijderd markeren';
$labels['skipdeleted'] = 'Verwijderde berichten niet tonen';
$labels['deletealways'] = 'Verwijder bericht wanneer verplaatsen naar Prullenbak mislukt';
$labels['deletejunk'] = 'Directly delete messages in Junk';
$labels['showremoteimages'] = 'Geef externe toegevoegde berichten weer';
$labels['fromknownsenders'] = 'Van bekende afzenders';
$labels['always'] = 'altijd';
$labels['showinlineimages'] = 'Toon bijgevoegde afbeeldingen onder het bericht';
$labels['autosavedraft']  = 'Automatisch als concept opslaan';
$labels['everynminutes']  = 'elke $n minuten';
$labels['refreshinterval']  = 'Refresh (check for new messages, etc.)';
$labels['never']  = 'nooit';
$labels['immediately']  = 'onmiddellijk';
$labels['messagesdisplaying'] = 'Berichten weergave';
$labels['messagescomposition'] = 'Berichten aanmaken';
$labels['mimeparamfolding'] = 'Namen van bijlagen';
$labels['2231folding'] = 'Volledig RFC 2231 (Thunderbird)';
$labels['miscfolding'] = 'RFC 2047/2231 (MS Outlook)';
$labels['2047folding'] = 'Volledig RFC 2047 (andere)';
$labels['force7bit'] = 'Gebruik MIME codering voor 8-bit karakters';
$labels['advancedoptions'] = 'Geavanceerde opties';
$labels['focusonnewmessage'] = 'Focus browserscherm bij nieuw bericht';
$labels['checkallfolders'] = 'Controleer alle mappen op nieuwe berichten';
$labels['displaynext'] = 'Na verplaatsen/verwijderen het volgende bericht tonen';
$labels['defaultfont'] = 'Default font of HTML message';
$labels['mainoptions'] = 'Hoofdopties';
$labels['browseroptions'] = 'Browser Options';
$labels['section'] = 'Sectie';
$labels['maintenance'] = 'Onderhoud';
$labels['newmessage'] = 'Nieuw bericht';
$labels['signatureoptions'] = 'Opties voor handtekening';
$labels['whenreplying'] = 'Bij beantwoorden';
$labels['replyempty'] = 'do not quote the original message';
$labels['replytopposting'] = 'begin bericht boven het origineel';
$labels['replybottomposting'] = 'begin bericht onder het origineel';
$labels['replyremovesignature'] = 'Verwijder handtekening uit het origneel bij beantwoorden';
$labels['autoaddsignature'] = 'Handtekening automatisch toevoegen';
$labels['newmessageonly'] = 'alleen bij nieuwe berichten';
$labels['replyandforwardonly'] = 'alleen bij beantwoorden en doorsturen';
$labels['insertsignature'] = 'Handtekening invoegen';
$labels['previewpanemarkread']  = 'Markeer voorbeeldbericht als gelezen';
$labels['afternseconds']  = 'Na $n seconden';
$labels['reqmdn'] = 'Vraag altijd een ontvangstbevestiging';
$labels['reqdsn'] = 'Vraag altijd een Delivery Status Notification';
$labels['replysamefolder'] = 'Plaats antwoorden in de map van het beantwoorde bericht';
$labels['defaultabook'] = 'Default address book';
$labels['autocompletesingle'] = 'Skip alternative email addresses in autocompletion';
$labels['listnamedisplay'] = 'List contacts as';
$labels['spellcheckbeforesend'] = 'Check spelling before sending a message';
$labels['spellcheckoptions'] = 'Spellcheck Options';
$labels['spellcheckignoresyms'] = 'Ignore words with symbols';
$labels['spellcheckignorenums'] = 'Ignore words with numbers';
$labels['spellcheckignorecaps'] = 'Ignore words with all letters capitalized';
$labels['addtodict'] = 'Add to dictionary';
$labels['mailtoprotohandler'] = 'Register protocol handler for mailto: links';
$labels['forwardmode'] = 'Messages forwarding';
$labels['inline'] = 'inline';
$labels['asattachment'] = 'as attachment';

$labels['folder']  = 'Map';
$labels['folders']  = 'Mappen';
$labels['foldername']  = 'Naam';
$labels['subscribed']  = 'Geabonneerd';
$labels['messagecount'] = 'Berichten';
$labels['create']  = 'Aanmaken';
$labels['createfolder']  = 'Nieuwe map aanmaken';
$labels['managefolders']  = 'Mappen beheren';
$labels['specialfolders'] = 'Speciale mappen';
$labels['properties'] = 'Eigenschappen';
$labels['folderproperties'] = 'Eigenschappen van map';
$labels['parentfolder'] = 'Bovenliggende map';
$labels['location'] = 'Locatie';
$labels['info'] = 'Informatie';
$labels['getfoldersize'] = 'Klik voor de grootte van de map';
$labels['changesubscription'] = 'Klik voor abonnement te wijzigen';
$labels['foldertype'] = 'Folder Type';
$labels['personalfolder']  = 'Private Folder';
$labels['otherfolder']  = 'Other User\'s Folder';
$labels['sharedfolder']  = 'Public Folder';

$labels['sortby'] = 'Sorteren op';
$labels['sortasc']  = 'Oplopend sorteren';
$labels['sortdesc'] = 'Aflopend sorteren';
$labels['undo'] = 'Undo';

$labels['installedplugins'] = 'Installed plugins';
$labels['plugin'] = 'Plugin';
$labels['version'] = 'Version';
$labels['source'] = 'Source';
$labels['license'] = 'License';
$labels['support'] = 'Get support';

// units
$labels['B'] = 'B';
$labels['KB'] = 'KB';
$labels['MB'] = 'MB';
$labels['GB'] = 'GB';

// character sets
$labels['unicode'] = 'Unicode';
$labels['english'] = 'Engels';
$labels['westerneuropean'] = 'West-Europees';
$labels['easterneuropean'] = 'Oost-Europees';
$labels['southeasterneuropean'] = 'Zuidoost Europees';
$labels['baltic'] = 'Baltisch';
$labels['cyrillic'] = 'Cyrillisch';
$labels['arabic'] = 'Arabisch';
$labels['greek'] = 'Grieks';
$labels['hebrew'] = 'Hebreeuws';
$labels['turkish'] = 'Turks';
$labels['nordic'] = 'Noord-Germaans';
$labels['thai'] = 'Thais';
$labels['celtic'] = 'Keltisch';
$labels['vietnamese'] = 'Vietnamees';
$labels['japanese'] = 'Japans';
$labels['korean'] = 'Koreaans';
$labels['chinese'] = 'Chinees';

?>