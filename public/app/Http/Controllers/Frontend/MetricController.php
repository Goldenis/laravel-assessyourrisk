<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Metric;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Stevebauman\Location\Facades\Location;



class MetricController extends Controller
{

    /**
     *
     */
    public function load(Request $request)
    {
        //$location = Location::get($_SERVER["REMOTE_ADDR"]);
        $location = Location::get('190.43.15.242');
        $browser = \BrowserDetect::detect();
       // dd($browser);

        //language detected
        $language = $this->getLanguage();

        $ln = substr($request['language'],0,2);

        $lan = $language[$ln];


        if($browser->isMobile == true){
            $device = 'Mobile';
        }else if($browser->isTablet == true){
            $device = 'Tablet';
        }else if($browser->isDesktop == true){
            $device = 'Desktop';
        }

        //screen
        $width = $request['width'];
        $height = $request['height'];
        $screen = $width.' x '.$height;

        //session
        $session = $request['session'];

        $session_metric = Metric::where('session_id',$session)->get();
        $array = $session_metric->toArray();
        if($array==[])
        {
            $metric = new Metric();
            $metric->session_id = $session;
            $metric->browser = $browser->browserFamily;
            $metric->city = $location->cityName;
            $metric->state = $location->regionName;
            $metric->country = $location->countryName;
            $metric->device = $device;
            $metric->ip = $_SERVER["REMOTE_ADDR"];
            $metric->language = $lan;
            $metric->os = $browser->osFamily;
            $metric->pid = 1;
            $metric->referrer = 0;
            $metric->resolution = 0;
            $metric->screen = $screen;
            $metric->save();

        }
        else
        {
            $metric = Metric::where('session_id',$session)->get();
            $pid = $metric[0]->pid;

            Metric::where('session_id',$session)->update(['pid'=>($pid+1)]);

        }


       ;
    }

    public function getLanguage()
    {
       $language = [

        "alpha2","English",
        "aa"=>"Afar",
        "ab"=>"Abkhazian",
        "ae"=>"Avestan",
        "af"=>"Afrikaans",
        "ak"=>"Akan",
        "am"=>"Amharic",
        "an"=>"Aragonese",
        "ar"=>"Arabic",
        "as"=>"Assamese",
        "av"=>"Avaric",
        "ay"=>"Aymara",
        "az"=>"Azerbaijani",
        "ba"=>"Bashkir",
        "be"=>"Belarusian",
        "bg"=>"Bulgarian",
        "bh"=>"Bihari languages",
        "bi"=>"Bislama",
        "bm"=>"Bambara",
        "bn"=>"Bengali",
        "bo"=>"Tibetan",
        "br"=>"Breton",
        "bs"=>"Bosnian",
        "ca"=>"Catalan; Valencian",
        "ce"=>"Chechen",
        "ch"=>"Chamorro",
        "co"=>"Corsican",
        "cr"=>"Cree",
        "cs"=>"Czech",
        "cu"=>"Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic",
        "cv"=>"Chuvash",
        "cy"=>"Welsh",
        "da"=>"Danish",
        "de"=>"German",
        "dv"=>"Divehi; Dhivehi; Maldivian",
        "dz"=>"Dzongkha",
        "ee"=>"Ewe",
        "el"=>"Greek, Modern (1453-)",
        "en"=>"English",
        "eo"=>"Esperanto",
        "es"=>"Spanish; Castilian",
        "et"=>"Estonian",
        "eu"=>"Basque",
        "fa"=>"Persian",
        "ff"=>"Fulah",
        "fi"=>"Finnish",
        "fj"=>"Fijian",
        "fo"=>"Faroese",
        "fr"=>"French",
        "fy"=>"Western Frisian",
        "ga"=>"Irish",
        "gd"=>"Gaelic; Scottish Gaelic",
        "gl"=>"Galician",
        "gn"=>"Guarani",
        "gu"=>"Gujarati",
        "gv"=>"Manx",
        "ha"=>"Hausa",
        "he"=>"Hebrew",
        "hi"=>"Hindi",
        "ho"=>"Hiri Motu",
        "hr"=>"Croatian",
        "ht"=>"Haitian; Haitian Creole",
        "hu"=>"Hungarian",
        "hy"=>"Armenian",
        "hz"=>"Herero",
        "ia"=>"Interlingua (International Auxiliary Language Association)",
        "id"=>"Indonesian",
        "ie"=>"Interlingue; Occidental",
        "ig"=>"Igbo",
        "ii"=>"Sichuan Yi; Nuosu",
        "ik"=>"Inupiaq",
        "io"=>"Ido",
        "is"=>"Icelandic",
        "it"=>"Italian",
        "iu"=>"Inuktitut",
        "ja"=>"Japanese",
        "jv"=>"Javanese",
        "ka"=>"Georgian",
        "kg"=>"Kongo",
        "ki"=>"Kikuyu; Gikuyu",
        "kj"=>"Kuanyama; Kwanyama",
        "kk"=>"Kazakh",
        "kl"=>"Kalaallisut; Greenlandic",
        "km"=>"Central Khmer",
        "kn"=>"Kannada",
        "ko"=>"Korean",
        "kr"=>"Kanuri",
        "ks"=>"Kashmiri",
        "ku"=>"Kurdish",
        "kv"=>"Komi",
        "kw"=>"Cornish",
        "ky"=>"Kirghiz; Kyrgyz",
        "la"=>"Latin",
        "lb"=>"Luxembourgish; Letzeburgesch",
        "lg"=>"Ganda",
        "li"=>"Limburgan; Limburger; Limburgish",
        "ln"=>"Lingala",
        "lo"=>"Lao",
        "lt"=>"Lithuanian",
        "lu"=>"Luba-Katanga",
        "lv"=>"Latvian",
        "mg"=>"Malagasy",
        "mh"=>"Marshallese",
        "mi"=>"Maori",
        "mk"=>"Macedonian",
        "ml"=>"Malayalam",
        "mn"=>"Mongolian",
        "mr"=>"Marathi",
        "ms"=>"Malay",
        "mt"=>"Maltese",
        "my"=>"Burmese",
        "na"=>"Nauru",
        "nb"=>"Bokmål, Norwegian; Norwegian Bokmål",
        "nd"=>"Ndebele, North; North Ndebele",
        "ne"=>"Nepali",
        "ng"=>"Ndonga",
        "nl"=>"Dutch; Flemish",
        "nn"=>"Norwegian Nynorsk; Nynorsk=> Norwegian",
        "no"=>"Norwegian",
        "nr"=>"Ndebele, South; South Ndebele",
        "nv"=>"Navajo; Navaho",
        "ny"=>"Chichewa; Chewa; Nyanja",
        "oc"=>"Occitan (post 1500); Provençal",
        "oj"=>"Ojibwa",
        "om"=>"Oromo",
        "or"=>"Oriya",
        "os"=>"Ossetian; Ossetic",
        "pa"=>"Panjabi; Punjabi",
        "pi"=>"Pali",
        "pl"=>"Polish",
        "ps"=>"Pushto; Pashto",
        "pt"=>"Portuguese",
        "qu"=>"Quechua",
        "rm"=>"Romansh",
        "rn"=>"Rundi",
        "ro"=>"Romanian; Moldavian; Moldovan",
        "ru"=>"Russian",
        "rw"=>"Kinyarwanda",
        "sa"=>"Sanskrit",
        "sc"=>"Sardinian",
        "sd"=>"Sindhi",
        "se"=>"Northern Sami",
        "sg"=>"Sango",
        "si"=>"Sinhala; Sinhalese",
        "sk"=>"Slovak",
        "sl"=>"Slovenian",
        "sm"=>"Samoan",
        "sn"=>"Shona",
        "so"=>"Somali",
        "sq"=>"Albanian",
        "sr"=>"Serbian",
        "ss"=>"Swati",
        "st"=>"Sotho, Southern",
        "su"=>"Sundanese",
        "sv"=>"Swedish",
        "sw"=>"Swahili",
        "ta"=>"Tamil",
        "te"=>"Telugu",
        "tg"=>"Tajik",
        "th"=>"Thai",
        "ti"=>"Tigrinya",
        "tk"=>"Turkmen",
        "tl"=>"Tagalog",
        "tn"=>"Tswana",
        "to"=>"Tonga (Tonga Islands)",
        "tr"=>"Turkish",
        "ts"=>"Tsonga",
        "tt"=>"Tatar",
        "tw"=>"Twi",
        "ty"=>"Tahitian",
        "ug"=>"Uighur; Uyghur",
        "uk"=>"Ukrainian",
        "ur"=>"Urdu",
        "uz"=>"Uzbek",
        "ve"=>"Venda",
        "vi"=>"Vietnamese",
        "vo"=>"Volapük",
        "wa"=>"Walloon",
        "wo"=>"Wolof",
        "xh"=>"Xhosa",
        "yi"=>"Yiddish",
        "yo"=>"Yoruba",
        "za"=>"Zhuang; Chuang",
        "zh"=>"Chinese",
        "zu"=>"Zulu",
    ];
        return $language;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
