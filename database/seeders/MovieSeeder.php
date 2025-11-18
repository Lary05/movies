<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use App\Models\Actor;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title'=>'Eredet',
                'description'=>'Dom Cobb, a kiemelkedő tolvaj, aki az emberek titkos álmaiban lop információkat, egy végső, rendkívül kockázatos feladattal szembesül: nem ellopni, hanem beültetni egy gondolatot valaki elméjébe. Ahogy a csapat mélyebbre merül az álmok rétegeibe, a valóság és az illúzió határa elmosódik, és minden döntés a mindennapi életükre is kihat. Egy vizuálisan lenyűgöző és intellektuálisan izgalmas sci-fi akciófilm, amely a tudat határait feszegeti.',
                'director_id'=>1,
                'category_id'=>1,
                'actors'=>[1,2],
                'cover_image'=>'films/film_1.jpg'
            ],
            [
                'title'=>'Titanic',
                'description'=>'A történelmi katasztrófa hátterében kibontakozó szerelmi történet: a gazdag Rose és a szegény Jack váratlanul egymásra találnak a világ legnagyobb és legmodernebb óceánjáróján. A hajó tragikus sorsa és a társadalmi különbségek egyaránt próbára teszik a szerelmet, miközben a történet a bátorság, az önfeláldozás és az emberi szív erejét mutatja be.',
                'director_id'=>5,
                'category_id'=>5,
                'actors'=>[1,5],
                'cover_image'=>'films/film_2.jpg'
            ],
            [
                'title'=>'Ponyvaregény',
                'description'=>'Quentin Tarantino kultikus mesterműve, amely egymással összefonódó történetszálakon keresztül mutatja be a Los Angeles-i alvilág életét. A film híres párbeszédeiről, fekete humoráról és váratlan fordulatairól, miközben bűnözők, zsoldosok és hétköznapi emberek életének különös, néha brutális, néha nevettető pillanatait tárja fel.',
                'director_id'=>3,
                'category_id'=>7,
                'actors'=>[2,4],
                'cover_image'=>'films/film_3.jpg'
            ],
            [
                'title'=>'Bosszúállók: Végjáték',
                'description'=>'A Marvel Univerzum epikus záróakkordja, amelyben a túlélő Bosszúállók összefognak, hogy visszafordítsák Thanos pusztító tetteit, aki fél univerzumot kipusztított. A hősöknek nemcsak a fizikai erejüket, hanem lelkierőiket és összetartásukat is próbára kell tenniük, miközben szembenéznek a múltjukkal és a jövőjükért hozott áldozatokkal. Egy időutazásra épülő terv, feszültséggel teli csaták és érzelmi pillanatok jellemzik a filmet, amely a Marvel-saga egyik legnagyobb és legmeghatóbb epizódja.',
                'director_id'=>6,
                'category_id'=>1,
                'actors'=>[3,4,6],
                'cover_image'=>'films/film_4.jpg'
            ],
            [
                'title'=>'Csillagok között',
                'description'=>'Christopher Nolan grandiózus sci-fi drámája, amelyben a Föld haldokló környezete miatt az emberiség új otthont keres a csillagok között. Egy csapat űrhajós féreglyukon át utazik, hogy új lakható bolygót találjon, miközben az idő és a tér törvényei próbára teszik a hősök bátorságát és családi kötelékeiket.',
                'director_id'=>1,
                'category_id'=>1,
                'actors'=>[1,6],
                'cover_image'=>'films/film_5.jpg'
            ],
            [
                'title'=>'Szárnyas fejvadász 2049',
                'description'=>'Denis Villeneuve mesterműve, amely Ridley Scott klasszikusának folytatása. A történet egy új replikáns nyomozó, K életét követi, aki egy olyan titokra bukkan, amely megkérdőjelezi az egész társadalmi rendet és az emberi lét jövőjét.',
                'director_id'=>8,
                'category_id'=>1,
                'actors'=>[1,3],
                'cover_image'=>'films/film_6.jpg'
            ],
            [
                'title'=>'Harcosok klubja',
                'description'=>'David Fincher kultikus filmje, amely a modern fogyasztói társadalom kiüresedését boncolgatja. Egy kiégett irodista találkozik a karizmatikus Tyler Durdennel, és együtt titkos harcos klubot alapítanak, amely hamarosan globális anarchista mozgalommá válik.',
                'director_id'=>9,
                'category_id'=>7,
                'actors'=>[2,5],
                'cover_image'=>'films/film_7.jpg'
            ],
            [
                'title'=>'Gladiátor',
                'description'=>'Ridley Scott epikus történelmi filmje, amelyben Maximus, a római hadvezér, árulás áldozata lesz, és rabszolgasorba taszítják. A gladiátorviadalok során azonban új erőre kap, és bosszút esküszik a császár ellen.',
                'director_id'=>10,
                'category_id'=>4,
                'actors'=>[5],
                'cover_image'=>'films/film_8.jpg'
            ],
            [
                'title'=>'Forrest Gump',
                'description'=>'Tom Hanks felejthetetlen alakításában egy alacsony IQ-val rendelkező, de aranyszívű férfi történetét követjük, aki akaratlanul is részt vesz az amerikai történelem legfontosabb pillanataiban, miközben élete egyetlen szerelméért harcol.',
                'director_id'=>11,
                'category_id'=>5,
                'actors'=>[5],
                'cover_image'=>'films/film_9.jpg'
            ],
            [
                'title'=>'A Keresztapa',
                'description'=>'Francis Ford Coppola legendás filmje a Corleone maffiacsaládról, amely a hatalom, a lojalitás és a család közötti bonyolult kapcsolatokat vizsgálja. A film Michael Corleone felemelkedését mutatja be a család fejévé válásig.',
                'director_id'=>12,
                'category_id'=>7,
                'actors'=>[2],
                'cover_image'=>'films/film_10.jpg'
            ],
            [
                'title'=>'Shutter Island',
                'description'=>'Martin Scorsese pszichológiai thrillere, amelyben két nyomozó egy elmegyógyintézet lakóinak rejtélyes eltűnését vizsgálja. Ahogy egyre mélyebbre ásnak, lassan kiderül, hogy semmi sem az, aminek látszik.',
                'director_id'=>4,
                'category_id'=>7,
                'actors'=>[1],
                'cover_image'=>'films/film_11.jpg'
            ],
            [
                'title'=>'A sötét lovag',
                'description'=>'Christopher Nolan Batman-trilógiájának második része, amelyben a denevérember szembekerül a kaotikus Jokerrel. A film sötét tónusával és Heath Ledger legendás alakításával új szintre emelte a képregényfilmeket.',
                'director_id'=>1,
                'category_id'=>2,
                'actors'=>[1,2,3],
                'cover_image'=>'films/film_12.jpg'
            ],
            [
                'title'=>'A remény rabjai',
                'description'=>'Frank Darabont megható drámája, amely Stephen King regényén alapul. Andy Dufresne, egy ártatlanul elítélt bankár barátságot köt egy másik rabbal, Red-del, és reménye tartja életben a börtön kegyetlen világában.',
                'director_id'=>13,
                'category_id'=>5,
                'actors'=>[5],
                'cover_image'=>'films/film_13.jpg'
            ],
            [
                'title'=>'Az ötödik elem',
                'description'=>'Luc Besson vizuálisan lenyűgöző sci-fije, amelyben egy taxisofőr és egy titokzatos nő próbálja megakadályozni, hogy az univerzumot elpusztítsa a gonosz. A film színes látványvilága és különc karakterei igazi kultklasszikussá tették.',
                'director_id'=>14,
                'category_id'=>1,
                'actors'=>[6],
                'cover_image'=>'films/film_14.jpg'
            ],
            [
                'title'=>'Amerikai szépség',
                'description'=>'Sam Mendes Oscar-díjas filmje, amely egy kertvárosi család életén keresztül mutatja be a modern amerikai álom széthullását. A film egyszerre kritikus és szatirikus képet fest a boldogság hajszolásáról.',
                'director_id'=>15,
                'category_id'=>5,
                'actors'=>[2,6],
                'cover_image'=>'films/film_15.jpg'
            ],
            [
                'title'=>'Szellemirtók',
                'description'=>'Ivan Reitman vígjátéka, amelyben egy különc tudósokból álló csapat kísértetirtó vállalkozást indít New Yorkban. A film humorával és látványos trükkjeivel vált generációk kedvencévé.',
                'director_id'=>16,
                'category_id'=>6,
                'actors'=>[5],
                'cover_image'=>'films/film_16.jpg'
            ],
            [
                'title'=>'A Mátrix',
                'description'=>'A Wachowski testvérek forradalmi sci-fije, amely bemutatja, hogy a világ, amelyben élünk, valójában egy szimuláció. Neo, a számítógépes hacker, ráébred valódi szerepére, mint az emberiség megmentője.',
                'director_id'=>17,
                'category_id'=>1,
                'actors'=>[2,3],
                'cover_image'=>'films/film_17.jpg'
            ],
            [
                'title'=>'Inception',
                'description'=>'Egy különleges akcióthriller, amely az álmok rétegeibe kalauzol minket. A csapat a tudat mélyébe hatol, hogy végrehajtson egy komplex "beültetési" küldetést, miközben minden lépés veszélyt hordoz a valóságra és személyes életükre is.',
                'director_id'=>1,
                'category_id'=>1,
                'actors'=>[1,2,3],
                'cover_image'=>'films/film_18.jpg'
            ],
            [
                'title'=>'Jurassic Park',
                'description'=>'Steven Spielberg klasszikusa, ahol egy dinoszauruszpark technológiai csodái váratlanul elszabadulnak. A tudósok, gyermekek és látogatók küzdenek a túlélésért egy lenyűgöző, de veszélyes világban.',
                'director_id'=>2,
                'category_id'=>4,
                'actors'=>[4,5],
                'cover_image'=>'films/film_19.jpg'
            ],
            [
                'title'=>'Interstellar',
                'description'=>'Christopher Nolan grandiózus sci-fi filmje az emberiség jövőjéről és a szeretet erejéről, ami átível az időn és téridőn. A csapat féreglyukakon keresztül kutat új lakható bolygók után.',
                'director_id'=>1,
                'category_id'=>1,
                'actors'=>[1,6],
                'cover_image'=>'films/film_20.jpg'
            ],
            [
                'title'=>'Dűne',
                'description'=>'Denis Villeneuve monumentális sci-fi adaptációja Frank Herbert regényéből. Paul Atreides és családja az Arrakis bolygón találja magát, ahol politika, hatalom és sivatagi titkok keverednek egy epikus kalandban.',
                'director_id'=>8,
                'category_id'=>1,
                'actors'=>[2,3,6],
                'cover_image'=>'films/film_21.jpg'
            ],
            [
                'title'=>'Tenet',
                'description'=>'Christopher Nolan időmanipulációs thrillere, ahol a főhős a jövő és múlt összefonódó eseményeit próbálja megakadályozni, hogy globális katasztrófa következzen be. A film látványos akcióval és bonyolult időlogikával operál.',
                'director_id'=>1,
                'category_id'=>1,
                'actors'=>[1,2,3,6],
                'cover_image'=>'films/film_22.jpg'
            ],
            [
                'title'=>'Blade Runner',
                'description'=>'Ridley Scott kultikus sci-fi filmje, ahol a replikánsok és emberek közötti határ elmosódik. A nyomozó, Rick Deckard, az emberi létezés és a gépi tudat kérdéseit vizsgálja egy sötét, neonfényes jövőben.',
                'director_id'=>10,
                'category_id'=>1,
                'actors'=>[3,5],
                'cover_image'=>'films/film_23.jpg'
            ],
            [
                'title'=>'Avatar',
                'description'=>'James Cameron vizuális csodája, amely a Pandora bolygón játszódik. Az emberek és a Na’vi őslakosok konfliktusa során a főhős új perspektívát talál a szeretetre, hűségre és a természet tiszteletére.',
                'director_id'=>6,
                'category_id'=>1,
                'actors'=>[1,6],
                'cover_image'=>'films/film_24.jpg'
            ]
        ];

        foreach ($movies as $m) {
            $movie = Movie::create([
                'title'=>$m['title'],
                'description'=>$m['description'],
                'director_id'=>$m['director_id'],
                'category_id'=>$m['category_id'],
                'cover_image'=>$m['cover_image']
            ]);

            // Színészek hozzáadása many-to-many kapcsolaton keresztül
            $movie->actors()->attach($m['actors']);
        }
    }
}
