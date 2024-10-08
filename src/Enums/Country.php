<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Country.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum Country: string {
    case Andorra = 'AD';
    case VereinigteArabischeEmirate = 'AE';
    case Afghanistan = 'AF';
    case AntiguaUndBarbuda = 'AG';
    case Anguilla = 'AI';
    case Albanien = 'AL';
    case Armenien = 'AM';
    case NiederländischeAntillen = 'AN';
    case Angola = 'AO';
    case Antarktis = 'AQ';
    case Argentinien = 'AR';
    case AmerikanischSamoa = 'AS';
    case Österreich = 'AT';
    case Australien = 'AU';
    case Aruba = 'AW';
    case Ålandinseln = 'AX';
    case Aserbaidschan = 'AZ';
    case BosnienUndHerzegowina = 'BA';
    case Barbados = 'BB';
    case Bangladesch = 'BD';
    case Belgien = 'BE';
    case BurkinaFaso = 'BF';
    case Bulgarien = 'BG';
    case Bahrain = 'BH';
    case Burundi = 'BI';
    case Benin = 'BJ';
    case StBarthélemy = 'BL';
    case Bermuda = 'BM';
    case BruneiDarussalam = 'BN';
    case Bolivien = 'BO';
    case Bonaire = 'BQ';
    case Brasilien = 'BR';
    case Bahamas = 'BS';
    case Bhutan = 'BT';
    case Bouvetinsel = 'BV';
    case Botsuana = 'BW';
    case Belarus = 'BY';
    case Belize = 'BZ';
    case Kanada = 'CA';
    case Kokosinseln = 'CC';
    case KongoDemokratischeRepublik = 'CD';
    case ZentralafrikanischeRepublik = 'CF';
    case Kongo = 'CG';
    case Schweiz = 'CH';
    case CôteDIvoire = 'CI';
    case Cookinseln = 'CK';
    case Chile = 'CL';
    case Kamerun = 'CM';
    case China = 'CN';
    case Kolumbien = 'CO';
    case CostaRica = 'CR';
    case SerbienUndMontenegro = 'CS';
    case Kuba = 'CU';
    case CaboVerde = 'CV';
    case Curaçao = 'CW';
    case Weihnachtsinsel = 'CX';
    case Zypern = 'CY';
    case Tschechien = 'CZ';
    case Deutschland = 'DE';
    case Dschibuti = 'DJ';
    case Dänemark = 'DK';
    case Dominica = 'DM';
    case DominikanischeRepublik = 'DO';
    case Algerien = 'DZ';
    case Ecuador = 'EC';
    case Estland = 'EE';
    case Ägypten = 'EG';
    case Westsahara = 'EH';
    case Eritrea = 'ER';
    case Spanien = 'ES';
    case Äthiopien = 'ET';
    case Finnland = 'FI';
    case Fidschi = 'FJ';
    case Falklandinseln = 'FK';
    case Mikronesien = 'FM';
    case Färöer = 'FO';
    case Frankreich = 'FR';
    case Gabun = 'GA';
    case Großbritannien = 'GB';
    case Grenada = 'GD';
    case Georgien = 'GE';
    case FranzösischGuayana = 'GF';
    case Guernsey = 'GG';
    case Ghana = 'GH';
    case Gibraltar = 'GI';
    case Grönland = 'GL';
    case Gambia = 'GM';
    case Guinea = 'GN';
    case Guadeloupe = 'GP';
    case Äquatorialguinea = 'GQ';
    case Griechenland = 'GR';
    case SüdgeorgienUndDieSüdlichenSandwichinseln = 'GS';
    case Guatemala = 'GT';
    case Guam = 'GU';
    case GuineaBissau = 'GW';
    case Guyana = 'GY';
    case Hongkong = 'HK';
    case HeardUndMcDonaldinseln = 'HM';
    case Honduras = 'HN';
    case Kroatien = 'HR';
    case Haiti = 'HT';
    case Ungarn = 'HU';
    case Indonesien = 'ID';
    case Irland = 'IE';
    case Israel = 'IL';
    case InselMan = 'IM';
    case Indien = 'IN';
    case BritischesTerritoriumImIndischenOzean = 'IO';
    case Irak = 'IQ';
    case Iran = 'IR';
    case Island = 'IS';
    case Italien = 'IT';
    case Jersey = 'JE';
    case Jamaika = 'JM';
    case Jordanien = 'JO';
    case Japan = 'JP';
    case Kenia = 'KE';
    case Kirgisistan = 'KG';
    case Kambodscha = 'KH';
    case Kiribati = 'KI';
    case Komoren = 'KM';
    case StKittsUndNevis = 'KN';
    case KoreaDemokratischeVolksrepublik = 'KP';
    case KoreaRepublik = 'KR';
    case Kuwait = 'KW';
    case Kaimaninseln = 'KY';
    case Kasachstan = 'KZ';
    case Laos = 'LA';
    case Libanon = 'LB';
    case StLucia = 'LC';
    case Liechtenstein = 'LI';
    case SriLanka = 'LK';
    case Liberia = 'LR';
    case Lesotho = 'LS';
    case Litauen = 'LT';
    case Luxemburg = 'LU';
    case Lettland = 'LV';
    case Libyen = 'LY';
    case Marokko = 'MA';
    case Monaco = 'MC';
    case Moldau = 'MD';
    case Montenegro = 'ME';
    case StMartinFranzösischerTeil = 'MF';
    case Madagaskar = 'MG';
    case Marshallinseln = 'MH';
    case Nordmazedonien = 'MK';
    case Mali = 'ML';
    case Myanmar = 'MM';
    case Mongolei = 'MN';
    case Macau = 'MO';
    case NördlicheMarianen = 'MP';
    case Martinique = 'MQ';
    case Mauretanien = 'MR';
    case Montserrat = 'MS';
    case Malta = 'MT';
    case Mauritius = 'MU';
    case Malediven = 'MV';
    case Malawi = 'MW';
    case Mexiko = 'MX';
    case Malaysia = 'MY';
    case Mosambik = 'MZ';
    case Namibia = 'NA';
    case Neukaledonien = 'NC';
    case Niger = 'NE';
    case Norfolkinsel = 'NF';
    case Nigeria = 'NG';
    case Nicaragua = 'NI';
    case Niederlande = 'NL';
    case Norwegen = 'NO';
    case Nepal = 'NP';
    case Nauru = 'NR';
    case Niue = 'NU';
    case Neuseeland = 'NZ';
    case Oman = 'OM';
    case Panama = 'PA';
    case Peru = 'PE';
    case FranzösischPolynesien = 'PF';
    case PapuaNeuguinea = 'PG';
    case Philippinen = 'PH';
    case Pakistan = 'PK';
    case Polen = 'PL';
    case StPierreUndMiquelon = 'PM';
    case Pitcairninseln = 'PN';
    case PuertoRico = 'PR';
    case PalästinensischeGebiete = 'PS';
    case Portugal = 'PT';
    case Palau = 'PW';
    case Paraguay = 'PY';
    case Katar = 'QA';
    case Réunion = 'RE';
    case Rumänien = 'RO';
    case Serbien = 'RS';
    case RussischeFöderation = 'RU';
    case Ruanda = 'RW';
    case SaudiArabien = 'SA';
    case Salomonen = 'SB';
    case Seychellen = 'SC';
    case Sudan = 'SD';
    case Schweden = 'SE';
    case Singapur = 'SG';
    case StHelenaAscensionUndTristanDaCunha = 'SH';
    case Slowenien = 'SI';
    case SvalbardUndJanMayen = 'SJ';
    case Slowakei = 'SK';
    case SierraLeone = 'SL';
    case SanMarino = 'SM';
    case Senegal = 'SN';
    case Somalia = 'SO';
    case Suriname = 'SR';
    case Südsudan = 'SS';
    case SaoTomeUndPrincipe = 'ST';
    case ElSalvador = 'SV';
    case StMartinNiederländischerTeil = 'SX';
    case Syrien = 'SY';
    case Eswatini = 'SZ';
    case TurksUndCaicosinseln = 'TC';
    case Tschad = 'TD';
    case FranzösischeSüdUndAntarktisgebiete = 'TF';
    case Togo = 'TG';
    case Thailand = 'TH';
    case Tadschikistan = 'TJ';
    case Tokelau = 'TK';
    case TimorLeste = 'TL';
    case Turkmenistan = 'TM';
    case Tunesien = 'TN';
    case Tonga = 'TO';
    case Türkei = 'TR';
    case TrinidadUndTobago = 'TT';
    case Tuvalu = 'TV';
    case Taiwan = 'TW';
    case Tansania = 'TZ';
    case Ukraine = 'UA';
    case Uganda = 'UG';
    case AmerikanischeÜberseeinselnKleinere = 'UM';
    case VereinigteStaatenVonAmerika = 'US';
    case Uruguay = 'UY';
    case Usbekistan = 'UZ';
    case Vatikanstadt = 'VA';
    case StVincentUndDieGrenadinen = 'VC';
    case Venezuela = 'VE';
    case BritischeJungferninseln = 'VG';
    case AmerikanischeJungferninseln = 'VI';
    case Vietnam = 'VN';
    case Vanuatu = 'VU';
    case WallisUndFutuna = 'WF';
    case Samoa = 'WS';
    case Nordirland = 'XI';
    case Kosovo = 'XK';
    case Jemen = 'YE';
    case Mayotte = 'YT';
    case Südafrika = 'ZA';
    case Sambia = 'ZM';
    case Simbabwe = 'ZW';
}
