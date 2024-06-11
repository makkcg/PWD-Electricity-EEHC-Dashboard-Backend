<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutSound;
use App\Models\AboutVideo;
use App\Models\Branch;
use App\Models\BranchImage;
use App\Models\BranchSound;
use App\Models\BranchVideo;
use App\Models\City;
use App\Models\Country;
use App\Models\Document;
use App\Models\DocumentImage;
use App\Models\DocumentTranslationMedia;
use App\Models\Faq;
use App\Models\FaqImage;
use App\Models\FaqTranslationMedia;
use App\Models\Foundation;
use App\Models\FoundationImage;
use App\Models\FoundationSound;
use App\Models\FoundationVideo;
use App\Models\Procedure;
use App\Models\ProcedureImage;
use App\Models\ProcedureTranslationMedia;
use App\Models\Regulation;
use App\Models\RegulationImage;
use App\Models\RegulationTranslationMedia;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceTranslationMedia;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         //  $this->seedUsers();
           $this->seedCountry();
           $this->seedState();
           $this->seedCities();
        //    $this->seedFoundation();
        //    $this->seedAbout();
        //    $this->seedBranch();
        //    $this->seedService();
           $this->spatie();
    }

    private function seedUsers()
    {
        User::factory(15)->create();
    }

    private function seedCountry()
    {
        $entries= '[
            {"id":"1","name_ar":"مصر","name_en":"Egypt"}
            ]';

            foreach (json_decode($entries, true) as $entry) {
                $data = [
                    'ar' => ["name" => $entry["name_ar"]],
                    'en' => ["name" => $entry["name_en"]]
                ];
                Country::factory(1)->state(new Sequence($data))->create();
            }
    }
    private function seedState()
    {
        $entries= '[{"id":"1","name_ar":"القاهرة","name_en":"Cairo"},
        {"id":"2","name_ar":"الجيزة","name_en":"Giza"},
        {"id":"3","name_ar":"الأسكندرية","name_en":"Alexandria"},
        {"id":"4","name_ar":"الدقهلية","name_en":"Dakahlia"},
        {"id":"5","name_ar":"البحر الأحمر","name_en":"Red Sea"},
        {"id":"6","name_ar":"البحيرة","name_en":"Beheira"},
        {"id":"7","name_ar":"الفيوم","name_en":"Fayoum"},
        {"id":"8","name_ar":"الغربية","name_en":"Gharbiya"},
        {"id":"9","name_ar":"الإسماعلية","name_en":"Ismailia"},
        {"id":"10","name_ar":"المنوفية","name_en":"Menofia"},
        {"id":"11","name_ar":"المنيا","name_en":"Minya"},
        {"id":"12","name_ar":"القليوبية","name_en":"Qaliubiya"},
        {"id":"13","name_ar":"الوادي الجديد","name_en":"New Valley"},
        {"id":"14","name_ar":"السويس","name_en":"Suez"},
        {"id":"15","name_ar":"اسوان","name_en":"Aswan"},
        {"id":"16","name_ar":"اسيوط","name_en":"Assiut"},
        {"id":"17","name_ar":"بني سويف","name_en":"Beni Suef"},
        {"id":"18","name_ar":"بورسعيد","name_en":"Port Said"},
        {"id":"19","name_ar":"دمياط","name_en":"Damietta"},
        {"id":"20","name_ar":"الشرقية","name_en":"Sharkia"},
        {"id":"21","name_ar":"جنوب سيناء","name_en":"South Sinai"},
        {"id":"22","name_ar":"كفر الشيخ","name_en":"Kafr Al sheikh"},
        {"id":"23","name_ar":"مطروح","name_en":"Matrouh"},
        {"id":"24","name_ar":"الأقصر","name_en":"Luxor"},
        {"id":"25","name_ar":"قنا","name_en":"Qena"},
        {"id":"26","name_ar":"شمال سيناء","name_en":"North Sinai"},
        {"id":"27","name_ar":"سوهاج","name_en":"Sohag"}
        ]';

        foreach (json_decode($entries, true) as $entry) {
            $data = [
                'ar' => ["name" => $entry["name_ar"]],
                'en' => ["name" => $entry["name_en"]]
            ];
            State::factory(1)->state(new Sequence($data))->create();
        }
    }

    private function seedCities()
    {
        $entries= '[
            {
                "id": "1",
                "state_id": "1",
                "name_ar": "السلام"
            },
            {
                "id": "2",
                "state_id": "1",
                "name_ar": "العباسيه والظاهر"
            },
            {
                "id": "3",
                "state_id": "1",
                "name_ar": "المرج وعزبة النخل"
            },
            {
                "id": "4",
                "state_id": "1",
                "name_ar": "النهضة"
            },
            {
                "id": "5",
                "state_id": "1",
                "name_ar": "حلمية الزيتون"
            },
            {
                "id": "6",
                "state_id": "1",
                "name_ar": "المطريه"
            },
            {
                "id": "7",
                "state_id": "1",
                "name_ar": "روض الفرج"
            },
            {
                "id": "8",
                "state_id": "1",
                "name_ar": "الشرابية"
            },
            {
                "id": "9",
                "state_id": "1",
                "name_ar": "شبرا مصر"
            },
            {
                "id": "10",
                "state_id": "1",
                "name_ar": "مدينة نصر شرق"
            },
            {
                "id": "11",
                "state_id": "1",
                "name_ar": "مدينة نصر غرب"
            },
            {
                "id": "12",
                "state_id": "1",
                "name_ar": "شروق مدينة نصر"
            },
            {
                "id": "13",
                "state_id": "1",
                "name_ar": "مصر الجديدة والنزهة"
            },
            {
                "id": "14",
                "state_id": "1",
                "name_ar": "جمعية أحمد عرابي"
            },
            {
                "id": "15",
                "state_id": "1",
                "name_ar": "كبار المشتركين"
            },
            {
                "id": "16",
                "state_id": "1",
                "name_ar": "البساتين (1)"
            },
            {
                "id": "17",
                "state_id": "1",
                "name_ar": "البساتين (2)"
            },
            {
                "id": "18",
                "state_id": "1",
                "name_ar": "السيدة زينب"
            },
            {
                "id": "19",
                "state_id": "1",
                "name_ar": "القلعه"
            },
            {
                "id": "20",
                "state_id": "1",
                "name_ar": "المعادي (1)"
            },
            {
                "id": "21",
                "state_id": "1",
                "name_ar": "المعادي (2)"
            },
            {
                "id": "22",
                "state_id": "1",
                "name_ar": "دار السلام"
            },
            {
                "id": "23",
                "state_id": "1",
                "name_ar": "المقطم (أ)"
            },
            {
                "id": "24",
                "state_id": "1",
                "name_ar": "المقطم(ب)"
            },
            {
                "id": "25",
                "state_id": "1",
                "name_ar": "حلوان"
            },
            {
                "id": "26",
                "state_id": "1",
                "name_ar": "غرب القاهرة"
            },
            {
                "id": "27",
                "state_id": "2",
                "name_ar": "الجيزة"
            },
            {
                "id": "28",
                "state_id": "2",
                "name_ar": "العمرانية (1)"
            },
            {
                "id": "29",
                "state_id": "2",
                "name_ar": "العمرانية (2)"
            },
            {
                "id": "30",
                "state_id": "2",
                "name_ar": "الطالبية (1)"
            },
            {
                "id": "31",
                "state_id": "2",
                "name_ar": "الطالبية(2)"
            },
            {
                "id": "32",
                "state_id": "2",
                "name_ar": "نصر الدين"
            },
            {
                "id": "33",
                "state_id": "2",
                "name_ar": "الدقي"
            },
            {
                "id": "34",
                "state_id": "2",
                "name_ar": "المهندسين"
            },
            {
                "id": "35",
                "state_id": "2",
                "name_ar": "امبابه"
            },
            {
                "id": "36",
                "state_id": "2",
                "name_ar": "الوراق (1)"
            },
            {
                "id": "37",
                "state_id": "2",
                "name_ar": "الوراق (2)"
            },
            {
                "id": "38",
                "state_id": "2",
                "name_ar": "المنيرة الغربية"
            },
            {
                "id": "39",
                "state_id": "2",
                "name_ar": "بشتيل (1)"
            },
            {
                "id": "40",
                "state_id": "2",
                "name_ar": "بشتيل (2)"
            },
            {
                "id": "41",
                "state_id": "2",
                "name_ar": "بولاق (1)"
            },
            {
                "id": "42",
                "state_id": "2",
                "name_ar": "بولاق (2)"
            },
            {
                "id": "43",
                "state_id": "2",
                "name_ar": "فيصل (1)"
            },
            {
                "id": "44",
                "state_id": "2",
                "name_ar": "فيصل (2)"
            },
            {
                "id": "45",
                "state_id": "2",
                "name_ar": "الصف"
            },
            {
                "id": "46",
                "state_id": "2",
                "name_ar": "العياط"
            },
            {
                "id": "47",
                "state_id": "2",
                "name_ar": "المنصورية"
            },
            {
                "id": "48",
                "state_id": "2",
                "name_ar": "الواحات"
            },
            {
                "id": "49",
                "state_id": "2",
                "name_ar": "أطفيح"
            },
            {
                "id": "50",
                "state_id": "2",
                "name_ar": "أوسيم (1)"
            },
            {
                "id": "51",
                "state_id": "2",
                "name_ar": "أوسيم (2)"
            },
            {
                "id": "52",
                "state_id": "2",
                "name_ar": "كرداسة"
            },
            {
                "id": "53",
                "state_id": "2",
                "name_ar": "منشاة القناطر"
            },
            {
                "id": "54",
                "state_id": "2",
                "name_ar": "وردان"
            },
            {
                "id": "55",
                "state_id": "3",
                "name_ar": "البيطاش"
            },
            {
                "id": "56",
                "state_id": "3",
                "name_ar": "بيانكي"
            },
            {
                "id": "57",
                "state_id": "3",
                "name_ar": "الساحل الشمالي"
            },
            {
                "id": "58",
                "state_id": "3",
                "name_ar": "برج العرب القديم"
            },
            {
                "id": "59",
                "state_id": "3",
                "name_ar": "الحمام"
            },
            {
                "id": "60",
                "state_id": "3",
                "name_ar": "الهانوفيل"
            },
            {
                "id": "61",
                "state_id": "3",
                "name_ar": "خورشيد البحرية"
            },
            {
                "id": "62",
                "state_id": "3",
                "name_ar": "خورشيد القبلية"
            },
            {
                "id": "63",
                "state_id": "3",
                "name_ar": "أبو قير"
            },
            {
                "id": "64",
                "state_id": "3",
                "name_ar": "سيدي بشر"
            },
            {
                "id": "65",
                "state_id": "3",
                "name_ar": "المندرة"
            },
            {
                "id": "66",
                "state_id": "3",
                "name_ar": "الإبراهيمية"
            },
            {
                "id": "67",
                "state_id": "3",
                "name_ar": "النصر"
            },
            {
                "id": "68",
                "state_id": "3",
                "name_ar": "محرم بك"
            },
            {
                "id": "69",
                "state_id": "3",
                "name_ar": "وسط المدينة"
            },
            {
                "id": "70",
                "state_id": "3",
                "name_ar": "سموحة"
            },
            {
                "id": "71",
                "state_id": "3",
                "name_ar": "أبيس"
            },
            {
                "id": "72",
                "state_id": "3",
                "name_ar": "باكوس"
            },
            {
                "id": "73",
                "state_id": "3",
                "name_ar": "السيوف"
            },
            {
                "id": "74",
                "state_id": "3",
                "name_ar": "سابا باشا"
            },
            {
                "id": "75",
                "state_id": "3",
                "name_ar": "الجلاء"
            },
            {
                "id": "76",
                "state_id": "3",
                "name_ar": "الدخيلة"
            },
            {
                "id": "77",
                "state_id": "3",
                "name_ar": "العامرية"
            },
            {
                "id": "78",
                "state_id": "3",
                "name_ar": "القباري"
            },
            {
                "id": "79",
                "state_id": "3",
                "name_ar": "مرغم"
            },
            {
                "id": "80",
                "state_id": "12",
                "name_ar": "الخانكة"
            },
            {
                "id": "81",
                "state_id": "12",
                "name_ar": "الخصوص"
            },
            {
                "id": "82",
                "state_id": "12",
                "name_ar": "العبور"
            },
            {
                "id": "83",
                "state_id": "12",
                "name_ar": "القناطر الخيرية"
            },
            {
                "id": "84",
                "state_id": "12",
                "name_ar": "بهتيم"
            },
            {
                "id": "85",
                "state_id": "12",
                "name_ar": "شبرا الخيمة"
            },
            {
                "id": "86",
                "state_id": "12",
                "name_ar": "قري الخانكه"
            },
            {
                "id": "87",
                "state_id": "12",
                "name_ar": "شبين القناطر"
            },
            {
                "id": "88",
                "state_id": "12",
                "name_ar": "طوخ"
            },
            {
                "id": "89",
                "state_id": "12",
                "name_ar": "قها"
            },
            {
                "id": "90",
                "state_id": "12",
                "name_ar": "كفر شكر"
            },
            {
                "id": "91",
                "state_id": "12",
                "name_ar": "مدينة بنها"
            },
            {
                "id": "92",
                "state_id": "12",
                "name_ar": "مركز بنها"
            },
            {
                "id": "93",
                "state_id": "12",
                "name_ar": "قليوب"
            },
            {
                "id": "94",
                "state_id": "12",
                "name_ar": "مركز قليوب"
            },
            {
                "id": "95",
                "state_id": "27",
                "name_ar": "العسيرات"
            },
            {
                "id": "96",
                "state_id": "27",
                "name_ar": "مدينة المراغة"
            },
            {
                "id": "97",
                "state_id": "27",
                "name_ar": "المنشاة"
            },
            {
                "id": "98",
                "state_id": "27",
                "name_ar": "أخميم"
            },
            {
                "id": "99",
                "state_id": "27",
                "name_ar": "شمال البلينا"
            },
            {
                "id": "100",
                "state_id": "27",
                "name_ar": "جنوب البلينا"
            },
            {
                "id": "101",
                "state_id": "27",
                "name_ar": "جهينة"
            },
            {
                "id": "102",
                "state_id": "27",
                "name_ar": "دار السلام"
            },
            {
                "id": "103",
                "state_id": "27",
                "name_ar": "ساقلته"
            },
            {
                "id": "104",
                "state_id": "27",
                "name_ar": "طما"
            },
            {
                "id": "105",
                "state_id": "27",
                "name_ar": "مدينة جرجا"
            },
            {
                "id": "106",
                "state_id": "27",
                "name_ar": "مركز جرجا"
            },
            {
                "id": "107",
                "state_id": "27",
                "name_ar": "مدينة سوهاج شرق"
            },
            {
                "id": "108",
                "state_id": "27",
                "name_ar": "مدينة سوهاج غرب"
            },
            {
                "id": "109",
                "state_id": "27",
                "name_ar": "مركز سوهاج جنوب"
            },
            {
                "id": "110",
                "state_id": "27",
                "name_ar": "مركز سوهاج شمال"
            },
            {
                "id": "111",
                "state_id": "27",
                "name_ar": "مدينة طهطا"
            },
            {
                "id": "112",
                "state_id": "27",
                "name_ar": "مركز طهطا"
            },
            {
                "id": "113",
                "state_id": "22",
                "name_ar": "الحامول مدينة"
            },
            {
                "id": "114",
                "state_id": "22",
                "name_ar": "الرياض"
            },
            {
                "id": "115",
                "state_id": "22",
                "name_ar": "بلطيم"
            },
            {
                "id": "116",
                "state_id": "22",
                "name_ar": "بيلا"
            },
            {
                "id": "117",
                "state_id": "22",
                "name_ar": "سيدي سالم قري"
            },
            {
                "id": "118",
                "state_id": "22",
                "name_ar": "فوة"
            },
            {
                "id": "119",
                "state_id": "22",
                "name_ar": "كفر الشيخ مدينة"
            },
            {
                "id": "120",
                "state_id": "22",
                "name_ar": "الحامول قري"
            },
            {
                "id": "121",
                "state_id": "22",
                "name_ar": "الكراكات"
            },
            {
                "id": "122",
                "state_id": "22",
                "name_ar": "برج البرلس"
            },
            {
                "id": "123",
                "state_id": "22",
                "name_ar": "دسوق قري جنوب"
            },
            {
                "id": "124",
                "state_id": "22",
                "name_ar": "دسوق قري شمال"
            },
            {
                "id": "125",
                "state_id": "22",
                "name_ar": "دسوق مدينة"
            },
            {
                "id": "126",
                "state_id": "22",
                "name_ar": "سيدي سالم مدينة"
            },
            {
                "id": "127",
                "state_id": "22",
                "name_ar": "قلين"
            },
            {
                "id": "128",
                "state_id": "22",
                "name_ar": "كفر الشيخ قري شرق"
            },
            {
                "id": "129",
                "state_id": "22",
                "name_ar": "كفر الشيخ قري غرب"
            },
            {
                "id": "130",
                "state_id": "22",
                "name_ar": "مطوبس"
            },
            {
                "id": "131",
                "state_id": "10",
                "name_ar": "الباجور"
            },
            {
                "id": "132",
                "state_id": "10",
                "name_ar": "الشهداء"
            },
            {
                "id": "133",
                "state_id": "10",
                "name_ar": "بركة السبع"
            },
            {
                "id": "134",
                "state_id": "10",
                "name_ar": "تلا"
            },
            {
                "id": "135",
                "state_id": "10",
                "name_ar": "سرس الليان"
            },
            {
                "id": "136",
                "state_id": "10",
                "name_ar": "قويسنا شرق"
            },
            {
                "id": "137",
                "state_id": "10",
                "name_ar": "قويسنا غرب"
            },
            {
                "id": "138",
                "state_id": "10",
                "name_ar": "أشمون "
            },
            {
                "id": "139",
                "state_id": "10",
                "name_ar": "شبين الكوم"
            },
            {
                "id": "140",
                "state_id": "10",
                "name_ar": "مركز أشمون"
            },
            {
                "id": "141",
                "state_id": "10",
                "name_ar": "مركز شبين الكوم"
            },
            {
                "id": "142",
                "state_id": "10",
                "name_ar": "منوف"
            },
            {
                "id": "143",
                "state_id": "15",
                "name_ar": "ادفو"
            },
            {
                "id": "144",
                "state_id": "15",
                "name_ar": "أسوان جنوب"
            },
            {
                "id": "145",
                "state_id": "15",
                "name_ar": "أسوان شرق"
            },
            {
                "id": "146",
                "state_id": "15",
                "name_ar": "أسوان شمال"
            },
            {
                "id": "147",
                "state_id": "15",
                "name_ar": "أبو سمبل السياحية"
            },
            {
                "id": "148",
                "state_id": "15",
                "name_ar": "دراو"
            },
            {
                "id": "149",
                "state_id": "15",
                "name_ar": "كوم امبو"
            },
            {
                "id": "150",
                "state_id": "15",
                "name_ar": "نصر النوبة"
            },
            {
                "id": "151",
                "state_id": "21",
                "name_ar": "قطاع شبكات جنوب سيناء"
            },
            {
                "id": "152",
                "state_id": "21",
                "name_ar": "هندسه ابورديس"
            },
            {
                "id": "153",
                "state_id": "21",
                "name_ar": "هندسة دهب"
            },
            {
                "id": "154",
                "state_id": "21",
                "name_ar": "هندسة رأس سدر"
            },
            {
                "id": "155",
                "state_id": "21",
                "name_ar": "هندسة شرم الشيخ"
            },
            {
                "id": "156",
                "state_id": "21",
                "name_ar": "هندسة طابا"
            },
            {
                "id": "157",
                "state_id": "21",
                "name_ar": "هندسة طور سيناء"
            },
            {
                "id": "158",
                "state_id": "21",
                "name_ar": "هندسة كاترين"
            },
            {
                "id": "159",
                "state_id": "21",
                "name_ar": "هندسة نويبع"
            },
            {
                "id": "160",
                "state_id": "18",
                "name_ar": "قطاع شبكات بورسعيد"
            },
            {
                "id": "161",
                "state_id": "18",
                "name_ar": "هندسة بورسعيد"
            },
            {
                "id": "162",
                "state_id": "18",
                "name_ar": "هندسة الجنوب والضواحي"
            },
            {
                "id": "163",
                "state_id": "18",
                "name_ar": "هندسة الزهور"
            },
            {
                "id": "164",
                "state_id": "18",
                "name_ar": "هندسة المناخ"
            },
            {
                "id": "165",
                "state_id": "18",
                "name_ar": "هندسة بورفؤاد"
            },
            {
                "id": "166",
                "state_id": "13",
                "name_ar": "الخارجة"
            },
            {
                "id": "167",
                "state_id": "13",
                "name_ar": "الداخلة"
            },
            {
                "id": "168",
                "state_id": "13",
                "name_ar": "العوينات"
            },
            {
                "id": "169",
                "state_id": "13",
                "name_ar": "باريس"
            },
            {
                "id": "170",
                "state_id": "13",
                "name_ar": "بلاط"
            },
            {
                "id": "171",
                "state_id": "13",
                "name_ar": "الفرافره"
            },
            {
                "id": "172",
                "state_id": "9",
                "name_ar": "قطاع شبكات الاسماعيلية"
            },
            {
                "id": "173",
                "state_id": "9",
                "name_ar": "هندسة الاسماعيلية أول"
            },
            {
                "id": "174",
                "state_id": "9",
                "name_ar": "هندسة الأسماعيلية ثاني"
            },
            {
                "id": "175",
                "state_id": "9",
                "name_ar": "هندسة أبو صوير"
            },
            {
                "id": "176",
                "state_id": "9",
                "name_ar": "هندسة أبو عطوة"
            },
            {
                "id": "177",
                "state_id": "9",
                "name_ar": "هندسة التل الكبير"
            },
            {
                "id": "178",
                "state_id": "9",
                "name_ar": "هندسة الشيخ زايد"
            },
            {
                "id": "179",
                "state_id": "9",
                "name_ar": "هندسة الفردان"
            },
            {
                "id": "180",
                "state_id": "9",
                "name_ar": "هندسة القصاصين"
            },
            {
                "id": "181",
                "state_id": "9",
                "name_ar": "هندسة القنطرة غرب"
            },
            {
                "id": "182",
                "state_id": "9",
                "name_ar": "هندسة القنطرة شرق"
            },
            {
                "id": "183",
                "state_id": "9",
                "name_ar": "هندسة المستقبل"
            },
            {
                "id": "184",
                "state_id": "9",
                "name_ar": "هندسة الملاك"
            },
            {
                "id": "185",
                "state_id": "9",
                "name_ar": "هندسة شرق البحيرات"
            },
            {
                "id": "186",
                "state_id": "9",
                "name_ar": "هندسة فايد"
            },
            {
                "id": "187",
                "state_id": "6",
                "name_ar": "بنجر السكر"
            },
            {
                "id": "188",
                "state_id": "6",
                "name_ar": "البستان"
            },
            {
                "id": "189",
                "state_id": "6",
                "name_ar": "التحدي"
            },
            {
                "id": "190",
                "state_id": "6",
                "name_ar": "التحرير بدر"
            },
            {
                "id": "191",
                "state_id": "6",
                "name_ar": "الدلنجات"
            },
            {
                "id": "192",
                "state_id": "6",
                "name_ar": "الدواجن"
            },
            {
                "id": "193",
                "state_id": "6",
                "name_ar": "الرحمانية"
            },
            {
                "id": "194",
                "state_id": "6",
                "name_ar": "الصفا والمروة"
            },
            {
                "id": "195",
                "state_id": "6",
                "name_ar": "المحمودية"
            },
            {
                "id": "196",
                "state_id": "6",
                "name_ar": "النصر 3"
            },
            {
                "id": "197",
                "state_id": "6",
                "name_ar": "إدفينا"
            },
            {
                "id": "198",
                "state_id": "6",
                "name_ar": "إدكو"
            },
            {
                "id": "199",
                "state_id": "6",
                "name_ar": "إيتاي البارود"
            },
            {
                "id": "200",
                "state_id": "6",
                "name_ar": "أبو المطامير"
            },
            {
                "id": "201",
                "state_id": "6",
                "name_ar": "أبو بكر"
            },
            {
                "id": "202",
                "state_id": "6",
                "name_ar": "أبو حمص شرق"
            },
            {
                "id": "203",
                "state_id": "6",
                "name_ar": "أبو حمص غرب"
            },
            {
                "id": "204",
                "state_id": "6",
                "name_ar": "أحمد بدوي"
            },
            {
                "id": "205",
                "state_id": "6",
                "name_ar": "بندر دمنهور شرق"
            },
            {
                "id": "206",
                "state_id": "6",
                "name_ar": "بندر دمنهور غرب"
            },
            {
                "id": "207",
                "state_id": "6",
                "name_ar": "بندر كفر الدوار شرق"
            },
            {
                "id": "208",
                "state_id": "6",
                "name_ar": "بندر كفر الدوار غرب"
            },
            {
                "id": "209",
                "state_id": "6",
                "name_ar": "حوش عيسي"
            },
            {
                "id": "210",
                "state_id": "6",
                "name_ar": "رشيد"
            },
            {
                "id": "211",
                "state_id": "6",
                "name_ar": "سيدي غازي"
            },
            {
                "id": "212",
                "state_id": "6",
                "name_ar": "شبراخيت"
            },
            {
                "id": "213",
                "state_id": "6",
                "name_ar": "شمال التحرير"
            },
            {
                "id": "214",
                "state_id": "6",
                "name_ar": "غرب النوبارية"
            },
            {
                "id": "215",
                "state_id": "6",
                "name_ar": "كفر داود"
            },
            {
                "id": "216",
                "state_id": "6",
                "name_ar": "كوم حمادة"
            },
            {
                "id": "217",
                "state_id": "6",
                "name_ar": "مركز دمنهور"
            },
            {
                "id": "218",
                "state_id": "6",
                "name_ar": "مركز كفر الدوار"
            },
            {
                "id": "219",
                "state_id": "6",
                "name_ar": "مريوط"
            },
            {
                "id": "220",
                "state_id": "6",
                "name_ar": "وداي النطرون"
            },
            {
                "id": "221",
                "state_id": "8",
                "name_ar": "السنطة"
            },
            {
                "id": "222",
                "state_id": "8",
                "name_ar": "أول المحلة"
            },
            {
                "id": "223",
                "state_id": "8",
                "name_ar": "أول طنطا"
            },
            {
                "id": "224",
                "state_id": "8",
                "name_ar": "بسيون"
            },
            {
                "id": "225",
                "state_id": "8",
                "name_ar": "بشبيش"
            },
            {
                "id": "226",
                "state_id": "8",
                "name_ar": "ثاني المحلة"
            },
            {
                "id": "227",
                "state_id": "8",
                "name_ar": "ثاني طنطا"
            },
            {
                "id": "228",
                "state_id": "8",
                "name_ar": "زفتي"
            },
            {
                "id": "229",
                "state_id": "8",
                "name_ar": "سمنود"
            },
            {
                "id": "230",
                "state_id": "8",
                "name_ar": "قطور"
            },
            {
                "id": "231",
                "state_id": "8",
                "name_ar": "كفر الزيات"
            },
            {
                "id": "232",
                "state_id": "8",
                "name_ar": "مركز المحلة"
            },
            {
                "id": "233",
                "state_id": "8",
                "name_ar": "مركز طنطا"
            },
            {
                "id": "234",
                "state_id": "20",
                "name_ar": "قطاع شبكات شمال الشرقية"
            },
            {
                "id": "235",
                "state_id": "20",
                "name_ar": "هندسة أبو كبير"
            },
            {
                "id": "236",
                "state_id": "20",
                "name_ar": "هندسة الحسينية"
            },
            {
                "id": "237",
                "state_id": "20",
                "name_ar": "هندسة الخطارة"
            },
            {
                "id": "238",
                "state_id": "20",
                "name_ar": "هندسة أولاد صقر"
            },
            {
                "id": "239",
                "state_id": "20",
                "name_ar": "هندسة صان الحجر"
            },
            {
                "id": "240",
                "state_id": "20",
                "name_ar": "هندسة فاقوس"
            },
            {
                "id": "241",
                "state_id": "20",
                "name_ar": "هندسة كفر صقر"
            },
            {
                "id": "242",
                "state_id": "20",
                "name_ar": "هندسة ههيا"
            },
            {
                "id": "243",
                "state_id": "20",
                "name_ar": "قطاع شبكات وسط الشرقية"
            },
            {
                "id": "244",
                "state_id": "20",
                "name_ar": "هندسة ابو حماد"
            },
            {
                "id": "245",
                "state_id": "20",
                "name_ar": "هندسة القرين"
            },
            {
                "id": "246",
                "state_id": "20",
                "name_ar": "هندسة القنايات"
            },
            {
                "id": "247",
                "state_id": "20",
                "name_ar": "هندسة جامعة الزقازيق"
            },
            {
                "id": "248",
                "state_id": "20",
                "name_ar": "هندسة شرق الزقازيق"
            },
            {
                "id": "249",
                "state_id": "20",
                "name_ar": "هندسة غرب الزقازيق"
            },
            {
                "id": "250",
                "state_id": "20",
                "name_ar": "هندسة قري الزقازيق"
            },
            {
                "id": "251",
                "state_id": "20",
                "name_ar": "هندسة وسط الزقازيق"
            },
            {
                "id": "252",
                "state_id": "20",
                "name_ar": "قطاع شبكات جنوب الشرقية"
            },
            {
                "id": "253",
                "state_id": "20",
                "name_ar": "هندسة الابراهيمية"
            },
            {
                "id": "254",
                "state_id": "20",
                "name_ar": "هندسة البر الشرقي"
            },
            {
                "id": "255",
                "state_id": "20",
                "name_ar": "هندسة أنشاص"
            },
            {
                "id": "256",
                "state_id": "20",
                "name_ar": "هندسة بلبيس"
            },
            {
                "id": "257",
                "state_id": "20",
                "name_ar": "هندسة ديرب نجم"
            },
            {
                "id": "258",
                "state_id": "20",
                "name_ar": "هندسة شرق منيا القمح"
            },
            {
                "id": "259",
                "state_id": "20",
                "name_ar": "هندسة غرب منيا القمح"
            },
            {
                "id": "260",
                "state_id": "20",
                "name_ar": "هندسة مشتول السوق"
            },
            {
                "id": "261",
                "state_id": "26",
                "name_ar": "قطاع شبكات شمال سيناء"
            },
            {
                "id": "262",
                "state_id": "26",
                "name_ar": "هندسة الحسنه"
            },
            {
                "id": "263",
                "state_id": "26",
                "name_ar": "هندسة الشيخ زويد"
            },
            {
                "id": "264",
                "state_id": "26",
                "name_ar": "هندسة العريش"
            },
            {
                "id": "265",
                "state_id": "26",
                "name_ar": "هندسة المساعيد"
            },
            {
                "id": "266",
                "state_id": "26",
                "name_ar": "هندسة بئر العبد"
            },
            {
                "id": "267",
                "state_id": "26",
                "name_ar": "هندسة رفح"
            },
            {
                "id": "268",
                "state_id": "26",
                "name_ar": "هندسة رمانة"
            },
            {
                "id": "269",
                "state_id": "26",
                "name_ar": "هندسة نخل"
            },
            {
                "id": "270",
                "state_id": "16",
                "name_ar": "الشئون التجارية المركزية"
            },
            {
                "id": "271",
                "state_id": "16",
                "name_ar": "ابنوب"
            },
            {
                "id": "272",
                "state_id": "16",
                "name_ar": "ابو تيج"
            },
            {
                "id": "273",
                "state_id": "16",
                "name_ar": "البداري"
            },
            {
                "id": "274",
                "state_id": "16",
                "name_ar": "الغنايم"
            },
            {
                "id": "275",
                "state_id": "16",
                "name_ar": "الفتح"
            },
            {
                "id": "276",
                "state_id": "16",
                "name_ar": "القوصية"
            },
            {
                "id": "277",
                "state_id": "16",
                "name_ar": "المركز بحري"
            },
            {
                "id": "278",
                "state_id": "16",
                "name_ar": "المركز جنوب"
            },
            {
                "id": "279",
                "state_id": "16",
                "name_ar": "ديروط"
            },
            {
                "id": "280",
                "state_id": "16",
                "name_ar": "ساحل سليم"
            },
            {
                "id": "281",
                "state_id": "16",
                "name_ar": "شرق"
            },
            {
                "id": "282",
                "state_id": "16",
                "name_ar": "صدفا"
            },
            {
                "id": "283",
                "state_id": "16",
                "name_ar": "غرب "
            },
            {
                "id": "284",
                "state_id": "16",
                "name_ar": "مبني القطاع"
            },
            {
                "id": "285",
                "state_id": "16",
                "name_ar": "منفلوط"
            },
            {
                "id": "286",
                "state_id": "11",
                "name_ar": "ابو قرقاص"
            },
            {
                "id": "287",
                "state_id": "11",
                "name_ar": "العدوة"
            },
            {
                "id": "288",
                "state_id": "11",
                "name_ar": "المنيا شرق"
            },
            {
                "id": "289",
                "state_id": "11",
                "name_ar": "المنيا غرب"
            },
            {
                "id": "290",
                "state_id": "11",
                "name_ar": "بني مزار"
            },
            {
                "id": "291",
                "state_id": "11",
                "name_ar": "ديرمواس"
            },
            {
                "id": "292",
                "state_id": "11",
                "name_ar": "سمالوط"
            },
            {
                "id": "293",
                "state_id": "11",
                "name_ar": "مدينة ملوي"
            },
            {
                "id": "294",
                "state_id": "11",
                "name_ar": "مركز المنيا"
            },
            {
                "id": "295",
                "state_id": "11",
                "name_ar": "مركز ملوي"
            },
            {
                "id": "296",
                "state_id": "11",
                "name_ar": "مطاي"
            },
            {
                "id": "297",
                "state_id": "11",
                "name_ar": "مغاغة"
            },
            {
                "id": "298",
                "state_id": "23",
                "name_ar": "الساحل الشمالي (25 يناير)"
            },
            {
                "id": "299",
                "state_id": "23",
                "name_ar": "السلوم (الشئون التجارية)"
            },
            {
                "id": "300",
                "state_id": "23",
                "name_ar": "الضبعه"
            },
            {
                "id": "301",
                "state_id": "23",
                "name_ar": "العلمين"
            },
            {
                "id": "302",
                "state_id": "23",
                "name_ar": "المنتزة"
            },
            {
                "id": "303",
                "state_id": "23",
                "name_ar": "سيدي براني"
            },
            {
                "id": "304",
                "state_id": "23",
                "name_ar": "سيدي عبدالرحمن"
            },
            {
                "id": "305",
                "state_id": "23",
                "name_ar": "سيوة"
            },
            {
                "id": "306",
                "state_id": "23",
                "name_ar": "مارينا - موزع (ج) - ك 98"
            },
            {
                "id": "307",
                "state_id": "23",
                "name_ar": "مطروح شرق (الشئون الإدارية)"
            },
            {
                "id": "308",
                "state_id": "23",
                "name_ar": "مطروح غرب"
            },
            {
                "id": "309",
                "state_id": "14",
                "name_ar": "قطاع شبكات السويس"
            },
            {
                "id": "310",
                "state_id": "14",
                "name_ar": "هندسة الاربعين"
            },
            {
                "id": "311",
                "state_id": "14",
                "name_ar": "هندسة الجناين"
            },
            {
                "id": "312",
                "state_id": "14",
                "name_ar": "هندسة الخليج"
            },
            {
                "id": "313",
                "state_id": "14",
                "name_ar": "هندسة السويس"
            },
            {
                "id": "314",
                "state_id": "14",
                "name_ar": "هندسة فيصل"
            },
            {
                "id": "315",
                "state_id": "19",
                "name_ar": "الزرقا"
            },
            {
                "id": "316",
                "state_id": "19",
                "name_ar": "جنوب دمياط "
            },
            {
                "id": "317",
                "state_id": "19",
                "name_ar": "شمال دمياط"
            },
            {
                "id": "318",
                "state_id": "19",
                "name_ar": "عزبة البرج"
            },
            {
                "id": "319",
                "state_id": "19",
                "name_ar": "كفر سعد"
            },
            {
                "id": "320",
                "state_id": "19",
                "name_ar": "الروضة"
            },
            {
                "id": "321",
                "state_id": "19",
                "name_ar": "الشعراء"
            },
            {
                "id": "322",
                "state_id": "19",
                "name_ar": "فارسكور"
            },
            {
                "id": "323",
                "state_id": "19",
                "name_ar": "كفر البطيخ"
            },
            {
                "id": "324",
                "state_id": "19",
                "name_ar": "رأس البر"
            },
            {
                "id": "325",
                "state_id": "4",
                "name_ar": "الجمالية"
            },
            {
                "id": "326",
                "state_id": "4",
                "name_ar": "قري السنبلاوين"
            },
            {
                "id": "327",
                "state_id": "4",
                "name_ar": "مدينة السنبلاوين"
            },
            {
                "id": "328",
                "state_id": "4",
                "name_ar": "المطرية"
            },
            {
                "id": "329",
                "state_id": "4",
                "name_ar": "قري المنزلة"
            },
            {
                "id": "330",
                "state_id": "4",
                "name_ar": "مدينة أجا"
            },
            {
                "id": "331",
                "state_id": "4",
                "name_ar": "بني عبيد"
            },
            {
                "id": "332",
                "state_id": "4",
                "name_ar": "تمي الأمديد"
            },
            {
                "id": "333",
                "state_id": "4",
                "name_ar": "جمصه"
            },
            {
                "id": "334",
                "state_id": "4",
                "name_ar": "قري شبين"
            },
            {
                "id": "335",
                "state_id": "4",
                "name_ar": "شرق المنصورة"
            },
            {
                "id": "336",
                "state_id": "4",
                "name_ar": "غرب المنصورة"
            },
            {
                "id": "337",
                "state_id": "4",
                "name_ar": "طلخا"
            },
            {
                "id": "338",
                "state_id": "4",
                "name_ar": "ميت سلسيل"
            },
            {
                "id": "339",
                "state_id": "4",
                "name_ar": "قري ميت غمر"
            },
            {
                "id": "340",
                "state_id": "4",
                "name_ar": "مدينة ميت غمر"
            },
            {
                "id": "341",
                "state_id": "4",
                "name_ar": "نبروة"
            },
            {
                "id": "342",
                "state_id": "4",
                "name_ar": "الستاموني"
            },
            {
                "id": "343",
                "state_id": "4",
                "name_ar": "قري بلقاس"
            },
            {
                "id": "344",
                "state_id": "4",
                "name_ar": "مدينة بلقاس"
            },
            {
                "id": "345",
                "state_id": "4",
                "name_ar": "دكرنس"
            },
            {
                "id": "346",
                "state_id": "4",
                "name_ar": "مدينة شربين"
            },
            {
                "id": "347",
                "state_id": "4",
                "name_ar": "قري المنصورة (1)"
            },
            {
                "id": "348",
                "state_id": "4",
                "name_ar": "قري المنصورة (2)"
            },
            {
                "id": "349",
                "state_id": "4",
                "name_ar": "كوم النور"
            },
            {
                "id": "350",
                "state_id": "4",
                "name_ar": "منية النصر"
            },
            {
                "id": "351",
                "state_id": "5",
                "name_ar": "قطاع شبكات البحر الأحمر"
            },
            {
                "id": "352",
                "state_id": "5",
                "name_ar": "هندسة جنوب الغردقه (المدارس)"
            },
            {
                "id": "353",
                "state_id": "5",
                "name_ar": "هندسة القصير"
            },
            {
                "id": "354",
                "state_id": "5",
                "name_ar": "هندسة راس غارب (الزعفرانه)"
            },
            {
                "id": "355",
                "state_id": "5",
                "name_ar": "هندسة سفاجا"
            },
            {
                "id": "356",
                "state_id": "5",
                "name_ar": "هندسة شمال الغردقه"
            },
            {
                "id": "357",
                "state_id": "5",
                "name_ar": "هندسة مرسي علم"
            },
            {
                "id": "358",
                "state_id": "5",
                "name_ar": "هندسة وسط الغردقه (الاستاد)"
            },
            {
                "id": "359",
                "state_id": "25",
                "name_ar": "ابوتشت"
            },
            {
                "id": "360",
                "state_id": "25",
                "name_ar": "قوص شرق"
            },
            {
                "id": "361",
                "state_id": "25",
                "name_ar": "قفط"
            },
            {
                "id": "362",
                "state_id": "25",
                "name_ar": "قنا غرب"
            },
            {
                "id": "363",
                "state_id": "25",
                "name_ar": "قنا شرق"
            },
            {
                "id": "364",
                "state_id": "25",
                "name_ar": "الوقف"
            },
            {
                "id": "365",
                "state_id": "25",
                "name_ar": "فرشوط"
            },
            {
                "id": "366",
                "state_id": "25",
                "name_ar": "نجع حمادي شمال"
            },
            {
                "id": "367",
                "state_id": "25",
                "name_ar": "نجع حمادي جنوب"
            },
            {
                "id": "368",
                "state_id": "25",
                "name_ar": "نقادة"
            },
            {
                "id": "369",
                "state_id": "25",
                "name_ar": "دشنا"
            },
            {
                "id": "370",
                "state_id": "25",
                "name_ar": "قوص غرب"
            },
            {
                "id": "371",
                "state_id": "17",
                "name_ar": "الفشن"
            },
            {
                "id": "372",
                "state_id": "17",
                "name_ar": "الواسطي"
            },
            {
                "id": "373",
                "state_id": "17",
                "name_ar": "اهناسيا"
            },
            {
                "id": "374",
                "state_id": "17",
                "name_ar": "ببا"
            },
            {
                "id": "375",
                "state_id": "17",
                "name_ar": "ديوان عام قطاع بني سويف"
            },
            {
                "id": "376",
                "state_id": "17",
                "name_ar": "سمسطا"
            },
            {
                "id": "377",
                "state_id": "17",
                "name_ar": "شرق النيل"
            },
            {
                "id": "378",
                "state_id": "17",
                "name_ar": "مدينة بني سويف"
            },
            {
                "id": "379",
                "state_id": "17",
                "name_ar": "مركز بني سويف"
            },
            {
                "id": "380",
                "state_id": "17",
                "name_ar": "ناصر"
            },
            {
                "id": "381",
                "state_id": "7",
                "name_ar": "ابشواي"
            },
            {
                "id": "382",
                "state_id": "7",
                "name_ar": "اطسا شرق"
            },
            {
                "id": "383",
                "state_id": "7",
                "name_ar": "اطسا غرب"
            },
            {
                "id": "384",
                "state_id": "7",
                "name_ar": "ديوان عام قطاع الفيوم"
            },
            {
                "id": "385",
                "state_id": "7",
                "name_ar": "سنورس شرق"
            },
            {
                "id": "386",
                "state_id": "7",
                "name_ar": "سنورس غرب"
            },
            {
                "id": "387",
                "state_id": "7",
                "name_ar": "طامية شرق"
            },
            {
                "id": "388",
                "state_id": "7",
                "name_ar": "طامية غرب"
            },
            {
                "id": "389",
                "state_id": "7",
                "name_ar": "مدينة الفيوم / شمال شرق"
            },
            {
                "id": "390",
                "state_id": "7",
                "name_ar": "مدينة الفيوم / شمال غرب"
            },
            {
                "id": "391",
                "state_id": "7",
                "name_ar": "مدينة الفيوم جنوب"
            },
            {
                "id": "392",
                "state_id": "7",
                "name_ar": "مدينة الفيوم شرق"
            },
            {
                "id": "393",
                "state_id": "7",
                "name_ar": "مدينة الفيوم غرب"
            },
            {
                "id": "394",
                "state_id": "7",
                "name_ar": "يوسف الصديق"
            },
            {
                "id": "395",
                "state_id": "24",
                "name_ar": "اسنا شرق"
            },
            {
                "id": "396",
                "state_id": "24",
                "name_ar": "اسنا غرب"
            },
            {
                "id": "397",
                "state_id": "24",
                "name_ar": "الأقصر غرب"
            },
            {
                "id": "398",
                "state_id": "24",
                "name_ar": "البياضية"
            },
            {
                "id": "399",
                "state_id": "24",
                "name_ar": "الزينية"
            },
            {
                "id": "400",
                "state_id": "24",
                "name_ar": "العديسات"
            },
            {
                "id": "401",
                "state_id": "24",
                "name_ar": "أرمنت"
            },
            {
                "id": "402",
                "state_id": "24",
                "name_ar": "جنوب الأقصر"
            },
            {
                "id": "403",
                "state_id": "24",
                "name_ar": "شمال الأقصر"
            },
            {
                "id": "404",
                "state_id": "1",
                "name_ar": "التجمع الأول"
            },
            {
                "id": "405",
                "state_id": "1",
                "name_ar": "التجمع الخامس"
            },
            {
                "id": "406",
                "state_id": "1",
                "name_ar": "الرحاب القطامية"
            },
            {
                "id": "407",
                "state_id": "2",
                "name_ar": "أكتوبر (1)"
            },
            {
                "id": "408",
                "state_id": "2",
                "name_ar": "أكتوبر (2)"
            },
            {
                "id": "409",
                "state_id": "2",
                "name_ar": "الشيخ زايد "
            },
            {
                "id": "410",
                "state_id": "1",
                "name_ar": "15 - مايو"
            },
            {
                "id": "411",
                "state_id": "3",
                "name_ar": "برج العرب الجديد"
            },
            {
                "id": "412",
                "state_id": "10",
                "name_ar": "مدينة السادات"
            }
            ]';

        foreach (json_decode($entries, true) as $entry) {
            $data = [
                'ar' => ["name" => $entry["name_ar"]],
                'state_id' => $entry["state_id"]
            ];
            City::factory(1)->state(new Sequence($data))->create();
        }
    }

    private function seedFoundation(){
            $foundationData = [
                'ar' => ["name" => "شركة الكهرباء ","desc" => " عن المؤسسة  عن المؤسسة عن المؤسسة "],
                'map' => "maps.com",
                'website' => "www.example.com",
                'phone' => "+201000000",
                'landline' => "023811111",
                'email' => "example@example.com",
                'creator_id' => 1,
            ];

              Foundation::create($foundationData);

              FoundationImage::create( [
                'ar' => ["image" => "image1.png"],
                   'foundation_id' => 1,
                   'creator_id' => 1,

               ]);

              FoundationImage::create( [
                'ar' => ["image" => "image2.png"],
                   'foundation_id' => 1,
                   'creator_id' => 1,
               ]);

             FoundationSound::create(
                    [ 'ar' => ["sound" => "sound1.mp3"],
                      'foundation_id' => 1,
                      'creator_id' => 1,
                     ]);

            FoundationSound::create(
            [ 'ar' => ["sound" => "sound2.mp3"],
                'foundation_id' => 1,
                'creator_id' => 1,
                ]);

              FoundationVideo::create(
            [ 'ar' => ["video" => "video1.mp3"],
              'foundation_id' => 1,
              'creator_id' => 1,
             ]);

              FoundationVideo::create(
            [ 'ar' => ["video" => "video2.mp3"],
              'foundation_id' => 1,
              'creator_id' => 1,
             ]);

    }
    private function seedAbout(){
            $aboutData = [
                'ar' => ["desc" => " عن البرنامج  عن البرنامج عن البرنامج "],
                'creator_id' =>1,
            ];

          $about =  About::create($aboutData);


              AboutSound::create(
                [ 'ar' => ["sound" => "sound1.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );
              AboutSound::create(
                [ 'ar' => ["sound" => "sound2.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );

              AboutVideo::create(
                [ 'ar' => ["video" => "video1.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );
              AboutVideo::create(
                [ 'ar' => ["video" => "video2.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );

    }

    private function seedBranch(){
            $branchData = [
                'ar' => ["desc" => " عن الفرع  عن الفرع عن الفرع ","name" => "اسم الفرع", "note" => "ملاحظات ملاحظات ملاحظات ", "address" => "عنوان الفرع"],
                'map' =>'map.com',
                'email' =>'example@example.com',
                'phone1' =>'+2015152514',
                'phone2' =>'+2015545454',
                'landline1' =>'021545454',
                'landline2' =>'025545454',
                'pwd_status' =>1,
                'creator_id' =>1,
                'foundation_id' =>1,
                'city_id' =>5,
            ];

          $branch =  Branch::create($branchData);


             BranchSound::create(
                [ 'ar' => ["sound" => "sound1.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchSound::create(
                [ 'ar' => ["sound" => "sound2.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

             BranchImage::create(
                [ 'ar' => ["image" => "image1.png"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchImage::create(
                [ 'ar' => ["image" => "image2.png"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

              BranchVideo::create(
                [ 'ar' => ["video" => "video1.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchVideo::create(
                [ 'ar' => ["video" => "video2.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

    }

    private function seedService(){

            $serviceData = [
                'ar' => ["desc" => " عن الخدمة  عن الخدمة عن الخدمة ","title" => "اسم الخدمة"],
                'creator_id' =>1,
            ];

          $service =  Service::create($serviceData);


             ServiceImage::create([
                'image' =>  "image1.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );
              ServiceImage::create([
                'image' =>  "image2.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );

               ServiceTranslationMedia::create([
                   'title_sound' => 'title_sound1.mp3',
                   'title_video' => 'title_video1.mp4',
                   'desc_sound' => 'desc_sound1.mp3',
                   'desc_video' => 'desc_video1.mp4',
                   'service_translation_id' => $service->translate('ar')->id,
               ]);

         $this->seedDocument($service->id);
         $this->seedProcedure($service->id);
         $this->seedRegulation($service->id);
         $this->seedFaq($service->id);
         $this->seedSubService($service->id);
    }

    private function seedSubService($id){

            $serviceData = [
                'ar' => ["desc" => " عن الخدمة الداخلية عن الخدمة الداخلية عن الخدمة ","title" => " اسم الخدمة الداخلية"],
                'creator_id' =>1,
                'parent_id' =>$id,
            ];

          $service =  Service::create($serviceData);


             ServiceImage::create([
                'image' =>  "image1.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );
              ServiceImage::create([
                'image' =>  "image2.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );

               ServiceTranslationMedia::create([
                   'title_sound' => 'title_sound1.mp3',
                   'title_video' => 'title_video1.mp4',
                   'desc_sound' => 'desc_sound1.mp3',
                   'desc_video' => 'desc_video1.mp4',
                   'service_translation_id' => $service->translate('ar')->id,
               ]);

         $this->seedDocument($service->id);
         $this->seedProcedure($service->id);
         $this->seedRegulation($service->id);
         $this->seedFaq($service->id);
    }

    private function seedDocument($id){

        $documentData1 = [
            'ar' => ["desc" => "1 عن المستند  عن المستند عن المستند ","title" => "اسم المستند1"],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $document1 =  Document::create($documentData1);

        DocumentImage::create([
            'image' =>  "image1.png",
            'document_id' => $document1->id,
            'creator_id' =>1,
           ]
          );
          DocumentImage::create([
            'image' =>  "image2.png",
            'document_id' => $document1->id,
            'creator_id' =>1,
           ]
          );

          DocumentTranslationMedia::create([
            'title_sound' => 'title_sound1.mp3',
            'title_video' => 'title_video1.mp4',
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'document_translation_id' => $document1->translate('ar')->id,
        ]);

        $documentData2 = [
            'ar' => ["desc" => "2 عن المستند  عن المستند عن المستند ","title" => "اسم المستند2"],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $document2 =  Document::create($documentData2);

        DocumentImage::create([
            'image' =>  "image1.png",
            'document_id' => $document2->id,
            'creator_id' =>1,
           ]
          );
          DocumentImage::create([
            'image' =>  "image2.png",
            'document_id' => $document2->id,
            'creator_id' =>1,
           ]
          );

          DocumentTranslationMedia::create([
            'title_sound' => 'title_sound1.mp3',
            'title_video' => 'title_video1.mp4',
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'document_translation_id' => $document2->translate('ar')->id,
        ]);

    }

    private function seedProcedure($id){

        $procedureData1 = [
            'ar' => ["desc" => "1 عن الاجراء  عن الاجراء عن الاجراء "],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $procedure1 =  Procedure::create($procedureData1);

        ProcedureImage::create([
            'image' =>  "image1.png",
            'procedure_id' => $procedure1->id,
            'creator_id' =>1,
           ]
          );
          ProcedureImage::create([
            'image' =>  "image2.png",
            'procedure_id' => $procedure1->id,
            'creator_id' =>1,
           ]
          );

          ProcedureTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'procedure_translation_id' => $procedure1->translate('ar')->id,
        ]);

        $procedureData2 = [
            'ar' => ["desc" => "2 عن الاجراء  عن الاجراء عن الاجراء "],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $procedure2 =  Procedure::create($procedureData2);

        ProcedureImage::create([
            'image' =>  "image1.png",
            'procedure_id' => $procedure2->id,
            'creator_id' =>1,
           ]
          );
          ProcedureImage::create([
            'image' =>  "image2.png",
            'procedure_id' => $procedure2->id,
            'creator_id' =>1,
           ]
          );

          ProcedureTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'procedure_translation_id' => $procedure2->translate('ar')->id,
        ]);

    }

    private function seedRegulation($id){

        $regulationData1 = [
            'ar' => ["desc" => "1 عن القواعد  عن القواعد عن القواعد "],
            'creator_id' =>1,
            'service_id' =>$id,
        ];
        $regulation1 =  Regulation::create($regulationData1);

        RegulationImage::create([
            'image' =>  "image1.png",
            'regulation_id' => $regulation1->id,
            'creator_id' =>1,
           ]
          );
          RegulationImage::create([
            'image' =>  "image2.png",
            'regulation_id' => $regulation1->id,
            'creator_id' =>1,
           ]
          );

          RegulationTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'regulation_translation_id' => $regulation1->translate('ar')->id,
        ]);

        $regulationData2 = [
            'ar' => ["desc" => "2 عن القواعد  عن القواعد عن القواعد "],
            'creator_id' =>1,
            'service_id' =>$id,
        ];
        $regulation2 =  Regulation::create($regulationData2);

        RegulationImage::create([
            'image' =>  "image1.png",
            'regulation_id' => $regulation2->id,
            'creator_id' =>1,
           ]
          );
          RegulationImage::create([
            'image' =>  "image2.png",
            'regulation_id' => $regulation2->id,
            'creator_id' =>1,
           ]
          );

          RegulationTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'regulation_translation_id' => $regulation2->translate('ar')->id,
        ]);

    }
    private function seedFaq($id){

        $faqData1 = [
            'ar' => ["q_and_a" => "السؤال 1 الاجابة 1"],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $faq1 =  Faq::create($faqData1);

        FaqImage::create([
            'image' =>  "image1.png",
            'faq_id' => $faq1->id,
            'creator_id' =>1,
           ]
          );
          FaqImage::create([
            'image' =>  "image2.png",
            'faq_id' => $faq1->id,
            'creator_id' =>1,
           ]
          );

          FaqTranslationMedia::create([
            'q_and_a_sound' => 'q_and_a_sound1.mp3',
            'q_and_a_video' => 'q_and_a_video1.mp4',
            'faq_translation_id' => $faq1->translate('ar')->id,
        ]);

        $faqData2 = [
            'ar' => ["q_and_a" => "السؤال 2 الاجابة 2"],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $faq2 =  Faq::create($faqData2);

        FaqImage::create([
            'image' =>  "image1.png",
            'faq_id' => $faq2->id,
            'creator_id' =>1,
           ]
          );
          FaqImage::create([
            'image' =>  "image2.png",
            'faq_id' => $faq2->id,
            'creator_id' =>1,
           ]
          );

          FaqTranslationMedia::create([
            'q_and_a_sound' => 'q_and_a_sound1.mp3',
            'q_and_a_video' => 'q_and_a_video1.mp4',
            'faq_translation_id' => $faq2->translate('ar')->id,
        ]);

    }

    public function spatie(){

        //spatie seeder

         $superAdmin = User::create([
            'name' => 'Super admin',
            'email' => 'admin@admin.com',
            'type' => 0,
            'password' => Hash::make('123456789')
         ]);

               $superAdminRole = Role::create([
                'name' => 'super-admin',
                'guard_name' => 'web',
            ]);

            Permission::insert([

                [
                    'name' => 'Home page',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'deafs',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'employees',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'foundations',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'roles',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'admins',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'abouts',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'branches',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'services',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'documents',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'faqs',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'procedures',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'regulations',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'excel',
                    'guard_name' => 'web',
                ],
                       ]);

            foreach (Permission::all() as $permission) {
            $superAdminRole->permissions()->attach($permission);
        }

        $superAdmin->assignRole('super-admin');
    }
}
